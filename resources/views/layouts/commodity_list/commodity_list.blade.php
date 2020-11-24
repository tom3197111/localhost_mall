
<input type="hidden" name="_token" id="_token" value="{{ csrf_token() }}">

<!-- /banner_bottom_agile_info -->
<div class="page-head_agile_info_w3l">
		<div class="container">
			<h3>分類 <span>列表</span></h3>
			<!--/w3_short-->
				 <div class="services-breadcrumb">
						<div class="agile_inner_breadcrumb">

						   <ul class="w3_short">
								<li><a href="../localhost_mall">首頁</a><i>|</i></li>
								<li>分類列表</li>
							</ul>
						 </div>
				</div>
	   <!--//w3_short-->
	</div>
</div>

  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
         <!-- mens -->
		<div class="col-md-4 products-left">
			<div class="css-treeview">
				<h4>商品分類</h4>
				<?php
				$key=0;
				?>
				<ul class="tree-list-pad">
				@foreach($Category as $k=>$v)

					@if( $v->cate_pid == 0)
					<li><input type="checkbox"  id="item-{{$key}}" /><label for="item-{{$key}}"><i class="fa fa-long-arrow-right" aria-hidden="true"></i> {{$v->cate_name}}</label>
						@endif
						<ul>@foreach($Category as $value)
								@if($v->cate_id == $value->cate_pid)
							<li><input type="checkbox" id="item-{{$key}}-0" /><label for="item-{{$key}}-0"><i class="fa fa-long-arrow-right" aria-hidden="true"></i>{{$value->_cate_name}}</label>
								<ul>
									@foreach($commodity as $com)
										@if($value->cate_id == $com->cate_id)
											<li style="cursor: pointer;" onclick="Product('{{$com->art_id}}')"><label>{{$com->art_title}}</label></li>
										@endif
									@endforeach
								</ul>
							</li>
				<?php
				$key++;
				?>
							    @endif



                            @endforeach
						</ul>
					</li>

				@endforeach

				</ul>
			</div>
<!-- 			<div class="community-poll">
				<h4>Community Poll</h4>
				<div class="swit form">	
					<form>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio" checked=""><i></i>More convenient for shipping and delivery</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Lower Price</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Track your item</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Bigger Choice</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>More colors to choose</label> </div></div>	
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Secured Payment</label> </div></div>
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Money back guaranteed</label> </div></div>	
					<div class="check_box"> <div class="radio"> <label><input type="radio" name="radio"><i></i>Others</label> </div></div>		
					<input type="submit" value="SEND">
					</form>
				</div>
			</div> -->
			<div class="clearfix"></div>
		</div>
		<div class="col-md-8 products-right">
<!-- 			<div class="sort-grid">
				<div class="sorting">
					<h6>Sort By</h6>
					<select id="country1" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">Default</option>
						<option value="null">Name(A - Z)</option> 
						<option value="null">Name(Z - A)</option>
						<option value="null">Price(High - Low)</option>
						<option value="null">Price(Low - High)</option>	
						<option value="null">Model(A - Z)</option>
						<option value="null">Model(Z - A)</option>					
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="sorting">
					<h6>Showing</h6>
					<select id="country2" onchange="change_country(this.value)" class="frm-field required sect">
						<option value="null">7</option>
						<option value="null">14</option> 
						<option value="null">28</option>					
						<option value="null">35</option>								
					</select>
					<div class="clearfix"></div>
				</div>
				<div class="clearfix"></div>
			</div> -->
			<div class="men-wear-top">
				
				<div  id="top" class="callbacks_container">
					<ul class="rslides" id="slider3">
				@foreach($Category as $k=>$v)
					@if($v->cate_pid==0)
						<li>
							<div class="men-wear-bottom">
								<div class="col-sm-4 men-wear-left">
									<img class="img-responsive" src="http://www.fishing-tackle-mall.com/localhost_MALL_BACKEND/{{$v->file_upload}}" alt=" " />
								</div>
							</div>
														<div class="col-sm-8 men-wear-right">
									<h4>{{$v->cate_name}}<span>{{$v->cate_title}}</span></h4>
									<p>{{$v->cate_description}}</p>
								</div>

								<div class="clearfix"></div>
						</li>
					@endif
				@endforeach


					</ul>
				</div>
				<div class="clearfix"></div>
			</div>
			<div class="men-wear-bottom">
				<div class="imgg col-sm-4 men-wear-left">

				</div>
				<div class="imtb col-sm-8 men-wear-right">
		
				</div>

				<div class="clearfix"></div>
								<div class="buy col-md-4 product-men">
						
							
						
						<div class="clearfix"></div>
				</div>
			</div>


	</div>

</div>	
<!-- //mens -->




<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>
