@extends("admin.public.common")
@section('main')
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>分类管理</a> <a href="#" class="current">分类添加</a> </div> </div>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
         
        </div>
        <div class="widget-content nopadding">
          <form action="/admin/types" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">分类名 :</label>
              {{csrf_field()}}
              <div class="controls">
                <input type="text" name="name" class="span11" placeholder="请输入分类名" />
                <input type="hidden" name="pid" value="<?php echo isset($_GET['pid'])?$_GET['pid']:0;?>">
                 <input type="hidden" name="path" value="<?php echo isset($_GET['path'])?$_GET['path']:'0,';?>">
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">标题 :</label>
              <div class="controls">
                <input type="text" name="title" class="span11" placeholder="请输入标题" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">描述 :</label>
              <div class="controls">
                <input type="text" name="description"  id="">

              </div>
            </div>
            <div class="control-group">
              <label class="control-label">排序 :</label>
              <div class="controls">
                <input type="text" name="sort" class="span11"  />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">关键字 :</label>
              <div class="controls">
                <input type="text" name="keywords" class="span11" />
               
            </div>
            <div class="control-group">
              <label class="control-label">是否楼层 :</label>
              <div class="controls">
                 <input type="radio" name="is_lou" value="1" id="">是
                <input type="radio" name="is_lou" value="0" checked id="">否

              </div>
                <div class="form-group pull-right">
                <input type="submit" value="提交" class="btn btn-success" onclick="add()">
                <input type="reset" value="重置" id="reset" class="btn btn-danger">
                </div>
            </div>



  @endsection