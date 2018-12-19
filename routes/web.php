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
    return view('index');
});

Route::get('/shop/{category?}', ['as'=>'shop', 'uses'=>'ShopController@getShop']);

Route::get('/news/{cat_code}/{prod_code}', ['as'=>'product.detail', 'uses'=>'ShopController@detail']);

Route::group(['prefix'=>'admin', 'middleware'=>['web', 'auth', 'admin']], function () {

    Route::get('/', ['as'=>'admin.home', function(){
        return view('admin\admin_index');
    }]);

    Route::resource('/products', 'Admin\AdminProductController');

    Route::resource('/categories', 'Admin\AdminCategoryController');

    Route::resource('/materials', 'Admin\AdminMaterialController');
});

Auth::routes();

