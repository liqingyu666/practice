@extends("admin.public.common")
@section('main')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>系统管理</a> <a href="#" class="current">广告列表</a> </div>
  </div>

          <div class="widget-title" style="margin-top:20px"> 
            <a href="/admin/sys/ads/create" class="btn btn-info" style="margin-left: 20px">添加广告</a>
         
            <a href=""><button type="button" class="btn btn-info" style="margin-left:50px">批量删除</button></a>
    <p class="pull-right tots">共有<span id="tot"></span>条数据</p>
           
          </div>
          <div class="widget-content nopadding" id="poser">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>id</th>
                  <th>TITLE</th>
                  <th>HREF</th>
                  <th>SORT</th>
                  <th>IMG</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach($data as $value)
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>{{$value->id}}</td>
                  <td>{{$value->title}}</td>
                  <td>{{$value->href}}</td>
                  <td>{{$value->sort}}</td>
                  <td><img style="width:50px;" src="/Uploads/ads/{{$value->img}}" alt=""></td>
                
         
                    <td><a href="#" data-toggle="modal" data-target="#edit" class="btn btn-success" role="button">编辑</a><a href="javascript:;" class="btn btn-danger" role="button">删除</a></td>
      
                </tr>
                @endforeach
            
                 
              </tbody>
            </table>
          </div>
      
  <div class="pagination" id="poter">
           {!! $data->render() !!}
  </div>

        </div>

     
 
   <!-- Button trigger modal -->

//添加页面模态框
<!-- Modal -->
<div class="modal fade" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">添加管理员</h4>
      </div>
      <div class="modal-body">
        <form action="" onsubmit="return false;" id="formAdd">
          <div class="form-group">
            <label for="">用户名</label>
            <input type="text" name="name" class="form-control" placeholder="请输入用户名">
            <div id="userInfo"></div>
          </div>
            <div class="form-group">
            <label for="">密码</label>
            <input type="password" name="pass" class="form-control" placeholder="请输入密码">
              <div id="passInfo"></div>
          </div>
            <div class="form-group">
            <label for="">确认密码</label>
            <input type="password" name="repass" class="form-control" placeholder="请确认密码">
          </div>
            <div class="form-group">
            <label for="">状态</label>
            <input type="radio" name="status" value="0" id="" checked>正常
            <input type="radio" name="status" value="1" id="">禁用
          </div>

           <div>
      <input type="submit" value="提交" class="btn btn-success" onclick="add()">
      <input type="reset" value="重置" id="reset" class="btn btn-danger">
      </div>
        
        </form>
      </div>
    </div>
  </div>
</div>

//修改页面模态框
<!-- Modal -->
<div class="modal fade" id="edit">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title">修改管理员</h4>
      </div>
      <div class="modal-body" id="body">
       
      </div>
    </div>
  </div>
</div>



  @endsection