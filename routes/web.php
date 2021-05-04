<?php

use Illuminate\Support\Facades\Route;

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
Auth::routes();

Route::group(['prefix'=>'/' , 'middleware' =>'auth'], function() {

Route::get('/', 'DashboardController@index')->name('admin.dashboard');
Route::get('/slidebar', 'DashboardController@sidebar')->name('admin.sidebar');

   Route::group(['prefix' => 'orders'], function () {
    Route::get('/','AllOrdersCntroller@index') -> name('admin.orders');
    Route::get('create','AllOrdersCntroller@create') -> name('admin.orders.create');
    Route::post('store','AllOrdersCntroller@store') -> name('admin.orders.store');
    Route::get('edit/{id}','AllOrdersCntroller@edit') -> name('admin.orders.edit');
    Route::post('update/{id}','AllOrdersCntroller@update') -> name('admin.orders.update');
    Route::get('delete/{id}','AllOrdersCntroller@destroy') -> name('admin.orders.delete');
    Route::get('show/{id}','AllOrdersCntroller@show') -> name('admin.orders.show');

    Route::get('changeStatus/{id}','AllOrdersCntroller@changeStatus') -> name('admin.orders.status');
       /* Mohamed Routes */
       Route::get('get-product-info/{id}', 'AllOrdersCntroller@getProductInfo');
});
Route::group(['prefix' => 'bills'], function () {
    Route::get('/','BillsCntroller@index') -> name('admin.bills');
    Route::get('create','BillsCntroller@create') -> name('admin.bills.create');
    Route::post('store','BillsCntroller@store') -> name('admin.bills.store');
    Route::get('edit/{id}','BillsCntroller@edit') -> name('admin.bills.edit');
    Route::post('update/{id}','BillsCntroller@update') -> name('admin.bills.update');
    Route::get('delete/{id}','BillsCntroller@destroy') -> name('admin.bills.delete');
    Route::get('show/{id}','BillsCntroller@show') -> name('admin.bills.show');

    Route::get('changeStatus/{id}','AllOrdersCntroller@changeStatus') -> name('admin.bills.status');

});
Route::group(['prefix' => 'statment'], function () {
    Route::get('/','StatmentsCntroller@index') -> name('admin.statment');
    Route::get('create','StatmentsCntroller@create') -> name('admin.statment.create');
    Route::post('store','StatmentsCntroller@store') -> name('admin.statment.store');
    Route::get('edit/{id}','StatmentsCntroller@edit') -> name('admin.statment.edit');
    Route::post('update/{id}','StatmentsCntroller@update') -> name('admin.statment.update');
    Route::get('delete/{id}','StatmentsCntroller@destroy') -> name('admin.statment.delete');
    Route::get('show/{id}','StatmentsCntroller@show') -> name('admin.statment.show');

    Route::get('changeStatus/{id}','StatmentsCntroller@changeStatus') -> name('admin.statment.status');

});
Route::group(['prefix' => 'acounts'], function () {
    Route::get('/','AllAcountsCntroller@index') -> name('admin.acounts');
    Route::get('create','AllAcountsCntroller@create') -> name('admin.acounts.create');
    Route::post('store','AllAcountsCntroller@store') -> name('admin.acounts.store');
    Route::get('edit/{id}','AllAcountsCntroller@edit') -> name('admin.acounts.edit');
    Route::post('update/{id}','AllAcountsCntroller@update') -> name('admin.acounts.update');
    Route::get('delete/{id}','AllAcountsCntroller@destroy') -> name('admin.acounts.delete');
    Route::get('show/{id}','AllAcountsCntroller@show') -> name('admin.acounts.show');
    Route::get('showbalancs/{id}','AllAcountsCntroller@showbalancs') -> name('admin.acounts.showbalancs');
    Route::get('creatbalancee','AllAcountsCntroller@creatbalancee') -> name('admin.acounts.creatbalancee');
    Route::post('storetbalance','AllAcountsCntroller@storetbalance') -> name('admin.acounts.storetbalance');

    Route::get('changeStatus/{id}','AllAcountsCntroller@changeStatus') -> name('admin.storetbalance.status');

});
Route::group(['prefix' => 'stors'], function () {
    Route::get('/','AllStorsCntroller@index') -> name('admin.stors');
    Route::get('create','AllStorsCntroller@create') -> name('admin.stors.create');
    Route::post('store','AllStorsCntroller@store') -> name('admin.stors.store');
    Route::get('edit/{id}','AllStorsCntroller@edit') -> name('admin.stors.edit');
    Route::post('update/{id}','AllStorsCntroller@update') -> name('admin.stors.update');
    Route::get('delete/{id}','AllStorsCntroller@destroy') -> name('admin.stors.delete');
    Route::get('show/{id}','AllStorsCntroller@show') -> name('admin.stors.show');

    Route::get('changeStatus/{id}','AllStorsCntroller@changeStatus') -> name('admin.stors.status');

});
    Route::group(['prefix' => 'reports'], function () {
    Route::get('/','AllReportsCntroller@index') -> name('admin.reports');
    Route::get('create','AllReportsCntroller@create') -> name('admin.reports.create');
    Route::post('store','AllReportsCntroller@store') -> name('admin.reports.store');
    Route::get('edit/{id}','AllReportsCntroller@edit') -> name('admin.reports.edit');
    Route::post('update/{id}','AllReportsCntroller@update') -> name('admin.reports.update');
    Route::get('delete/{id}','AllReportsCntroller@destroy') -> name('admin.reports.delete');
    Route::get('show/{id}','AllReportsCntroller@show') -> name('admin.reports.show');

    Route::get('changeStatus/{id}','AllReportsCntroller@changeStatus') -> name('admin.reports.status');

});
 Route::group(['prefix' => 'shippcomp'], function () {
    Route::get('/','ShippimgCompCntroller@index') -> name('admin.shippcomp');
    Route::get('create','ShippimgCompCntroller@create') -> name('admin.shippcomp.create');
    Route::post('store','ShippimgCompCntroller@store') -> name('admin.shippcomp.store');
    Route::get('edit/{id}','ShippimgCompCntroller@edit') -> name('admin.shippcomp.edit');
    Route::post('update/{id}','ShippimgCompCntroller@update') -> name('admin.shippcomp.update');
    Route::get('delete/{id}','ShippimgCompCntroller@destroy') -> name('admin.shippcomp.delete');
    Route::get('show/{id}','ShippimgCompCntroller@show') -> name('admin.shippcomp.show');

    Route::get('changeStatus/{id}','ShippimgCompCntroller@changeStatus') -> name('admin.shippcomp.status');

});
Route::group(['prefix' => 'channels'], function () {
    Route::get('/','ChannelsCompCntroller@index') -> name('admin.channels');
    Route::get('create','ChannelsCompCntroller@create') -> name('admin.channels.create');
    Route::post('store','ChannelsCompCntroller@store') -> name('admin.channels.store');
    Route::get('edit/{id}','ChannelsCompCntroller@edit') -> name('admin.channels.edit');
    Route::post('update/{id}','ChannelsCompCntroller@update') -> name('admin.channels.update');
    Route::get('delete/{id}','ChannelsCompCntroller@destroy') -> name('admin.channels.delete');
    Route::get('show/{id}','ChannelsCompCntroller@show') -> name('admin.channels.show');

    Route::get('changeStatus/{id}','ChannelsCompCntroller@changeStatus') -> name('admin.channels.status');

});

//
//Route::get('/', function () {
//    return view('welcome');
});


//Route::get('/home', 'HomeController@index')->name('home');


//Route::get('/home', 'HomeController@index')->name('home');
