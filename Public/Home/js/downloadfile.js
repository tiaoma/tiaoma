var $$=jQuery.noConflict();
$$(function(){
	$$('body').on('tap', 'a',function(){
		$$.ajax({
                url : $$(this).attr("data-url"),
                data : {id:$$(this).attr("data-id")},
                type : "post",
                dataType : "json",
                success : function(b) {
                    if(b.code==0){                                                
                        mui.alert(b.msg, GlobalAppName, function() {});
                        return false;
                    }
                    
                    window.location.href=b.url;
                }
                });   
	});
});