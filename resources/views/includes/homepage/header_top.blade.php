<header>
	<div id="header-top">
		<div class="header-top">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-md-12">
						<div class="icon-header col-md-8 col-sm-6 xol-xs-12">
							<a href="#"><i class="fa fa-facebook cricle"></i></a>
							<a href="#"><i class="fa fa-twitter cricle"></i></a>
							<a href="#"><i class="fa fa-linkedin cricle"></i></a>
						</div>
						<!-- User Model -->
						<div class="hidden-xs col-md-4 col-sm-6 pull-right" id="right-menu-bar">
							@include('includes/homepage.login_model')
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--row-1-->
	<div class="header-winner">
		<div class="container">
			<div class="row">
				<div class="header-left">
					<div class="col-xs-12 col-md-9 col-sm-12">
						<div class="col-xs-4 col-sm-3 col-md-3">
							<a href="#"><img src="{{ asset('images/vsalogo.png') }}" alt="vsalogo" class="img-responsive"></a>
						</div>
						<div class="col-xs-8 col-sm-9 col-md-9 text-info-vsa">
							{{-- <div class="title-header text-center">
								<h1 class="text-logo font-text-h1">HIỆP HỘI NUÔI BIỂN VIỆT NAM</h1>
								<h2 class="text-logo font-text-h2">VIETNAM SEACULTURE ASSOCIATION</h2>
							</div> --}}
							<a href="#"><img src="{{asset('images/Text.png')}}" alt="vsalogo" class="img-responsive"></a>
						</div>
					</div>
				</div>
				<div class="col-xs-12 col-md-3 col-sm-3 hidden-xs hidden-sm">
					<div class="header-right">
						<div class="map-time">
							<div class="address-time">
								<div class="address-info">
									<p>
										<a href="#" class="fa fa-map-marker"></a> Hà Nội, Việt Nam
									</p>
								</div>
								<div id="calendar">
									<p class="calendar-info">
										<span id="calendar-day"></span>,
										<span id="calendar-date"></span>/<span id="calendar-month-year"></span>
									</p>
								</div>
							</div>
							<div class="weather-img ">
								<img src="{{ asset('images/300.png') }}" alt="">
							</div>
						</div>
						<div class="form-search hidden-xs search-md ">
							<div class="col-md-12 pull-right  top-form ">
								<form id="form-search" method="GET" action="{{ route('searchNews') }}">
									{{ csrf_field() }} 
									<div class="input-group">
										<input type="text" class="form-control" placeholder="Tìm kiếm..." name="keyword" required>
										<span class="input-group-btn">
											<button class="btn btn-default" type="submit"><span class="glyphicon glyphicon-search"></span></button>
										</span>
									</div>
								</form>
								<!-- /input-group -->
							</div>
							<!-- /.col-lg-9 -->
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!--Menu-->
	<div class="container submenu-reponsive menu-position">
		<div class="row">
			<nav class="navbar navbar-default header-nav " role="navigation">
				<div class="container">
					<div class="header-menu">
						<div class="navbar-header ul-menu">
							<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
							<a class="navbar-brand" href="{{ route('homepage.index') }}"><span class="glyphicon glyphicon-home"></span></a>
						</div>
						<!-- Collect the nav links, forms, and other content for toggling -->
						<div class="text-uppercase">
							<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
								<ul class="nav navbar-nav menu-i menu-top">
									@include('includes/homepage.menu_bar')
								</ul>
							</div>
						</div>
						<!-- /.navbar-collapse -->
					</div>
				</div>
				<!--row-->
				<!-- /.container -->
			</nav>
			<div class="search-field">
					<div class="form-search">
							<div class="" top-form ">
								<div class="input-group">
									<input type="text" class="form-control" placeholder="Tìm kiếm...">
									<span class="input-group-btn">
										<button class="btn btn-default" type="button"><span class="glyphicon glyphicon-search"></span></button>
									</span>
								</div>
								<!-- /input-group -->
							</div>
							<!-- /.col-lg-9 -->
				</div>									
			</div>
			<div class="button-lang" >
		     <div class="icon-top">
			<button id="fat-menu" class="dropdown">
				<a href="#" class="dropdown-toggle" id="drop3" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"> 
					<img src="{{ asset('images/vietnam_icon.png') }}" alt="tiengviet" class="langu">
					<span class="caret"></span>
				</a>
				<ul class="dropdown-menu" aria-labelledby="drop3">
					<div class="arrow"></div>
					<li class="select-lg">
						<div class="title-acount">Select your language</div>
						<ul class="info-lg">
							<li>
								<a class="language-vi"><img src="{{ asset('images/vietnam_icon.png') }}" alt=""><span>Tiếng Việt</span></a>
							</li>
							<li>
								<a class="language-vi"><img src="{{ asset('images/english_icon.png') }}" alt=""><span>English</span></a>
							</li>
						</ul>
					</li>
				</ul>
			</button>
			</div>
		</div>
</header>