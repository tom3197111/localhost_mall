<!DOCTYPE html>
<html>
<head>
<title>{{$data[0]->Company_name}}</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates,
" />
<script type="text/javascript" src="{{asset('js/5ab83813e2.js')}}"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- checkout -->
<link rel="stylesheet" href="{{asset('css/order/core-style.css')}}">
<!-- commodity_list -->
<link rel="stylesheet" type="text/css" href="{{asset('css/jquery-ui.css')}}">
<!--//tags -->
<link href="{{asset('css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('css/font-awesome.css')}}" rel="stylesheet" type='text/css' >
<link href="{{asset('css/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css'/>
<!-- alert -->
<link href="{{asset('alertify/css/alertify.min.css')}}" rel='stylesheet' type='text/css'/>
<link href="{{asset('alertify/css/themes/default.min.css')}}" rel='stylesheet' type='text/css'/>
<script type="text/javascript" src="{{asset('js/jquery-2.1.4.min.js')}}"></script>
<!-- //for bootstrap working -->
<link href="{{asset('css/OpenSans.css')}}" rel="stylesheet">
<link href="{{asset('css/italic.css')}}" rel='stylesheet' type='text/css'>

<!-- account -->
<script type="text/javascript" src="{{asset('js/account/ajax.js')}}"></script>
<script type="text/javascript" src="{{asset('js/account/account.js')}}"></script>
<!-- alert -->
<script type="text/javascript" src="{{asset('alertify/alertify.min.js')}}"></script>
<!-- TWzipcode -->
<script type="text/javascript" src="{{asset('js/TWzipcode/jquery.twzipcode.min.js')}}"></script>
<!-- //js -->
<script type="text/javascript" src="{{asset('js/modernizr.custom.js')}}"></script>
	<!-- Custom-JavaScript-File-Links -->
<!-- script for responsive tabs -->
<script type="text/javascript" src="{{asset('js/easy-responsive-tabs.js')}}"></script>
<!-- orer -->
<script type="text/javascript" src="{{asset('js/order/order.js')}}"></script>
<!-- Product -->
<script type="text/javascript" src="{{asset('js/Product_list/Product.js')}}"></script>
<!-- cart -->
<script type="text/javascript" src="{{asset('js/cart/jquery.mycart.js')}}"></script>
<script type="text/javascript" src="{{asset('js/cart/control_cart.js')}}"></script>

<script type="text/javascript" src="{{asset('js/commodity/responsiveslides.min.js')}}"></script>
				<script>
						// You can also use "$(window).load(function() {"
						$(function () {
						 // Slideshow 4
						$("#slider3").responsiveSlides({
							auto: true,
							pager: true,
							nav: false,
							speed: 500,
							namespace: "callbacks",
							before: function () {
						$('.events').append("<li>before event fired.</li>");
						},
						after: function () {
							$('.events').append("<li>after event fired.</li>");
							}
							});
						});
				</script>
<!-- here stars scrolling icon -->
	<script type="text/javascript">
		$(document).ready(function() {
			/*
				var defaults = {
				containerID: 'toTop', // fading element id
				containerHoverID: 'toTopHover', // fading element hover id
				scrollSpeed: 1200,
				easingType: 'linear' 
				};
			*/
								
			$().UItoTop({ easingType: 'easeOutQuart' });
								
			});
	</script>
<script>
	$(document).ready(function () {
	$('#horizontalTab').easyResponsiveTabs({
	type: 'default', //Types: default, vertical, accordion
	width: 'auto', //auto or any width like 600px
	fit: true,   // 100% fit in a container
	closed: 'accordion', // Start closed if in accordion view
	activate: function(event) { // Callback function if tab is switched
	var $tab = $(this);
	var $info = $('#tabInfo');
	var $name = $('span', $info);
	$name.text($tab.text());
	$info.show();
	}
	});
	$('#verticalTab').easyResponsiveTabs({
	type: 'vertical',
	width: 'auto',
	fit: true
	});
	});
</script>
<!-- //script for responsive tabs -->
<!-- stats -->

	<script src="{{asset('js/jquery.waypoints.min.js')}}"></script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('js/move-top.js')}}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

<!-- for bootstrap working -->
<script type="text/javascript" src="{{asset('js/bootstrap.js')}}"></script>
  <style>
  .badge-notify{
    background:red;
    position:relative;
    top: 0px;
    right: -10px;
  }
  .my-cart-icon-affix {
    position: fixed;
    top: 0px;
    right: 0px;
    z-index: 999;
  }
  </style>
</head>
