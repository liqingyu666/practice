@extends("admin.public.common")
@section('main')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>订单管理</a> <a href="#" class="current">订单状态列表</a> </div>
  </div>

          <div class="widget-title" style="margin-top:20px"> 
            <input type="checkbox" id="title-checkbox" name="title-checkbox" />
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info" style="margin-left:20px">添加管理员
</button>
         
            <a href=""><button type="button" class="btn btn-info" style="margin-left:50px">批量删除</button></a>
    <p class="pull-right tots">共有<span id="tot">{{count($data)}}</span>条数据</p>
           
          </div>
          <div class="widget-content nopadding" id="poser">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>id</th>
                  <th>订单状态名</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach($data as $value)
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>{{$value->id}}</td>
                  <td><input type="text" value="{{$value->name}}"><button onclick="save(this,{{$value->id}})" class="btn btn-success quanren" style="display: none;">确认修改</button></td>
      
                
         
                    <td><a href="#" data-toggle="modal" data-target="#edit" class="btn btn-success" role="button" onclick="edit()">编辑</a><a href="javascript:;" onclick="deletes()" class="btn btn-danger" role="button">删除</a></td>
      
                </tr>
            @endforeach
                 
              </tbody>
            </table>
          </div>
      
  <div class="pagination" id="poter">
           
  </div>

        </div>

      <script>
        function save(obj,id){
          //获取用户输入的状态信息
          name=$(obj).prev("input").val();
          //发送ajax请求
          $.post("/admin/orders/statu/edit",{id:id,name:name,"_token":"{{csrf_token()}}"},function(data){
            if(data==1){
              $(obj).hide();
            }else{
              alert("修改失败");
            }

          })
        };
        //鼠标移入确认按钮展示
        $("input[type=text]").focus(function(){
          $(".quanren").hide();
          $(this).next("button").show();
        });
      </script>
  @endsection