<?php if (!defined('THINK_PATH')) exit(); if(is_array($list)): foreach($list as $key=>$vo): ?><li class="mui-table-view-cell">
		            <div class="mui-table">
		                <a href="<?php echo U('Policies/info',array('id'=>$vo['id']));?>">
			                <div class="mui-table-cell mui-col-xs-12">
			                    <h4 class="mui-ellipsis"><?php echo ($vo['title']); ?></h4>
			                    
			                    <p class="mui-h6 mui-ellipsis"><?php echo (date('Y-m-d',$vo[createtime])); ?></p>
			                </div>
			                
		                </a>
		            </div>
</li><?php endforeach; endif; ?>