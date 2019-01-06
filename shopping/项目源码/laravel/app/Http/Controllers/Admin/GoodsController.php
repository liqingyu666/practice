<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//后台商品管理控制器
class GoodsController extends Controller
{
    //管理员首页
    public function index(Request $request){
        //操作数据库

        $data=\DB::table("goods")->orderBy("id","desc")->paginate(5);

        //处理小图

        foreach ($data as $key => $value) {
          $value->tupian=\DB::table("goodsimg")->where("gid",$value->id)->get();
        }
     //分配页面
   return view('admin.goods.index')->with('data',$data);
    }
    //商品的添加页面
    public function create(){
        //查询分类
       $data=\DB::select("select types.*,concat(path,id) p from types order by p");
       // echo '<pre>';
       //数据处理
       foreach ($data as $key => $value) {
           $arr=explode(',',$value->path);
           $size=count($arr);
            $value->size=$size-2;
           $value->html=str_repeat('|-----',$size-2).$value->name;
       }
        // dd($data);
        // exit;
        //添加页面
        return view('admin.goods.add')->with('data',$data);
    }

    //处理商品的插入操作
    public function store(Request $request){


        //获取多图
        $imgs=$request->input("imgs");
        //移出不需要的字段
        $data=$request->except('_token',"imgs");
        //插入数据库
        if($id=\DB::table("goods")->insertGetId($data)){
            //处理商品的多图片
            $arr=explode(',', $imgs);
            foreach($arr as $key => $value){
                $brr=array();
                $brr['gid']=$id;
                $brr['img']=$value;
                \DB::table('goodsimg')->insert($brr);
            }
            return redirect('admin/goods');
        }else{
            return back();
        }

    }

   

}
