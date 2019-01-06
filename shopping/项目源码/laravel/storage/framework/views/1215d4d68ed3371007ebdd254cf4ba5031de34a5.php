<?php $__env->startSection('main'); ?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>评论管理</a> <a href="#" class="current">评论列表</a> </div>
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
                  <th>ID</th>
                  <th>UAME</th>
                  <th>商品名</th>
                  <th>商品图片</th>
                  <th>内容</th>
                  <th>星级</th>
                  <th>时间</th>
                  <th>状态</th>
                </tr>
              </thead>
              <tbody>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><input type="checkbox" /></td>
                  <td><?php echo e($value->id); ?></td>
                  <td><?php echo e($value->name); ?></td>
                  <td><?php echo e($value->title); ?></td>
                  <td><img width="50px" src="/Uploads/goods/<?php echo e($value->gimg); ?>" alt=""></td>
                  <td><?php echo e($value->text); ?></td>
                  <td><?php echo e(str_repeat("★",$value->start)); ?><?php echo e(str_repeat("☆",5-$value->start)); ?></td>
                  <td><?php echo e(date("Y-m-d H:i:s"),$value->time); ?></td>
                  <td>
                    <select name="" onchange="a(this,<?php echo e($value->id); ?>)" id="">
                    <?php if($value->statu==1): ?>
                    <option value="0">未审核</option>
                    <option value="1" selected>正常</option>
                    <option value="2">黑名单</option>
                    
                    <?php elseif($value->statu==2): ?>
                    <option value="0">未审核</option>
                    <option value="1">正常</option>
                    <option value="2" selected>黑名单</option>
                    <?php else: ?>
                    <option value="0" selected>未审核</option>
                    <option value="1">正常</option>
                    <option value="2">黑名单</option>
                    <?php endif; ?>
                  </select>
                  </td>
                </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                 
              </tbody>
            </table>
          </div>
      
  <div class="pagination" id="poter">
           
  </div>

        </div>

     
 
 <script>
   function a(obj,id){
    //获取自己的值
    val=$(obj).val();
    //发送ajax请求
    $.post("/admin/comment/ajaxStatu",{"id":id,"statu":val,"_token":"<?php echo e(csrf_token()); ?>"},function(data){
      if(data==1){
        alert("修改成功");
      }else{
        alert("修改失败");
      }
    })
   }
 </script>



  <?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.public.common", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>