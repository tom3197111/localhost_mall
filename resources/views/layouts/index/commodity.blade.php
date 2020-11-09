<!-- /new_arrivals -->

	<div class="new_arrivals_agile_w3ls_info">
		<div class="container">
		    <h3 class="wthree_text_info"><span  style="color:red;">全館熱賣中</span> </h3>
				<div id="horizontalTab">

						<ul class="resp-tabs-list">
							@foreach($Category as $k=>$v)
							 	@if( $v->cate_pid != 0)
								<li>{{$v->cate_name}}</li>
								@endif
							@endforeach
                        </ul>

					<div class="resp-tabs-container">
					<!--/tab_one-->
				@foreach($Category as $k=>$v)
					@if( $v->cate_pid != 0)
						<div class="tab{{$v->cate_id}}">
					
							@foreach($commodity as $k =>$commodity_list)
	                        	@if($v->cate_id==$commodity_list->cate_id)
			                        <?php
				                        $String = $commodity_list->file_upload;
				                        $url=$_SERVER['SERVER_NAME']."\localhost_MALL_BACKEND\\".$String;
				                        // str_replace("public\\",$_SERVER['SERVER_NAME'], $String);
			                        ?><h1>{{$url}}<h1>
							<div class="col-md-3 product-men">
								<div class="men-pro-item simpleCart_shelfItem">
									<div class="men-thumb-item">
										<img src="{{$url}}" alt="" class="pro-image-front">
										<img src="{{$url}}" alt="" class="pro-image-back">
											<div class="men-cart-pro">
												<div class="inner-men-cart-pro">
													<a href="single.html" class="link-product-add-cart">Quick View</a>
												</div>
											</div>
											@if($commodity_list->special == 1 )
											<span class="product-new-top">New</span>
	                        				@endif
									</div>
									<div class="item-info-product ">
										<h4><a href="single.html">{{$commodity_list->art_title}}</a></h4>
										<div class="info-product-price">
											<span class="item_price">${{$commodity_list->art_price}}</span>
                                            <?php
                                            $price = $commodity_list->art_price+$commodity_list->art_price*0.2;
                                            ?>
											<del>${{$price}}</del>
										</div>
										<div class="snipcart-details top_brand_home_details item_add single-item hvr-outline-out button2">
											
												<fieldset>
													<input type="submit" name="submit" data-quantity="1" data-price="{{$commodity_list->art_price}}" data-image="{{$url}}" data-summary="{{$commodity_list->art_description}}" data-name="{{$commodity_list->art_title}}" data-id="{{$commodity_list->art_id}}" value="加入購物車" class="button my-cart-btn my-cart-btn_button" />
												</fieldset>
											
										</div>
									</div>
								</div>
							</div>
								@endif
   						 	@endforeach
							<div class="clearfix"></div>
						</div>
					@endif
				@endforeach
					</div>
				</div>
</div>