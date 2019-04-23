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
.page{
   margin-left: 40%; 
}
.page ul li{
  float: left !important;
}
</style>
<nav class="breadcrumb"><i class="iconfont">&#xf012b;</i> 首页 <span class="c-gray en">&gt;</span> 会员管理 <span class="c-gray en">&gt;</span> 实名认证 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>
<form class="Huiform" action="" method="post" enctype="multipart/form-data">
<div class="text-c"> 
        <input type="text" class="input-text" style="width:250px" placeholder="请输入会员信息或者认证信息关键字" id="" name="keyword" value="<?php echo ($keyword); ?>">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="icon-search"></i> 搜用户</button>
</div>
</form>
<div class="pd-20 text-c">
  <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>编号</th> 
                            <th>会员信息</th>
                            <th>认证信息</th>
                            <th>状态</th>             
                            <th>操作</th>
                        </tr>
                    </thead>   
                    <tbody> 
                        <?php if($list): if(is_array($list)): foreach($list as $key=>$info): ?><tr>
                                <td><?php echo ($info[id]); ?></td>
                                <td><?php if($info['head']): ?><img src="/sptmcx/Public/Home/images<?php echo ($info[head]); ?>" alt="" width="50"><?php endif; echo ($info[username]); ?>
                                <br/>
                                <?php echo ($info[mobile]); ?>
                                </td>
                                <td>
                                  <?php if($info[auth_unit_name]): echo ($info[auth_unit_name]); else: echo ($info[auth_personal_name]); endif; ?>
                                  <br/>
                                   <?php if($info[auth_unit_code]): echo ($info[auth_unit_code]); else: echo ($info[auth_personal_code]); endif; ?>
                                </td>
                                <td><?php echo ($statusName[$info[status]]); ?></td>                          
                                <td  class="f-14">
                                    <a  href="<?php echo U('Realauthentication/edit',array('id'=>$info[id],'rand'=>rand(1,10000)));?>"  data-name="<?php echo ($info[title]); ?>" data-id="<?php echo ($info[id]); ?>">
                                        <i class="icon-edit"></i>          
                                    </a>
                                    <!-- <a  onclick="class_del(this)" class="ml-5" data-url="<?php echo U('Realauthentication/del',array('id'=>$info[id],'rand'=>rand(1,10000)));?>" href="###">
                                        <i class="icon-trash"></i>
                                    </a> -->
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
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/My97DatePicker/4.8/WdatePicker.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/datatables/1.10.0/jquery.dataTables.min.js"></script> 
<script type="text/javascript" src="/sptmcx/Public/Huiadmin/lib/laypage/1.2/laypage.js"></script>
<script type="text/javascript">
 
   function class_del(obj){
     layer.confirm('确认要删除吗？',function(index){
           location.href = $(obj).attr('data-url');
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