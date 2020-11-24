<?php

namespace App\Http\Repository;

use App\Http\Model\CompanyInfo;
use App\Http\Model\Category;
use App\Http\Model\Commodity;
class IndexRepository
{
    protected $companyInfo;
    protected $category;
    protected $commodity;
    public function __construct()
    {
        $this->category = new Category();
        $this->companyInfo = new CompanyInfo();
        $this->commodity =new Commodity();

    }

    public function get()
    {
        $companyinfo = CompanyInfo::get();
        return $companyinfo;
    }
    public function getCommodity()
    {
        $commodity = Commodity::get();
        return $commodity;
    }

    public function search_Commodity_Repository($Category_and_commodity){
        $commodity_data = Commodity::where('cate_id','=',$Category_and_commodity['Category_num'])->where('art_title','like','%'.$Category_and_commodity['search'].'%')->get();
        return $commodity_data;
    }

}
