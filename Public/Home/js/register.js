var c_code = '';
    var c_mobile = '';
    var c_username = '';
    var mobileBind = false;
     //提交监听
  mui(document.body).on('tap', '.viewlink', function(e) {
       document.location.href=this.href;
  });
  //提交监听
  mui(document.body).on('tap', '.mui-btn', function(e) {
    mui(this).button('loading');

    
    var username = $(".username").val().trim();
    var mobile = $(".mobile").val().trim();
    var password = $(".password").val().trim();
    var password_ag = $(".password_ag").val().trim();
    var code = $(".code").val().trim();
        
   
      if(!checkUsername(username)){
            mui(this).button('reset'); 
            mui.alert('登录账号请使用5~16位长度的数字、字母或数字+字母组合', GlobalAppName, function() {});
            return false;
      }
      if(!checkNumCodeRate(password)){
           mui(this).button('reset'); 
           mui.alert('密码请使用数字加字母组合,6~16位长度', GlobalAppName, function() {});
            return false;
      }
      if(password != password_ag){
            mui(this).button('reset'); 
            mui.alert('您两次输入的账号密码不一致', GlobalAppName, function() {});
            return;
      }
      if(username==password){
            mui(this).button('reset'); 
            mui.alert('用户名和密码一致,存在安全风险', GlobalAppName, function() {});
            return false;
      }
      
        if(!isMobil(mobile)){
            mui(this).button('reset'); 
            mui.alert('手机号格式不正确', GlobalAppName, function() {});
            return false;
        }

        if(code.length!=4){
            mui(this).button('reset'); 
            mui.alert('请输入验证码', GlobalAppName, function() {});
            return false;
        }
        if(c_mobile=="" || mobile != c_mobile){
          mui(this).button('reset'); 
          mui.alert('验证码错误', GlobalAppName, function() {});
            return false;
        }
        var obj = this;
         
        $("#registerForm").ajaxSubmit({
            dataType:'json',
            success:function(data){
                mui(obj).button('reset');    
                if(data.code==''){
                    mui.alert('注册成功', GlobalAppName, function() {
                      window.location.href = data.url;
                    });
                    
                    return false;
                }
                  
                mui.alert(data.code, GlobalAppName, function() {});
        }}); 
  });
  
             //////////
             $(document).on('click','#obtainNum',function(){
                var mobile = $("input[name='mobile']").val().trim();
                var time=90;
                var code=$(this);
                if(!isMobil(mobile)){
                    mui.alert('手机号不能为空或格式不正确', GlobalAppName, function() {});
                    return;
                }
                c_mobile = mobile;
                gbGetCodeCount(this);
                $.ajax({
                        url:$(this).attr("data-url"), 
                        data:{mobile:mobile,from:'register'},
                        type:'post',
                        success:function(re){
                           mui.alert(re, GlobalAppName, function() {});
                        }
                });
            });