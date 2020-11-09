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
