$(function(){
	//登陆
	$(".ctp-submit-login").click(function(){		
		var url = $(this).closest('form').attr('action');
		var username = $("input[name='username']").val().trim();
		var password = $("input[name='password']").val().trim();
		var code = $("input[name='code']").val().trim();
		if(username.length<1){
			wcAlert('账户不能为空');
			return;
		}
		if(password.length<1){
			wcAlert('密码不能为空');
			return;
		}
		if(code.length<1 || code=='验证码:'){
			wcAlert('验证码不能为空');
			return;
		}
		$.ajax({
			url:url,
			type:'post',
			data:{password:password,username:username,code:code,isajax:1},
			dataType:'json',
			success:function(data){
				if(data.msg!='')
				{
					wcAlert(data.msg);
					return;
				}
				 window.location.href= data.url ;  
				
			}

		});
	});
});