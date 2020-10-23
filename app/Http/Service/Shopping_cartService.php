<?php

namespace App\Http\Service;

use App\Http\Repository\Shopping_cartRepository;
use Illuminate\Support\Collection;
class Shopping_cartService
{
    protected $Shopping_cartRepository;

    public function __construct(){
        $this->Shopping_cartRepository = new Shopping_cartRepository();
    }

    public function add_cartService($input){
    	$account=$input['account'];
		$input=json_decode($input['products'],true);
		$collect=collect($input);
		// $collect->put('account',$account);
			//判斷當前會員的訂單狀況是否建立並且未付款的狀態

        if($this->Shopping_cartRepository->select_Order_cart_idRepository($account)->isEmpty()){
			//如果是未付款或者沒建立訂單則建立訂單
			$Order_build_id=$this->Order_buildService($account);
            $Order_build_id=$this->Shopping_cartRepository->select_Order_cart_idRepository($account);
			//在新增商品進去購物車
			$add_Shopping_cart = $this->Shopping_cartRepository->add_Shopping_cartRepository($collect,$account,$Order_build_id);
			return $add_Shopping_cart;
		}else{ //如果當前會員的訂單已經建立
			//尋找當前購物車的訂單編號並且狀態為未付款
			$Order_build_id=$this->Shopping_cartRepository->select_Order_cart_idRepository($account);
			//先刪除商品在新增當前購物車內的所有商品進資料庫
			$add_Shopping_cart = $this->Shopping_cartRepository->add_Shopping_cartRepository($collect,$account,$Order_build_id);

		}

    }
    //生成訂單編號
    public function Order_buildService($account){
    	
    	$Order_build_id=date('YmdHis');
        $acco=substr($account,6);
    	$Order_build_id.=$acco;
    	$Order_build = $this->Shopping_cartRepository->build_OrderRepository($Order_build_id,$account);
    	return $Order_build;
    }

    //搜尋購物車內的東西
    public function select_cartService($input){
    	$account=$input['account'];
    	$select_cart=$this->Shopping_cartRepository->select_cartRepository($account);
    	return$select_cart;
    }
    //刪除購物車內的商品
    public function delete_cartService($input){
        $id=$input['id'];
        $account = $input['account'];
        $delete_cart=$this->Shopping_cartRepository->delete_cartRepository($id,$account);
        return $delete_cart;
    }

    public function update_cartService($input){
        $id=$input['id'];
        $account = $input['account'];
        $quantity = $input['quantity'];
        $total_fee = $input['total_fee'];
        $update_cart=$this->Shopping_cartRepository->update_cartRepository($id,$account,$quantity,$total_fee);
        return $update_cart;
    }


}
