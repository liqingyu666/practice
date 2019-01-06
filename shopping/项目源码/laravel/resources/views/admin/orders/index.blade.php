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
                  <th>订单号</th>
                  <th>用户</th>
                  <th>收货人信息</th>
                  <th>状态</th>
                  <th>下单时间</th>
                
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              @foreach($data as $value)
                <tr>
                  <td><input type="checkbox" /></td>
                  <td><a href="/admin/orders/list?code={{$value->code}}">{{$value->code}}</a></td>
                  <td>{{$value->name}}</td>
                  <td><a href="/admin/orders/addr?id={{$value->id}}">收货人信息</a></td>
                  <td>{{$value->ssname}}</td>
                  <td>{{date("Y-m-d H:i:s"),$value->time}}</td>
                    <td>
                      @if($value->sid==6)
                       <a href="javascript:;">修改状态</a>
                      @else
                       <a href="/admin/orders/edit?sid={{$value->sid}}&code={{$value->code}}">修改状态</a>
                      @endif
                    </td>
      
                </tr>
            
                 @endforeach
              </tbody>
            </table>
          </div>
      
  <div class="pagination" id="poter">
           
  </div>

        </div>

     
 
   <!-- Button trigger modal -->





  @endsection