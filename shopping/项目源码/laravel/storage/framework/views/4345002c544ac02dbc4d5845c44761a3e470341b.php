<!DOCTYPE html>
<html lang="en">
    
<head>
        <title>登录页面</title>
		<meta charset="UTF-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
		<link rel="stylesheet" href="/style/admin/css/bootstrap.min.css" />
		<link rel="stylesheet" href="/style/admin/css/bootstrap-responsive.min.css" />
        <link rel="stylesheet" href="/style/admin/css/matrix-login.css" />
        <link href="/style/admin/font-awesome/css/font-awesome.css" rel="stylesheet" />
		<link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700,800' rel='stylesheet' type='text/css'>

    </head>
    <body>
        <div id="loginbox">            
            <form action="/admin/check"  method="post" id="loginform" class="form-vertical">
                <?php echo e(csrf_field()); ?>

				 <div class="control-group normal_text"> <h3><img src="/style/admin/img/logo.png" alt="Logo" /></h3></div>
                }
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lg"><i class="icon-user"></i></span><input type="text" name="name" placeholder="用户名" />
                        </div>
                    </div>
                </div>
                <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="password" name="pass" placeholder="密码" />
                        </div>
                    </div>
                </div>
                 <div class="control-group">
                    <div class="controls">
                        <div class="main_input_box" style="margin-left:-110px">
                            <span class="add-on bg_ly"><i class="icon-lock"></i></span><input type="text" name="code" placeholder="请输入验证码" style="width:30%"/>
                            <img src="/admin/yzm" onclick="this.src='/admin/yzm?m'+Math.random()" alt="">
                        </div>
                    </div>
                </div>
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-info" id="to-recover">忘记密码?</a></span>
                    <span class="pull-right"><input type="submit" value="登录" class="btn btn-success"></span>
                </div>
            </form>
            <form id="recoverform" action="#" class="form-vertical">
				<p class="normal_text">请输入正确的用户名密码.</p>
				
                    <div class="controls">
                        <div class="main_input_box">
                            <span class="add-on bg_lo"><i class="icon-envelope"></i></span><input type="text" placeholder="E-mail address" />
                        </div>
                    </div>
               
                <div class="form-actions">
                    <span class="pull-left"><a href="#" class="flip-link btn btn-success" id="to-login">&laquo; 返回登录</a></span>
                    <span class="pull-right"><a class="btn btn-info"/></a></span>
                </div>
            </form>
        </div>
        
        <script src="js/jquery.min.js"></script>  
        <script src="js/matrix.login.js"></script> 
    </body>

</html>
