@extends("admin.public.common")
@section('main')

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>订单管理</a> <a href="#" class="current">订单列表</a> </div>
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
                  <th>商品名</th>
                  <th>商品图片</th>
                  <th>购买价格</th>
                  <th>购买数量</th>
                  <th>小计</th>
                  <?php
                  $number=0;
                  $money=0;
                  ?>
                
               
                </tr>
              </thead>
              <tbody>
              @foreach($data as $value)
                <tr>
                  <td><input type="checkbox" /></td>
                  <td>{{$value->title}}</td>
                  <td>
                    <img width="50px" src="/Uploads/goods/{{$value->img}}" alt="">
                  </td>
                  <td>{{$value->price}}</td>
                  <td>{{$value->num}}</td>
                  <td>{{$value->price*$value->num}}</td>
                  <?php
                  $number+=$value->num;
                  $money+=$value->price*$value->num;
                  ?>
                
                
         
      
                </tr>
                @endforeach
              <tr>
                <td><input type="checkbox" /></td>
                <td>合计</td>
                <td>价格: </td>
                <td>{{$money}}</td>
                <td>数量: </td>
                <td>{{$number}}</td>
              </tr>
                 
              </tbody>
            </table>
          </div>
      
  <div class="pagination" id="poter">
           
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