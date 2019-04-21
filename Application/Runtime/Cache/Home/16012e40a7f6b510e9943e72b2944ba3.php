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

<style type="text/css">
.mui-h4, h4 {
    font-size: 18px;
    color: #000;
}
</style>
        <header class="mui-bar mui-bar-nav">
		    <a  href="<?php echo U('Index/index');?>" class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		    <h1 class="mui-title">通知公告</h1>
		</header>
		 <?php echo W('Common/Public/madvbanner');?>
		<?php if( $count): ?><!--下拉刷新容器-->
		<div id="pullrefresh" class="mui-content mui-scroll-wrapper">
		   
			<div class="mui-scroll">
				<!--数据列表-->
				<ul class="mui-table-view mui-table-view-striped mui-table-view-condensed" id="listId">
		        		         
		        </ul>
			</div>
		</div>
 
		<script>
			(function($) {
				$.init({
					swipeBack:true //启用右滑关闭功能
				});

				mui.init({
					pullRefresh: {
						container: '#pullrefresh',
						down: {
							style:'circle',
							callback: pulldownRefresh
						},
						up: {
							auto:true,
							contentrefresh: '正在加载...',
							callback: pullupRefresh
						}
					}
				});
				function pullupRefresh() {
				    mui('#pullrefresh').pullRefresh().endPullupToRefresh(currentPageNum>=totalPages);	
				    currentPageNum++;				
				    //发送请求
				    ajax();				 
			    }
			    function pulldownRefresh() {
				    mui('#pullrefresh').pullRefresh().endPulldownToRefresh(true);
				 
			    }


				var totalPages = 2;
				var currentPageNum = 1;
				var network = true;
				if(mui.os.plus){
					mui.plusReady(function () {
						if(plus.networkinfo.getCurrentType()==plus.networkinfo.CONNECTION_NONE){
							network = false;
						}
					});
				}				
				 
				var respnoseEl = document.getElementById("listId");
				//成功响应的回调函数
				var success = function(response) {	

					totalPages = response.totalpage;
				    var html = respnoseEl.innerHTML;				 
					respnoseEl.innerHTML = html+response.listhtml;	
					//console.log('complete:::' + totalPages);				 
				};
				//设置全局beforeSend
				$.ajaxSettings.beforeSend = function(xhr, setting) {
					//beforeSend演示,也可在$.ajax({beforeSend:function(){}})中设置单个Ajax的beforeSend
					//console.log('beforeSend:::' + JSON.stringify(setting));
				};
				//设置全局complete
				$.ajaxSettings.complete = function(xhr, status) {
					//console.log('complete:::' + status);
				}
				var ajax = function() {
					//利用RunJS的Echo Ajax功能测试
					var url = '<?php echo U("Notice/getlist");?>';
					//请求方式，默认为Get；
					var type = "get";
					//预期服务器范围的数据类型
					var dataType = "json";
					//发送数据
					var data = {
						p: currentPageNum-1
					};					 
					 
					if (type === 'get') {
						if (dataType === 'json') {
							$.getJSON(url, data, success);
						} else {
							$.get(url, data, success, dataType);
						}
					} else if (type === 'post') {
						$.post(url, data, success, dataType);
					}
				};
				

				//点击描述中链接时，打开对应网页介绍；
				$('body').on('tap', 'a', function(e) {
					var href = this.getAttribute('href');
					if (href) {
						if (window.plus) {
							plus.runtime.openURL(href);
						} else {
							location.href = href;
						}
					}
				});
			})(mui);
		</script>
		<?php else: ?>
           <div class="com-contnull">
                <img  src="/sptmcx/Public/Data/offshelf.png?versionId=<?php echo (C("WWW_VERSION")); ?>" />
            </div><?php endif; ?>  
<?php echo W('Common/Public/mfooter');?> 
</div>

<nav class="mui-bar mui-bar-tab">
    <a href="<?php echo U('Index/index');?>" class="mui-tab-item mui-active">
        <span class="mui-icon iconfont icon-shouye"></span>
        <span class="mui-tab-label">首页</span>
    </a>
    <a href="<?php echo U('Ask/index');?>" class="mui-tab-item">
        <span class="mui-icon iconfont icon-zonghe"></span>
        <span class="mui-tab-label">服务大厅</span>
    </a>
    <a href="<?php echo U('Train/index');?>" class="mui-tab-item">
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