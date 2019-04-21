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
  .re-btn{
    float: left;
    margin-left: 3px;
  }
</style>
<nav class="breadcrumb"><i class="iconfont">&#xf012b;</i> 首页 <span class="c-gray en">&gt;</span> 企业管理 <span class="c-gray en">&gt;</span> <?php if($info): ?>编辑<?php else: ?>添加<?php endif; ?>企业 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20 text-c">
<form class="Huiform" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo ($info[id]); ?>" name="id">
        <table class="table">
   
    <tr>
        <th width="100">单位名称:</th>
        <td><input type="text" value="<?php echo ($info['title']); ?>" maxlength="64" class="form-control" name="data[title]" ></td>
    </tr>
    <tr>
        <th width="100">单位封面:</th>
        <td>
          <input type="file" value=""  class="form-control" name="head">
          <?php if($info['head']): ?><div>
            <img width="100" src="/sptmcx/Public/Data/others<?php echo ($info['head']); ?>">
          </div><?php endif; ?>
        </td>

      </tr>
    <tr>
        <th width="100">是否已经提交申请:</th>
        <td>
        <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[isapply]" value="1" checked="" > 是
          </label>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[isapply]" value="0" <?php if( $info['isapply'] == '0'): ?>checked=""<?php endif; ?>> 否
          </label>          
        </td>
    </tr>
    <tr>
        <th width="100">申请类型:</th>
        <td>
            <select class="select" id="sel_Sub" name="data[apply_type]" onchange="SetSubID(this);">
             <!--  <option value="0" <?php if($info['uint_id'] == 0): ?>selected=""<?php endif; ?>>无</option> -->
              <?php if(is_array($organizationlist)): $i = 0; $__LIST__ = $organizationlist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$list): $mod = ($i % 2 );++$i;?><option  <?php if($info['apply_type'] == $list['id']): ?>selected=""<?php endif; ?> value="<?php echo ($list['id']); ?>"><?php echo ($list['title']); ?></option><?php endforeach; endif; else: echo "" ;endif; ?>      
            </select>
        </td>
    </tr>
    <tr>
        <th width="100">URL:</th>
        <td><input type="text" value="<?php echo ($info['link']); ?>" maxlength="64" class="form-control" name="data[link]" ></td>
    </tr>
    <tr>
        <th width="100">通讯地址:</th>
        <td><input type="text" value="<?php echo ($info['address']); ?>" maxlength="64" class="form-control" name="data[address]" ></td>
    </tr>
    <tr>
        <th width="100">邮编:</th>
        <td><input type="text" value="<?php echo ($info['zip_code']); ?>" maxlength="64" class="form-control" name="data[zip_code]" ></td>
    </tr>
    <tr>
        <th width="100">成立时间:</th>
        <td><input id="datetimepicker" type="text" value="<?php echo (date('Y-m-d',$info['founding_time'])); ?>" maxlength="64" class="form-control" name="data[founding_time]" ></td>
    </tr>
    <tr>
        <th width="100">单位人数:</th>
        <td><input type="text" value="<?php echo ($info['unit_number']); ?>" maxlength="64" class="form-control" name="data[unit_number]" ></td>
    </tr>
    <tr>
        <th width="100">注册资金:</th>
        <td><input type="text" value="<?php echo ($info['registered_capital']); ?>" maxlength="64" class="form-control" name="data[registered_capital]" placeholder="单位 万"></td>
    </tr>   
    <tr>
        <th width="100">单位性质:</th>
        <td>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[unit_property]" value="0" <?php if( $info[unit_property]==0): ?>checked=""<?php endif; ?>> 国有
          </label>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[unit_property]" value="1" <?php if( $info[unit_property]==1): ?>checked=""<?php endif; ?>> 合资
          </label> 
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[unit_property]" value="2" <?php if( $info[unit_property]==2): ?>checked=""<?php endif; ?>> 私营
          </label>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[unit_property]" value="3" <?php if( $info[unit_property]==3): ?>checked=""<?php endif; ?>> 外资
          </label>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[unit_property]" value="4" <?php if( $info[unit_property]==4): ?>checked=""<?php endif; ?>> 独资
          </label>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[unit_property]" value="5" <?php if( $info[unit_property]==5): ?>checked=""<?php endif; ?>> 个体
          </label>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[unit_property]" value="6" <?php if( $info[unit_property]==6): ?>checked=""<?php endif; ?>> 其它
          </label>
        </td>
    </tr>
    
     
    <tr>
        <th width="100">号   码:</th>
        <td><input type="text" value="<?php echo ($info['unit_code']); ?>" maxlength="64" class="form-control" name="data[unit_code]"></td>
    </tr>
     <tr>
        <th width="100">企业产值:</th>
        <td><input type="text" value="<?php echo ($info['enterprise_output']); ?>" maxlength="64" class="form-control" name="data[enterprise_output]" placeholder="单位 万"></td>
    </tr>
    <tr>
        <th width="100">自有资产:</th>
        <td><input type="text" value="<?php echo ($info['own_assets']); ?>" maxlength="64" class="form-control" name="data[own_assets]" placeholder="单位 万"></td>
    </tr>
    <tr>
        <th width="100">注册商标:</th>
        <td>
          <input type="file" value=""  class="form-control" name="registered_trademark">
          <?php if($info['registered_trademark']): ?><div >
            <img width="100" height="50" src="/sptmcx/Public/Data/others<?php echo ($info['registered_trademark']); ?>">
          </div><?php endif; ?>
        </td>
      </tr>
      <tr>
        <th width="100">主管部门:</th>
        <td><input type="text" value="<?php echo ($info['competent_department']); ?>" maxlength="64" class="form-control" name="data[competent_department]"></td>
    </tr>
    <tr>
        <th width="100">企业描述:</th>
        <td> 
          <textarea cols="50" rows="10" style="display:none;"  name="data[des]"   class="des "><?php echo ($info[des]); ?></textarea>
          <script id="editor" type="text/plain" style="width:100%;height:300px;"></script>
        </td>
      </tr>
       <tr>
        <th width="100">营业执照:</th>
        <td>
          <input type="file" value=""  class="form-control" name="business_license">
          <?php if($info['business_license']): ?><div>
            <img width="350" height="500" src="/sptmcx/Public/Data/others<?php echo ($info['business_license']); ?>">
          </div><?php endif; ?>
        </td>

      </tr>
    <tr>
        <th width="100">状态:</th>
        <td>
        <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[status]" value="1" checked="" > 正常
          </label>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[status]" value="0" <?php if( $info['status'] == '0'): ?>checked=""<?php endif; ?>> 不正常
          </label>          
        </td>
    </tr>
    <tr>
        <th width="100">是否公开:</th>
        <td>
        <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[ispublic]" value="1" checked="" > 是
          </label>
          <label class="radio-inline" >
              <input type="radio" id="inline-radio2"  name="data[ispublic]" value="0" <?php if( $info['ispublic'] == '0'): ?>checked=""<?php endif; ?>> 否
          </label>          
        </td>
    </tr>
</table>
<div class="text-c mt-20">
      <button type="button" class="btn btn-success radius" id="" name="" onClick="class_save();"><i class="icon-save"></i> 保存</button>
      <a href="<?php echo U('Memberunit/index');?>"><button type="button" class="btn btn-success" id="" name="" > 返回列表</button></a>
</div> 
</form>
</div>
<script type="text/javascript" charset="utf-8" src="/sptmcx/Public/Home/js/comm.js?versionId"></script>
<script type="text/javascript" charset="utf-8" src="/sptmcx/Public/ueditor/ueditor.config.js"></script>
    <script type="text/javascript" charset="utf-8" src="/sptmcx/Public/ueditor/ueditor.all.min.js"> </script>
    <script type="text/javascript" charset="utf-8" src="/sptmcx/Public/ueditor/lang/zh-cn/zh-cn.js"></script>
  <script type="text/javascript">
var ue = UE.getEditor('editor');
   ue.ready(function(){
      ue.setContent($(".des").val());
   });
  function class_save(){
     var title = $("input[name='data[title]']").val().trim();
     if(title.length<1){
        layer.msg('名称不能为空!',1);
        return;
     }
     
     $(".des").val(ue.getContent());
     $(".Huiform").submit();
  }
  $(function(){
    $.fn.datetimepicker.dates['zh'] = {  
                days:       ["星期日", "星期一", "星期二", "星期三", "星期四", "星期五", "星期六","星期日"],  
                daysShort:  ["日", "一", "二", "三", "四", "五", "六","日"],  
                daysMin:    ["日", "一", "二", "三", "四", "五", "六","日"],  
                months:     ["一月", "二月", "三月", "四月", "五月", "六月", "七月", "八月", "九月", "十月", "十一月","十二月"],  
                monthsShort:  ["一", "二", "三", "四", "五", "六", "七", "八", "九", "十", "十一", "十二"],  
                meridiem:    ["上午", "下午"],  
                //suffix:      ["st", "nd", "rd", "th"],  
                today:       "今天"  
        };
    var date = new Date();
    $('#datetimepicker').datetimepicker({
      format: "yyyy-mm-dd",
      language:"zh", 
      todayHighlight:true,
      todayBtn:true,
      autoclose:true,
      minView: "month",
    });
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