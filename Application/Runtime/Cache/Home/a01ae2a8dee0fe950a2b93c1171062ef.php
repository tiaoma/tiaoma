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

<link rel="stylesheet" href="/sptmcx/Public/Home/css/setting.css?versionId=<?php echo (C("WWW_VERSION")); ?>">
<!--页面主结构开始-->
		<div id="app" class="mui-views">
			<div class="mui-view">
				<div class="mui-navbar">
				</div>
				<div class="mui-pages">
				</div>
			</div>
		</div>
		<!--页面主结构结束-->
		<!--单页面开始-->
		<div id="setting" class="mui-page">
			<!--页面标题栏开始-->
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>
				</button>
				<h1 class="mui-center mui-title">会员中心</h1>
			</div>
			<!--页面标题栏结束-->
			<!--页面主内容区开始-->
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper normal">
					<div class="mui-scroll">
						<ul class="mui-table-view mui-table-view-chevron">
							<li class="mui-table-view-cell mui-media">
								<a  href="#account">
									<img class="mui-media-object mui-pull-left head-img" id="head-img" src="">
									<div class="mui-media-body">
										您好，尊敬的会员 <?php echo ($www_member['username']); ?>
										<?php if($www_member['auth_time']): ?><p>已实名认证</p> 
										<?php else: ?>
                                        <p>未实名认证</p><?php endif; ?>
										
									</div>
								</a>
								
							</li>
						</ul>
						<ul class="mui-table-view mui-table-view-chevron">
							<li class="mui-table-view-cell">
								<a href="#account" class="mui-navigate-right">账号与安全</a>
							</li>
							<li class="mui-table-view-cell">
								<a href="<?php echo U('Realauthentication/index');?>" class="mui-navigate-right">实名认证</a>
							</li>								 
							<li class="mui-table-view-cell cbzjdbox">
								<a href="<?php echo U('Umsg/index');?>" class="mui-navigate-right ">我的消息</a>
							</li>
							<!-- <li class="mui-table-view-cell cbzjdbox">
								<a href="<?php echo U('Uask/index');?>" class="mui-navigate-right ">我的咨询</a>
							</li> -->
						</ul>
						<ul class="mui-table-view mui-table-view-chevron">
							<li class="mui-table-view-cell cbzjdbox">
								<a href="<?php echo U('Ugoods/index');?>" class="mui-navigate-right">我的商品</a>
							</li>				
						</ul>						
						
						<ul class="mui-table-view">
							<li class="mui-table-view-cell" style="text-align: center;">
								<a id="loginout" href="javascript:void(0);" data-href="<?php echo U('Login/loginout');?>">退出登录</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
			<!--页面主内容区结束-->
		</div>
		<!--单页面结束-->
		<div id="account" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<a  href="#setting" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</a>
				<h1 class="mui-center mui-title">账号与安全</h1>
			</div>
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll">
						<ul class="mui-table-view">
							<li class="mui-table-view-cell">
								<a  href="<?php echo U('Setting/head');?>" class="mui-navigate-right">头像
								<span class="mui-pull-right head">
									<img class="head-img mui-action-preview" id="head-img1" src="/sptmcx/Public/Data/<?php echo ($www_member['head']); ?>?r=<?php echo ($globalRandNum); ?>"/>
								</span>
							</a>
							</li>
							<li class="mui-table-view-cell">
								<a>姓名<span class="mui-pull-right"><?php echo ($www_member['realname']); ?></span></a>
							</li>
							<li class="mui-table-view-cell">
								<a>登录账号<span class="mui-pull-right"><?php echo ($www_member['username']); ?></span></a>
							</li>
							<li class="mui-table-view-cell">
								<a href="<?php echo U('Setting/gender');?>">性别<span class="mui-pull-right"><?php if($www_member['gender'] == 1): ?>女 <?php else: ?> 男<?php endif; ?></span></a>
							</li>
						</ul>
						<ul class="mui-table-view">
							<li class="mui-table-view-cell">
							 	<a href="<?php echo U('Setting/psw');?>">修改密码<span class="mui-pull-right"></span></a>
							 </li>
							<!-- <li class="mui-table-view-cell">
							 	<a>手机号<span class="mui-pull-right"><?php echo ($www_member['mobile_show']); ?></span></a>
							 </li>
							 <li class="mui-table-view-cell">
							 	<a href="<?php echo U('Setting/email');?>" class="mui-navigate-right">邮箱地址
							 	<span class="mui-pull-right"><?php if(empty($www_member['email'])): ?>未绑定
							                         <?php else: ?>
							                            <?php echo ($www_member['email_show']); endif; ?></span></a>
							 </li> --> 
						</ul>
					</div>
				</div>
			</div>
		</div>
        <div id="email" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</button>
				<h1 class="mui-center mui-title">邮箱地址</h1>
			</div>
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll">
						 <form id='login-form' class="mui-input-group">
							<div class="mui-input-row">
								<label>邮箱</label>
								<input  autocomplete="off" type="text" class="mui-input-clear mui-input username" placeholder="请输入邮箱" name="username">
							</div>
							 
						</form>
                        <div class="mui-content-padded">
						    <input type="hidden" class="loginurl" value="<?php echo U("Login/index");?>">
							<button  class="mui-btn mui-btn-block mui-btn-primary">登录</button>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div id="about" class="mui-page">
			<div class="mui-navbar-inner mui-bar mui-bar-nav">
				<button type="button" class="mui-left mui-action-back mui-btn  mui-btn-link mui-btn-nav mui-pull-left">
					<span class="mui-icon mui-icon-left-nav"></span>设置
				</button>
				<h1 class="mui-center mui-title"><?php echo (C("APP_NAME")); ?></h1>
			</div>
			<div class="mui-page-content">
				<div class="mui-scroll-wrapper">
					<div class="mui-scroll paddingBox">
						 
					</div>
				</div>
			</div>
		</div>

		 
		<script src="/sptmcx/Public/Home/js/mui.view.js "></script>
	    <script src='/sptmcx/Public/Home/js/mui.picker.min.js'></script>
	<script>
		mui.init({
			swipeBack:true //启用右滑关闭功能
		});
		//初始化单页view
		var viewApi = mui('#app').view({
			defaultPage: '#setting'
		});
		 
		//初始化单页的区域滚动
		mui('.mui-scroll-wrapper').scroll();
		 
		
		defaultImg();
		 
		//退出登录
		document.getElementById("loginout").addEventListener('tap', function() {
				var btnArray = ['否', '是'];
				var obj = this;
				mui.confirm('确认要退出登录吗？', GlobalAppName, btnArray, function(e) {
					if (e.index == 1) {
						window.location.href = $(obj).attr('data-href');
					}					 
				})
		});	
		 
		 
		 

		 

		 

		function defaultImg() {
			if(mui.os.plus){
				plus.io.resolveLocalFileSystemURL("_doc/head.jpg", function(entry) {
					var s = entry.fullPath + "?version=" + new Date().getTime();;
					document.getElementById("head-img").src = s;
					document.getElementById("head-img1").src = s;
				}, function(e) {
					document.getElementById("head-img").src = '/sptmcx/Public/Data/<?php echo ($www_member['head']); ?>'+'?r=<?php echo ($globalRandNum); ?>';
					document.getElementById("head-img1").src = '/sptmcx/Public/Data/<?php echo ($www_member['head']); ?>'+'?r=<?php echo ($globalRandNum); ?>';
				})
			}else{
				document.getElementById("head-img").src = '/sptmcx/Public/Data/<?php echo ($www_member['head']); ?>'+'?r=<?php echo ($globalRandNum); ?>';
				document.getElementById("head-img1").src = '/sptmcx/Public/Data/<?php echo ($www_member['head']); ?>'+'?r=<?php echo ($globalRandNum); ?>';
			}
			
		}
		 

		 
		 
	</script>  
<?php echo W('Common/Public/mfooter');?> 
</div>

<nav class="mui-bar mui-bar-tab">
    <a href="<?php echo U('Index/index');?>" class="mui-tab-item mui-active">
        <span class="mui-icon iconfont icon-shouye"></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a href="<?php echo U('Servicehall/index');?>" class="mui-tab-item">
        <span class="mui-icon iconfont icon-fenlei"></span>
        <span class="mui-tab-label">服务大厅</span>
    </a>
    <a href="<?php echo U('Goods/index');?>" class="mui-tab-item">
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