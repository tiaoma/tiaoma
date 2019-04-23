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
		    <a href="<?php echo U('Setting/index');?>"   class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
		    <h1 class="mui-title">实名认证</h1>
		</header>
		<div class="mui-content margintop">
             <form action="<?php echo U('Realauthentication/steptwo');?>"  method="post" id="formId" enctype="multipart/form-data"   class="mui-input-group">  
           <input type="hidden" value="1" name="auth_type">
                   <div class="mui-input-row mui-left">
                        <label>企业名称：</label>
                        <input type="text" class="input-box" name="auth_unit_name" class="mui-input-clear mui-input" placeholder="请输入企业名称"  maxlength="32"/>
                    </div>
                    <div class="mui-input-row  mui-left">
                        <label>证件类型</label>
                        <input type="hidden" class="input-box" name="auth_unit_certificate_type" value="1" />
                        <span style="line-height: 40px;">组织机构代码证</span>
                    </div>
                    <div class="mui-input-row mui-left">
                        <label>证件号码</label>
                        <input type="text" class="input-box" name="auth_unit_code" class="mui-input-clear mui-input" placeholder="请输入号码" maxlength="32" />
                    </div>
                    <div class="mui-input-row mui-left">
                        <label>证件上传</label>
                        <input type="file" name="authfile" class="input-box" value="上传" />
                    </div>
            </form>
            <div class="mui-content-padded">
                <button  class="mui-btn mui-btn-block mui-btn-primary cbtn nextBtn">提交</button>
            </div>
        </div>
        <script type="text/javascript">
                $('.nextBtn').click(function(){
                         var auth_unit_name = $("input[name='auth_unit_name']").val().trim();
                         var auth_unit_code = $("input[name='auth_unit_code']").val().trim();
                         var authfile = $("input[name='authfile']").val();

                         if(auth_unit_name.length<2){
                             mui.alert('请正确填写企业名称', GlobalAppName, function() {});
                             return;
                         }
                         if(auth_unit_code.length<2){
                           mui.alert('请正确填写证件号码', GlobalAppName, function() {});
                             return;
                         }
                         if(authfile.length<2){
                             mui.alert('请上传证件', GlobalAppName, function() {});
                             return;
                         }
                         $("#formId").submit();
                    });
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