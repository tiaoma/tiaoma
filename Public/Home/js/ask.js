$(function(){
	$(".submitBtn").click(function(){
		var reason = $(".reason").val().trim();
		var mobile = $(".mobile").val().trim();
		if(!isMobil(mobile)){
            mui.alert('手机号格式不正确', GlobalAppName, function() {});
            return false;
        }
        if(reason.length<1){        
          mui.alert('请填写咨询内容', GlobalAppName, function() {});
         return false;
        }
		$.ajax({
                url : $(this).attr("data-url"),
                data : {reason:reason,mobile:mobile},
                type : "post",
                dataType : "json",
                success : function(b) {
                    if(b.code==1){            
                        $(".reason").val('');                        
                    }
                    mui.alert(b.msg, GlobalAppName, function() {});
                }
                });    
	});
});