<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1,maximum-scale=1, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <title><?php echo ($GBTitle); echo ($GBMenu); echo (C("APP_NAME")); ?></title>
    <link rel="stylesheet" href="/sptmcx/Public/Home/css/mui.min.css">
    <link rel="stylesheet" href="/sptmcx/Public/Home/css/app.css?versionId=<?php echo (C("WWW_VERSION")); ?>">
    <link rel="stylesheet" href="/sptmcx/Public/Home/fonts/font_56obl7zrya9/iconfont.css"> 
    
    <meta name="keywords" content="<?php echo (C("APP_KEYWORDS")); ?>">
    <meta name="description" content="<?php echo (C("APP_DESCRIPTION")); ?>">
    <script src="/sptmcx/Public/Home/js/jquery-2.1.1.min.js"></script>
    <script type="text/javascript">
    var GlobalVersion = '<?php echo (C("WWW_VERSION")); ?>';
    var GlobalUrl = '/sptmcx/Public';
    var GlobalAppName = '<?php echo (C("APP_NAME")); ?>';
    var GlobalSysCheck = "<?php echo U('Cmodule/Sys/setsys');?>";
    </script> 
    <script src="/sptmcx/Public/Home/js/mui.min.js"></script>
    
</head>
<body>
 
<div class="contbox">

        <link rel="stylesheet" href="/sptmcx/Public/Home/css/login.css?versionId=<?php echo (C("WWW_VERSION")); ?>">
        <header class="mui-bar mui-bar-nav">
			<h1 class="mui-title">登录</h1>
		</header>
		<div class="mui-content margintop">
			<form id='login-form' class="mui-input-group">
				<div class="mui-input-row">
					<label>账号</label>
					<input  autocomplete="off" type="text" class="mui-input-clear mui-input username" placeholder="请输入账号" name="username">
				</div>
				<div class="mui-input-row">
					<label>密码</label>
					<input  type="password" class="mui-input-clear mui-input password" placeholder="请输入密码" name="password">
				</div>
			</form>
			<!-- <form class="mui-input-group">
				<ul class="mui-table-view mui-table-view-chevron">
					<li class="mui-table-view-cell">
						自动登录
						<div id="autoLogin" class="mui-switch">
							<div class="mui-switch-handle"></div>
						</div>
					</li>
				</ul>
			</form> -->
			<div class="mui-content-padded">
			    <input type="hidden" class="loginurl" value="<?php echo U("Login/index");?>">
				<button id='submitLoginBtn' class="mui-btn mui-btn-block mui-btn-primary">登录</button>
				<div class="link-area"><a href="<?php echo U('Login/register');?>">注册账号</a> <span class="spliter">|</span> <a href="<?php echo U('Forget/index');?>">忘记密码</a>
				</div>
			</div>
			 
		</div>
		<script type="text/javascript" language="javascript" src="/sptmcx/Public/Mobile/js/login.js?versionId=<?php echo (C("WWW_VERSION")); ?>"></script>
  
<?php echo W('Common/Public/mfooter');?> 
</div>

<nav class="mui-bar mui-bar-tab">
    <a href="<?php echo U('Index/index');?>" class="mui-tab-item mui-active">
        <span class="mui-icon iconfont icon-shouye"></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a href="##" class="mui-tab-item">
        <span class="mui-icon iconfont icon-zonghe"></span>
        <span class="mui-tab-label">服务大厅</span>
    </a>
    <a href="##" class="mui-tab-item">
        <span class="mui-icon iconfont icon-fuzhi"></span>
        <span class="mui-tab-label">商品查询</span>
    </a>
    <a href="<?php echo U('Setting/index');?>" class="mui-tab-item">
        <span class="mui-icon iconfont icon-geren"></span>
        <span class="mui-tab-label">我的</span>
    </a>
</nav>
<script type="text/javascript" language="javascript" src="/sptmcx/Public/Home/js/app.js?versionId=<?php echo (C("WWW_VERSION")); ?>"></script>
</body>
</html>