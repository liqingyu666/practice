<?php $__env->startSection('main'); ?>

<div id="content">
  <div id="content-header">
    <div id="breadcrumb"> <a href="#" title="Go to Home" class="tip-bottom"><i class="icon-home"></i>管理员管理</a> <a href="#" class="current">管理员列表</a> </div>
  </div>

          <div class="widget-title" style="margin-top:20px"> 
            <input type="checkbox" id="title-checkbox" name="title-checkbox" />
            <button type="button" data-toggle="modal" data-target="#myModal" class="btn btn-info" style="margin-left:20px">添加管理员
</button>
         
            <a href=""><button type="button" class="btn btn-info" style="margin-left:50px">批量删除</button></a>
    <p class="pull-right tots">共有<span id="tot"><?php echo e($tot); ?></span>条数据</p>
           
          </div>
          <div class="widget-content nopadding" id="poser">
            <table class="table table-bordered table-striped with-check">
              <thead>
                <tr>
                  <th><i class="icon-resize-vertical"></i></th>
                  <th>id</th>
                  <th>name</th>
                  <th>上次登录时间</th>
                  <th>状态</th>
                  <th>操作</th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $value): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td><input type="checkbox" /></td>
                  <td><?php echo e($value->id); ?></td>
                  <td><?php echo e($value->name); ?></td>
                  <td><?php echo e(date('Y-m-d H:i:s',$value->time)); ?></td>
                 <?php if($value->status): ?>
                 <td><span class="btn btn-danger" onclick="status(this,<?php echo e($value->id); ?>,1)">禁用</span></td>
                 <?php else: ?>
                 <td><span class="btn btn-success" onclick="status(this,<?php echo e($value->id); ?>,0)">正常</span></td>
                 <?php endif; ?>
                    <td><a href="#" data-toggle="modal" data-target="#edit" class="btn btn-success" role="button" onclick="edit(<?php echo e($value->id); ?>)">编辑</a><a href="javascript:;" onclick="deletes(this,<?php echo e($value->id); ?>)" class="btn btn-danger" role="button">删除</a></td>
      
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
<script type="text/javascript">
  //ajax修改数据
  function save(){
         //表单的序列化
    str=$("#formEdit").serialize();
  //   //提交到下一个页面
    $.post('/admin/admin/1',{str:str,"_method":"put",'_token':'<?php echo e(csrf_token()); ?>'},function(data){
      if(data==1){
      window.location.reload();
     
      }else if(data){
        //密码提示信息
         if(data.pass){
          str="<div class='alert alert-danger'>"+data.pass+"</div>";
        }else{
           str="<div class='alert alert-success'>√</div>";
        }

        $("#passInfo1").html(str);

      }else{
        alert('添加失败');
      }

    });
  }
  //ajax修改的方法
  function edit(id){
    //发送ajax请求
    $.get("/admin/admin/"+id+"/edit",{},function(data){
      if(data){
        $("#body").html(data);
      }
    });
  }



  //ajax修改状态
  function status(obj,id,status){
    //发送ajax请求
    if(status){
      //发送ajax请求
      $.post('/admin/admin/ajaxStatu',{id:id,"_token":"<?php echo e(csrf_token()); ?>","status":"0"},function(data){
        if(data==1){
          $(obj).parent().html('<span class="btn btn-success" onclick="status(this,'+id+',0)">正常</span>')
        }else{
          alert("修改失败");

        }
      })

    }else{
      $.post('/admin/admin/ajaxStatu',{id:id,"_token":"<?php echo e(csrf_token()); ?>","status":"1"},function(data){
        if(data==1){
          $(obj).parent().html('<span class="btn btn-danger" onclick="status(this,'+id+',1)">禁用</span>')
        }else{
          alert("修改失败");

        }
      })


    }
  }
  //ajax删除
  function deletes(obj,id){

    //发送ajax请求
    $.post("/admin/admin/"+id,{"_token":'<?php echo e(csrf_token()); ?>',"_method":"delete"},function(data){
      //判断是否成功
      if(data==1){
        //移除数据
        $(obj).parent().parent().remove();

        //数量计算
        tot=Number($("#tot").html());
        $("#tot").html(--tot);

      }else{
        alert('删除失败');
      }

    })
  }
  //添加处理的操作
  function add(){
     //表单的序列化
    str=$("#formAdd").serialize();
  //   //提交到下一个页面
    $.post('/admin/admin',{str:str,'_token':'<?php echo e(csrf_token()); ?>'},function(data){
      if(data==1){
      window.location.reload();
     
      }else if(data){
        //用户名提示信息
        var str='';
        if(data.name){
          str="<div class='alert alert-danger'>"+data.name+"</div>";
        }else{
           str="<div class='alert alert-success'>√</div>";
        }
        $("#userInfo").html(str);
        //密码提示信息
         if(data.pass){
          str="<div class='alert alert-danger'>"+data.pass+"</div>";
        }else{
           str="<div class='alert alert-success'>√</div>";
        }

        $("#passInfo").html(str);

      }else{
        alert('添加失败');
      }

    });
  }
    
  
</script>



  <?php $__env->stopSection(); ?>
<?php echo $__env->make("admin.public.common", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>