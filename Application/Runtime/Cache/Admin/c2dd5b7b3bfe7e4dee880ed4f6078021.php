<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE HTML>
<html>
<head>
<meta charset="utf-8">
<meta name="renderer" content="webkit|ie-comp|ie-stand">
<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
<meta http-equiv="Cache-Control" content="no-siteapp" />
<LINK rel="Bookmark" href="/favicon.ico" >
<LINK rel="Shortcut Icon" href="/favicon.ico" />
<!--[if lt IE 9]>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/html5.js"></script>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/respond.min.js"></script>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/PIE_IE678.js"></script>
<![endif]-->
<link href="/sptmcx/Public/bootstrap/css/bootstrap.min.css" rel="stylesheet" type="text/css" />

<link href="/sptmcx/Public/Admin/css/style.css?pjv=<?php echo ($versionId); ?>" rel="stylesheet" type="text/css" />
<link href="/sptmcx/Public/Huiadmin/css/H-ui.min.css" rel="stylesheet" type="text/css" />
<link href="/sptmcx/Public/Huiadmin/css/H-ui.admin.css" rel="stylesheet" type="text/css" />
<link href="/sptmcx/Public/Huiadmin/css/style.css" rel="stylesheet" type="text/css" />
<link href="/sptmcx/Public/Huiadmin/lib/iconfont/iconfont.css" rel="stylesheet" type="text/css" />
<link href="/sptmcx/Public/Huiadmin/lib/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" />
<!-- <link href="/sptmcx/Public/Huiadmin/lib/font-awesome/font-awesome.min.css" rel="stylesheet" type="text/css" /> --><!-- 
<link href="/sptmcx/Public/bootstrap/css/bootstrap-datetimepicker.min.css" rel="stylesheet" media="screen"> -->
<!-- <link href="/sptmcx/Public/com/css/comm.css" rel="stylesheet" type="text/css" /> -->
<!--[if IE 7]>
<link href="/sptmcx/Public/Huiadmin/lib/font-awesome/font-awesome-ie7.min.css" rel="stylesheet" type="text/css" />
<![endif]-->
<!--[if IE 6]>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/DD_belatedPNG_0.0.8a-min.js" ></script>
<script>DD_belatedPNG.fix('*');</script>
<![endif]-->
<!-- <link rel="stylesheet" type="text/css" href="/sptmcx/Public/diyUpload/css/webuploader.css">
<link rel="stylesheet" type="text/css" href="/sptmcx/Public/diyUpload/css/diyUpload.css"> -->
<title><?php echo (C("APP_NAME")); ?></title>
<meta name="keywords" content="<?php echo (C("APP_NAME")); ?>">
<meta name="description" content="<?php echo (C("APP_NAME")); ?>">
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/jquery.min.js"></script> 
 <script type="text/javascript">
  $(function(){
	 ////////input file取文件名称
    $(".file-hidden").on("change",function(){
    var filePath=$(this).val().split("\\");
    $(this).siblings(".file-tip").text(filePath[2]);
    //$(".file-tip").text(filePath[2]);
   })
})
</script> 
</head>
<body>

<style type="text/css">
 .ckb{
  margin-left: 5px;
 }
</style>
<nav class="breadcrumb"><i class="iconfont">&#xf012b;</i> 首页 <span class="c-gray en">&gt;</span> 管理员管理 <span class="c-gray en">&gt;</span> <?php if($info): ?>编辑<?php else: ?>添加<?php endif; ?>管理员 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20 text-c">
<form class="Huiform" action="" autocomplete="off" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo ($info['uid']); ?>" name="id">
        <input type="hidden" value="" name="delgids" />
        <table class="table">
   
    <tr>
        <th width="100">管理员账号:</th>
        <td><input type="text" value="<?php echo ($info['username']); ?>" maxlength="64" class="form-control" name="username"></td>
    </tr>
    <tr>
        <th width="100">管理员密码:</th>
        <td><input type="text" value="" maxlength="64" class="form-control" name="password" autocomplete="off"></td>
    </tr>
    <tr id="perm_select">
      <input type="hidden" name="perm" value="<?php echo ($info['perm']); ?>">
        <th width="100">权限:</th>
        <td>
        <?php if(is_array($Permlist)): foreach($Permlist as $key=>$permlist): ?><label class="ckb">
           <?php $kstr=strval($key); ?>
            <input type="checkbox" value="<?php echo ($key); ?>" name="user-Character-0-0-0" class="ckbox" <?php if(strpos($info['perm'],$kstr)!==false): ?>checked<?php endif; ?>><?php echo ($permlist); ?>
           </label><?php endforeach; endif; ?>
        
        </td>
    </tr>
   <!--  <tr>
        <th width="100">状态:</th>
        <td>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2" checked=""  name="status" value="1" <?php if( $info['status']==1): ?>checked=""<?php endif; ?>> 打开
          </label>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="status" value="0" <?php if( $info['status']==0): ?>checked=""<?php endif; ?>> 关闭
          </label> 
          
        </td>
    </tr> -->
</table>
<div class="text-c mt-20">
      <button type="button" class="btn btn-success radius" id="" name="" onClick="class_save();"><i class="icon-save"></i> 保存</button>
      <a href="<?php echo U('Adminlist/index');?>"><button type="button" class="btn btn-success" id="" name="" > 返回列表</button></a>
</div> 
</form>
</div>
<script type="text/javascript" charset="utf-8" src="/sptmcx/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/sptmcx/Public/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/sptmcx/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
  <script type="text/javascript">
  function class_save(){
     var title = $("input[name='username']").val().trim();
     var psw = $("input[name='password']").val().trim();
     var info='<?php echo ($info[uid]); ?>';
     if(title.length<1){
        layer.msg('名称不能为空!',1);
        return;
     }
     if(info==''){
      if(psw.length<1){
        layer.msg('密码不能为空!',1);
        return;
       }
     }
    
    
     
     $(".Huiform").submit();
  }
  $(function(){
    $(".ckbox").click(function(){
      var uids='';
    
      $("input[name='perm']").val(uids);
      $('#perm_select td').find(':checkbox').each(function(){
        if ($(this).is(":checked")) {
          uids+=$(this).val()+',';

        }
      });
      $("input[name='perm']").val(uids);
     
    })
  })

</script>
<input name="themebaseUrl" value="/sptmcx/Public/Echarts" type="hidden" />
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/Validform_v5.3.2.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/layer1.8/layer.min.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/js/H-ui.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/js/H-ui.admin.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/js/H-ui.admin.doc.js"></script> <!-- 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/My97DatePicker/WdatePicker.js"></script> -->
<!-- <script type="text/javascript" src="/sptmcx/Public/diyUpload/js/webuploader.html5only.min.js"></script>
<script type="text/javascript" src="/sptmcx/Public/diyUpload/js/diyUpload.js"></script> --><!-- 
<script type="text/javascript" src="/sptmcx/Public/bootstrap/js/bootstrap-datetimepicker.js"></script> -->
<!-- <script type="text/javascript" src="/sptmcx/Public/bootstrap/js/locales/bootstrap-datetimepicker.fr.js"></script> -->
<script type="text/javascript" src="/sptmcx/Public/Echarts/echarts.js"></script> 
<!-- <script type="text/javascript" src="/sptmcx/Public/com/js/comm.js?rand=1"></script>  -->
<!-- <script type="text/javascript" src="/sptmcx/Public/admin/js/comm.js?rand=1"></script> -->
<script type="text/javascript" src="/sptmcx/Public/Admin/js/admin.js"></script>
<script type="text/javascript" src="/sptmcx/Public/Admin/js/zxxFile.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Admin/js/cupload.js"></script> 
</body>
</html>