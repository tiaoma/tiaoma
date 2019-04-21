<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): foreach($list as $key=>$vo): ?><li class="mui-table-view-cell mui-media">
					<a href="<?php echo U('News/info',array('id'=>$vo['id']));?>">
						<img class="mui-media-object mui-pull-left" src="/sptmcx/Public/Data/<?php echo ($vo['thumb']); ?>?versionId=<?php echo (C("WWW_VERSION")); ?>">
						<div class="mui-media-body">
							<h4><?php echo ($vo['title']); ?></h4>	
							<p><?php echo ($newstypelist[$vo['ntype']]); ?>资讯</p>
							<p class='mui-ellipsis'><?php echo (date('Y-m-d',$vo[addtime])); ?></p>
						</div>
					</a>
				</li><?php endforeach; endif; ?>