<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//后台系统管理轮播图控制器
class SliderController extends Controller
{
    //轮播图页面
    public function index(){
    	//获取数据总数
    	$tot=\DB::table('slider')->count();
    	//从数据库获取数据
    	$data=\DB::table("slider")->paginate(5);
     //分配页面
   return view('admin.sys.slider.index')->with('tot',$tot)->with('data',$data);
    }

    //新建处理方法
    public function store(Request $request){
    	$arr=$request->except('_token');
    	//表单验证规则
    	$rules=[
    		'title' =>'required',
    		'href' =>'required',
    		'orders' =>'required',
    		'img' =>'required',
    	];
    	//表单验证提示信息
    	$message=[
    		"title.required"=>'请输入Title',
    		"href.required"=>'请输入href',
    		"orders.required"=>'请输入排序',
    		"img.required"=>'请选择图片',
    	];
    	  //所用laravel的表单验证
         $validator = \Validator::make($arr,$rules,$message);

         //开始验证
         if($validator->passes()){
            //验证添加数据库
        
      
            //插入数据库
            if(\DB::table('slider')->insert($arr)){
       
             return redirect('/admin/sys/slider');
         }else{
             return back();
         }

         }else{
            //具体查看laravel的核心类
            return back()->withInput()->withErrors($validator);

         }
    }



}
