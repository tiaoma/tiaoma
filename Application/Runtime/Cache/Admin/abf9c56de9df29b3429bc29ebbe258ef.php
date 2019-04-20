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

<nav class="breadcrumb"><i class="iconfont">&#xf012b;</i> 首页 <span class="c-gray en">&gt;</span> 公告管理 <span class="c-gray en">&gt;</span> <?php if($info): ?>编辑<?php else: ?>添加<?php endif; ?>公告 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20 text-c">
<form class="Huiform" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo ($info[id]); ?>" name="id">
        <input type="hidden" value="" name="delgids" />
        <table class="table">
    <tr>
        <th width="100">排序:</th>
        <td><input placeholder="填写的数字越大越靠前"  value="<?php echo ($info['displayorder']); ?>" maxlength="64" class="input-text"  style="width:250px" name="displayorder"></td>
    </tr>
    <tr>
        <th width="100">公告标题:</th>
        <td><input type="text" value="<?php echo ($info['title']); ?>" maxlength="64" class="form-control" name="title"></td>
    </tr>
    <tr>
        <th width="100">公告图片(200*150):</th>
        <td  style="position: relative;">
         <button type="button" class="file-btn">选择图片</button>
         <text class="file-tip"><?php echo ($info['thumb']); ?></text>
          <input type="file" value="" id="fimage" style="width:100px !important;height: 40px !important;opacity: 0;" maxlength="64" class="form-control file-hidden" name="thumb">
        <?php if($info['thumb']): ?><div>
          <img src="/sptmcx/Public/Data/others<?php echo ($info['thumb']); ?>">
        </div><?php endif; ?>
        </td>
    </tr>
    <tr>
        <th width="100">描述:</th>
        <td><textarea cols="50" rows="10"  style="display:none;"  name="detail"   class="des "><?php echo ($info[detail]); ?></textarea>
        <script id="editor" type="text/plain" style="width:100%;height:300px;"></script>
        </td>
    </tr>
    <tr>
        <th width="100">状态:</th>
        <td>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="status" value="1" <?php if( $info[status]==1): ?>checked=""<?php endif; ?>> 发布
          </label>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="status" value="0" <?php if( $info[status]==0): ?>checked=""<?php endif; ?>> 不发布
          </label> 
          
        </td>
    </tr>
    <tr>
        <th width="100">公告类型:</th>
        <td>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="ntype" value="0" <?php if( $info[ntype]==0): ?>checked=""<?php endif; ?>> 公告
          </label>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="ntype" value="1" <?php if( $info[ntype]==1): ?>checked=""<?php endif; ?>> 规则
          </label> 
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="ntype" value="2" <?php if( $info[ntype]==2): ?>checked=""<?php endif; ?>> 活动
          </label> 
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
    ue.setContent($(".des").val());
   });
  function class_save(){
     var title = $("input[name='title']").val().trim();
     var coverfile = $("input[name='thumb']").val().trim();
     if(title.length<1){
        layer.msg('公告标题不准为空!',1);
        return;
     } 
     if(coverfile.length<1){
         $("input[name='thumb']").remove();
     }else{
       var fimage = document.getElementById("fimage").files;
       var arrpictype = ['jpg','jpeg','png'];
       var arr= new Array();

       arr =fimage[0].name.split(".");
       var m = $.inArray(arr[1], arrpictype);
       if(m == "-1"){
        layer.msg('图片格式不对!',1);
          return;
       }
       if(fimage[0].size>3145728){
        layer.msg('图片大小不对!',1);
          return;
       }
     }
     $(".des").val(ue.getContent());
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