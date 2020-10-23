<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class order_shipping extends Model
{
	protected $connection = 'mysql3';
    protected $table='order_shipping';
    public $timestamps  =false;

}
