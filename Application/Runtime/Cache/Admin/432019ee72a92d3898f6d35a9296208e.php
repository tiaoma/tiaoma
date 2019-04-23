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
<nav class="breadcrumb"><i class="iconfont">&#xf012b;</i> 首页 <span class="c-gray en">&gt;</span> 会员管理 <span class="c-gray en">&gt;</span> 实名认证 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<div class="pd-20 text-c">
<form class="Huiform" action="" method="post" enctype="multipart/form-data">
        <input type="hidden" value="<?php echo ($info[id]); ?>" name="id">
        <table class="table">
   
    <tr>
        <th width="100">会员名:</th>
        <td>
           <div><?php echo ($memberinfo['username']); ?></div>
        </td>
    </tr>
    <tr>
        <th width="100">电话号码:</th>
        <td>
          <div><?php echo ($memberinfo['mobile']); ?></div>
        </td>
    </tr>
    <tr>
        <th width="100">名称:</th>
        <td>
          <div><?php if($info[auth_unit_name]): echo ($info[auth_unit_name]); else: echo ($info[auth_personal_name]); endif; ?></div>
        </td>
    </tr>
    <tr>
        <th width="100">认证号码:</th>
        <td>
          <div><?php if($info[auth_unit_code]): echo ($info[auth_unit_code]); else: echo ($info[auth_personal_code]); endif; ?></div>
        </td>
    </tr>
    <tr>
        <th width="100">认证号码:</th>
        <td>
          <div ><?php if($info[auth_images]): ?><img width="300" height="200" src="/sptmcx/Public/Data<?php echo ($info[auth_images]); ?>"></div>
        </td>
    </tr>
    <if condition="$info['fail_remark']">
    <tr>
        <th width="100">失败原因:</th>
        <td><textarea cols="50" rows="10" id="fail_remark"   name="fail_remark" ><?php echo ($info['fail_remark']); ?></textarea></td>
    </tr><?php endif; ?>
    

</table>
<div class="text-c mt-20">
     <?php if($info[status] == 0): ?><button type="button" class="btn btn-success radius" id="" name="" onclick="class_verify(this)" data-url="<?php echo U('Realauthentication/verify',array('id'=>$info['id']));?>">待审核</button><?php endif; ?>
     <?php if($info[status] == 1): ?><button type="button" class="btn btn-success radius" id="" name="" onclick="class_verifying(this)" data-url="<?php echo U('Realauthentication/verifying',array('id'=>$info['id']));?>" data-eurl="<?php echo U('Realauthentication/errverifying',array('id'=>$info['id']));?>">正在审核</button><?php endif; ?>
     <?php if($info[status] == 2): ?><button  type="button" class="btn " id="" name="" >审核成功</button><?php endif; ?>
     <?php if($info[status] == -2): ?><button  type="button" class="btn" id="" name="" >审核失败</button>
        <button type="button" class="btn btn-success radius" id="" name="" onclick="editfailVerify(this)" data-url="<?php echo U('Realauthentication/editfailVerify',array('id'=>$info['id']));?>"><i class="icon-save" data-href="<?php echo U('Realauthentication/index');?>"></i> 保存</button><?php endif; ?>
     <?php if($info[status] == -1): ?><button type="button" class="btn btn-success radius" id="" name="" >取消审核</button><?php endif; ?>
      
      <a href="<?php echo U('Realauthentication/index');?>"><button type="button" class="btn btn-success" id="" name="" > 返回列表</button></a>
</div> 
</form>
</div>
<script type="text/javascript" charset="utf-8" src="/sptmcx/Public/Home/js/comm.js?versionId"></script>
  <script type="text/javascript">

  function class_verify(obj){
    layer.confirm('确认开始审核？',function(index){
           location.href = $(obj).attr('data-url');
      });
  }
   function class_verifying(obj){
    $.layer({  
      shade: [0],  
      dialog: {  
          msg: '审核结果',  
          btns: 2,                      
          type: 4,  
          btn: ['成功','失败'],  
          yes: function(){  
              location.href = $(obj).attr('data-url');  
          }, no: function(){  
              location.href = $(obj).attr('data-eurl');  
          }  
      }  
  }); 
  }
   function editfailVerify(obj){
     var fail_remark = $("#fail_remark").val().trim();
     var id = "<?php echo ($info['id']); ?>";
     if(fail_remark.length<1){
        layer.msg('认证失败原因不能为空!',1);
        return;
     }
     $.ajax({
      url:$(obj).attr('data-url'),
      type:'post',
      data:{fail_remark:fail_remark,id:id},
      success:function(re){
        if(re=="0"){
          layer.msg("修改认证失败原因失败");
        }
        if(re=="1"){
         location.href = $(obj).attr('data-href');
        }
      }
     });
     
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