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

        <header class="mui-bar mui-bar-nav">
		    <a  href="<?php echo U('Goods/index');?>" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		    <h1 class="mui-title">商品查询</h1>
		</header>
		 <?php echo W('Common/Public/madvbanner');?>
		 <div class="mui-content margintop">
            <div class="mui-content-padded">
                 <div class="mui-card">	
                   <div class="mui-card-header">产品封面</div>				
					<div class="mui-card-content">
						<div class="mui-card-content-inner ctBox">							 
	                       
						</div>
					</div>				 
				</div> 
				<div class="mui-card">
					<div class="mui-card-header">基本信息</div>
					<div class="mui-card-content">
						<div class="mui-card-content-inner">							 
	                       <p>产品名称</p>	                         
	                       <p>。。。。。。</p>	                         
						</div>
					</div>				 
				</div>  
				<div class="mui-card">
					<div class="mui-card-header">详情</div>
					<div class="mui-card-content">
						<div class="mui-card-content-inner ctBox">							 
	                       详情详情详情详情详情
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