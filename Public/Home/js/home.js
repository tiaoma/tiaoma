 
			var slider = mui("#slider");
			slider.slider({
						interval: 5000
					});
			mui('.mui-slider-item').on('tap','a',function(){  
			    location.href = this.getAttribute('href');
			})