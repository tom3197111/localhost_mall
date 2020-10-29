<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
	protected $connection = 'mysql3';
    protected $table='Order';
}
