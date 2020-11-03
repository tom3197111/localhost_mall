	
	<!-- //banner -->
    <div class="banner_bottom_agile_info">
	    <div class="container">
            <div class="banner_bottom_agile_info_inner_w3ls">
                 @foreach($baneer as $k => $v)
                    @if($k >= 4 && $k <=5 )
    	           <div class="col-md-6 wthree_banner_bottom_grid_three_left1 grid">
						<figure class="effect-roxy">
							<img src="{{$v->banner_url}}" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>{{$v->banner_content_one}}</span>{{$v->banner_content_two}}</h3>
								<p>{{$v->banner_content_three}}</p>
                                <a class="hvr-outline-out button2" href="mens.html">{{$v->banner_content_four}}</a>
							</figcaption>
						</figure>
					</div>
                    @endif
                @endforeach
					<div class="clearfix"></div>
		    </div>
		 </div>
    </div>
	<!-- schedule-bottom -->
	<div class="schedule-bottom">
		<div class="col-md-6 agileinfo_schedule_bottom_left">
			<img href="{{asset('images/mid.jpg')}}" alt=" " class="img-responsive" />
		</div>
		<div class="col-md-6 agileits_schedule_bottom_right">
			<div class="w3ls_schedule_bottom_right_grid">
				<h3>Save up to <span>50%</span> in this week</h3>
				<p>Suspendisse varius turpis efficitur erat laoreet dapibus.
					Mauris sollicitudin scelerisque commodo.Nunc dapibus mauris sed metus finibus posuere.</p>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-user-o" aria-hidden="true"></i>
					<h4>Customers</h4>
					<h5 class="counter">653</h5>
				</div>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-calendar-o" aria-hidden="true"></i>
					<h4>Events</h4>
					<h5 class="counter">823</h5>
				</div>
				<div class="col-md-4 w3l_schedule_bottom_right_grid1">
					<i class="fa fa-shield" aria-hidden="true"></i>
					<h4>Awards</h4>
					<h5 class="counter">45</h5>
				</div>
				<div class="clearfix"> </div>
			</div>
		</div>
		<div class="clearfix"> </div>
	</div>
<!-- //schedule-bottom -->
  <!-- banner-bootom-w3-agileits -->
	<div class="banner-bootom-w3-agileits">
	<div class="container">
        @foreach($baneer as $k => $v)
            @if($k == 6 )
		<h3 class="wthree_text_info">{{$v->banner_content_one}} <span>{{$v->banner_content_two}}</span></h3>
            @endif
        @endforeach

		<div class="col-md-5 bb-grids bb-left-agileits-w3layouts">
        @foreach($baneer as $k => $v)
            @if($k == 7)
			<a href="womens.html">
			   <div class='{{$v->banner_class}}'>
					<figure class="effect-roxy">
							<img src='{{$v->banner_url}}' alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>{{$v->banner_content_one}}</span>{{$v->banner_content_two}}</h3>
								<p>{{$v->banner_content_three}}</p>
							</figcaption>
						</figure>
			    </div>
			</a>
            @endif
        @endforeach
		</div>
		<div class="col-md-7 bb-grids bb-middle-agileits-w3layouts">
            @foreach($baneer as $k => $v)
            @if($k == 8 || $k == 9)
		      <a href="{{$v->banner_url}}">
		       <div class="bb-middle-agileits-w3layouts grid">
			           <figure class="effect-roxy">
							<img src="{{$v->banner_url}}" alt=" " class="img-responsive" />
							<figcaption>
								<h3><span>{{$v->banner_content_one}}</span>{{$v->banner_content_two}} </h3>
								<p>{{$v->banner_content_three}}</p>
							</figcaption>
						</figure>
		        </div>
				</a>
            @endif
            @endforeach
		<div class="clearfix"></div>
	</div>
	</div>
    </div>
<!--/grids-->
      <div class="agile_last_double_sectionw3ls">
            @foreach($baneer as $k => $v)
            @if($k == 10 || $k == 11)
            <div class="col-md-6 multi-gd-img multi-gd-text ">
					<a href="womens.html"><img src="{{$v->banner_url}}" alt=" "><h4>{{$v->banner_content_one}} <span>{{$v->banner_content_two}}</span> {{$v->banner_content_three}}</h4></a>
			</div>
            @endif
            @endforeach
			<div class="clearfix"></div>
	   </div>