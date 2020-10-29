<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class order_Shipping extends Model
{
	protected $connection = 'mysql3';
    protected $table='order_Shipping';
    public $timestamps  =false;

}
