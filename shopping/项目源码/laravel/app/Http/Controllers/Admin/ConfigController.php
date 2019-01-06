<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//后台系统配置控制器
class ConfigController extends Controller
{
    //管理员首页
    public function index(){
     //分配页面
   return view('admin.sys.config.index');
    }

    //跟新配置的方法
    public function store(Request $request){

    	//接受原图
    	$oldLogo=$request->input('oldLogo');
    	//获取数据
    	$arr=$request->except("_token",'oldLogo');
    	//写入文件中
    	$str1=var_export($arr,true);
    	$str="<?php return ".$str1." ?>";
    	//写入到指定文件
    	file_put_contents('../config/web.php', $str);
    	if($oldLogo==$request->input("logo")){

    	}else{
    		unlink("./Uploads/sys/".$oldLogo);

    	}
    	return back();

    }



}
