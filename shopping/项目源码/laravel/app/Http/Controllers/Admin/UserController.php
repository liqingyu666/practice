<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    //后台会员首页
    public function index(Request $request){

    	//搜索
    	$search=$request->input('search');
 
    	if($search){
    		$tot=\DB::table('users')->where("tel",'=',$search)->count();
    		$data=\DB::table('users')->where("tel",'=',$search)->paginate(5);
    	}else{
    	//获取总数据
    	$tot=\DB::table("users")->count();
    	//从数据库中读取数据
    	$data=\DB::table('users')->paginate(5);
    }
    //加载页面
   	return view('admin.users.index')->with('data',$data)->with('tot',$tot);
    }
}
