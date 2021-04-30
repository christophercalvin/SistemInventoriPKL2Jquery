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


Route::get('/logout', function(){
    \Auth::logout();

    return redirect('/login');
});

Route::group(['middleware'=>'auth'], function(){
    Route::get('/', 'HomeController@index');
    Route::get('/home', 'HomeController@index');

    //atur supplier
    Route::get('/supplier', 'SupplierController@index');
    Route::get('/supplier/tambah', 'SupplierController@add');
    Route::post('/supplier/tambah', 'SupplierController@store');
    Route::get('/supplier/{id}', 'SupplierController@edit');
    Route::put('/supplier/{id}', 'SupplierController@update');
    Route::delete('/supplier/{id}', 'SupplierController@delete');

    //atur produk
    Route::get('/produk', 'ProdukController@index');
    Route::get('/produk/tambah', 'ProdukController@add');
    Route::post('/produk/tambah', 'ProdukController@store');
    Route::get('/produk/{id}', 'ProdukController@edit');
    Route::put('/produk/{id}', 'ProdukController@update');
    Route::delete('/produk/{id}', 'ProdukController@delete');

    //manage detail produk
    Route::get('/produk/detail/{id}', 'ProdukController@detail');

    //manage PO
    Route::get('/purchase_order','PurchaseOrdersController@index');
    Route::get('/purchase_order/tambah','PurchaseOrdersController@add');
    Route::get('/purchase_order/produk/{supplier}','PurchaseOrdersController@get_produk');
    Route::post('/purchase_order/tambah','PurchaseOrdersController@store');
    Route::get('/purchase_order/approved/{id}','PurchaseOrdersController@approved');
    Route::get('/purchase_order/{id}','PurchaseOrdersController@detail');
    Route::put('/purchase_order/{id}','PurchaseOrdersController@update');
    Route::delete('/purchase_order/line/{id}', 'PurchaseOrdersController@hapus_line');

    //Manage Good Receipt
    Route::get('/goods_receipts','GoodsReceiptController@index');
    Route::get('/goods_receipt/{id}','GoodsReceiptController@detail');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
