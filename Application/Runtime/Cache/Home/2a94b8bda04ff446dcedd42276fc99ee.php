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

<link rel="stylesheet" type="text/css" href="/sptmcx/Public/Home/css/icons-extra.css">
<link rel="stylesheet" type="text/css" href="/sptmcx/Public/Home/css/home.css?versionId=<?php echo (C("WWW_VERSION")); ?>">
<div class="mui-content">
    <div class="logo">
	    <a href="<?php echo U('Home/Index/index');?>"><?php echo (C("APP_NAME")); ?></a>
	   
	    <div class="usertop">
            <?php if( $www_member): ?><a class="ca" href="<?php echo U('Home/Setting/index');?>"><?php echo ($www_member['username']); ?></a>&nbsp;&nbsp;&nbsp;&nbsp;
               <?php else: ?>   	   
		      	   <a  class="comLogin" href="<?php echo U('Home/Login/index');?>">登录</a>&nbsp;&nbsp;&nbsp;&nbsp;<?php endif; ?> 
	    </div>      
	</div>
</div>
<div class="mui-content">
    <div id="slider" class="mui-slider" >
			<div class="mui-slider-group mui-slider-loop">
				<!-- 额外增加的一个节点(循环轮播：第一个节点是最后一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="javascript:void(0);">
						<img src="/sptmcx/Public/Data/others<?php echo ($bannerfirst['href_m']); ?>?versionId=<?php echo (C("WWW_VERSION")); ?>">
					</a>
				</div>				 
				<?php if(is_array($bannerlist)): foreach($bannerlist as $vId=>$vo): ?><div class="mui-slider-item">
				    <?php if($vo['link']): ?><a href="<?php echo ($vo['link']); ?>">
	                <?php else: ?>
	                   <a href="javascript:void(0)"><?php endif; ?>
					
						<img src="/sptmcx/Public/Data/others<?php echo ($vo[href_m]); ?>?versionId=<?php echo (C("WWW_VERSION")); ?>" alt="<?php echo ($vo[title]); ?>" />
					</a>
				</div><?php endforeach; endif; ?>				 
				<!-- 额外增加的一个节点(循环轮播：最后一个节点是第一张轮播) -->
				<div class="mui-slider-item mui-slider-item-duplicate">
					<a href="javascript:void(0);">
						<img src="/sptmcx/Public/Data/others<?php echo ($bannerfirst['href_m']); ?>?versionId=<?php echo (C("WWW_VERSION")); ?>">
					</a>
				</div>
			</div>
			 
    </div>
</div>
<div class="mui-content">
    <div class="mui-card">
    	<div class="mui-card-header">
        	<div class="title">
				通知公告<a href="<?php echo U('Notice/index');?>" class="mui-pull-right cfocust">查看更多  </a>
			</div>
    	</div>
	    <div class="mui-card-content">
	        <div class="mui-card-content-inner">             	       
		    
			<ul class="mui-table-view">
				<?php if(is_array($noticelist)): foreach($noticelist as $key=>$vo): ?><li class="mui-table-view-cell">
					<a href="<?php echo U('Notice/info',array('id'=>$vo['id']));?>">
						 <h4 class="mui-ellipsis"><?php echo ($vo['title']); ?></h4>
			              
			             <p class="mui-h6 mui-ellipsis"><?php echo (date('Y-m-d',$vo[createtime])); ?></p>
					</a>
				</li><?php endforeach; endif; ?>
			</ul>
		    </div>
		</div>
	</div>
</div>
<div class="mui-content">
	<div class="mui-card">
    	<div class="mui-card-header">
    	    <div class="themetitle">
				<h6>政策法规</h6>
			</div>        	 
    	</div>
	    <div class="mui-card-content">
	        <div class="mui-card-content-inner">  
		    
			<ul class="mui-table-view">
				<?php if(is_array($policieslist)): foreach($policieslist as $key=>$vo): ?><li class="mui-table-view-cell mui-media">
					<a href="<?php echo U('Policies/info',array('id'=>$vo['id']));?>">
						<img class="mui-media-object mui-pull-left" src="/sptmcx/Public/Data/<?php echo ($vo['thumb']); ?>?versionId=<?php echo (C("WWW_VERSION")); ?>">
						<div class="mui-media-body">
							<h4><?php echo ($vo['title']); ?></h4>
							<p class='mui-ellipsis'><?php echo (date('Y-m-d',$vo[addtime])); ?></p>
						</div>
					</a>
				</li><?php endforeach; endif; ?>
			</ul>
			</div>
		</div>
	</div>
	<div class="morebtn"><a href="<?php echo U('Policies/index');?>">更多政策 >></a></div>	
</div>

<div class="mui-content">
	<div class="mui-card">
    	<div class="mui-card-header">
    	    <div class="themetitle">
				<h6>新闻动态</h6>
			</div>        	 
    	</div>
	    <div class="mui-card-content">
	        <div class="mui-card-content-inner">  
		    
			<ul class="mui-table-view">
				<?php if(is_array($newsList)): foreach($newsList as $key=>$vo): ?><li class="mui-table-view-cell mui-media">
					<a href="<?php echo U('News/info',array('id'=>$vo['id']));?>">
						<img class="mui-media-object mui-pull-left" src="/sptmcx/Public/Data/<?php echo ($vo['thumb']); ?>?versionId=<?php echo (C("WWW_VERSION")); ?>">
						<div class="mui-media-body">
							<h4><?php echo ($vo['title']); ?></h4>
							<p><?php echo ($newstypelist[$vo['ntype']]); ?>资讯</p>
							<p class='mui-ellipsis'><?php echo (date('Y-m-d',$vo[addtime])); ?></p>
						</div>
					</a>
				</li><?php endforeach; endif; ?>
			</ul>
			</div>
		</div>
	</div>
	<div class="morebtn"><a href="<?php echo U('News/index');?>">更多资讯 >></a></div>	
</div>


			
			
		</div>

<script type="text/javascript" language="javascript" src="/sptmcx/Public/Home/js/home.js?versionId=<?php echo (C("WWW_VERSION")); ?>"></script>
  
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