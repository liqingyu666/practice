@extends("admin.public.common")
@section('main')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>评论管理</a> <a href="#" class="current">评论列表</a> </div>
  </div>

          <div class="widget-title" style="margin-top:20px"> 
            <input type="checkbox" id="title-checkbox" name="title-checkbox" />
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info" style="margin-left:20px">添加管理员
</button>
         
            <a href=""><button type="button" class="btn btn-info" style="margin-left:50px">批量删除</button></a>
    <p class="pull-right tots">共有<span id="tot"></span>条数据</p>
           
          </div>
          <div class="widget-content nopadding" id="poser">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>ID</th>
                  <th>UAME</th>
                  <th>商品名</th>
                  <th>商品图片</th>
                  <th>内容</th>
                  <th>星级</th>
                  <th>时间</th>
                  <th>状态</th>
                </tr>
              </thead>
              <tbody>
              @foreach($data as $value)
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>{{$value->id}}</td>
                  <td>{{$value->name}}</td>
                  <td>{{$value->title}}</td>
                  <td><img width="50px" src="/Uploads/goods/{{$value->gimg}}" alt=""></td>
                  <td>{{$value->text}}</td>
                  <td>{{str_repeat("★",$value->start)}}{{str_repeat("☆",5-$value->start)}}</td>
                  <td>{{date("Y-m-d H:i:s"),$value->time}}</td>
                  <td>
                    <select name="" onchange="a(this,{{$value->id}})" id="">
                    @if($value->statu==1)
                    <option value="0">未审核</option>
                    <option value="1" selected>正常</option>
                    <option value="2">黑名单</option>
                    
                    @elseif($value->statu==2)
                    <option value="0">未审核</option>
                    <option value="1">正常</option>
                    <option value="2" selected>黑名单</option>
                    @else
                    <option value="0" selected>未审核</option>
                    <option value="1">正常</option>
                    <option value="2">黑名单</option>
                    @endif
                  </select>
                  </td>
                </tr>
            @endforeach
                 
              </tbody>
            </table>
          </div>
      
  <div class="pagination" id="poter">
           
  </div>

        </div>

     
 
 <script>
   function a(obj,id){
    //获取自己的值
    val=$(obj).val();
    //发送ajax请求
    $.post("/admin/comment/ajaxStatu",{"id":id,"statu":val,"_token":"{{csrf_token()}}"},function(data){
      if(data==1){
        alert("修改成功");
      }else{
        alert("修改失败");
      }
    })
   }
 </script>



  @endsection