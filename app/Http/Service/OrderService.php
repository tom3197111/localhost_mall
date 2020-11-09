<?php

namespace App\Http\Service;

use App\Http\Repository\OrderRepository;
use App\Http\Repository\Shopping_cartRepository;
class OrderService
{
    protected $OrderRepository;

    public function __construct()
    {
        $this->OrderRepository = new OrderRepository();
        $this->Shopping_cartRepository = new Shopping_cartRepository();
    }
    //廠商訂單新增
    public function Vendor_transaction_number_updata_Service($MerchantTradeNo,$order){
        $order_id =  $order[0]->order_id;
        $Vendor_transaction_number_updata=$this->OrderRepository->Vendor_transaction_number_updata_Repository($MerchantTradeNo,$order_id);
    }
    //廠商訂單查詢
    public function Vendor_transaction_number_check_Service($MerchantTradeNo,$order){
        $order_id =  $order[0]->order_id;
        $check_Vendor_number=$this->OrderRepository->Vendor_transaction_number_check_Repository($MerchantTradeNo,$order_id);
        return $check_Vendor_number;
    }
    public function order_CreditCard_Service($CheckMacVal)
    {   
        //訂單編號
        $payment_number=$CheckMacVal['MerchantTradeNo'];
        $order_data = $this->OrderRepository->select_order_cartRepository($payment_number);
        //付款金額
        $payment = $CheckMacVal['TradeAmt'] - $order_data['post_fee'];
        //支付類型
        if($CheckMacVal['PaymentType']=='Credit_CreditCard'){
            $payment_type = 1;
        }
        //運費
        $post_fee = $order_data['post_fee'];
        //待補
        //目前狀態(已付款為2)
        if($CheckMacVal['RtnCode']== 1){
            $status = 2;
        }
        //付款時間
        $payment_time = $CheckMacVal['PaymentDate'];
        $payment_time = date("Y-m-d H:i:s",strtotime($payment_time));
        //出貨時間
        //待補
        //交易完成時間
        $end_time = $CheckMacVal['TradeDate'];
        //物流名單 
        //待補
        //物流單號
        //待補
        $order_CreditCard = $this->OrderRepository->order_CreditCard_Repository($payment_number,$payment,$payment_type,$status,$payment_time,$end_time,$post_fee);
         return $order_CreditCard;
    }
    // public function order_Total_Price($input)
    // {   
    //      $account=$input['account'];
    //      $order_TotalPrice = $this->OrderRepository->order_TotalPrice($account,);

    //      return $order_TotalPrice;
    // }

    public function order_shipping_data_Service($input,$order,$MerchantTradeNo){
        $order_id=$order[0]->order_id;
        $Repository=$this->OrderRepository->order_shipping_data_Repository($input,$order_id,$MerchantTradeNo);
        return $Repository;
    }

    public function order_shopping_cart_Service($payment_number){

        $payment_number=$this->OrderRepository->select_order_cartRepository($payment_number);
        $cart_id=$payment_number->order_id;
        $cart=$this->Shopping_cartRepository->select_order_cartRepository($cart_id);
        $cart=$this->OrderRepository->insert_order_commodity_item($cart,$payment_number);
        return $cart;

    }
    public function order_shipping_insert_payment_number_Service($payment_number){
        $payment_number=$this->OrderRepository->select_order_cartRepository($payment_number);
        $cart_id=$payment_number->order_id;
        $cart=$this->OrderRepository->select_order_shipping_Repository($cart_id,$payment_number);
    }

    public function Empty_cart_Service($payment_number){
        $payment_number=$this->OrderRepository->select_order_cartRepository($payment_number);
        $cart_id=$payment_number->order_id;
        $this->Shopping_cartRepository->Empty_cart_Repository($cart_id);
    }

    public function shippinginterface_Service(){
         $shippinginterface = $this->OrderRepository->shippinginterface_Repository();
         return $shippinginterface;
    }

    public function logo_img($Logistics){
        $LogisticsSubType=$Logistics['LogisticsSubType'];
        $shippinginterface = $this->OrderRepository->shippinginterface_Repository();
        foreach ($shippinginterface as $key => $value) {
            if($value['LogisticsType']==$LogisticsSubType){
                return $value;
            }
        }
    }

    public function add_logistics_buyer_data_Service($input,$order,$MerchantTradeNo){
        $order_id=$order[0]['order_id'];
        $this->OrderRepository->add_logistics_buyer_data_Repository($input,$order_id,$MerchantTradeNo);

    }
}
