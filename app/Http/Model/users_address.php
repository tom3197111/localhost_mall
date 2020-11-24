<?php

namespace App\Http\Model;

use Illuminate\Database\Eloquent\Model;
class users_address extends Model 
{	
	protected $table  = 'users_address';
   protected $connection = 'mysql2';
   protected $primaryKey='id';

 /*   注意預設上，在資料表裡需要有 updated_at 和 created_at 兩個欄位。
   如果你不想設定或自動更新這兩個欄位，
   將類別裡的 $timestamps 屬性設為 false。 */
   public $timestamps  =true;
}
