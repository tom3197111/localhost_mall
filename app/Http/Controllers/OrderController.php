<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\IndexService;
use App\Http\Service\CategoryService;
use App\Http\Service\BaneerService;
use App\Http\Service\Shopping_cartService;
use App\Http\Service\OrderService;
use App\Http\Service\User_dataService;
use App\Http\Service\LogisticsService;
use Session;
use ECPay_PaymentMethod as ECPayMethod;
use ECPay_AllInOne as ECPay;
use ECPay_CheckMacValue;
class OrderController extends Controller
{	
    protected $CategoryService;
    protected $IndexService;
    protected $BaneerService;
    protected $Shopping_cartService;
    protected $OrderService;
    protected $User_dataService;
    protected $LogisticsService;
    
    public function __construct()
    {
        $this->CategoryService = new CategoryService();
        $this->IndexService = new IndexService();
        $this->BaneerService = new BaneerService();
        $this->Shopping_cartService = new Shopping_cartService();
        $this->OrderService = new OrderService();
        $this->User_dataService =new User_dataService();
        $this->LogisticsService =new LogisticsService();
    }	
    public function order_creation(){
        $logo_img='';
        $Logistics = Request()->all();
        if(count($Logistics)!=0){
            $logo_img = $this->OrderService->logo_img($Logistics);
        }    
        // dd($logo_img)
    	$data=$this->IndexService->get();
        $Category = $this->CategoryService->tree();
        $baneer =$this->BaneerService->img();
        $input=collect(['account' => session('account')]);
        $post_fee=$this->OrderService->shippinginterface_Service();
       if(empty($order=$this->Shopping_cartService->select_cartService($input))){
            return view('home.index',compact('data','Category','baneer','commodity','Logistics','post_fee','logo_img'));
       }else{
            $TotalPrice=0;
            foreach ($order as $key => $value) {
                $Price=$value->total_fee;
                $TotalPrice=$TotalPrice+$Price;
            }
            return view('proceed_to_checkout.checkout',compact('data','Category','baneer','order','TotalPrice','Logistics','post_fee','logo_img'));
       }

    }

    public function Ecpay(){
        if($input = Request()->all()){
            $order=$this->Shopping_cartService->select_cartService($input);
            $TotalPrice=0;
            foreach ($order as $key => $value) {
                $Price=$value->total_fee;
                $TotalPrice=$TotalPrice+$Price;
            }

            
        }
        //廠商交易編號生成(取得四個亂數+系統現在時間)
        start:
        $Random = $this->User_dataService->generateRandomString(4);
        $MerchantTradeNo = $Random.time();
        //查詢訂單編號是否已經存在 如果存在則在進行交易編號生成直到查詢不到
        if($this->OrderService->Vendor_transaction_number_check_Service($MerchantTradeNo,$order)!=false){
            goto start;
            
        }
        //訂單產生成功時儲存交易編號
        $this->OrderService->Vendor_transaction_number_updata_Service($MerchantTradeNo,$order);
        //訂單產生成功時儲存物流資料
        $this->OrderService->add_logistics_buyer_data_Service($input,$order,$MerchantTradeNo);
        //新增收貨人資料
        if($this->OrderService->order_shipping_data_Service($input,$order,$MerchantTradeNo)=='Repository_no'){
            exit();
        }


    try {
        
        // $obj = new \ECPay_AllInOne();
        $obj=new ECPay();
        
        //服務參數
        $obj->ServiceURL  = "https://payment-stage.ecpay.com.tw/Cashier/AioCheckOut/V5";   //服務位置
        $obj->HashKey     = '5294y06JbISpM5x9' ;                                           //測試用Hashkey，請自行帶入ECPay提供的HashKey
        $obj->HashIV      = 'v77hoKGq4kWxNNIS' ;                                           //測試用HashIV，請自行帶入ECPay提供的HashIV
        $obj->MerchantID  = '2000132';                                                     //測試用MerchantID，請自行帶入ECPay提供的MerchantID
        $obj->EncryptType = '1';                                                           //CheckMacValue加密類型，請固定填入1，使用SHA256加密

        //基本參數(請依系統規劃自行調整)

        //廠商交易編號 沒有存在 新增一個到訂單內
        $TotalAmount = $TotalPrice+(int)$input['post_fee'];
        $obj->Send['ReturnURL']         = "https://1182afa3978c.ngrok.io/order_ending/ok" ;    //付款完成通知回傳的網址
        $obj->Send['MerchantTradeNo']   = $MerchantTradeNo;                          //訂單編號
        $obj->Send['MerchantTradeDate'] = date('Y/m/d H:i:s');                       //交易時間
        $obj->Send['TotalAmount']       = $TotalAmount;                               //交易金額
        $obj->Send['TradeDesc']         = "good to drink" ;                          //交易描述
        $obj->Send['ChoosePayment']     = ECPayMethod::ALL ;                  //付款方式:全功能
        $obj->Send['ClientBackURL']     = 'http://mall.com/' ;   //Client 端返回的按鈕連結
        // $obj->Send['ItemURL']     = 'https://c9eee1dbec44.ngrok.io' ;   //商品銷售網址
        // $obj->Send['Remark']     = 'https://c9eee1dbec44.ngrok.io' ;   //商品銷售網址
        // $obj->Send['Language']     = 'JPN' ;   //語系設定

        //訂單的商品資料
        foreach ($order as $order_num => $value) {
                $order_num=array(
                    'Name' => $value->name,
                    'Price' =>(int)$value->price,
                    'Currency' => "元", 
                    'Quantity' => (int)$value->quantity, 
                    'URL' => "dedwed"
                );
                array_push($obj->Send['Items'], $order_num);

        }
        //運費
        
                $order_num=array(
                    'Name' => '運送方式:'.$input['LogisticsType'],
                    'Price' =>(int)$input['post_fee'],
                    'Currency' => "元", 
                    'Quantity' => '1', 
                    'URL' => "dedwed"
                );
                array_push($obj->Send['Items'], $order_num);
        // array_push($obj->Send['Items'], array('Name' => "歐付寶黑芝麻豆漿", 'Price' => (int)"2000",
        //            'Currency' => "元", 'Quantity' => (int) "1", 'URL' => "dedwed"));


        //Credit信用卡分期付款延伸參數(可依系統需求選擇是否代入)
        //以下參數不可以跟信用卡定期定額參數一起設定
        // $obj->SendExtend['CreditInstallment'] = '' ;    //分期期數，預設0(不分期)，信用卡分期可用參數為:3,6,12,18,24
        // $obj->SendExtend['InstallmentAmount'] = 0 ;    //使用刷卡分期的付款金額，預設0(不分期)
        // $obj->SendExtend['Redeem'] = false ;           //是否使用紅利折抵，預設false
        // $obj->SendExtend['UnionPay'] = false;          //是否為聯營卡，預設false;

        //Credit信用卡定期定額付款延伸參數(可依系統需求選擇是否代入)
        //以下參數不可以跟信用卡分期付款參數一起設定
        // $obj->SendExtend['PeriodAmount'] = '' ;    //每次授權金額，預設空字串
        // $obj->SendExtend['PeriodType']   = '' ;    //週期種類，預設空字串
        // $obj->SendExtend['Frequency']    = '' ;    //執行頻率，預設空字串
        // $obj->SendExtend['ExecTimes']    = '' ;    //執行次數，預設空字串
        
        # 電子發票參數
        /*
        $obj->Send['InvoiceMark'] = ECPay_InvoiceState::Yes;
        $obj->SendExtend['RelateNumber'] = "Test".time();
        $obj->SendExtend['CustomerEmail'] = 'test@ecpay.com.tw';
        $obj->SendExtend['CustomerPhone'] = '0911222333';
        $obj->SendExtend['TaxType'] = ECPay_TaxType::Dutiable;
        $obj->SendExtend['CustomerAddr'] = '台北市南港區三重路19-2號5樓D棟';
        $obj->SendExtend['InvoiceItems'] = array();
        // 將商品加入電子發票商品列表陣列
        foreach ($obj->Send['Items'] as $info)
        {
            array_push($obj->SendExtend['InvoiceItems'],array('Name' => $info['Name'],'Count' =>
                $info['Quantity'],'Word' => '個','Price' => $info['Price'],'TaxType' => ECPay_TaxType::Dutiable));
        }
        $obj->SendExtend['InvoiceRemark'] = '測試發票備註';
        $obj->SendExtend['DelayDay'] = '0';
        $obj->SendExtend['InvType'] = ECPay_InvType::General;
        */

// dd($obj);
        //產生訂單(auto submit至ECPay)
      // $obj->CheckOut();
    $Response = (string)$obj->CheckOutString();

    echo $Response;
    // 自動將表單送出
    echo '<script>document.getElementById("__ecpayForm").submit();</script>';

    } catch (Exception $e) {
        echo $e->getMessage();
    } 
        
    }

    public function order_ending()
    {
        // 將 post 資料轉成字串 儲存 SaveData
        // $String = print_r( $_POST, true );
        // file_put_contents( 'C:\xampp\htdocs\MALL\tmp/ECPay.txt', $String, FILE_APPEND );
         


        define( 'ECPay_MerchantID', '2000132' );
        define( 'ECPay_HashKey', '5294y06JbISpM5x9' );
        define( 'ECPay_HashIV', 'v77hoKGq4kWxNNIS' );
        // 重新整理回傳參數。
        $arParameters = $_POST;
        // foreach ($arParameters as $keys => $value) {
        //     if ($keys != 'CheckMacValue') {
        //         if ($keys == 'PaymentType') {
        //             $value = str_replace('_CVS', '', $value);
        //             $value = str_replace('_BARCODE', '', $value);
        //             $value = str_replace('_CreditCard', '', $value);
        //         }
        //         if ($keys == 'PeriodType') {
        //             $value = str_replace('Y', 'Year', $value);
        //             $value = str_replace('M', 'Month', $value);
        //             $value = str_replace('D', 'Day', $value);
        //         }
        //         $arFeedback[$keys] = $value;
        //     }
        // }

        $CheckMacValue = ECPay_CheckMacValue::generate( $arParameters, ECPay_HashKey, ECPay_HashIV, 1 );
         
         //    file_put_contents( 'C:\xampp\htdocs\MALL\tmp/TEST.txt', $CheckMacValue, FILE_APPEND );
         // file_put_contents( 'C:\xampp\htdocs\MALL\tmp/ECPay.txt', $_POST['CheckMacValue'], FILE_APPEND );

        // 必須要支付成功並且驗證碼正確
        if ( $_POST['RtnCode'] =='1' && $CheckMacValue == $_POST['CheckMacValue'] ){
             $CheckMacVal=$_POST;
             $payment_number=$CheckMacVal['MerchantTradeNo'];
             //訂單資料儲存
             $this->OrderService->order_CreditCard_Service($CheckMacVal);
             //購物車內的資料新增到訂單購物車內
             $this->OrderService->order_shopping_cart_Service($payment_number);
             //買家資訊新增訂單編號進去
             $this->OrderService->order_shipping_insert_payment_number_Service($payment_number);
             //清空購物車
             $this->OrderService->Empty_cart_Service($payment_number);
             //超商物流訂單建立 
             $this->LogisticsService->Logistics_Service($payment_number);
             echo '1|OK';
        }
       
        // 接收到資訊回應綠界
        
                 


    }
}
