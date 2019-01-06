<?php $__env->startSection('main'); ?>
<link rel="stylesheet" href="/up/uploadify.css">
<script src="/up/jquery.uploadify.min.js"></script>
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
          <form action="/admin/sys/types" method="post" class="form-horizontal">
            <div class="control-group">
              <label class="control-label">TITLE :</label>
              <?php echo e(csrf_field()); ?>

              <div class="controls">
                <input type="text" name="title" class="span11" placeholder="请输入标题" />
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">所属分类 :</label>
              <div class="controls">
                <select name="cid" id="">
                  <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <option value="<?php echo e($value->id); ?>"><?php echo e($value->name); ?></option>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
              </div>
            </div>
            <div class="control-group">
              <label class="control-label">TYPE :</label>
              <div class="controls">
                <input type="radio" name="type" id="0" checked>小图
                <input type="radio" name="type" id="1">大图
              </div>
            </div>

           <div class="control-group">
              <label class="control-label">分类广告图片 :</label>
              <div class="controls">
                <input type="file" placeholder="请输入分类图片" class="span11" id="uploads" />
                <div id="main">
                  
                </div>
                <input type="hidden" name="img" id="imgs">
               
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