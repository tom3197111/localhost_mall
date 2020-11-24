<?php

namespace App\Http\Repository;

use App\Http\Model\Order;
use App\Http\Model\order_shipping;
use App\Http\Model\order_commodity_item;
use App\Http\Model\shippinginterface;
use App\Http\Model\logistics_buyer_data;
use App\Http\Model\users_address;
class OrderRepository
{
    protected $order;
    protected $order_shipping;
    protected $order_commodity_item;
    protected $shippinginterface;
    protected $logistics_buyer_data;
    protected $users_address;
    public function __construct()
    {
        $this->order = new Order();
        $this->order_shipping = new order_shipping();
        $this->order_commodity_item = new order_commodity_item();
        $this->shippinginterface = new shippinginterface();
        $this->logistics_buyer_data = new logistics_buyer_data();
        $this->users_address = new users_address();
    }
    //廠商訂單編號新增
    public function Vendor_transaction_number_updata_Repository($MerchantTradeNo,$order_id){
        $updata_Vendor_number = Order::where('order_id', '=', $order_id)->update(['payment_number' =>$MerchantTradeNo]);
    }
    //廠商訂單編號查詢
    public function Vendor_transaction_number_check_Repository($MerchantTradeNo,$order_id){
        $check_Vendor_number = Order::where('payment_number', '=', $MerchantTradeNo)->where('status','=','1')->where('order_id','=',$order_id)->first();
        if($check_Vendor_number == 'null'){
            return true;
        }
        return false;
    }

    public function order_CreditCard_Repository($payment_number,$payment,$payment_type,$status,$payment_time,$end_time,$post_fee)
    {

        $affectedRows = Order::where('payment_number', '=', $payment_number)->update(
           [
            'post_fee'=>$post_fee,
            'payment' => $payment,
            'payment_type'=>$payment_type,
            'status' => $status,
            'payment_time'=>$payment_time,
            'end_time'=>$end_time
        ]);
        return $affectedRows;
    }
    public function order_shipping_data_Repository($input,$order_id,$MerchantTradeNo){
        if(!$this->select_order_shipping_order_id($order_id)->isempty()){
            order_shipping::where('order_id', '=', $order_id)->update(
               [
                'account'=>$input['account'],
                'receiver_name' =>$input['receiver_name'],
                'receiver_mobile'=>$input['receiver_mobile'],
                'LogisticsType'=>$input['LogisticsType'],
                'receiver_email'=>$input['receiver_email'],
                'LogisticsSubType'=>$input['LogisticsSubType'],
                'payment_number'=>$MerchantTradeNo
            ]);
            Order::where('order_id', '=', $order_id)->update(
                [
                 'buy_message'=>$input['buy_message'],
                 'post_fee'=>$input['post_fee']
                 ]);
        }else{
            $order_shipping = new order_shipping;
            $order_shipping->order_id = $order_id;
            $order_shipping->account = $input['account'];
            $order_shipping->receiver_name = $input['receiver_name'];
            $order_shipping->receiver_mobile = $input['receiver_mobile'];
            $order_shipping->LogisticsType = $input['LogisticsType'];
            $order_shipping->receiver_email = $input['receiver_email'];
            $order_shipping->LogisticsSubType = $input['LogisticsSubType'];
            $order_shipping->payment_number = $MerchantTradeNo;
            $order_shipping->save();

            Order::where('order_id', '=', $order_id)->update(
                [
                 'buy_message'=>$input['buy_message'],
                 'post_fee'=>$input['post_fee']
                 ]);

        }
        return "Repository_ok";



    }
    public function insert_order_commodity_item($input,$payment_number){
        foreach ($input as $key =>$v) {
            $data = array(
                        'order_id' => $input[$key]['order_id'], 
                        'payment_number' => $payment_number->payment_number, 
                        'commodity_id' => $input[$key]['id'],
                        'commodity_num' => $input[$key]['quantity'], 
                        'commodity_name' => $input[$key]['name'], 
                        'price' => $input[$key]['price'],
                        'total_fee' => $input[$key]['total_fee'],
                        );
            try{
                order_commodity_item::insert($data);     
            }catch (\Exception $e){
                return $e;
            }
        }   return "ok";
       
    }
    // public function order_TotalPrice()
    // {
    //     // $order_Total_Price = banner::get();
    //     // return $order_Total_Price;
    // }
    //查詢訂單編號
    public function select_order_cartRepository($payment_number){
        $payment_number = Order::where('payment_number', '=', $payment_number)->first();
        return $payment_number;
    }
    public function select_order_shipping_Repository($cart_id,$payment_number){
        $payment_number = order_shipping::where('order_id', '=', $cart_id)->update(
           [
            'payment_number' => $payment_number->payment_number
        ]);
    }
    public function select_order_shipping_order_id($order_id){
        // dd($order_id);
        $order_id= order_shipping::where('order_id', '=', $order_id)->get();
        return $order_id;

    }

    public function select_order_shipping_payment_number($payment_number){
        // dd($order_id);
        $payment_number= order_shipping::where('payment_number', '=', $payment_number)->get();
        return $payment_number;

    }
    
    public function shippinginterface_Repository(){
        $shippinginterface = shippinginterface::all();
        return $shippinginterface;
    }

    public function add_logistics_buyer_data_Repository($input,$order_id,$MerchantTradeNo){
        if($this->select_logistics_buyer_data_Repository($order_id)->isEmpty()){
                $data = array(
                    'Store' => $input['LogisticsSubType'], 
                    'CVSStoreID' => $input['CVSStoreID'], 
                    'CVSStoreName' => $input['CVSStoreName'],
                    'CVSAddress' => $input['CVSAddress'], 
                    'CVSTelephone' => $input['CVSTelephone'], 
                    'order_id' => $order_id,
                    'payment_number'=>$MerchantTradeNo
                    );
                try{
                    logistics_buyer_data::insert($data);     
                }catch (\Exception $e){
                    return $e;
                }

        }else{

                $logistics_buyer_data = logistics_buyer_data::where('order_id', '=', $order_id)->update(
                   [
                    'Store' => $input['LogisticsSubType'],
                    'CVSStoreID' => $input['CVSStoreID'],
                    'CVSStoreName' => $input['CVSStoreName'],
                    'CVSAddress' => $input['CVSAddress'],
                    'CVSTelephone' => $input['CVSTelephone'],
                    'payment_number' => $MerchantTradeNo
                    ]);
                // return $logistics_buyer_data;
        }


    }

    public function select_logistics_buyer_data_Repository($order_id){
        $select_logistics_buyer_data_Repository=logistics_buyer_data::where('order_id','=',$order_id)->get();    
        return $select_logistics_buyer_data_Repository;
    }

    public function create_user_address_data_Repository($input,$account){
        $account=array('account'=>$account);
        $Address = $input['receiver_city'].'_'.$input['receiver_town'].'_'.$input['Address'].'_郵遞區號:'.$input['zipcode'];
        $Address=array('Address'=>$Address);
        unset($input['_token'],$input['receiver_city'],$input['receiver_town'],$input['Address'],$input['zipcode']);
        $input= array_merge($input,$account);
        $input= array_merge($input,$Address);
        users_address::insert($input,$account);
    }

    public function user_address_Repository($account){
        $users_address=users_address::where('account','=',$account)->get();
        return $users_address;
    }
}

