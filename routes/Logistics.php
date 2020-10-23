<?php
/**
 * open.php 2020年03月17日 3:40 下午
 * @author chenqionghe
 */

Route::group(['middleware' => []], function () {
    Route::get('/test', 'LogisticsController@Logistics');
    Route::get('/map/{Logistics}/{order_num}', 'LogisticsController@map');
    Route::post('/address', 'LogisticsController@get_adress');
});