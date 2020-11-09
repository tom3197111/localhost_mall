<?php

namespace App\Http\Repository;

use App\Http\Model\banner;
class BaneerRepository
{
    protected $banner;
    public function __construct()
    {
        $this->banner = new banner();

    }

    public function img()
    {
        $banner = banner::get();
        return $banner;
    }


}
