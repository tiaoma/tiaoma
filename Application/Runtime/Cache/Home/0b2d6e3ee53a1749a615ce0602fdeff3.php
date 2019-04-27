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
		    <a  href="<?php echo U('Index/index');?>" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		    <h1 class="mui-title">服务大厅</h1>
		</header>
		 <?php echo W('Common/Public/madvbanner');?>
		 <div class="mui-content margintop">
			<div class="mui-content-padded">	
                 <ul class="mui-table-view mui-grid-view mui-grid-9">
		            <li class="mui-table-view-cell mui-media mui-col-xs-4">
		                <a href="<?php echo U('Ugoods/add');?>">
		                    <span class="mui-icon mui-icon-upload"></span>
		                    <div class="mui-media-body">上传产品</div>
		                </a>
		             </li>
		             <li class="mui-table-view-cell mui-media mui-col-xs-4">
		                <a href="#" >
		                    <span class="mui-icon mui-icon-compose"></span>
		                    <div class="mui-media-body">申请条码</div>
		                </a>
		             </li>
		             <li class="mui-table-view-cell mui-media mui-col-xs-4">
		                <a href="#">
		                    <span class="mui-icon mui-icon-search"></span>
		                    <div class="mui-media-body">查询标准</div>
		                </a>
		             </li>
		             <li class="mui-table-view-cell mui-media mui-col-xs-4">
		                <a href="#">
		                    <span class="mui-icon mui-icon-spinner mui-spin"></span>
		                    <div class="mui-media-body">自修订标准</div>
		                </a>
		             </li>
		        </ul>
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