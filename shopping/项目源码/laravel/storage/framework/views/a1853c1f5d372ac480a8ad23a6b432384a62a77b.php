<?php $__env->startSection('main'); ?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>系统管理</a> <a href="#" class="current">分类广告列表</a> </div>
  </div>

          <div class="widget-title" style="margin-top:20px"> 
       <a href="/admin/sys/types/create" class="btn btn-info" style="margin-left: 20px">添加分类广告</a>
         
            <a href=""><button type="button" class="btn btn-info" style="margin-left:50px">批量删除</button></a>
    <p class="pull-right tots">共有<span id="tot"></span>条数据</p>
           
          </div>
          <div class="widget-content nopadding" id="poser">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>ID</th>
                  <th>TITLE</th>
                  <th>TYPE</th>
                  <th>IMG</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
              <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><input type="checkbox" /></td>
                  <td><?php echo e($value->id); ?></td>
                  <td><?php echo e($value->title); ?></td>
                  <td>
                    <?php if($value->type): ?>
                    大图
                    <?php else: ?>
                    小图
                    <?php endif; ?>
                  </td>
                  <td><img style="width:50px;" src="/Uploads/ads/<?php echo e($value->img); ?>" alt=""></td>
                
         
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



  <?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.public.common", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>