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

<nav class="breadcrumb"><i class="iconfont">&#xf012b;</i> 首页 <span class="c-gray en">&gt;</span> 企业管理 <span class="c-gray en">&gt;</span> 企业列表 <a class="btn btn-success radius r mr-20" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="icon-refresh"></i></a></nav>

 <form class="Huiform" action="" method="get" enctype="multipart/form-data">

<div class="text-c"> 
        
        <span class="select-box inline">
        <select name="status" class="select">
            <option value="" >状态</option>
            <option value="0" <?php if($status == '0'): ?>selected<?php endif; ?>>不正常</option>
            <option value="1" <?php if($status == '1'): ?>selected<?php endif; ?>>正常</option>
        </select>
        </span>
        <input type="text" class="input-text" style="width:250px" placeholder="输入名称、号码" id="" name="keyword" value="<?php echo ($keyword); ?>">
        <button type="submit" class="btn btn-success radius" id="" name=""><i class="icon-search"></i> 搜索</button>
        <button type="submit" class="btn btn-success radius" id="" name="export" value="1">导出</button>
</div>
</form> 
<div class="pd-20 text-c">
<a style="float:right;margin-right:10px;margin-bottom:10px;" href="<?php echo U('Memberunit/add');?>"><button type="button" class="btn btn-success" id="" name=""><i class="icon-plus"></i> 添加单位</button></a>
  <table class="table table-striped table-bordered bootstrap-datatable datatable">
                    <thead>
                        <tr>
                            <th>序号</th> 
                            <th>名称</th> 
                            <th>成立时间</th>
                            <th>添加时间</th>
                            <th>单位类别</th>   
                            <th>经营方式</th>
                            <th>号   码</th>
                            <th>状   态</th>
                            <th>注册商标</th>            
                            <th>操作</th>
                        </tr>
                    </thead>   
                    <tbody> 
                        <?php if( $list): if(is_array($list)): foreach($list as $key=>$info): ?><tr>
                                <td><?php echo ($info[id]); ?></td>
                                <td><?php echo ($info['title']); ?></td> 
                                <td><?php echo (date("Y-m-d",$info['founding_time'])); ?></td>
                                <td><?php echo (date("Y-m-d H:i:s",$info['addtime'])); ?></td>
                                <td><?php echo ($unitclassName[$info[unit_class]]); ?></td> 
                                <td><?php echo ($managementmodeName[$info[management_mode]]); ?></td> 
                                <td><?php echo ($info['unit_code']); ?></td>
                                <td><?php echo ($statusName[$info['status']]); ?></td>
                                <td><?php if($info['registered_trademark']): ?><img src="/sptmcx/Public/Data/others<?php echo ($info['registered_trademark']); ?>" alt="" width="50"><?php endif; ?></td>                          
                                <td  class="f-14">
                                    <a  href="<?php echo U('Company/edit',array('id'=>$info[id],'rand'=>rand(1,10000)));?>"  data-name="<?php echo ($info[title]); ?>" data-id="<?php echo ($info[id]); ?>">
                                        <i class="icon-edit"></i>          
                                    </a>
                                    <a  onclick="class_del(this)" class="ml-5" data-url="<?php echo U('Company/del',array('id'=>$info[id],'rand'=>rand(1,10000)));?>" href="###">
                                        <i class="icon-trash"></i>
                                    </a>
                                </td>
                            </tr><?php endforeach; endif; ?>
                            <?php else: ?>
                            <tr>
                                <td colspan="10">暂无数据</td>
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