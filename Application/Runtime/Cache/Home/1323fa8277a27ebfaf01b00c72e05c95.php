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
		    <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"  href="<?php echo U('Ugoods/index');?>"></a>
		    <h1 class="mui-title">添加商品</h1>
		</header>
		<div class="mui-content margintop">
            <div class="mui-content-padded">
	            <form id="formObj" action=""  class="mui-input-group">   
                     <div class="mui-input-row">
	                    <label>上传封面</label>
	                   
	                 </div>
	                 <div class="mui-input-row">
	                    <label>商品名称</label>
	                    <input name="title" type="text" class="mui-input-clear mui-input" placeholder="请输入商品名称">
	                 </div>
	                 <div class="mui-input-row">
	                    <label>执行标准号</label>
	                    <input name="standardnum" type="text" class="mui-input-clear mui-input" placeholder="请输入执行标准号">
	                 </div>
	                 <div class="mui-input-row">
	                    <label>物品编码</label>
	                    <input name="barcode" type="text" class="mui-input-clear mui-input" placeholder="请输入执行标准号">
	                 </div>
	                 <div class="mui-input-row">
	                    <label>企业名称</label>
	                    <input name="unitname" type="text" value="<?php echo ($unit['title']); ?>" class="mui-input-clear mui-input" placeholder="请输入企业名称">
	                 </div>
	                 <div class="row">	                   
	                    <textarea  class="mui-input-clear textareabox" placeholder="请输入商品描述" name="summary" maxlength="255" rows="10"></textarea>
	                 </div>
	                 
	            </form>
            </div>
            <div class="mui-content-padded">
                <button  class="mui-btn mui-btn-block mui-btn-primary cbtn">上传</button>
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