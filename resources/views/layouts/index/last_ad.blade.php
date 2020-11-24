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
<a href="#home" class="scroll" id="toTop" style="display: block;"> <span id="toTopHover" style="opacity: 1;"> </span></a>

