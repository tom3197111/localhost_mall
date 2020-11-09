@foreach($baneer as $k => $v)
    @if($k == 12)
		<div class="sale-w3ls">
			<div class="container">
				<h6>{{$v->banner_content_one}}</h6>

				<a class="hvr-outline-out button2" href="single.html">{{$v->banner_content_four}}</a>
			</div>
		</div>
    @endif
@endforeach

