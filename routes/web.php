<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::resource('goodsApi', 'Api\GoodsApi');
Route::get('goods_add','GoodsController@goods_add');
Route::get('goods_list','GoodsController@goods_list');
Route::get('goods_upd','GoodsController@goods_upd');