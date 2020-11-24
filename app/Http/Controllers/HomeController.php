<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Service\IndexService;
use App\Http\Service\CategoryService;
use App\Http\Service\BaneerService;
class HomeController extends Controller
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
    public function indexPage(){
        $data=$this->IndexService->get();
        $Category = $this->CategoryService->tree();
        $baneer =$this->BaneerService->img();
        $commodity = $this->IndexService->getCommodity();
        $category_commodity = $this->IndexService->Main_category();
        return view('home.index',compact('data','Category','baneer','commodity','category_commodity'));
    }

}
