<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use EcpayLogistics;
use EcpayLogisticsType;
use EcpayLogisticsSubType;
use EcpayIsCollection;
use EcpayDevice;
class LogisticsController extends Controller
{
    // protected $IndexService;

    // public function __construct()
    // {
    //     $this->CategoryService = new CategoryService();

    // }
    public function Logistics(){
        define('HOME_URL', 'http://www.sample.com.tw/logistics_dev');
    try {
        $AL = new EcpayLogistics();
        $AL->HashKey = '5294y06JbISpM5x9';
        $AL->HashIV = 'v77hoKGq4kWxNNIS';
        $AL->Send = array(
            'MerchantID' => '2000132',
            'MerchantTradeNo' => 'no' . date('YmdHis'),
            'MerchantTradeDate' => date('Y/m/d H:i:s'),
            'LogisticsType' => EcpayLogisticsType::CVS,
            'LogisticsSubType' => EcpayLogisticsSubType::UNIMART,
            'GoodsAmount' => 1500,
            'CollectionAmount' => 10,
            'IsCollection' => EcpayIsCollection::NO,
            'GoodsName' => '測試商品',
            'SenderName' => '測試寄件者',
            'SenderPhone' => '0226550115',
            'SenderCellPhone' => '0911222333',
            'ReceiverName' => '測試收件者',
            'ReceiverPhone' => '0226550115',
            'ReceiverCellPhone' => '0933222111',
            'ReceiverEmail' => 'test_emjhdAJr@test.com.tw',
            'TradeDesc' => '測試交易敘述',
            'ServerReplyURL' => HOME_URL . '/ServerReplyURL.php',
            'LogisticsC2CReplyURL' => HOME_URL . '/LogisticsC2CReplyURL.php',
            'Remark' => '測試備註',
            'PlatformID' => '',
        );

        $AL->SendExtend = array(
            'ReceiverStoreID' => '991182',
            'ReturnStoreID' => '991182'
        );
        // BGCreateShippingOrder()
        $Result = $AL->BGCreateShippingOrder();
        echo '<pre>' . print_r($Result, true) . '</pre>';
    } catch(Exception $e) {
        echo $e->getMessage();
    }
    }

    
    public function map($Logistics,$order_num){
        if($Logistics=='UNIMART'){
            $LogisticsSubType=EcpayLogisticsSubType::UNIMART;
        }elseif ($Logistics=='FAMI') {
            $LogisticsSubType=EcpayLogisticsSubType::FAMILY;
        }elseif ($Logistics=='HILIFE') {
            $LogisticsSubType=EcpayLogisticsSubType::HILIFE;
        }
        $http='http://'.$_SERVER["HTTP_HOST"].'/localhost_mall/checkout';
	    define('HOME_URL', $http);
	    // require('Ecpay.Logistic.Integration.php');
	    try {
	        $AL = new EcpayLogistics();
	        $AL->Send = array(
	            'MerchantID' => '2000132',
	            'MerchantTradeNo' => 'no' . date('YmdHis'),
	            'LogisticsSubType' => $LogisticsSubType,
	            'IsCollection' => EcpayIsCollection::NO,
	            'ServerReplyURL' => HOME_URL,
	            'ExtraData' => '測試額外資訊',
	            'Device' => EcpayDevice::PC
	        );
	        // CvsMap(Button名稱, Form target)
	        $html = $AL->CvsMap('電子地圖(統一)');
	        echo $html;
	    } catch(Exception $e) {
	        echo $e->getMessage();
	    }
    }

    public function get_adress(){
        $input = Request()->all();
        // echo $input;
        // return $input;
        // dd($input);
        return view('layouts.checkout.order',compact('input'));
    }
}
