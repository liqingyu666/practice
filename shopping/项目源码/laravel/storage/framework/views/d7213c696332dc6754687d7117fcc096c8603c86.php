<?php $__env->startSection('main'); ?>
<link rel="stylesheet" href="/up/uploadify.css">
<script src="/up/jquery.uploadify.min.js"></script>
<div id="content">
<div id="content-header">
  <div id="breadcrumb"> <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>系统管理</a> <a href="#" class="current">广告添加</a> </div> </div>
</div>
<div class="container-fluid">
  <hr>
  <div class="row-fluid">
    <div class="span6">
      <div class="widget-box">
        <div class="widget-title"> <span class="icon"> <i class="icon-align-justify"></i> </span>
         
        </div>
        <div class="widget-content nopadding">
          <form action="/admin/sys/ads" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">Title :</label>
              <?php echo e(csrf_field()); ?>

              <div class="controls">
                <input type="text" name="title" class="span11" placeholder="请输入标题" />
              
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">HREF :</label>
              <div class="controls">
                <input type="text" name="href" class="span11" placeholder="请输入链接地址" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">SORT :</label>
              <div class="controls">
                <input type="text" name="sort"  id="">

              </div>
            </div>
           <div class="control-group">
              <label class="control-label">广告图片 :</label>
              <div class="controls">
                <input type="file" placeholder="请输入商品图片" class="span11" id="uploads" />
                <div id="main">
                  
                </div>
                <input type="hidden" name="img" id="imgs">
               
            </div>
            
            
                <div class="form-group pull-right">
                <input type="submit" value="提交" class="btn btn-success">
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
      'buttonText' : '广告图片上传',
      //设置文件传输数据
      'formData'   :{
        '_token':'<?php echo e(csrf_token()); ?>',
        'files':'ads',
      },
      //上传的flash动画
      'swf':"/up/uploadify.swf",
      //文件上传的地址
      'uploader' : "/admin/shangchuan",
      //当文件上传成功
      'onUploadSuccess' : function(file, data, response){
        //拼接图片
        imgs="<img width='200px' src='/Uploads/ads/"+data+"'/>";
        //展示图片
        $("#main").html(imgs);
        $("#imgs").val(data);
      }
    });
  });
</script>


  <?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.public.common", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>