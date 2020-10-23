<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\Shopping_cartService;

class Shopping_cartController extends Controller
{

	protected $Shopping_cartService;

    public function __construct()
    {
        $this->Shopping_cartService = new Shopping_cartService();
    }

    public function add_Shopping_cart()
    {   
    	if($input = Request()->all()){
    		$add_Shopping_cart = $this->Shopping_cartService->add_cartService($input);
    		return $add_Shopping_cart;
    		
    	}
    }

    public function select_Shopping_cart(){
        if($input = Request()->all()){
            $select_cart = $this->Shopping_cartService->select_cartService($input);
        }

        return $select_cart;
    }
    public function delete_cart(){
        if($input = Request()->all()){
            $delete_cart = $this->Shopping_cartService->delete_cartService($input);
            return $delete_cart;
        }
    }

    public function update_cart(){
        if($input = Request()->all()){
            $update_cart = $this->Shopping_cartService->update_cartService($input);
            return $update_cart;
        }
    }
}
