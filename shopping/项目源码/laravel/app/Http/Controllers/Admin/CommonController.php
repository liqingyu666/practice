<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//后台文件上传控制器
class CommonController extends Controller
{
    //文件上传方法
    public function upload(Request $request){
     //获取用户上传的内容
    	$file=$request->file('Filedata');
    	//判断目录是否存在
    	$dir=$request->input('files');
    	if(file_exists("./Uploads/{$dir}")){

    	}else{
    		mkdir("./Uploads/{$dir}");
    	}

    	//判断上传的文件是否有效
    	if($file->isValid()){
    		//获取后缀
    		$ext=$file->getClientOriginalExtension();
    		//生成新的文件名
    		$newFile=time().rand().'.'.$ext;
    		//移动到指定目录
    		$request->file('Filedata')->move('./Uploads/'.$dir,$newFile);
    		echo $newFile;
    	}
       }



}
