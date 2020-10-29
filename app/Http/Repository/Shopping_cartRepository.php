<?php

namespace App\Http\Repository;

use App\Http\Model\shopping_cart;
use App\Http\Model\order;
use Carbon\Carbon;
class Shopping_cartRepository
{
    protected $Shopping_cart;
    protected $order;

    public function __construct()
    {
        $this->Shopping_cart = new shopping_cart();
        $this->order = new order();
    }

    public function add_Shopping_cartRepository($collect,$account,$Order_build_id)
    {   
        $order_id=$Order_build_id[0]->order_id;
        $affectedRows = shopping_cart::where('user_account', '=', $account)->delete();
        // $Shopping_cart = new Shopping_cart;
        
        foreach ($collect as $key => $value) {
            $data = array(
                        'order_id' => $order_id, 
                        'user_account' => $account, 
                        'id' => $collect[$key]['id'],
                        'quantity' => $collect[$key]['quantity'], 
                        'name' => $collect[$key]['name'], 
                        'price' => $collect[$key]['price'],
                        'total_fee' => $collect[$key]['price']*$collect[$key]['quantity'],
                        'image'=> $collect[$key]['image'],
                        'updated_at'=> Carbon::now()
                        );
            try{
                shopping_cart::insert($data);     
            }catch (\Exception $e){
                return $e;
            }
        }   return "ok";
    }

    public function build_OrderRepository($Order_build_id,$account){
        $order = new order;
        $order->order_id = $Order_build_id;
        $order->status = 1;
        $order->user_id=$account;
        try{
            $order->save();
            return $Order_build_id;
        }catch (\Exception $e){
            return false;
        }
    }
    public function select_Order_cart_idRepository($account){

        $order_id = order::where('user_id', '=', $account)->where('status','=','1')->get();
        return $order_id;
    }

    public function select_cartRepository($account){
        $select_cart = shopping_cart::where('user_account', '=', $account)->get();
        return$select_cart;
    }
    public function delete_cartRepository($id,$account){
        $delete_cart = shopping_cart::where('id', '=', $id)->where('user_account','=',$account)->delete();
    return $delete_cart;
    }

    public function update_cartRepository($id,$account,$quantity,$total_fee){
        $delete_cart = shopping_cart::where('id', '=', $id)->where('user_account','=',$account)->update(['quantity'=>$quantity,'total_fee'=>$total_fee]);
    return $delete_cart;
    }    

    public function select_order_cartRepository($payment_number){
        $select_order_cart = shopping_cart::where('order_id', '=', $payment_number)->get();
        return $select_order_cart;
    }
    public function Empty_cart_Repository($cart_id){
        shopping_cart::where('order_id', '=', $cart_id)->delete();
    }
}