<?php

namespace App\Http\Service;

use App\Http\Repository\IndexRepository;
use App\Http\Repository\CategoryRepository;

class IndexService
{
    protected $IndexRepository;

    public function __construct()
    {
        $this->CategoryRepository = new CategoryRepository();
        $this->IndexRepository = new IndexRepository();
        $this->Main_category();
    }

    public function get()
    {
     $companyinfo = $this->IndexRepository->get();

     return $companyinfo;
 }
 public function getCommodity()
 {
     $companyinfo = $this->IndexRepository->getCommodity();

     return $companyinfo;
 }


 public function search_Commodity_Service($Category_and_commodity)
 {
     $companyinfo = $this->IndexRepository->search_Commodity_Repository($Category_and_commodity);

     return $companyinfo;
 }
 public function Main_category(){
    $Category=$this->CategoryRepository->get_Category_Repository();
    $getCommodity = $this->IndexRepository->getCommodity();
    foreach ($Category as $Main_key => $Main_category) {
        foreach ($Category as $key => $Sub_category) {
            if($Main_category->cate_id == $Sub_category->cate_pid){
                foreach ($getCommodity as $key => $getCommodity_value) {
                    if($Sub_category->cate_id == $getCommodity_value->cate_id){
                        $category[$Main_category->cate_id][$key]=$getCommodity_value;
                        
                    }
                }
            }
        }
    }  

return $category;    
}

}
