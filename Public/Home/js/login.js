document.getElementById("submitLoginBtn").addEventListener('tap', function() {
		var password = $(".password").val().trim();
        var username = $(".username").val().trim();
        var loginurl = $(".loginurl").val().trim();
        
        mui(this).button('loading');

        if(!checkUsername(username)){       
            mui(this).button('reset');      
            mui.alert('请使用5~16位长度的数字、字母或数字+字母组合', GlobalAppName, function() {});
            return false;
        }
        if(!checkNumCodeRate(password)){
            mui(this).button('reset'); 
            mui.alert('使用数字加字母组合,6~16位长度', GlobalAppName, function() {});
            return false;
        }
        var obj = this;
        var success = function(response) { 
                 mui(obj).button('reset'); 
                if(response.code==''){
                     mui.alert('登录成功', GlobalAppName, function() {
                        window.location.href = response.url;
                     });
                     return;
                }else{
                    mui.alert(response.code, GlobalAppName, function() {});
                }                                   
            };
                //设置全局beforeSend
        $.ajaxSettings.beforeSend = function(xhr, setting) { 
                };
                //设置全局complete
        $.ajaxSettings.complete = function(xhr, status) { 
                }
        var ajax = function() {
                    //利用RunJS的Echo Ajax功能测试
            var url = loginurl;
                        //请求方式，默认为Get；
            var type = "post";
                        //预期服务器范围的数据类型
            var dataType = "json";
                        //发送数据
            var data = {
                        password: password,
                        username: username
                };             
                         
            $.post(url, data, success, dataType);
        };
        ajax();

});

               