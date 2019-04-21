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

        <header class="mui-bar mui-bar-nav">
			<a href="<?php echo U('News/index');?>" class=" mui-icon mui-icon-left-nav mui-pull-left"></a>
			<h1 class="mui-title">新闻动态</h1>
		</header>
		<?php echo W('Common/Public/madvbanner');?>      
        <div class="mui-content paddtop">
			<div class="mui-content-padded">
				<div class="mui-card">
					<div class="mui-card-header"><?php echo ($info['title']); ?></div>
					<div class="mui-card-content">
						<div class="mui-card-content-inner"> 
						   <p>资讯类型：<?php echo ($newstypelist[$info['ntype']]); ?></p>              
	                       <p>发布时间：<?php echo (date('Y-m-d',$info[addtime])); ?></p>

	                       <p>浏览次数：<?php echo ($info['viewnum']); ?></p>	                        
						</div>
					</div>				 
				</div> 
                <div class="mui-card">					 
					<div class="mui-card-content">
						<div class="mui-card-content-inner">							 
	                       <div class="ctBox">
								<?php echo ($info['des']); ?>
							</div>	                        
						</div>
					</div>				 
				</div>  
				 
				
			</div>
		</div>  
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