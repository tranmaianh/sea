    @extends('templates.main')
    
    @section('content')
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
                    <li><a href="#"> Hội viên</a></li>
                    <li><a href="#"> Hội viên chính thức</a></li>
                    <li>
                      <a href="#">Hội viên pháp nhân</a>
                    </li>
                  </ul>
                  <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                      <div class="tintuc_left">
                        <div class="link-block">
                          <a href="# " class="tintuc left-news ">Đăng ký hội viên pháp nhân</a>
                          <div class="border-bottom "></div>
                        </div>
                        <div class="left-news top-block">
                          <div class="block-item">
                            <div class="row">
                            <form method="POST" enctype="multipart/form-data">
                              <input type="hidden" name="_token" value="{{ csrf_token() }}">
                              <div class="col-md-4 col-sm-4 col-xs-12">
                                <div class="items-hoivien text-center">
                                  <img src="" alt="" id="avatar" name="avatar" class=" img img-thumbnail img-hoivien" style="display: none;">
                                <div class="select-img">
                                  <input type="file" name="file_item" id="file_item" value="" class="select-file-item" required>
                                </div>
                                 </div>
                              </div>

                              <div class="col-md-7 col-sm-8 col-xs-12">
                                <div class="items ">
                                  <!--Item-->
                                      <div class="inf-user">
                                        <div class="row">
                                          <div class="col-xs-12">
                                            <span><b>Thông tin đăng nhập tài khoản</b></span>
                                          </div>
                                        </div>
                                        <div class="row distance-top">
                                          <div class="col-md-5 col-sm-6 col-xs-12">
                                            <p><strong>Tên đăng nhập :</strong></p>
                                          </div>
                                          <div class="col-md-7 col-sm-6 col-xs-12">
                                            <input type="text" name="username" value="" required>
                                          </div>
                                        </div>
                                        <div class="row distance-top">
                                          <div class="col-md-5 col-sm-6 col-xs-12">
                                            <p><strong>Email :</strong></p>
                                          </div>

                                          <div class="col-md-7 col-sm-6 col-xs-12">
                                            <input type="text" name="email" value="">
                                            @if ($errors->has('email'))
                                            <span class="help-block">
                                              <strong style="color: red"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('email') }}</strong>
                                            </span>
                                            @endif
                                          </div>
                                        </div>
                                        <div class="row distance-top">
                                          <div class="col-md-5 col-sm-6 col-xs-12">
                                            <p><strong>Mật khẩu :</strong></p>
                                          </div>
                                          <div class="col-md-7 col-sm-6 col-xs-12">
                                            <input type="password" name="password" value="" required>
                                          </div>
                                        </div>
                                        <div class="row distance-top">
                                          <div class="col-md-5 col-sm-6 col-xs-12">
                                            <p><strong>Confirm mật khẩu :</strong></p>
                                          </div>
                                          <div class="col-md-7 col-sm-6 col-xs-12">
                                            <input type="password" name="password_confirmation" value="" required>
                                            @if ($errors->has('pass'))
                                            <span class="help-block">
                                              <strong style="color: red"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('pass') }}</strong>
                                            </span>
                                            @endif
                                          </div>
                                        </div>
                                      </div>
                                  <div class="row distance-top">
                                        <div class="col-xs-12">
                                          <span><b>Thông tin cá nhân</b></span>
                                        </div>
                                      </div>
                                  <!--Item-->

                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Tên doanh nghiệp :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <input type="text" name="name" value="" required>
                                    </div>
                                  </div>
                                  <!--Item-->
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Tên thương mại :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <input type="text" name="bussiness_name" value="">
                                    </div>
                                  </div>
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Email :</strong></p>
                                      @if ($errors->has('email_association'))
                                      <span class="help-block">
                                      	<strong style="color: red"><i class="glyphicon glyphicon-exclamation-sign"></i>{{ $errors->first('email_association') }}</strong>
                                      </span>
                                      @endif
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <input type="text" name="email_association" value="">
                                    </div>
                                  </div>
                                  <!--Item-->
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Logo :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <input id="logo" type="file" name="file" value="" class="select-file-item" required>
                                    <img src="" id="preview-logo" class="img-responsive logo-hv">
                                    </div>
                                  </div>
                                  <!--Item-->
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Địa chỉ :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <input type="text" name="address" value="">
                                    </div>
                                  </div>
                                  <!--Item-->
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Tỉnh(TP) :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <input type="text" name="province" value="">
                                    </div>
                                  </div>
                                  <!--Item-->
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Lĩnh vực hoạt động :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <textarea name="action_status" class="textarea-item"></textarea>
                                    </div>
                                  </div>
                                  <!--Item-->
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Điện thoại công ty :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <input type="text" name="hotline" value="">
                                    </div>
                                  </div>
                                  <!--Item-->
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Fax :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <input type="text" name="fax" value="">
                                    </div>
                                  </div>
                                  <!--Item-->
                                  
                                  <!--Item-->
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Website :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <input type="text" name="site" value="">
                                    </div>
                                  </div>
                                  <!--Item-->
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>HT QLCL :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <textarea name="code" class="textarea-item"></textarea>
                                    </div>
                                  </div>
                                  <!--Item-->
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Sản phẩm :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <textarea name="product" class="textarea-item"></textarea>
                                    </div>
                                  </div>
                                  <!--Item-->
                                  <div class="row distance-top">
                                    <div class="col-md-5 col-sm-6 col-xs-12">
                                      <p><strong>Thông tin thêm :</strong></p>
                                    </div>
                                    <div class="col-md-7 col-sm-6 col-xs-12">
                                      <textarea name="info_add" class="textarea-item"></textarea>
                                    </div>
                                  </div>
                                  <div class="row">
                                    <div class="col-md-4 col-md-offset-6 text-center btn-register">
                                    <button type="submit">Đăng ký</button>
                                  </div>
                                </div>
                              </div>
                              

                            </div>
                            </form>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- phan3-tintuc-right -->
          @include('includes/homepage.right_content')
          <!-- row-1 -->
        </div>
      </div>
    </div>
    @endsection
    @push('scripts')
    <script>
    	 function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#avatar").attr('src', e.target.result);
                      $('#avatar').css('display', 'block');
                };
                reader.readAsDataURL(input.files[0]);
            }
      }
        $("#file_item").change(function(){
                readURL(this);
         });
         function previewLogo(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function (e) {
                    $("#preview-logo").attr('src', e.target.result);
                      $('#preview-logo').css('display', 'block');
                };
                reader.readAsDataURL(input.files[0]);
            }
      }
        $("#logo").change(function(){
                previewLogo(this);
         });
    </script>
    @endpush