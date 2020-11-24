<head>
	<link rel="shortcut icon" href="http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/{{$data[0]->Company_log}}" type="image/x-icon" />
</head>

@extends('layouts.Product_list.home')

<body>
@include('layouts.common.login')

@include('layouts.common.sign_up_page')
@include('layouts.Product_list.Product_list')
@include('layouts.index.commodity')
@include('layouts.common.coupons')
<!--grids-->
<!-- footer -->
@include('layouts.common.footer')

<!-- <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a> -->


</body>
</html>
