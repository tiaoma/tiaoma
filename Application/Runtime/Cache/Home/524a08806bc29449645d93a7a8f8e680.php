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
    <link rel="stylesheet" href="/sptmcx/Public/Home/css/font_pg18qfwhyub/iconfont.css">     
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
			<a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">注册</h1>
		</header>
		<div class="mui-content margintop">			 
			<form method="post" class="mui-input-group" id="registerForm">				 
				 
				<div class="mui-input-row">
					<label>登录账号</label>
					<input  type="text" name="username" class="mui-input-clear mui-input username" placeholder="请输入账号" maxlength="16">
				</div>
				<div class="mui-input-row">
					<label>设置密码</label>
					<input  type="password" name="password" class="mui-input-clear mui-input password" placeholder="请输入密码" maxlength="16">
				</div>
				<div class="mui-input-row">
					<label>确认密码</label>
					<input  type="password" name="password_ag" class="mui-input-clear mui-input password_ag" placeholder="请确认密码"  maxlength="16">
				</div>
				<div class="mui-input-row codeBox">
					<label>手机号</label>
					<input  type="text" name="mobile" class="mui-input-clear mui-input mobile" placeholder="请输入手机号"  maxlength="11"><!-- 
					<a href="javascript:void(0);" class="obtain getCodeMsg" data-url="<?php echo U('Cmodule/Sms/sendcode',array('from'=>'register'));?>"  id="obtainNum">获取校验码</a> -->
				</div>
				<!-- <div class="mui-input-row">
                    <label>验证码</label>
                    <input name="code" type="text" maxlength="4" class="mui-input-clear mui-input code"  value="" placeholder="请输入注册验证码"  data-url="<?php echo U('Login/checkcode');?>" maxlength="4">
                </div> -->
			</form>
			<div class="mui-content-padded">
				<button  class="mui-btn mui-btn-block mui-btn-primary" id="submitFormBtn" data-loading-text = "提交中">注册</button>
			</div>

			<div class="mui-content-padded">
				<p>注册成功，意味着阅读并同意<a class="viewlink" href="<?php echo U('Login/agreenment');?>">《<?php echo (C("APP_NAME")); ?>平台用户注册协议》</a></p>
			</div>
		</div>
		<script type="text/javascript" language="javascript" src="/sptmcx/Public/Home/js/jquery.form.js"></script>
		<script type="text/javascript" language="javascript" src="/sptmcx/Public/Home/js/register.js?versionId=<?php echo (C("WWW_VERSION")); ?>"></script>
		<script>
        mui.init({
            swipeBack: true //启用右滑关闭功能
        });
         
        </script>  
<?php echo W('Common/Public/mfooter');?> 
</div>

<nav class="mui-bar mui-bar-tab">
    <a href="<?php echo U('Index/index');?>" class="mui-tab-item mui-active">
        <span class="mui-icon iconfont icon-shouye"></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a href="##" class="mui-tab-item">
        <span class="mui-icon iconfont icon-fenlei"></span>
        <span class="mui-tab-label">服务大厅</span>
    </a>
    <a href="##" class="mui-tab-item">
        <span class="mui-icon iconfont icon-chazhao"></span>
        <span class="mui-tab-label">商品查询</span>
    </a>
    <a href="<?php echo U('Setting/index');?>" class="mui-tab-item">
        <span class="mui-icon iconfont icon-wode"></span>
        <span class="mui-tab-label">我的</span>
    </a>
</nav>
<script type="text/javascript" language="javascript" src="/sptmcx/Public/Home/js/app.js?versionId=<?php echo (C("WWW_VERSION")); ?>"></script>
</body>
</html>