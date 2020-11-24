
<!--/single_page-->
       <!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>商品 <span>介紹 </span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="index.html">首頁</a><i>|</i></li>
								<li>商品</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>
<input type="hidden" id='_token' name="_token" value="{{ csrf_token() }}">
  <!-- banner-bootom-w3-agileits -->
<div class="banner-bootom-w3-agileits">
	<div class="container">
	     <div class="col-md-4 single-right-left ">
			<div class="grid images_3_of_2">
				<div class="flexslider">
					<?php
				        $String = $Product[0]->file_upload;
				        $url='http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/'.$String;
			        ?>
					<ul class="slides">
						<li data-thumb="{{$url}}">
							<div class="thumb-image"> <img src="{{$url}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
						<li data-thumb="{{$url}}">
							<div class="thumb-image"> <img src="{{$url}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>	
						<li data-thumb="{{$url}}">
							<div class="thumb-image"> <img src="{{$url}}" data-imagezoom="true" class="img-responsive"> </div>
						</li>
					</ul>
					<div class="clearfix"></div>
				</div>	
			</div>
		</div>
		<div class="col-md-8 single-right-left simpleCart_shelfItem">
					<h3>{{$Product[0]->art_title}}</h3>
					<p><span class="item_price">${{$Product[0]->art_price}}</span> <del>- ${{$Product[0]->art_price+100}}</del></p>
<!-- 					<div class="rating1">
						<span class="starRating">
							<input id="rating5" type="radio" name="rating" value="5">
							<label for="rating5">5</label>
							<input id="rating4" type="radio" name="rating" value="4">
							<label for="rating4">4</label>
							<input id="rating3" type="radio" name="rating" value="3" checked="">
							<label for="rating3">3</label>
							<input id="rating2" type="radio" name="rating" value="2">
							<label for="rating2">2</label>
							<input id="rating1" type="radio" name="rating" value="1">
							<label for="rating1">1</label>
						</span>。
					</div> -->
	<!-- 				<div class="description">
						<h5>Check delivery, payment options and charges at your location</h5>
						 <form action="#" method="post">
						<input type="text" value="Enter pincode" onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Enter pincode';}" required="">
						<input type="submit" value="Check">
						</form>
					</div> -->
<!-- 					<div class="color-quality">
						<div class="color-quality-right">
							<h5>購買數量 :</h5>
							<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
								@for ($i = 0; $i < 10; $i++)
								<option value="$i">{{$i}}</option>
								@endfor
					
							</select>
						</div>
					</div> -->
	<!-- 				<div class="occasional">
						<h5>Types :</h5>
						<div class="colr ert">
							<label class="radio"><input type="radio" name="radio" checked=""><i></i>Casual Shoes</label>
						</div>
						<div class="colr">
							<label class="radio"><input type="radio" name="radio"><i></i>Sneakers </label>
						</div>
						<div class="colr">
							<label class="radio"><input type="radio" name="radio"><i></i>Formal Shoes</label>
						</div>
						<div class="clearfix"> </div>
					</div> -->
					<div class="occasion-cart">
						<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
												<fieldset>
													<input type="submit" name="submit" data-quantity="1" data-price="{{$Product[0]->art_price}}" data-image="{{$url}}" data-summary="{{$Product[0]->art_description}}" data-name="{{$Product[0]->art_title}}" data-id="{{$Product[0]->art_id}}" value="加入購物車" class="button my-cart-btn  my-cart-btn_button" />
												</fieldset>
														</div>
																			
					</div>
					<ul class="social-nav model-3d-0 footer-social w3_agile_social single_page_w3ls">
						                                   <li class="share">Share On : </li>
															<li><a href="#" class="facebook">
																  <div class="front"><i class="fa fa-facebook" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-facebook" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="twitter"> 
																  <div class="front"><i class="fa fa-twitter" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-twitter" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="instagram">
																  <div class="front"><i class="fa fa-instagram" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-instagram" aria-hidden="true"></i></div></a></li>
															<li><a href="#" class="pinterest">
																  <div class="front"><i class="fa fa-linkedin" aria-hidden="true"></i></div>
																  <div class="back"><i class="fa fa-linkedin" aria-hidden="true"></i></div></a></li>
														</ul>
					
		      </div>
	 			<div class="clearfix"> </div>
				<!-- /new_arrivals --> 
	<div class="responsive_tabs_agileits"> 
				<div id="horizontalTab">
						<ul class="resp-tabs-list">
							<li>描述</li>
							<!-- <li>Reviews</li> -->
							<li>規格</li>
						</ul>
					<div class="resp-tabs-container">
					<!--/tab_one-->
					   <div class="tab1">

							<div class="single_page_agile_its_w3ls">
							  <!-- <h6>描述</h6> -->
							   <p>{{$Product[0]->art_description}}</p>
							   <p class="w3ls_para">b</p>
							</div>
						</div>
						<!--//tab_one-->
<!-- 						<div class="tab2">
							
							<div class="single_page_agile_its_w3ls">
								<div class="bootstrap-tab-text-grids">
									<div class="bootstrap-tab-text-grid">
										<div class="bootstrap-tab-text-grid-left">
											<img src="images/t1.jpg" alt=" " class="img-responsive">
										</div>
										<div class="bootstrap-tab-text-grid-right">
											<ul>
												<li><a href="#">Admin</a></li>
												<li><a href="#"><i class="fa fa-reply-all" aria-hidden="true"></i> Reply</a></li>
											</ul>
											<p>Lorem ipsum dolor sit amet, consectetur adipisicing elPellentesque vehicula augue eget.Ut enim ad minima veniam, quis nostrum exercitationem ullam corporis 
												suscipit laboriosam, nisi ut aliquid ex ea commodi consequatur? Quis autem 
												vel eum iure reprehenderit.</p>
										</div>
										<div class="clearfix"> </div>
						             </div>
									 <div class="add-review">
										<h4>add a review</h4>
										<form action="#" method="post">
												<input type="text" name="Name" required="Name">
												<input type="email" name="Email" required="Email"> 
												<textarea name="Message" required=""></textarea>
											<input type="submit" value="SEND">
										</form>
									</div>
								 </div>
								 
							 </div>
						 </div> -->
						   <div class="tab3">

							<div class="single_page_agile_its_w3ls">
							  <h6>規格</h6>
							   <p>
							   	
							   	 {!!$Product[0]->art_content!!}
							   	
							   </p>
							   <p class="w3ls_para">a</p>
							</div>
						</div>
					</div>
				</div>	
			</div>
	<!-- //new_arrivals --> 
	  	<!--/slider_owl-->
	
			
 </div>
<!--//single_page-->



<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
<!-- js -->

