<div class="col-md-12 col-xs-12 slider-header">
	<div id="myCarousel" class="carousel slide" data-ride="carousel">
		<div class="row">     

			<div class="col-md-8 col-sm-8 col-xs-12">

				<div class="carousel-inner margin-carousel">
					<?php foreach ($news_hot as $key => $value): ?>
						@if ($key == 0)
						<div class="item active">
							<a href="{{ route('news.show',['title_slug'=>$value->title_slug]) }}"><img src="{{ Storage::disk('local')->url($value->title_image) }}"></a>
							<div class="carousel-caption">
								<h4><a href="{{ route('news.show',['title_slug'=>$value->title_slug]) }}">{{ $value->title }}</a></h4>

								<p>{{ str_limit($value->description,$limit=150,$end = '...') }} <a class="label label-primary" href="{{ route('news.show',['title_slug'=>$value->title_slug]) }}" target="_blank">Xem thêm</a></p>

							</div>
						</div><!-- End Item -->
						@elseif ($key < 5)
						<div class="item">
							<a href="{{ route('news.show',['title_slug'=>$value->title_slug]) }}"><img src="{{ Storage::disk('local')->url($value->title_image) }}"></a>
							<div class="carousel-caption">
								<h4><a href="{{ route('news.show',['title_slug'=>$value->title_slug]) }}">{{ $value->title }}</a></h4>

								<p>{{ str_limit($value->description,$limit=150,$end = '...') }}<a class="label label-primary" href="{{ route('news.show',['title_slug'=>$value->title_slug]) }}" target="_blank">Xem thêm</a></p>

							</div>
						</div><!-- End Item -->
						@endif
					<?php endforeach ?>
				</div><!-- End Carousel Inner -->
			</div>
			<!-- List hot news -->
			<div class="col-md-4 col-sm-4 hidden-xs">
				<ul class="list-group">
					<?php foreach ($news_hot as $key => $value): ?>
						@if ($key == 0)
						<li data-target="#myCarousel" data-slide-to="{{ $key }}" class="list-group-item active"><a href="#">{{ $value->title }}</a></li>
						@elseif ($key < 5)
						<li data-target="#myCarousel" data-slide-to="{{ $key }}" class="list-group-item"><a>{{ $value->title }}</a></li>
						@endif
					<?php endforeach ?>
				</ul>
			</div>
		</div>

	</div><!-- End Carousel -->
</div>