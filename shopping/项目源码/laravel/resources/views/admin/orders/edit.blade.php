@extends("admin.public.common")
@section('main')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>商品管理</a> <a href="#" class="current">商品添加</a> </div> </div>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
         
        </div>
        <div class="widget-content nopadding">
          <form method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">订单号</label>
              {{csrf_field()}}
              <div class="controls">
                <input type="text" disabled class="form-control" value="{{$_GET['code']}}" />
              
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">订单状态</label>
              <div class="controls">
                <select name="sid" id="">
                  @foreach($data as $value)
                  @if($_GET['sid']==$value->id)
                  <option selected value="{{$value->id}}">{{$value->name}}</option>
                  @else
                  <option value="{{$value->id}}">{{$value->name}}</option>
                  @endif
                  @endforeach
                </select>
              </div>
            </div>
          
                <div class="form-group pull-right">
                <input type="submit" value="提交" class="btn btn-success">
                
                </div>
            </div>



  @endsection