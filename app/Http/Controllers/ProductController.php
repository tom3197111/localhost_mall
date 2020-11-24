<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\IndexService;
use App\Http\Service\CategoryService;
use App\Http\Service\BaneerService;
use App\Http\Service\ProductService;

class ProductController extends Controller
{
    protected $IndexService;
    protected $CategoryService;
    protected $BaneerService;
    protected $ProductService;

    public function __construct()
    {
        $this->IndexService = new IndexService();
        $this->CategoryService = new CategoryService();
        $this->BaneerService = new BaneerService();
        $this->ProductService = new ProductService();
    }
    public function Product_list($p_id=1){
    	$Product = $this->ProductService->Product_date_Service($p_id);
	    $data=$this->IndexService->get();
        $Category = $this->CategoryService->tree();
        $baneer =$this->BaneerService->img();
        $commodity = $this->IndexService->getCommodity();
        $category_commodity = $this->IndexService->Main_category();
        return view('single.single',compact('data','Category','baneer','Product','commodity','category_commodity'));
    }

    public function Product(){
        $input = Request()->all();
        $Product = $this->ProductService->Product_date_Service($input['p_id']);
        return $Product;
    }

}
