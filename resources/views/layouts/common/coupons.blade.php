<div class="coupons">
		<div class="coupons-grids text-center">
			<div class="w3layouts_mail_grid">
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-truck" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
				@foreach($baneer as $k => $v)
            		@if($k == 13)
						<h3>{{$v->banner_content_one}}</h3>
						<p>{{$v->banner_content_two}}</p>
					</div>
					@endif
            	@endforeach
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-headphones" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
				@foreach($baneer as $k => $v)
            		@if($k == 14)
						<h3>{{$v->banner_content_one}}</h3>
						<p>{{$v->banner_content_two}}</p>
					</div>
					@endif
            	@endforeach
				</div>
				<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-shopping-bag" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
				@foreach($baneer as $k => $v)
            		@if($k == 15)
						<h3>{{$v->banner_content_one}}</h3>
						<p>{{$v->banner_content_two}}</p>
					</div>
					@endif
            	@endforeach
				</div>
					<div class="col-md-3 w3layouts_mail_grid_left">
					<div class="w3layouts_mail_grid_left1 hvr-radial-out">
						<i class="fa fa-gift" aria-hidden="true"></i>
					</div>
					<div class="w3layouts_mail_grid_left2">
				@foreach($baneer as $k => $v)
            		@if($k == 16)
						<h3>{{$v->banner_content_one}}</h3>
						<p>{{$v->banner_content_two}}</p>
					</div>
					@endif
            	@endforeach
				</div>
				<div class="clearfix"> </div>
			</div>

		</div>
</div>

