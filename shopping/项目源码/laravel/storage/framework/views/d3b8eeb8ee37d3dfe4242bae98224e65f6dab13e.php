<!DOCTYPE html>
<html lang="en">
<head>
<title>商城后台</title>
<meta charset="UTF-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<link rel="stylesheet" href="/style/admin/css/bootstrap.min.css" />
<link rel="stylesheet" href="/style/admin/css/bootstrap-responsive.min.css" />
<link rel="stylesheet" href="/style/admin/css/fullcalendar.css" />
<link rel="stylesheet" href="/style/admin/css/matrix-style.css" />
<link rel="stylesheet" href="/style/admin/css/matrix-media.css" />
<link rel="stylesheet" href="/style/admin/css/xiugai.css" />
<link href="/style/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
<link rel="/style/admin/stylesheet" href="css/jquery.gritter.css" />
<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>
<script src="/style/admin/js/jquery.min.js"></script> 


</head>
<body>

<!--Header-part-->
<div id="header">
  <h1><a href="dashboard.html">MatAdmin</a></h1>
</div>
<!--close-Header-part-->
<!--top-Header-menu-->
<div id="user-nav" class="navbar navbar-inverse">
  <ul class="nav">
    <li  class="dropdown" id="profile-messages" ><a title="" href="#" data-toggle="dropdown" data-target="#profile-messages" class="dropdown-toggle"><i class="icon icon-user"></i>  <span class="text">欢迎<?php echo e(session("shoppingAdminUserInfo.name")); ?></span><b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a href="#"><i class="icon-user"></i> 我的资料</a></li>
        <li class="divider"></li>
        <li><a href="#"><i class="icon-check"></i> 我的任务</a></li>
        <li class="divider"></li>
        <li><a href="/admin/logout"><i class="icon-key"></i> 退出</a></li>
      </ul>
    </li>
    <li class="dropdown" id="menu-messages"><a href="#" data-toggle="dropdown" data-target="#menu-messages" class="dropdown-toggle"><i class="icon icon-envelope"></i> <span class="text">消息</span> <span class="label label-important">5</span> <b class="caret"></b></a>
      <ul class="dropdown-menu">
        <li><a class="sAdd" title="" href="#"><i class="icon-plus"></i> 新消息</a></li>
        <li class="divider"></li>
        <li><a class="sInbox" title="" href="#"><i class="icon-envelope"></i> 收件箱</a></li>
        <li class="divider"></li>
        <li><a class="sOutbox" title="" href="#"><i class="icon-arrow-up"></i> 发件箱</a></li>
        <li class="divider"></li>
        <li><a class="sTrash" title="" href="#"><i class="icon-trash"></i> 发送</a></li>
      </ul>
    </li>
    <li class=""><a  href="/admin/flush"><i class="icon-refresh"></i> <span class="text">清除缓冲</span></a></li>
    <li class=""><a title="" href="login.html"><i class="icon icon-share-alt"></i> <span class="text">退出</span></a></li>
  </ul>
</div>
                             
<!--start-top-serch-->
<div id="search">
  <input type="text" placeholder="输入搜索内容..."/>
  <button type="submit" class="tip-bottom" title="Search"><i class="icon-search icon-white"></i></button>
</div>
<!--close-top-serch-->
<!--sidebar-menu-->
<div id="sidebar"><a href="#" class="visible-phone"><i class="icon icon-home"></i> 控制台</a>
  <ul>
    <li class="activee"><a href="/admin"><i class="icon icon-home"></i> <span>首页</span></a> </li>
    <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span id="admin">管理员管理</span> </a>
      <ul>
        <li><a href="/admin/admin">管理员列表</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span id="user">会员管理</span> </a>
      <ul>
        <li><a href="/admin/users">会员列表</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>分类管理</span> </a>
      <ul>
        <li><a href="/admin/types">分类列表</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>商品管理</span> </a>
      <ul>
        <li><a href="/admin/goods">商品列表</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>订单管理</span> </a>
      <ul>
        <li><a href="/admin/orders">订单列表</a></li>
        <li><a href="/admin/orders/statu">订单状态</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>评论管理</span> </a>
      <ul>
        <li><a href="/admin/comment">评论列表</a></li>
      </ul>
    </li>
     <li class="submenu"> <a href="#"><i class="icon icon-th-list"></i> <span>系统管理</span> </a>
      <ul>
        <li><a href="/admin/sys/config">系统配置</a></li>
        <li><a href="/admin/sys/slider">轮播图管理</a></li>
        <li><a href="/admin/sys/ads">广告管理</a></li>
         <li><a href="/admin/sys/types">分类广告管理</a></li>
      </ul>
    </li>

  </ul>
</div>
<!--sidebar-menu-->

<!--main-container-part-->
<?php echo $__env->yieldContent('main'); ?>

<!--end-main-container-part-->

<!--Footer-part-->


<?php
//获取URL地址参数
$path=$_SERVER['REDIRECT_URL'];
//分割字符串
$arr=explode('/',$path);

//获取名
$name=isset($arr[2])?$arr[2]:'';

?>
<!--end-Footer-part-->


<script src="/style/admin/js/excanvas.min.js"></script> 
<script src="/style/admin/js/jquery.ui.custom.js"></script> 
<script src="/style/admin/js/bootstrap.min.js"></script> 
<script src="/style/admin/js/jquery.flot.min.js"></script> 
<script src="/style/admin/js/jquery.flot.resize.min.js"></script> 
<script src="/style/admin/js/jquery.peity.min.js"></script> 
<script src="/style/admin/js/fullcalendar.min.js"></script> 
<script src="/style/admin/js/matrix.js"></script> 
<script src="/style/admin/js/matrix.dashboard.js"></script> 
<script src="/style/admin/js/jquery.gritter.min.js"></script> 
<script src="/style/admin/js/matrix.interface.js"></script> 
<script src="/style/admin/js/matrix.chat.js"></script> 
<script src="/style/admin/js/jquery.validate.js"></script> 
<script src="/style/admin/js/matrix.form_validation.js"></script> 
<script src="/style/admin/js/jquery.wizard.js"></script> 
<script src="/style/admin/js/jquery.uniform.js"></script> 
<script src="/style/admin/js/select2.min.js"></script> 
<script src="/style/admin/js/matrix.popover.js"></script> 
<script src="/style/admin/js/jquery.dataTables.min.js"></script> 
<script src="/style/admin/js/matrix.tables.js"></script> 


</body>


</html>
