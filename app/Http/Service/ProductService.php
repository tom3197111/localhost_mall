<?php

namespace App\Http\Service;

use App\Http\Repository\ProductRepository;

class ProductService
{
    protected $ProductRepository;

    public function __construct()
    {
        $this->ProductRepository = new ProductRepository();
    }

    public function Product_date_Service($p_id)
    {
         $Product_date = $this->ProductRepository->Product_date_Repository($p_id);

         return $Product_date;
    }


}
