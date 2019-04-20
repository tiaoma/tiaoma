<?php
namespace Org\Com;
include '/Api/dysms/vendor/autoload.php';    //此处为你放置API的路径
use Aliyun\Core\Config; 
use Aliyun\Core\Profile\DefaultProfile; 
use Aliyun\Core\DefaultAcsClient; 
use Aliyun\Api\Sms\Request\V20170525\SendSmsRequest; 
class Dysms
{
	public  function dySmsSend($phoneNo,$templateCode,$smsData = array()){
        include '/Api/dysms/vendor/autoload.php';    //此处为你放置API的路径
        Config::load();             //加载区域结点配置
        $alysms_dy = C('alysms_dy');
        $accessKeyId = $alysms_dy['accessKeyId'];
        $accessKeySecret = $alysms_dy['accessKeySecret'];
        $product = "Dysmsapi";
        $domain = "dysmsapi.aliyuncs.com";
        $region = "cn-hangzhou";
        $profile = DefaultProfile::getProfile($region, $accessKeyId, $accessKeySecret);
        DefaultProfile::addEndpoint("cn-hangzhou", "cn-hangzhou", $product, $domain);
        $acsClient = new DefaultAcsClient($profile);   
        $request = new SendSmsRequest(); 
        $request->setSignName($alysms_dy['signname']);

        $request->setPhoneNumbers($phoneNo);    //$moblie是我前台传入的电话     
        $request->setTemplateCode($templateCode);    //短信模板编号
       // $smsData = array();    //所使用的模板若有变量 在这里填入变量的值  我的变量名为username此处也为username
        if($smsData){
            $request->setTemplateParam(json_encode($smsData)); 
        }
          
        //发起访问请求
        $acsResponse = $acsClient->getAcsResponse($request);
        //返回请求结果
        $result = json_decode(json_encode($acsResponse), true);
        
        if(isset($result['Message']) && $result['Message']=='OK'){
            return true;
        }
        return false; 
    }
}