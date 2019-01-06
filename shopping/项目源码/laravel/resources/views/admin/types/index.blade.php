@extends("admin.public.common")
@section('main')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>分类管理</a> <a href="#" class="current">分类列表</a> </div>
  </div>

          <div class="widget-title" style="margin-top:20px"> 
            <input type="checkbox" id="title-checkbox" name="title-checkbox" />
           <a href="/admin/types/create"><button type="button" class="btn btn-info" style="margin-left:20px">添加分类</button></a>
         
            <a href=""><button type="button" class="btn btn-info" style="margin-left:50px">批量删除</button></a>
    <p class="pull-right tots">共有<span id="tot"></span>条数据</p>
           
          </div>
          <div class="widget-content nopadding" id="poser">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>ID</th>
                  <th>NAME</th>
                  <th>Title</th>
                  <th>KeyWord</th>
                  <th>Description</th> 
                  <th>添加子类</th>        
                  <th>楼层</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                @foreach($data as $value)
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>{{$value->id}}</td>

                     <?php
                  $arr=explode(',',$value->path);
                  $tot=count($arr)-2;
                  ?>

                  <td>{{str_repeat("|====",$tot)}}{{$value->name}}</td>
                  <td>{{$value->title}}</td>
                  <td class="center">{{$value->keywords}}</td>
                  <td>{{$value->description}}</td>
                  @if($tot>=2)
                  <td><a href="javascript:;" onclick="ale()">添加子类</a></td>
                  @else
                  <td><a href="/admin/types/create?pid={{$value->id}}&path={{$value->path}}{{$value->id}},">添加子类</a></td>
                  @endif
                  
                  @if($value->is_lou)
                  <td><span class="btn btn-success">是</span></td>
                  @else
                  <td><span class="btn btn-danger">否</span></td>
                  @endif
                   <td><a href="#" data-toggle="modal" data-target="#edit" class="btn btn-success" role="button" onclick="edit({{$value->id}})">编辑</a><a href="javascript:;" onclick="deletes({{$value->id}})" class="btn btn-danger" role="button">删除</a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
        <script>
          function ale(){
            alert('只能添加三级分类');
          }
          //删除数据
          function deletes(id){
           
            if( confirm("您确认要删除？")){
            //发送post请求
            $.post("/admin/types/"+id,{'_token':"{{csrf_token()}}",'_method':'delete'},function(data){
              if(data==1){
                window.location.reload();
              }else{
                alert('删除失败');
              }
            })

          }
        };
        </script>
    
    


  @endsection