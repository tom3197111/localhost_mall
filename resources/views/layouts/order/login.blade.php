
<!-- header -->
<div class="header" id="home">
	<div class="container">
		<ul>
			@if(!session()->has('account'))
			    <li> <a href="#" data-toggle="modal" data-target="#myModal"><i class="fa fa-unlock-alt" aria-hidden="true"></i> 登入 </a></li>
				<li> <a href="#" data-toggle="modal" data-target="#myModal2"><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 註冊 </a></li>
			@elseif(session()->has('account'))
				<li> <a id='user_data_list' href="#" data-toggle="modal" data-target="#myModal3"><i class="fa fa-unlock-alt" aria-hidden="true"></i> 會員資料 </a></li>
				<li> <a href="{{url('user/auth/Sign_out')}}" data-toggle="modal" ><i class="fa fa-pencil-square-o" aria-hidden="true"></i> 登出 </a></li>
			@endif
			<li><i class="fa fa-phone" aria-hidden="true"></i>Call :{{$data[0]->Company_phone}} </li>
			<li><i class="fa fa-envelope-o" aria-hidden="true"></i> <a href="mailto:{{$data[0]->Company_email}}">{{$data[0]->Company_email}}</a></li>
		</ul>
	</div>
</div>
<!-- //header -->
<!-- header-bot -->
<div class="header-bot">
	<div class="header-bot_inner_wthreeinfo_header_mid">
		<div class="col-md-4 header-middle">
			<form action="#" method="post">
					<input type="search" name="search" placeholder="搜尋商品" required="">
					<input type="submit" value=" ">
				<div class="clearfix"></div>
			</form>
		</div>
		<!-- header-bot -->
			<div class="col-md-4 logo_agile">
				<h1><a href="index.html"><span><?php echo mb_substr($data[0]->Company_name,0,1,'utf-8') ?>
                </span><?php echo mb_substr($data[0]->Company_name,1,3,'utf-8') ?>
                <i class="fa fa-shopping-bag top_logo_agile_bag" aria-hidden="true"></i></a></h1>
			</div>
        <!-- header-bot -->
		<div class="col-md-4 agileits-social top_content">
						<ul class="social-nav model-3d-0 footer-social w3_agile_social">
						                                   <li class="share"></li>
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
								{{-- 							<li><a href="#" class="twitter">
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li> --}}
														</ul>



		</div>
		<div class="clearfix"></div>

	</div>
</div>
<!-- //header-bot -->
<!-- banner -->
<div class="ban-top">
	<div class="container">
		<div class="top_nav_left">
			<nav class="navbar navbar-default">
			  <div class="container-fluid">
				<!-- Brand and toggle get grouped for better mobile display -->
		 		<div class="navbar-header">
				  <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				</div> 
				<!-- Collect the nav links, forms, and other content for toggling -->
				<div class="collapse navbar-collapse menu--shylock" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav menu__list">
					<li class=" menu__item"><a class="menu__link" href="about.html">關於</a></li>
                    @foreach($Category as $k=>$v)

                    @if( $v->cate_pid == 0)
					<li class="dropdown menu__item">
						<a href="#" class="dropdown-toggle menu__link" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">{{$v->cate_name}}<span class="caret"></span></a>
                        @endif
							<ul class="dropdown-menu multi-column columns-3">
								<div class="agile_inner_drop_nav_info">
									<div class="col-sm-6 multi-gd-img1 multi-gd-text ">
										<a href="mens.html"><img src="{{asset('images/top2.jpg')}}" alt=" "/></a>
									</div>
									<div class="col-sm-3 multi-gd-img">
										<ul class="multi-column-dropdown">
                                        @foreach($Category as $value)
                                            @if($v->cate_id == $value->cate_pid)
											<li><a href="mens.html">{{$value->_cate_name}}</a></li>
                                            @endif
                                        @endforeach
{{-- 											<li><a href="mens.html">Wallets</a></li>
											<li><a href="mens.html">Footwear</a></li>
											<li><a href="mens.html">Watches</a></li>
											<li><a href="mens.html">Accessories</a></li>
											<li><a href="mens.html">Bags</a></li>
											<li><a href="mens.html">Caps & Hats</a></li> --}}
										</ul>
									</div>

								</div>
							</ul>
					</li>
                    @endforeach


					<li class=" menu__item"><a class="menu__link" href="contact.html">Contact</a></li>
				  </ul>
				</div>
			  </div>
			</nav>
		</div>
<!-- 購物車 -->
<!-- 		<div class="top_nav_right" style="display: none;">
			<div class="wthreecartaits wthreecartaits2 cart cart box_1">
				<button class="w3view-cart my-cart-icon" type="submit" name="submit" value="">
					<span class="badge badge-notify my-cart-badge"></span>
					<i class="fa fa-cart-arrow-down"  aria-hidden="true"></i>
				</button>
			</div>
		</div> -->
<!-- 購物車 -->
 <!--      <div style="float: right; cursor: pointer;">
        <span class="glyphicon glyphicon-shopping-cart my-cart-icon">
			<span class="badge badge-notify my-cart-badge"></span>
		</span> 
      </div> -->
<!-- 購物車 -->
		<div class="clearfix"></div>
	</div>
</div>
<!-- //banner-top -->