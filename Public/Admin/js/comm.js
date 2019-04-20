function wcAlert(msg,type)
{
	var css = type==undefined?' alert-danger':' alert-success';
	var html = '<div class="wc-alert-box">';
 		html +='<div class="cont">';	
 		html +='<div class="alert '+css+'">'+msg+'</div>';
 		html +='</div>';
 		html +='</div>';
 	$('.wc-alert-box').remove();
 	$('body').append(html);
 	
 	$('.wc-alert-box').animate({top:'200px'},300);
 	setTimeout(function(){
 		$('.wc-alert-box').animate({top:'-200px'},300,function(){
 			$(this).remove();
 		});
 	},3000);
 	return false;
}
 