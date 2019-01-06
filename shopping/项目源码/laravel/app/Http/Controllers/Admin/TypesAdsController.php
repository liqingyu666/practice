<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//后台分类广告控制器
class TypesAdsController extends Controller
{
 
    public function index(){
        //多表查询
        $data=\DB::table("sys-types")->select("sys-types.*","types.name")->join("types","types.id",'=','sys-types.cid')->paginate(2);
        

       
   return view('admin.sys.types.index')->with('data',$data);
    }
    public function create(){
        $data=\DB::table("types")->where('pid',0)->get();
        return view("admin.sys.types.add")->with('data',$data);
    }

    //数据操作
    public function store(Request $request){
        $arr=$request->except("_token");
        if(\DB::table('sys-types')->insert($arr)){
            return redirect("admin/sys/types");
        }else{
            return back();
        }
    }

   
    


}
