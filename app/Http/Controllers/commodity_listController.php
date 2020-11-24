<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\IndexService;
use App\Http\Service\CategoryService;
use App\Http\Service\BaneerService;
class commodity_listController extends Controller
{
    protected $IndexService;
    protected $CategoryService;
    protected $BaneerService;
    
    public function __construct()
    {
        $this->CategoryService = new CategoryService();
        $this->IndexService = new IndexService();
        $this->BaneerService = new BaneerService();
    }

    public function commodity_list(){
        $data=$this->IndexService->get();
        $Category = $this->CategoryService->tree();
        $baneer =$this->BaneerService->img();
        $commodity = $this->IndexService->getCommodity();
        $category_commodity = $this->IndexService->Main_category();
        return view('commodity_list.commodity_list',compact('data','Category','commodity','baneer','category_commodity'));

    }    
}
