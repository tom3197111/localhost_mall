<?php

namespace App\Http\Repository;
use App\Http\Model\Commodity;
class ProductRepository
{
    protected $Commodity;
    public function __construct()
    {
        $this->Commodity = new Commodity();

    }

    public function Product_date_Repository($p_id)
    {
        $Product_date = Commodity::where('art_id','=',$p_id)->get();
        return $Product_date;
    }


}
