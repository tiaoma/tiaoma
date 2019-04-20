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

<nav class="breadcrumb"><i class="iconfont">&#xf012b;</i> 首页 <span class="c-gray en">&gt;</span> 消息管理 <span class="c-gray en">&gt;</span> <?php if($info): ?>编辑<?php else: ?>添加<?php endif; ?>消息 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20 text-c" id="mainmsg">
<form class="Huiform" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo ($info[id]); ?>" name="id">
        <input type="hidden" value="" name="delgids" />
        <table class="table">
    <tr>
        <th width="100">选择发送人:</th>
        <td>
          <input type="hidden" value="<?php echo ($uids); ?>" maxlength="64" class="form-control" name="uids" style="width:300px;float: left;" readonly>
          <input type="text" value="<?php echo ($unames); ?>" maxlength="64" class="form-control" name="unames" style="width:300px;float: left;" readonly>
         <a style="margin-left:5px;" onClick="alerthtml();" class="btn re-btn btn-primary">  选择会员</a>
        </td>
    </tr>
    <tr>
        <th width="100">消息内容:</th>
        <td><textarea cols="50" rows="10"  style="display:none;"  name="cont"   class="des "><?php echo ($info['cont']); ?></textarea>
        <script id="editor" type="text/plain" style="width:100%;height:300px;"></script>
        </td>
    </tr>
    
</table>
<div class="text-c mt-20">
      <button type="button" class="btn btn-success radius" id="" name="" onClick="class_save();"><i class="icon-save"></i> 保存</button>
      <a href="<?php echo U('Msg/index');?>"><button type="button" class="btn btn-success" id="" name="" > 返回列表</button></a>
</div> 
</form>
</div>


<div class="pd-20 text-c " id="selectmember" style="display:none;">
<a href="javascript:void(0)" onclick="hiddenselectmember()" style="float:right;margin-left:5px;"><button type="button" class="btn btn-success" id="" name="" > 关闭</button></a>
  <table class="table table-striped table-bordered bootstrap-datatable datatable table-sort">
       <thead>
            <tr>
                <th><input type="checkbox" class="ckallbox" name="" value=""></th> 
                
                <th>会员信息</th>
                 <th>积分/余额</th>
                <th>类型</th>
                <th>属性</th>
                <th>锁定</th>
                <th>是否认证</th>
                <th>状态</th>             
                <th></th>
            </tr>
        </thead>
        <tbody> 
          
            <?php if( $list): if(is_array($list)): foreach($list as $key=>$info): ?><tr>
                 
                    <td> <input type="checkbox" value="" name="user-Character-0" data-uid="<?php echo ($info['id']); ?>"  data-username="<?php echo ($info['username']); ?>" class="user-Character-0 ckbox" <?php if(in_array($info['id'],$uidsarr)): ?>checked<?php endif; ?>></td>
                   
                    <td><a  href="<?php echo U('Memberlist/edit',array('id'=>$info[id],'rand'=>rand(1,10000)));?>"  data-name="<?php echo ($info[title]); ?>" data-id="<?php echo ($info[id]); ?>"><?php if($info['head']): ?><img src="/sptmcx/Public/Home/images<?php echo ($info[head]); ?>" alt="" width="50"><?php endif; echo ($info[username]); ?>/<?php echo ($info[mobile]); ?></a></td>
                     <td><?php echo ($info[credit1]); ?>/<?php echo ($info[credit2]); ?></td>
                    <td><?php echo ($usertypeName[intval($info[user_type])]); ?></td>  
                    <td><?php echo ($organizationName[$info[organization_id]]); ?></td> 
                    <td><?php echo ($islockName[$info[islock]]); ?></td>
                    <td><?php if(empty($info[auth_time])): ?>未完成<?php else: ?>完成<?php endif; ?></td>
                    <td><?php echo ($isblackName[$info[isblack]]); ?></td>                          
                    <td  class="f-14">
                       
                    </td>
                </tr><?php endforeach; endif; ?>
                <?php else: ?>
                <tr>
                    <td colspan="6">暂无数据</td>
                </tr><?php endif; ?>                       
        </tbody>
    </table>  
   <div class="page">
    <?php echo ($page); ?>
    </div>
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
    
     $(".des").val(ue.getContent());
     $(".Huiform").submit();
  }
  function alerthtml(){
   $("#mainmsg").css("display","none");
   $("#selectmember").css("display","block");

 }
 function hiddenselectmember(){
  $("#mainmsg").css("display","block");
   $("#selectmember").css("display","none");
 }

</script>
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/My97DatePicker/WdatePicker.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/laypage/laypage.js"></script>
<script type="text/javascript">
$('.table-sort').dataTable({
  "aaSorting": [[ 1, "desc" ]],//默认第几个排序
  "bStateSave": true,//状态保存
  "pading":false,
  "aoColumnDefs": [
    //{"bVisible": false, "aTargets": [ 3 ]} //控制列的隐藏显示
    {"orderable":false,"aTargets":[0,8]}// 不参与排序的列
  ]
});
 $(function(){
  $(".ckbox").click(function(){
    var uids='';
    var unames='';
    $("input[name='uids']").val(uids);
    $('.table tbody').find(':checkbox').each(function(){
      if ($(this).is(":checked")) {
        uids+=$(this).attr("data-uid")+',';
        unames+=$(this).attr("data-username")+',';
      }
    });
    $("input[name='uids']").val(uids);
    $("input[name='unames']").val(unames);
  })
    var allcheck = 0;
  $(".ckallbox").click(function(){
    var uids='';
    var unames='';
    if(!allcheck){
      $('.table tbody').find(':checkbox').each(function(){
        uids+=$(this).attr("data-uid")+',';
        unames+=$(this).attr("data-username")+',';
      });
      $("input[name='uids']").val(uids);
      $("input[name='unames']").val(unames);
      allcheck = 1;
    }else{
      allcheck = 0;
      $("input[name='uids']").val(uids);
       $("input[name='unames']").val(unames);
    }
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