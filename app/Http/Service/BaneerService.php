<?php

namespace App\Http\Service;

use App\Http\Repository\BaneerRepository;

class BaneerService
{
    protected $BaneerRepository;

    public function __construct()
    {
        $this->BaneerRepository = new BaneerRepository();
    }

    public function img()
    {
         $companyinfo = $this->BaneerRepository->img();

         return $companyinfo;
    }


}
