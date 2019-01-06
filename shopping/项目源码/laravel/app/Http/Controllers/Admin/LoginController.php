<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;


//后台登录控制器
class LoginController extends Controller
{
    //登录首页
    public function index(){
    //加载页面
   return view('admin.login');
    }
   //验证码
   public function yzm(){
    require_once("../resources/code/Code.class.php");
   //实例化
   $code=new \Code();
   //生成验证码
   $code->make();

   }

   //登录处理方法
   public function check(Request $request){
    $name=$request->input("name");
    $pass=$request->input("pass");
    $ucode=$request->input("code");
    require_once("../resources/code/Code.class.php");
   //实例化
   $code=new \Code();
   //获取session
   $ocode=$code->get();
   //检测验证码
  if (strtoupper($ucode)==$ocode) {
    //验证密码
    $data=\DB::table("admin")->where([["name",'=',"$name"],['status','=','0']])->first();
   if($data){
    if($pass==\Crypt::decrypt($data->pass)){
      //声明数组
      $arr=[];
      $arr['lasttime']=time();
      $arr['count']=++$data->count;
      //更新登录信息
      \DB::table("admin")->where('id',$data->id)->update($arr);
      //存session
      session(['shoppingAdminUserInfo.name'=>$data->name]);
      session(['shoppingAdminUserInfo.id'=>$data->id]);
      //跳转到首页
      return redirect("admin");
    }else{
      return back()->with("error","密码输入错误");
    }

   }else{
    return back()->with("error","用户名不存在");
   }

  }else{
    return back()->with("error","验证码错误");
  }
 
  
   } 

   //后台退出
   public function logout(Request $request){
    $request->session()->flush();
     return redirect("admin/login");
   }

}
