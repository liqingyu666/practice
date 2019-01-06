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
//前台路由
   //主页
   Route::get('/','Home\IndexController@index');
   //分类页面
   Route::get('/types/{id}','Home\TypesController@index');
   //商品详情页面
   Route::get('/goods/{id}','Home\GoodsController@index');



   

//后台路由
//登录页面
Route::get('/admin/login','Admin\LoginController@index');
//登录的处理操作
Route::post('/admin/check',"Admin\LoginController@check");
//后台退出
Route::get("/admin/logout","Admin\LoginController@logout");

//验证码
Route::get('/admin/yzm','Admin\LoginController@yzm');
//文件上传的路由
Route::any("/admin/shangchuan","Admin\CommonController@upload");
//清除缓冲
Route::get("/admin/flush","Admin\IndexController@flush");

Route::get('captcha/{tmp}','Admin\LoginController@captcha');
Route::group(['namespace'=>'Admin','prefix'=>'admin','middleware'=>'adminLogin'],function(){
	//后台首页路由,'middleware'=>'adminLogin'
Route::get('/','IndexController@index');
//后台管理员管理
Route::resource('admin','AdminController');
//后台管理员状态修改路由
Route::post('admin/ajaxStatu','AdminController@ajaxStatu');
//会员管理
Route::get('users','UserController@index');

//后台分类管理
Route::resource('types','TypesController');

//后台系统管理
   //系统管理
	Route::resource('sys/config',"ConfigController");
   //轮播图管理
    Route::resource('sys/slider',"SliderController");
  //广告管理
    Route::resource('sys/ads',"AdsController");
  //分类广告管理
    Route::resource('sys/types',"TypesAdsController");


    //后台的商品管理
    Route::resource('goods',"GoodsController");



    //后台订单管理
    Route::get('orders',"OrdersController@index");
        //查看订单详情
      Route::get("orders/list","OrdersController@lists");
      //查看收货地址
       Route::get("orders/addr","OrdersController@addr");
       //修改订单状态
       Route::any("orders/edit","OrdersController@edit");
       //订单状态
       Route::get("orders/statu","OrdersController@statuList");
       //状态ajax修改
       Route::post("orders/statu/edit","OrdersController@statuEdit");



    //评论管理
       Route::get('comment',"CommentController@index");
      //评论状态的ajax修改
      Route::post('comment/ajaxStatu',"CommentController@ajaxStatu");
    //缓冲
      //Route::get("huancun","HuancunController@index");


});

