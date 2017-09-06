<!-- ./right-2 -->
<div class="right-fix-home fixed">
	<div class="col-md-3 col-xs-12 col-sm-12">
		<!-- form hoivien-->
		<div class="block-home-right news-homepage-t ">
			<!-- tinmoi -->
			<div class="tintuc_right form-right-t">
				<div class="link-block padd-block text-center-title box-hv">
					<a href="#" class="tintuc left-news">Hội Viên </a>
					<div class="border-bottom"></div>
				</div>
				<div class="left-news">
					<!-- ./slide-images -->
					<div class="row">
						<div class="col-md-12 col-sm-12 col-xs-12 ">
							<div class="info-text">
								<ul>
									@if (!count($news_association))
									Không có dữ liệu
									@else									
									<?php foreach ($news_association as $key => $value): ?>
										<a href="{{ route('news.show',['title_slug'=>$value->title_slug]) }}" title="{{ $value->title }}"><li>{{ str_limit($value->title,$limit=35,$end='...') }}</li></a>
									<?php endforeach ?>
									@endif
								</ul>
								<a class="pull-right" href="{{ route('news.association') }}">Xem thêm »    </a>
							</div>
							<div id="Carousel" class="carousel slide">
								<!-- Carousel items -->
								<div class="carousel-inner">
									<!-- Official Association -->
									<div class="item active">
										<div class="row">
											<div class="col-md-12">
												<?php foreach ($official_association as $key => $value): ?>

													@if ($key < 6)
													<div class="col-md-4 col-xs-4 thumbnail1">
														@if ($value->association)
														<a href="{{ route('member.association.show',['id'=>$value->association->id]) }}"><img src="{{ asset($value->association->logo) }}" alt="Image" style="max-height:50px;"></a>
														@endif
													</div>

													@endif
												<?php endforeach ?>
											</div>
										</div>
										<!--.row-->
									</div>
									<!-- Personal Association -->
									<!--.item-->
									<div class="item">
										<div class="row">
											<div class="col-md-12">
												<?php foreach ($official_association as $key => $value): ?>

													@if ($key < 6)
													<div class="col-md-4 col-xs-4 thumbnail1">
														@if ($value->association)
														<a href="{{ route('member.association.show',['id'=>$value->association->id]) }}"><img src="{{ asset($value->association->logo) }}" alt="Image" style="max-height:50px;"></a>
														@endif
													</div>

													@endif
												<?php endforeach ?>
											</div>
										</div>
										<!--.row-->
									</div>
								</div>
							</div>
							<div class="user-vip">
								<a href="{{ route('member.register') }}">Đăng ký hội viên</a>
							</div>
							<div class="user-vip">
								<a href="{{ route('collaborator.register') }}">Đăng ký cộng tác viên</a>
							</div>
						</div>
					</div>
				</div>
			</div>
			<!--End Tin tuc-->

			<!-- new-best -->
			<div class="tintuc_right form-right-t ">
				<div class="link-block padd-block text-center-title">
					<a href="#" class="tintuc left-news">Tin hot</a>
					<div class="border-bottom"></div>
				</div>
				<div class="left-news">
					@if (!count($news_hot))
					Không tìm thấy dữ liệu
					@else
					<!-- ./slide-images -->
					<div class="new-best project-list">
						<?php foreach ($news_hot as $key => $value): ?>
							<a href="{{ route('news.show',['title_slug'=>$value->title_slug]) }}" class="a-link" title="{{ $value->title }}">
								<div class="text-top">
									<div class="row ">
										<div class="col-md-5 col-sm-6 col-xs-12">
											<div class="left-img">
												<img src="{{ Storage::disk('local')->url($value->title_image) }}" class="img-news">
											</div>
										</div>
										<div class="col-md-7 col-sm-6 col-xs-12">
											<div class="text-new-1 text-news-hot-t">
												<span class="a-link">{{ str_limit($value->title,$limit=30,$end='...') }} 	<span><img src="{{ asset('images/hot_1.gif') }}" border="0"></span>
												<br>
												<span class="h5-tt">{{ Carbon\Carbon::parse($value->posted_at)->format('d/m/Y') }}</span>
											</div>
										</div>
									</div>
								</div>
							</a>
						<?php endforeach ?>
					</div>
					@endif
				</div>
			</div>
			<!-- banner -->
			<!-- tinhot -->
			<div class="tintuc_right form-right-t">
				<div class="link-block padd-block text-center-title">
					<a href="#" class="tintuc left-news">Tin mới nhất</a>
					<div class="border-bottom"></div>
				</div>
				<div class="left-news">
					@if (!count($news_recent))
					Không có dữ liệu
					@else
					<div class="row">
						<a href="{{ route('news.show',['title_slug'=>$news_recent[0]->title_slug]) }}" title="{{ $news_recent[0]->title }}">
							<div class="col-md-5 col-sm-6 col-xs-12">
								<div class="left-img">
									<img src="{{ Storage::disk('local')->url($news_recent[0]->title_image) }}" class="img-news" title="{{ $news_recent[0]->title }}">
									
								</div>
							</div>
							<div class="col-md-7 col-sm-6 col-xs-12">
								<div class="text-new-1 text-news-hot-t">
									<p class="p-text">{{ $news_recent[0]->title }} 	<span><img src="{{ asset('images/new-1.gif') }}" border="0"></span></p>
									<div class="tag-link">
										<span class="h5-tt">{{ Carbon\Carbon::parse($news_recent[0]->posted_at)->format('d/m/Y') }}</span>
									</div>
								</div>
							</div>
						</div>
					</a>
					<div class="project-list-ul">
						<div class="list-block">
							<ul class="tintuc-list">
								<?php foreach ($news_recent as $key => $value): ?>
									@if ($key > 0)
									<li "><a href="{{ route('news.show',['title_slug'=>$value->title_slug]) }}" title="{{ $value->title }}"><i class="fa fa-plus-circle "></i>{{ str_limit($value->title,$limit=30,$end='...') }}</a> <span><img src="{{ asset('images/new-1.gif') }}" border="0"></span></li>
									@endif
								<?php endforeach ?>
							</ul>
						</div>
					</div>
					@endif
				</div>
			</div>
			<!--Form Send-Email -->
			<div class="tintuc_right send-email form-right-t">
				<div class="link-block padd-block text-center-title">
					<a href="#" class="tintuc left-news">Đăng ký để nhận tin ngày </a>
					<div class="border-bottom"></div>
				</div>
				<div class="left-news">
					<!-- ./slide-images -->
					<div class="row">
						<div class="form-search ">
							<div class="col-md-12 pull-right">
								<p>Quý khách vui lòng nhập Email và gửi về cho chúng tôi:</p>
								<div class="input-group top-form-right ">
									<input type="text" class="form-control" placeholder="Nhập email để nhận bản tin">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-envelope"></span></button>
									</span>
								</div>
								<div class="contact-online">
									<p class="box-title">Hỗ trợ trực tuyến:</p>
									<div class="text fa fa-phone-square">
										<strong>Ms.Thanh Thủy</strong>
										<p>Email:thanhthuy@gmail.com</p>
										<p>Phone:091234567</p>
									</div>
								</div>
								<!-- /input-group -->
							</div>
							<!-- /.col-lg-9 -->
						</div>
					</div>
				</div>
			</div>
			<!--  Banner -->
			<div class="row">
				<div class="poster col-xs-12">
					<img src="{{ asset('images/banner-1.png') }}" alt="poster" class="img-responsive" style="width: 100%;">
				</div>
			</div>
			<div class="row">
				<div class="poster col-xs-12 ">
					<img src="{{ asset('images/banner-2.png') }}" alt="poster" class="img-responsive"  style="width: 100%;">
				</div>
			</div>
			<div class="row">
				<div class="poster col-xs-12">
					<img src="{{ asset('images/banner-3.png') }}" alt="poster" class="img-responsive"  style="width: 100%;">
				</div>
			</div>
		</div>
		<!--  END-RIGHT -->
	</div>
	<!--3-->
</div>
