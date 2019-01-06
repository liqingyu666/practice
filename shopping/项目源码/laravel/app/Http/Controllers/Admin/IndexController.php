<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;

class IndexController extends Controller
{
    //后台首页
    public function index(){
    //加载页面
   	return view('admin.index');
    }
    //删除文件的方法
    public function delDir($path){
    	//读取路径
    	$arr=scandir($path);

    	//遍历删除
    	foreach($arr as $key => $value){
    		if($value !="." && $value!=".."){
    			unlink($path."/".$value);
    		}
    	}
    }
    //清除缓冲
    public function flush(){
    	$this->delDir("../storage/framework/cache");
    	$this->delDir("../storage/framework/views");
    	return redirect("admin");
    
    }
}
