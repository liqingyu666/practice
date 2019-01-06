<?php

namespace App\Http\Controllers\Home;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//前台首页控制器
class IndexController extends Controller
{	
	//分类数据的处理
	public function checkTypeData($data,$pid=0){
		//新建数据
		$newArr=array();
		//获取数据
		foreach($data as $key =>$value){
			if($value->pid==$pid){
				$newArr[$value->id]=$value;
				$newArr[$value->id]->zi=$this->checkTypeData($data,$value->id);
			}
		}
		//返回数据
		return $newArr;
	}
    //前台首页
    public function index(){
    	//轮播图查询加缓冲
    	if($slider=\Cache::get("slider")){

    	}else{
    		$slider=\DB::table("slider")->orderBy("orders","desc")->get();
    		\Cache::put("slider",$slider);
    	}
    
    	//查询广告加缓冲
    	if($ads=\Cache::get("ads")){

    	}else{
    	$ads=\DB::table("ads")->orderBy("sort","desc")->get();
    		\Cache::put("ads",$ads);
    	}


    	//处理左侧的数据分类
    	$types=\DB::table("types")->get();

    	//递归处理数据
    	$type=$this->checkTypeData($types);

    	//处理右侧的广告
    	foreach($type as $key=>$value){
    		$value->rightAds=\DB::table("sys-types")->where([["cid",'=',$value->id],['type','=','0']])->limit(1)->get();
    		$value->leftAds=\DB::table("sys-types")->where([["cid",'=',$value->id],['type','=','1']])->limit(1)->get();
    	}

    	//处理楼层的商品 遍历一级分类
    	foreach($type as $value){
    		//新建新的数组
    		$newArr=[];
    		//遍历二级分类
    		foreach($value->zi as $two){
    			//遍历三级分类
    			foreach($two->zi as $three){
    				$newArr[]=$three->id;
    			}
    		}
    		//查询对应的商品
    		$value->goods=\DB::table("goods")->whereIn("cid",$newArr)->limit(8)->get();
    	}

    	//明星单品
    	$goods=\DB::table("goods")->limit(4)->orderBy("id","desc")->get();


    	//格式化数据
    	$data=array(
    		'slider'=>$slider,
    		'ads'=>$ads,
    		"type"=>$type,
    		"goods"=>$goods,
    	);
    //加载页面
   return view('home.index')->with($data);
    }
  
}
