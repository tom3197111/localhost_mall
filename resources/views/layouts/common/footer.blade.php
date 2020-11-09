
<div class="footer">
	<div class="footer_agile_inner_info_w3l">
		<div class="col-md-3 footer-left">
			<h2><a href="index.html"><span><?php echo mb_substr($data[0]->Company_name,0,1,'utf-8') ?></span><?php echo mb_substr($data[0]->Company_name,1,3,'utf-8') ?></a></h2>
			<p>{{$data[0]->Company_introduction}}</p>

		</div>
		<div class="col-md-9 footer-right">
			<div class="sign-grds">
				<div class="col-md-4 sign-gd">
					<h4><?php echo mb_substr($baneer[17]->banner_content_one,0,1,'utf-8') ?> <span><?php echo mb_substr($baneer[17]->banner_content_one,1,10,'utf-8') ?></span> </h4>
					<ul>
						@foreach($Category as $k=>$v)
							@if($v->cate_pid==0)
						<li><a href="index.html">{{$v->cate_name}}</a></li>
							@endif
						@endforeach

					</ul>
				</div>

				<div class="col-md-5 sign-gd-two">
					<h4><?php echo mb_substr($baneer[17]->banner_content_two,0,1,'utf-8') ?> <span><?php echo mb_substr($baneer[17]->banner_content_two,1,10,'utf-8') ?></span></h4>
					<div class="w3-address">
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-phone" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Phone Number</h6>
								<p>{{$data[0]->Company_phone}}</p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-envelope" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Email Address</h6>
								<p>Email :<a href="mailto:{{$data[0]->Company_email}}"> {{$data[0]->Company_email}}</a></p>
							</div>
							<div class="clearfix"> </div>
						</div>
						<div class="w3-address-grid">
							<div class="w3-address-left">
								<i class="fa fa-map-marker" aria-hidden="true"></i>
							</div>
							<div class="w3-address-right">
								<h6>Location</h6>
								<p>{{$data[0]->Company_address}}

								</p>
							</div>
							<div class="clearfix"> </div>
						</div>
					</div>
				</div>
	
				
			</div>
		</div>
		
			<div class="agile_newsletter_footer">

		<div class="clearfix"></div>
	</div>
		<p class="copy-right">{{$data[0]->Company_name}} {{$data[0]->Company_All_rights_reserved}}<a href="{{$data[0]->Company_web}}">{{$data[0]->Company_web}}</a></p>
	</div>
</div>
<!-- //footer -->