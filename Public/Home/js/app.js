

    /*if (!is_weixin()) { // 如果不是微信内置浏览器，就动态跳转到以下页面
        window.location.href = 'https://open.weixin.qq.com/connect/oauth2/authorize?appid=wxd00a62b43153c12c&redirect_uri=xxx&response_type=code&scope=snsapi_base&state=hyxt#wechat_redirect';
    }*/


mui('.mui-bar-tab').on('tap','a',function(){    
    location.href = this.getAttribute('href');
})

mui('.cbzjdbox').on('tap','a',function(){    
    location.href = this.getAttribute('href');
})

function is_weixin(){
        var ua = navigator.userAgent.toLowerCase(); //判断浏览器的类型
        if(ua.match(/MicroMessenger/i)=="micromessenger") {
            return true;
        } else {
            return false;
        }
    }
    
//手机号验证
function isMobil(s)
{
	var patrn=/^1[0-9]{10}$/;
	if (!patrn.exec(s)) return false
	return true
}
//邮箱验证
function isEmail(s){
    var patrn =  /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,})+$/ ;
    if (!patrn.exec(s)) return false
    return true
}
//密码验证
function isPassword(s){
    var patrn = /^[\@A-Za-z0-9\!\#\$\%\^\&\*\.\~]{6,22}$/;
    if (!patrn.exec(s)) return false
    return true
}
//身份证号码
function isCardNo(card)  
{  
   // 身份证号码为15位或者18位，15位时全为数字，18位前17位为数字，最后一位是校验位，可能为数字或字符X  
   var reg = /(^\d{15}$)|(^\d{18}$)|(^\d{17}(\d|X|x)$)/;  
   if(reg.test(card) === false)  
   {  
        
       return  false;  
   }
   return true;  
}  
//银行卡号验证
function isBankNum(banknum){
    var regex = /^\d{16}|\d{19}$/;
    if (regex.test(banknum)) {
        return true;
    }
    return false;
}
//只能输入数字
function onlyNum() {
    if(!(event.keyCode==46)&&!(event.keyCode==8)&&!(event.keyCode==37)&&!(event.keyCode==39))
    if(!((event.keyCode>=48&&event.keyCode<=57)||(event.keyCode>=96&&event.keyCode<=105)))
                    event.returnValue=false;
}
//数字 字母 组合
function checkNumCodeRate(str1)  
{  
    var regNumber = /\d+/; //验证0-9的任意数字最少出现1次。
    var regString = /[a-zA-Z]+/; //验证大小写26个字母任意字母最少出现1次。
    var regAll = /^[0-9a-zA-Z]{6,16}$/
    if(str1.length<6 || str1.length>16){
        return false; 
    }
    if (!regAll.test(str1)) {
           return false; 
    }
    if (regNumber.test(str1) && regString.test(str1)) {
          return true;
    }

    return false;  

}
//账号 正则表达
function checkUsername(str){
    var regNumber = /^[0-9]{5,16}$/; //验证0-9的任意数字最少出现1次。
    var regString = /^[a-zA-Z]{5,16}$/; //验证大小写26个字母任意字母最少出现1次。
    var regAll = /^[0-9a-zA-Z]{5,16}$/;

    if(str.length<5 || str.length>16){
        return false; 
    }
    
    if (regNumber.test(str) || regString.test(str) || regAll.test(str)) {
          return true;
    } 
    return false; 
}

//公共弹出框
function popup(msg,backcall,isConfirm,canceltext){
   var gWinHeight = document.documentElement?document.documentElement.clientHeight:document.body.clientHeight;
   var str = '<div class="st-popup">';
       str += ' <div class="inner">';
       str += '     <div class="cont">';
       str += msg;
       str += '     </div>';
       str += '     <div class="tool-bar">';
       if(isConfirm)
       {
         if(canceltext){

          str += '         <a href="###" class="st-back isConfirm mr t-b-q">确定</a>';
          str += '         <a href="###" class="st-back gray t-b-x">'+canceltext+'</a>';
         }else{
          str += '         <a href="###" class="st-back gray mr">取消</a>';
          str += '         <a href="###" class="st-back isConfirm">确定</a>';
         }
          
       }else{
          str += '         <a href="###" class="st-back isConfirm">确  定</a>';
       } 
       
       str += '     </div>';
       str += ' </div>';
       str += ' </div>';
   $(".st-popup").remove();
   $('body').append(str);
   $(".st-popup .inner").css('margin-top',gWinHeight/2);
   $(".st-back").click(function(){
       if($(this).hasClass('isConfirm')){
          //回调函数
           if(typeof backcall=='function')
           {
             backcall();
           }
       }
       
       $(".st-popup").remove();
   });

   return false;
}
//倒计时
var isgbGetCodeCount = false;
function gbGetCodeCount(obj){
   var count = 60;
   if(isgbGetCodeCount){
     return;
   } 
   isgbGetCodeCount = true;
   var timeObj = setInterval(function(){
       $(obj).html(count+'秒后重新获取');
       count--;
       if(count<0){
           clearInterval(timeObj)
           isgbGetCodeCount = false;
           $(obj).html('获取验证码');
       }
   },1000);
}

 
 
 