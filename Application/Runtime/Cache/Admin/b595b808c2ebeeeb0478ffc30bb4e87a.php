<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<title><?php echo (C("APP_NAME")); ?>-后台管理系统</title>
<meta name="description" content="<?php echo (C("APP_NAME")); ?>">
<meta name="author" content="<?php echo (C("APP_NAME")); ?>">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/html5.js"></script>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/respond.min.js"></script>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/sptmcx/Public/Huiadmin/css/H-ui.min.css" rel="stylesheet" type="text/css" />

<link href="/sptmcx/Public/Huiadmin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/sptmcx/Public/Huiadmin/lib/iconfont/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/sptmcx/Public/Admin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/sptmcx/Public/Admin/css/login.css?r=2" rel="stylesheet" type="text/css" />
<!--[if IE 6]>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/js/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]--> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/jquery.min.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/layer1.8/layer.min.js"></script> 
</head>
<body>

<div class="container mg-t-150">
	<p class="text-center mg-b-50">
		 
	</p>
	<div class="row lgbg">
		<div class="col-sm-6 col-sm-offset-3" >
			<div class="panel">
			   <div class="panel-heading  wc-login" style="background-color:none !important;margin:50px 0;">
			      <h3 class="panel-title text-center">
			       <!-- <img src="/sptmcx/Public/Admin/images/logo.png?r=1" class="logo"> -->  后台管理系统
			      </h3>
			   </div>
			   <div class="panel-body">
			      <form class="form-horizontal"  role="form" action="<?php echo U('Index/submitlogin');?>"  method="post" onsubmit="return false;">
					   <div class="row cl mg-b-10">
					        <label class="form-label col-2 ft-size-24"><!-- <i class="Hui-iconfont">&#xe60d;</i> --></label>
					        <div class="formControls col-8">
					          <input id="username" name="username" type="text" autocomplete="off" placeholder="账户" class="input-text size-L">
					        </div>
					      </div>
					      <div class="row cl mg-b-10">
					        <label class="form-label col-2 ft-size-24"><!-- <i class="Hui-iconfont">&#xe60e;</i> --></label>
					        <div class="formControls col-8">
					          <input id="password" name="password" type="password" placeholder="密码" class="input-text size-L">
					        </div>
					      </div>
					      <div class="row cl mg-b-10">
					        <div class="formControls col-8 col-offset-2">
					          <input class="input-text size-L" name="code" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="验证码:" style="width:150px;">
					          <img  class="hand" onclick="this.src='<?php echo U('Admin/Index/verify');?>?'+Math.random()" src="<?php echo U('Admin/Index/verify');?>" height="50" /> </div>
					      </div>
							<div class="row">
					        <div class="formControls col-8 col-offset-2">
					          <input name="" type="submit" class="btn btn-success  size-L r ctp-submit-login" value="&nbsp;登&nbsp;&nbsp;&nbsp;&nbsp;录&nbsp;">					           
					        </div>
					      </div>
					</form>
			   </div>
			</div>
		</div>
	</div>
</div>

<script type="text/javascript" src="/sptmcx/Public/Huiadmin/js/H-ui.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Admin/js/comm.js?versionId=<?php echo (C("WWW_VERSION")); ?>"></script> 
<script type="text/javascript" src="/sptmcx/Public/Admin/js/login.js?versionId=<?php echo (C("WWW_VERSION")); ?>"></script>  
</body>
</html>