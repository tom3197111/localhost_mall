<!--
author: xmoban.cn
Author URL: http://www.xmoban.cn
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
-->
<!DOCTYPE html>
<html>
<head>
<title>Elite Shoppy an Ecommerce Online Shopping Category Flat Bootstrap Responsive Website Template | Home :: xmoban.cn</title>
<!--/tags -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Elite Shoppy Responsive web template, Bootstrap Web Templates, Flat Web Templates,
" />
<script type="text/javascript" src="{{asset('publicpublicpublic/js/5ab83813e2.js')}}"></script>
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
        function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- checkout -->
<link rel="stylesheet" href="/css/order/core-style.css">
<!--//tags -->
<link href="{{asset('publicpublicpublic/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('publicpublicpublic/css/style.css')}}" rel="stylesheet" type="text/css" media="all" />
<link href="{{asset('publicpublicpublic/css/font-awesome.min.css')}}" rel="stylesheet">
<link href="{{asset('publicpublicpublic/css/easy-responsive-tabs.css')}}" rel='stylesheet' type='text/css'/>
<!-- alert -->
<link href="{{asset('publicpublicpublic/alertify/css/alertify.min.css')}}" rel='stylesheet' type='text/css'/>
<link href="{{asset('publicpublicpublic/alertify/css/themes/default.min.css')}}" rel='stylesheet' type='text/css'/>
<!-- //for bootstrap working -->
<link href="{{asset('publicpublicpublic/css/OpenSans.css')}}" rel="stylesheet">
<link href="{{asset('publicpublicpublic/css/italic.css')}}" rel='stylesheet' type='text/css'>
<!-- js -->
<script type="text/javascript" src="{{asset('publicpublicpublic/js/jquery-2.1.4.min.js')}}"></script>
<!-- account -->
<script type="text/javascript" src="{{asset('publicpublicpublic/js/account/ajax.js')}}"></script>
<script type="text/javascript" src="{{asset('publicpublicpublic/js/account/account.js')}}"></script>
<!-- alert -->
<script type="text/javascript" src="{{asset('publicpublicpublic/alertify/alertify.min.js')}}"></script>
<!-- TWzipcode -->
<script type="text/javascript" src="{{asset('publicpublicpublic/js/TWzipcode/jquery.twzipcode.min.js')}}"></script>
<!-- commodity.js -->
<script type="text/javascript" src="{{asset('publicpublicpublic/js/cart/jquery.mycart.js')}}"></script>

<script type="text/javascript" src="{{asset('publicpublicpublic/js/cart/control_cart.js')}}"></script>
<!-- //js -->
<script src="{{asset('publicpublicpublic/js/modernizr.custom.js')}}"></script>
	<!-- Custom-JavaScript-File-Links -->
<!-- script for responsive tabs -->
<script src="{{asset('publicpublicpublic/js/easy-responsive-tabs.js')}}"></script>
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

	<script src="{{asset('publicpublicpublic/js/jquery.waypoints.min.js')}}"></script>
<!-- //stats -->
<!-- start-smoth-scrolling -->
<script type="text/javascript" src="{{asset('publicpublicpublic/js/move-top.js')}}"></script>
<script type="text/javascript">
	jQuery(document).ready(function($) {
		$(".scroll").click(function(event){
			event.preventDefault();
			$('html,body').animate({scrollTop:$(this.hash).offset().top},1000);
		});
	});
</script>

<!-- for bootstrap working -->
<script type="text/javascript" src="{{asset('publicpublicpublic/js/bootstrap.js')}}"></script>
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
