<?php if (!defined('THINK_PATH')) exit();?><div class="adv-banner">         
            <div class="adv-b-banner">
                <?php if(is_array($topbannerlist)): foreach($topbannerlist as $vId=>$vo): ?><div class="imgbox">
                   <img src="/sptmcx/Public/Data/others<?php echo ($vo[href]); ?>" alt="<?php echo ($vo[title]); ?>" />
                </div><?php endforeach; endif; ?> 
            </div>          
        
    </div>