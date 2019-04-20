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

<nav class="breadcrumb"><i class="iconfont">&#xf012b;</i> 首页 <span class="c-gray en">&gt;</span> 设置 <span class="c-gray en">&gt;</span> 系统设置 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20">
  <form class="Huiform" action="<?php echo U('Sysset/close');?>" method="post">
   <table class="table" style="border:none !important;">
             <tr>
          <th width="100">系统状态:</th>
          <td>
            <label class="radio-inline">
              <input type="radio" id="inline-radio2" name="data[flag]" value="0" <?php if($data['flag'] == 0): ?>checked<?php endif; ?>> 开启
            </label>
            <label class="radio-inline" >
              <input type="radio" id="inline-radio2" checked="" name="data[flag]" value="1" <?php if($data['flag'] == 1): ?>checked<?php endif; ?>> 关闭
            </label>
          </td>
        </tr>
        <tr>
          <th width="100">系统关闭跳转链接:</th>
          <td>
            <input type="text" value="<?php echo ($data['url']); ?>" maxlength="100" class="form-control" name="data[url]">
            <span class='help-block'>如果您不采用系统页面，则可以设置关闭提醒链接，当商城关闭时跳转到此链接（非任何商城的链接）</span>
          </td>
        </tr>
            <tr>
                <th width="100">关闭提醒:</th>
                <td><textarea cols="50" rows="10" style="display:none;"   name="data[detail]"   class="widgEditor "><?php echo ($data['detail']); ?></textarea>
                    <script id="editor" type="text/plain" style="width:100%;height:300px;"></script>
                </td>
            </tr>            
  </table>  
    <div class="text-c mt-20">
      <button type="button" class="btn btn-success radius" id="" name="" onClick="class_save();"><i class="icon-save"></i> 保存</button>
    </div>
  </form>
  </div>
 <script type="text/javascript" charset="utf-8" src="/sptmcx/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/sptmcx/Public/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/sptmcx/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
  <script type="text/javascript">
  var ue = UE.getEditor('editor');
   ue.ready(function(){
    ue.setContent('<?php echo ($data[detail]); ?>');
   });
  function class_save(){
     $(".widgEditor").val(ue.getContent());
     $(".Huiform").submit();
  }
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