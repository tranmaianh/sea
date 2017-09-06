@extends('templates.main')

@section('content')
<content>
	<!-- contet -->
	<div id="page" class="main-page-news">
		<div class="container">
			<div class="row">
				<!--tintuc-left -->
				<div class="left-fix">
					<div class="col-md-9 col-sm-12 col-xs-12">
						<div class="left-block">
							<!-- ./nav news -->
							<div class="news-content">
								<ul class="breadcrumb">
									<li><a href="#">Trang chủ</a></li>
									<li><a href="#" class="active">Tin tức</a></li>
								</ul>
								<div class="row">
									<div class="col-md-12 col-sm-12 col-xs-12">
										<div class="tintuc_left">
											<div class="link-block">
												<a href="# " class="tintuc left-news ">Danh sách tin tức</a>
												<div class="border-bottom "></div>
											</div>
											@if (count($news) == 0)
											Không có dữ liệu
											@else
											<div class="form-left top-block">
												<!-- ./row-1 -->
												<div class="list-news">
													<div class="row">
														<div class="col-md-4 col-sm-4 col-xs-5">
															<div class="img-list-news">
																<a href=""><img src="{{ Storage::disk('local')->url($news[0]->title_image) }}" alt=""></a>
															</div>
														</div>
														<div class="col-md-8 col-sm-8 col-xs-7">
															<div class="box-info">
																<h2>
																	<a href="{{ route('news.show',['title_slug'=>$news[0]->title_slug]) }}">{{ $news[0]->title }}</a>
																</h2>
																<span class="update-time" datetime="2017-08-28 00:30:00">{{ Carbon\Carbon::parse($news[0]->posted_at)->format('d/m/Y') }}</span>
																<br>
																<span class="text">{{ str_limit($news[0]->description,$limit=200,$end='...') }}</span>
															</div>
															<div class="news-more">
																<div class="box-news">
																	<div class="title">
																		<h3>
																			<strong>Mục tin tức của VSA</strong>
																		</h3>
																	</div>
																	<div class="list-block ">
																		<ul class="tintuc-list ">
																			<?php foreach ($news_news as $key => $value): ?>
																				<li>
																				<a href="{{ route('news.show',['title_slug'=>$value->title_slug]) }}" title=" "><i class="fa fa-plus-circle "></i>{{ str_limit($value->description,$limit=30,$end='...') }}
																					</a>
																				</li>
																			<?php endforeach ?>
																			<!-- <li><a href="# " title=" "><i class="fa fa-plus-circle "></i>Kiến nghị Chính phủ cho dừng nhận chìm một các...</a></li> -->
																		</ul>
																	</div>
																</div>
															</div>
														</div>
													</div>
												</div>
												<!-- ./row-2 -->
												<div class="list-news2">
													<div class="row">
														<?php foreach ($news as $key => $value): ?>
														@if ($key>0)
														<div class="col-md-6 col-sm-6 col-xs-12">
														<div class="items-news">
															<div class="row">
																<div class="col-md-4 col-sm-4 col-xs-5">
																	<div class="img-list-news">
																		<a href="{{route('news.show',['title_slug'=>$value->title_slug]) }}"><img src="{{ Storage::disk('local')->url($value->title_image) }}" alt=""></a>
																	</div>
																</div>
																<div class="col-md-8 col-sm-8 col-xs-7">
																	<div class="box-info">
																		<h2>
																			<a href="{{ route('news.show',['title_slug'=>$value->title_slug]) }}" title="{{$value->title}}">{{ str_limit($value->title,$limit=40,$end='...') }}</a>
																		</h2>
																		<span class="update-time" datetime="2017-08-28 00:30:00">{{ Carbon\Carbon::parse($value->posted_at)->format('d/m/Y') }}</span>
																		<br>
																		<span class="text">{{ str_limit($value->description,$limit=100,$end='...') }}</span>
																	</div>
																</div>
															</div>
														</div>
														</div>
														@endif
														<?php endforeach ?>
													</div>
												</div>
												<!-- ./row-3 -->
												<div class="">
													<ul class="pager">
														<li><a href="{{$news->previousPageUrl()}}">&larr; Quay lại</a></li>
														<li><a href="{{ $news->nextPageUrl() }}">Xem thêm &rarr;</a></li>
													</ul>
												</div>
											</div>
											@endif
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					<!-- phan3-tintuc-right -->
					<!-- ./right-2 -->
					@include('includes/homepage.right_content')
					<!-- row-1 -->
				</div>
			</div>
		</div>
	</div>
</content>
@endsection