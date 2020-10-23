<?php

namespace App\Http\Repository;

use App\Http\Model\CompanyInfo;
use App\Http\Model\Category;
use App\Http\Model\commodity;
class IndexRepository
{
    protected $companyInfo;
    protected $category;
    protected $commodity;
    public function __construct()
    {
        $this->category = new Category();
        $this->companyInfo = new CompanyInfo();
        $this->commodity =new commodity();

    }

    public function get()
    {
        $companyinfo = companyinfo::get();
        return $companyinfo;
    }
    public function getCommodity()
    {
        $commodity = commodity::get();
        return $commodity;
    }

}
