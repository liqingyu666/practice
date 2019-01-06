<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//后台订单控制器
class OrdersController extends Controller
{
    //订单首页
    public function index(Request $request){
        //查询相关数据
       // $data=\DB::table("orders")->select("orders.*","users.name","goods.title","goods.img","addr.sname","addr.stel",'addr.addrinfo',"addr.addr","orderstatu.name as ssname")->join("users","users.id","=","orders.uid")->join("goods","goods.id",'=',"orders.gid")->join("addr","addr.id",'=',"orders.aid")->join("orderstatu","orders.sid",'=',"orderstatu.id")->get();
          $data=\DB::table("orders")->select("orders.*","users.name","orderstatu.name as ssname")->join("users","users.id",'=',"orders.uid")->join("orderstatu","orders.sid",'=',"orderstatu.id")->groupBy("orders.code")->get();
     

     //分配页面
   return view('admin.orders.index')->with('data',$data);
    }
    //订单详情
    public function lists(Request $request){
        //获取订单号
        $code=$request->input("code");
        //查询订单号下的所有商品
        $data=\DB::table("orders")->select("orders.*","goods.title","goods.img")->join("goods","goods.id",'=',"orders.gid")->where("code",$code)->get();
       return view("admin.orders.lists")->with("data",$data);
    }
    //收货地址的方法
    public function addr(){
        //获取数据
        $id=$_GET['id'];
        //查询订单收货地址信息
        $data=\DB::table("addr")->find($id);
        return view("admin.orders.addr")->with("data",$data);
    }

    //修改订单状态
    public function edit(Request $request){
        if($_POST){
            $sid=$request->input("sid");
            $code=$request->input("code");
            $sql="update orders set sid=$sid where code='$code'";
            if(\DB::update($sql)){
                return redirect("admin/orders");
            }else{
                return back();
            }
            
        }else{
             
        //查询所有的订单状态
        $data=\DB::table("orderstatu")->get();
        return view("admin.orders.edit")->with("data",$data);
    }

        }

        //订单状态
        public function statuList(){
            $data=\DB::table("orderstatu")->get();
            return view("admin.orders.statuList")->with("data",$data);
        }
        //订单状态ajax修改
        function statuEdit(Request $request){
           $name=$request->input("name");
           $id=$request->input("id");
            $sql="update orderstatu set name='$name' where id=$id"; 
            if(\DB::update($sql)){
                return "1";
            }else{
                return "0";
            }
        }
       
   

   



}
