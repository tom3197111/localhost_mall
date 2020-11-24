
<head>
	<link rel="shortcut icon" href="http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/{{$data[0]->Company_log}}" type="image/x-icon" />
</head>
@extends('layouts.common.home')

<body>
@include('layouts.common.login')

@include('layouts.common.sign_up_page')

@include('layouts.index.ad_wall')


@include('layouts.index.ad')
<!--/grids-->
<!-- ad -->
<!-- /ad -->
@include('layouts.index.commodity')
	<!-- /we-offer -->
@include('layouts.index.last_ad')
	<!-- //we-offer -->
<!--/grids-->
@include('layouts.common.coupons')
<!--grids-->
<!-- footer -->
@include('layouts.common.footer')

<!-- <a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a> -->


</body>
</html>
