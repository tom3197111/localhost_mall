<head>
	<link rel="shortcut icon" href="http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/{{$data[0]->Company_log}}" type="image/x-icon" />
</head>
@extends('layouts.proceed_to_checkout.home')

<body>

@include('layouts.proceed_to_checkout.login') 

@include('layouts.common.sign_up_page')

@include('layouts.proceed_to_checkout.order')

@include('layouts.common.coupons')

<!-- footer -->
@include('layouts.common.footer')

<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>


@include('layouts.proceed_to_checkout.order_modal_fade') 



</body>
</html>
