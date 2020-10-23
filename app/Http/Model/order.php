<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
	protected $connection = 'mysql3';
    protected $table='order';
}
