<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//后台分类控制器
class TypesController extends Controller
{	
	//第二种方式数据格式化处理方法
	// public function data($pid=0){
	// 	//数据库查询
	// 	$data=\DB::table("types")->where("pid",$pid)->get();
	// 	//查询下一级分类
	// 	foreach($data as $key =>$value){
	// 		$value->zi=$this->data($value->id);
	// 	}
	// 	return $data;
	// }

	//四、数据格式化
	// public function data1($data,$pid=0){
	// 	$newArr=array();
	// 	//获取顶级分类
	// 	foreach($data as $key => $value){
	// 		if($value->pid==$pid){
	// 			$newArr[$value->id]=$value;
	// 			$newArr[$value->id]->zi=$this->data1($data,$value->id);
	// 		}
	// 	}
	// 	return $newArr;
	// }
    //分类首页
    public function index(){
    	// //一、使用面向过程方式实现 (淘汰)
    	// //遍历所有的顶级分类
    	// $one=\DB::table('types')->where("pid",0)->get();

    	// //遍历one的孩子
    	// foreach($one as $value){
    	// 	$value->zi=\DB::table("types")->where("pid",$value->id)->get();
    	// }

    	// //遍历三级分类
    	// foreach($one as $value){
    	// 	foreach ($value->zi as $v){
    	// 		$v->zi=\DB::table("types")->where("pid",$v->id)->get();
    	// 	}
    	// }
    	// echo '<pre>';
    	// print_r($one);
    	// exit;

    	//二、第二种方式使用递归实现数据格式化
    	//$arr=$this->data();

    	//三、使用递归实现数据格式化
    	// $data=\DB::table("types")->get();
    	// $arr=$this->data1($data,$pid=0);

    	//四、实现树形结构
    	$data=\DB::select("select types.*,concat(path,id) p from types order by p");
    	
    	// //查询数据
    	// $data=\DB::table('types')->orderBy("sort",'desc')->get();
        
    //加载页面
    	return view('admin.types.index')->with('data',$data);
   
    }

    //添加分类
    public function create(){
    	//加载页面
    	return view('admin.types.add');
    }
    //插入操作
    public function store(Request $request){
    	//剔除数据
    	$data=$request->except("_token");
    	//插入数据
    	if(\DB::table('types')->insert($data)){
    		//插入成功跳转展示页面
    		return redirect('admin/types');
    	}else{
    		//插入失败回到上一个页面
    		return back();
    	}

    }

    //删除操作 admin/types/{admin}  delete
    public function destroy($id){
  
    	//删除操作
    	if(\DB::delete("delete from types where id=$id or path like '%,$id,%'")){
    		return "1";
    	}else{
    		return "0";
    	}
    }
}
