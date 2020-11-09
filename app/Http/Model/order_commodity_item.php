<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class order_commodity_item extends Model
{
	protected $connection = 'mysql3';
    protected $table='order_commodity_item';
    public $timestamps  =false;

}
