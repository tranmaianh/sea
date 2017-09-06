<div class="contact ">
	<div class="container ">
		<div class="row top-footer">
			<div class="col-xs-12 col-sm-6 col-md-5 ">
				<div class="list-left ">
					<h5>Trang thông tin điện tử Hiệp hội Nuôi biển Việt Nam (VSA)</h5>
					<h5>Cơ quan chủ quản: Hiệp hội Nuôi biển Việt Nam (VSA)</h5>
					<h5>Trụ sở: Số nhà 30, Ngõ 24, Phố Ngọc Lâm, Long Biên, Hà Nội</h5>
					<h5>Tell:  (84.4) 38746.888 - Fax: (84.4) 32127.991</h5>
					<h5>Email: hiephoinuoibienvietnam@gmail.com  </h5>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-3 ">
				<div class="list-left ">
					<h5>Giấy phép hoạt động Trang thông tin điện tử tổng hợp</h5>
					<h5>Đề nghị ghi rõ nguồn www.hiephoinuoibien.org khi sử dụng thông tin từ trang này.</h5>
				</div>
			</div>
			<div class="col-xs-12 col-sm-6 col-md-4 ">
				<div id="map" style="max-width: 100%; height: 200px;"></div>
				<div class="icon-contact ">
					<a href="# "><i class="fa fa-twitter-i icon-fa cricle-1 "></i></a>
					<a href="# "><i class="fa fa-skype icon-fa cricle-1 "></i></a>
					<a href="# "><i class="fa fa-linkedin-i icon-fa cricle-1 "></i></a>
					<a href="# "><i class="fa fa-instagram icon-fa cricle-1 "></i></a>
					<a href="# "><i class="fa fa-youtube icon-fa cricle-1 "></i></a>
				</div>
			</div>
			<div class="col-md-12 col-sm-12 col-xs-12 ">
				<div class="text-center padding-top ">
					<h4>Giấy phép hoạt động Trang thông tin điện tử tổng hợp</h4>
					<h4>Đề nghị ghi rõ nguồn www.hiephoinuoibien.org khi sử dụng thông tin từ trang này.</h4>
				</div>
			</div>
		</div>
	</div>
</div>
<!--footer-->
<div class="footer text-center ">
	<footer class="container-fluid ">
		<h5 class="h5 ">2016 © copyright by hiephoinuoibien.org</h5>
	</footer>
</div>
@push('scripts')
 <script src="http://maps.google.com/maps/api/js?sensor=false" type="text/javascript"></script>
  <script type="text/javascript">
  var locations = [
    ['VAS', 21.046611, 105.873816,1],
     ['VAS', 21.043421, 105.866911,2]
  ];

  var map = new google.maps.Map(document.getElementById('map'), {
    zoom: 14,
    center: new google.maps.LatLng(21.043421, 105.866911),
    mapTypeId: google.maps.MapTypeId.ROADMAP
  });
  

  var infowindow = new google.maps.InfoWindow({
    });
  var marker, i;

  for (i = 0; i < locations.length; i++) {
    marker = new google.maps.Marker({
      position: new google.maps.LatLng(locations[i][1], locations[i][2]),
      map: map
       // icon: icon
    });

    google.maps.event.addListener(marker, 'click', (function(marker, i) {
      return function() {
        infowindow.setContent(locations[i][0]);
        infowindow.open(map, marker);
      }
    })(marker, i));
  }
  </script>
@endpush