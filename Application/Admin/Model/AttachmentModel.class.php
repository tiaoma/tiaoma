<?php 
namespace Admin\Model;

class AttachmentModel extends ComModel
{
    public function addAttachment($imgdata,$bid=0,$ftype=0,$full_src = '')
    {
        $idata['savename'] = $imgdata['savename'];
        $idata['savepath'] = $imgdata['savepath'];
        $idata['src'] = $full_src.$imgdata['savepath'].$imgdata['savename'];
        $idata['size'] =  $imgdata['size'];
        $idata['type'] =  $imgdata['type'];
        $idata['ftype'] =  $ftype;
        $idata['bid'] =  $bid;
        $idata['addtime'] =  $this->_time;
        if($this->add($idata))
        {
            return true;
        }
         return false;
    }
    public function del($aid)
    {
        return $this->where("aid='{$del}'")->save(array('del'=>1))?true:false;
    }
}
