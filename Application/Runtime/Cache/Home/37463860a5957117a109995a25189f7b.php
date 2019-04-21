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

        <link rel="stylesheet" href="/sptmcx/Public/Mobile/css/forget.css?versionId=<?php echo (C("WWW_VERSION")); ?>">
       <header class="mui-bar mui-bar-nav">
            <a class="mui-action-back mui-icon mui-icon-left-nav mui-pull-left"></a>
            <h1 class="mui-title">找回密码</h1>
        </header>
        <div class="mui-content">
            <form id="formObj" action=""  class="mui-input-group">                 
                <div class="mui-input-row">
                    <label>手机号</label>
                    <input name="username" type="text" class="mui-input-clear mui-input" placeholder="请输入注册手机号">
                </div>
            </form>
            <div class="mui-content-padded">
                <button  class="mui-btn mui-btn-block mui-btn-primary ur-b-next">下一步</button>
            </div>
        </div>
		<script type="text/javascript">
        $(function(){             
            $(".ur-b-next").click(function(){
                var username = $("input[name='username']").val().trim();
                
                if(!checkUsername(username) && !isMobil(username) && !isEmail(username) ){
                    mui.alert('用户信息格式不正确', GlobalAppName, function() {});
                    return;
                }                
                $.ajax({
                    url:'<?php echo U("Forget/checkusername");?>',
                    type:'post',
                    dataType:'json',
                    data:{username:username},
                    success:function(re){
                        if(re.msg!=''){
                            mui.alert(re.msg, GlobalAppName, function() {});
                            return;
                        }
                        $("#formObj").attr('action',re.url);
                        $("#formObj").submit();
                    }
                });
            });
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