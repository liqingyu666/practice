<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//后台订单控制器
class HuancunController extends Controller
{
    //缓冲
    public function index(){
    //$data=\DB::table("users")->get();
    //写入缓冲
    // \Cache::put("data",$data,10);
    //读取缓冲
    //$data=\Cache::get("data");
        //删除缓冲
        //$data=Cache::forget("data");
        //删除所有的缓冲
        //$data=\Cache::flush();
    //dd($data);
    
    }
    


}
