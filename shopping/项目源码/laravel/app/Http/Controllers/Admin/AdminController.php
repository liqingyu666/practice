<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
//使用类
use App\Http\Controllers\Controller;
//后台管理员控制器
class AdminController extends Controller
{
    //管理员首页
    public function index(){
        //总数据
        $tot=\DB::table('admin')->count();
    //加载页面
        $admin=\DB::table('admin')->paginate(5);
   return view('admin.admin.index')->with('data',$admin)->with('tot',$tot);
    }



    //添加页面
    public function create(){
    	return view('admin.admin.add');
    }

    //修改管理员信息
    public function edit($id){
        //查询数据库
        $data=\DB::table('admin')->find($id);
        $data->pass=\Crypt::decrypt($data->pass);
        //分配数据
        return view('admin.admin.edit')->with('data',$data);
    }


    //更新操作
    public function update(Request $request){

        //直接吧字符串数组化
        parse_str($_POST['str'],$arr);
        //使用表单验证的规则
        $rules=[
            'pass' =>'required|same:repass|between:6,12',
        ];
        //表单验证的提示信息
        $message=[
          
            'pass.required'=>"请输入密码",
            'pass.same'=>'两次密码不一致',
            'pass.between'=>'密码长度不在6-12位之间',
           
            
        ];
        //所用laravel的表单验证
         $validator = \Validator::make($arr,$rules,$message);

         //开始验证
         if($validator->passes()){
            //验证添加数据库
            unset($arr['repass']);
            //给密码加密
            $arr['pass']=\Crypt::encrypt($arr['pass']);
            //插入数据库
            if(\DB::table('admin')->where('id',$arr['id'])->update(['status'=>$arr['status'],'pass'=>$arr['pass']])){
         // if(\DB::update('update admin set status = $arr[status] where id = $arr[id]')) {
             return 1;
         }else{
             return 0;
         }

         }else{
            //具体查看laravel的核心类
            return $validator->getMessageBag()->getMessages();

         }
       

    }


    //插入操作
    public function store(Request $request){
        // dd($request->all());

        //直接吧字符串数组化
        parse_str($_POST['str'],$arr);
        //使用表单验证的规则
        $rules=[
            'name' =>'required|unique:admin|between:6,12',
            'pass' =>'required|same:repass|between:6,12',
        ];
        //表单验证的提示信息
        $message=[
            'name.required'=>"请输入用户名",
            'pass.required'=>"请输入密码",
            'name.unique'=>"用户名已经存在",
            'pass.same'=>'两次密码不一致',
            'pass.between'=>'密码长度不在6-12位之间',
            'name.between'=>'用户长度不在6-12位之间',
            
        ];
        //所用laravel的表单验证
         $validator = \Validator::make($arr,$rules,$message);

         //开始验证
         if($validator->passes()){
            //验证添加数据库
            unset($arr['repass']);
            $arr['pass']=\Crypt::encrypt($arr['pass']);
            $arr['time']=time();
            //插入数据库
            if(\DB::table("admin")->insert($arr)){
                return 1;
            }else{
                return 0;
            }

         }else{
            //具体查看laravel的核心类
            return $validator->getMessageBag()->getMessages();

         }
       

    }

    public function destroy($id){
        //删除数据
        if(\DB::table("admin")->delete($id)){
            return "1";
        }else{
            return "0";
        }
    }
    //修改状态的方法
    public function ajaxStatu(Request $request){
        //剔除数据
        $arr=$request->except('_token');
        if(\DB::table('admin')->where('id',$arr['id'])->update(['status'=>$arr['status']])){
         // if(\DB::update('update admin set status = $arr[status] where id = $arr[id]')) {
             return 1;
         }else{
             return 0;
         }

    }
}
