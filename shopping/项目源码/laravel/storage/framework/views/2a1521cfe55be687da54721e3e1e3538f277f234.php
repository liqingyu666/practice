<?php $__env->startSection('main'); ?>
<!--引入css-->
<link rel="stylesheet" href="/up/uploadify.css">
<script src="/up/jquery.uploadify.min.js"></script>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>系统管理</a> <a href="#" class="current">轮播图列表</a> </div>
  </div>

          <div class="widget-title" style="margin-top:20px"> 
            <input type="checkbox" id="title-checkbox" name="title-checkbox" />
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-success" style="margin-left:20px">添加轮播图
</button>     

         
            <a href=""><button type="button" class="btn btn-info" style="margin-left:50px">批量删除</button></a>
    <p class="pull-right tots">共有<span id="tot"><?php echo e($tot); ?></span>条数据</p>
           
          </div>
          <div class="widget-content nopadding" id="poser">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>ID</th>
                  <th>IMG</th>
                  <th>HREF</th>
                  <th>TITLE</th>
                  <th>ORDER</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><input type="checkbox" /></td>
                  <td><?php echo e($value->id); ?></td>
                  <td><img style="width: 50px" src="/Uploads/lun/<?php echo e($value->img); ?>" id="imgser" alt=""></td>
                  <td><?php echo e($value->href); ?></td>
                  <td><?php echo e($value->title); ?></td>
                  <td><?php echo e($value->orders); ?></td>
                
         
                    <td><a href="#" data-toggle="modal" data-target="#edit" class="btn btn-success" role="button" onclick="edit()">编辑</a><a href="javascript:;" onclick="deletes()" class="btn btn-danger" role="button">删除</a></td>
      
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            
                 
              </tbody>
            </table>
          </div>
      
 <div class="pagination" id="poter">
            <?php echo $data->render(); ?>

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
        <h4 class="modal-title">添加轮播图</h4>
      </div>
      <div class="modal-body">
        <?php if(count($errors) > 0): ?>
    <div class="alert alert-danger">
        <ul>
            <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><?php echo e($error); ?></li>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </ul>
    </div>
<?php endif; ?>
        <form action="/admin/sys/slider" method="post">
          <?php echo e(csrf_field()); ?>

          <div class="form-group">
            <label for="">title</label>
            <input type="text" name="title" class="form-control" placeholder="请输入标题">
            <div id="userInfo"></div>
          </div>
            <div class="form-group">
            <label for="">href</label>
            <input type="text" name="href" class="form-control" placeholder="友情链接">
              <div id="passInfo"></div>
          </div>
            <div class="form-group">
            <label for="">Order</label>
            <input type="number" name="orders" class="form-control" placeholder="数值越大越靠前">
          </div>
            <div class="form-group">
            <label for="">img</label>
            <input type="file" name="img" id="uploads">
            <div id="main">
              
            </div>
            <input type="hidden"  name="img" id="imgs">
           
          </div>

           <div>
      <input type="submit" value="提交" class="btn btn-success">
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
        '_token':'<?php echo e(csrf_token()); ?>',
        'files':'lun',
      },
      //上传的flash动画
      'swf':"/up/uploadify.swf",
      //文件上传的地址
      'uploader' : "/admin/shangchuan",
      //当文件上传成功
      'onUploadSuccess' : function(file, data, response){
        //拼接图片
        imgs="<img width='200px' src='/Uploads/lun/"+data+"'/>";
        //展示图片
        $("#main").html(imgs);
        $("#imgs").val(data);
      }
    });
  });

</script>




  <?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.public.common", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>