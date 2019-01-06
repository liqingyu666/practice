<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//后台订单控制器
class CommentController extends Controller
{
    //评论页面
    public function index(Request $request){
       //多表查询
        $data=\DB::table("comment")->select("comment.*","goods.title","goods.img as gimg","users.name")
        ->join("users","users.id",'=',"comment.uid")
        ->join("goods","goods.id",'=',"comment.gid")
        ->get();

     //分配页面
   return view('admin.comment.index')->with('data',$data);
    }
    //ajax修改状态
    public function ajaxStatu(Request $request){
        $arr=$request->except("_token");
        $sql="update comment set statu=$arr[statu] where id=$arr[id]";
        if(\DB::update($sql)){
            return 1;
        }else{
            return 0;
        }
    }
    


}
