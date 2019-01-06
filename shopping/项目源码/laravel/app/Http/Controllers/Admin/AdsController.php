<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//后台广告控制器
class AdsController extends Controller
{
    //管理员首页
    public function index(Request $request){
        $data=\DB::table('ads')->orderBy("sort","desc")->paginate(5);
        // dd($data);
     //分配页面
   return view('admin.sys.ads.index')->with('data',$data);
    }

   

    //添加广告处理
    public function create(){
        return view('admin.sys.ads.add');
    }
    //广告的处理方法
    public function store(Request $request){
        $data=$request->except("_token");
      
        if(\DB::table('ads')->insert($data)){
            return redirect("admin/sys/ads");

        }else{
            return back();
        }
    }



}
