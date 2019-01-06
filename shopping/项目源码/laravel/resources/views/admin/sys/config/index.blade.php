@extends("admin.public.common")
@section('main')
<!--引入css-->
<link rel="stylesheet" href="/up/uploadify.css">
<script src="/up/jquery.uploadify.min.js"></script>
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>系统管理</a> <a href="#" class="current">系统配置</a> </div> </div>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
         
        </div>
        <div class="widget-content nopadding">
          <form action="/admin/sys/config" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Title :</label>
              {{csrf_field()}}
              <div class="controls">
                <input type="text" name="title" value="{{config('web.title')}}" class="span11" placeholder="title" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">KEYWORDS :</label>
              <div class="controls">
                <input type="text" name="keywords" value="{{config('web.keywords')}}" class="span11" placeholder="友情链接" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">description :</label>
              <div class="controls">
                <input type="text" name="description" value="{{config('web.description')}}" placeholder="数值越大越靠前">

              </div>
            </div>
            <div class="control-group">
              <label class="control-label">统计 :</label>
              <div class="controls">
                <textarea name="baidu"  id="" cols="30" class="form-control" rows="10">{{config('web.baidu')}}</textarea>
              </div>
            </div>
             <div class="control-group">
              <label class="control-label">Logo :</label>
              <div class="controls">
                <input type="file" name="" id="uploads" class="span11"  />
                <div id="main">
                  <img src="/Uploads/sys/{{config('web.logo')}}" style="width: 200px" alt="">
                </div>
                <input type="hidden" name="logo" id="imgs" value="{{config('web.logo')}}">
                <input type="hidden" name="oldLogo" value="{{config('web.logo')}}">
              </div>
            </div>
         
                <div class="form-group pull-right">
                <input type="submit" value="提交" class="btn btn-success" onclick="add()">
                <input type="reset" value="重置" id="reset" class="btn btn-danger">
                </div>
            </div>

            <script>
  //当所有的HTML代码都加载完毕
   $(function() {
    //声明字符串
    var imgs='';
    //使用uploadify 插件
    $('#uploads').uploadify({
      // //设置文本
      'buttonText' : '图片上传',
      //设置文件传输数据
      'formData'   :{
        '_token':'{{csrf_token()}}',
        'files':'sys',
      },
      //上传的flash动画
      'swf':"/up/uploadify.swf",
      //文件上传的地址
      'uploader' : "/admin/shangchuan",
      //当文件上传成功
      'onUploadSuccess' : function(file, data, response){
        //拼接图片
        imgs="<img width='200px' src='/Uploads/sys/"+data+"'/>";
        //展示图片
        $("#main").html(imgs);
        $("#imgs").val(data);
      }
    });
  });

</script>



  @endsection