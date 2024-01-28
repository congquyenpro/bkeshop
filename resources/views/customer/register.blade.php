@extends('customer.layout')
@section('title', "")


@section('css')

@endsection()


@section('body')

	<div class="main-content main-content-login">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="breadcrumb-trail breadcrumbs">
						<ul class="trail-items breadcrumb">
							<li class="trail-item trail-begin">
								<a href="/">Home</a>
							</li>
							<li class="trail-item trail-end active">
								Đăng ký tài khoản
							</li>
						</ul>
					</div>
				</div>
			</div>
			<div class="row">
				<div class="content-area col-lg-12 col-md-12 col-sm-12 col-xs-12">
					<div class="site-main">
						<h3 class="custom_blog_title">
							Đăng ký tài khoản
						</h3>
						<div class="customer_login">
							<div class="row"> 
								<div class="col-lg-12 col-md-12 col-sm-12">
									<div class="login-item" id="signup">
										<h5 class="title-login">Đăng ký thành viên mới</h5>
										<div class="register js-validate">
											<div class="error-log"></div>
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-6">
													<p class="form-row form-row-wide">
														<label class="text">Họ tên (*) </label>
														<input title="Bắt buộc" type="text" class="input-text data-name-first" placeholder="">
													</p>
												</div>
											</div> 
											<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<p class="form-row form-row-wide">
														<label class="text">Tỉnh/Thành phố (*)</label>
														<select  class="form-select-wrapper data-address-city"> 
															<option value="" selected="selected">Chọn tỉnh/thành phố</option>
                                                            <script>
                                                                const provinces = [
                                                                  "An Giang", "Bà Rịa - Vũng Tàu", "Bắc Giang", "Bắc Kạn", "Bạc Liêu", "Bắc Ninh", "Bến Tre",
                                                                  "Bình Định", "Bình Dương", "Bình Phước", "Bình Thuận", "Cà Mau", "Cao Bằng", "Đắk Lắk",
                                                                  "Đắk Nông", "Điện Biên", "Đồng Nai", "Đồng Tháp", "Gia Lai", "Hà Giang", "Hà Nam", "Hà Tĩnh",
                                                                  "Hải Dương", "Hậu Giang", "Hòa Bình", "Hưng Yên", "Khánh Hòa", "Kiên Giang", "Kon Tum",
                                                                  "Lai Châu", "Lâm Đồng", "Lạng Sơn", "Lào Cai", "Long An", "Nam Định", "Nghệ An", "Ninh Bình",
                                                                  "Ninh Thuận", "Phú Thọ", "Phú Yên", "Quảng Bình", "Quảng Nam", "Quảng Ngãi", "Quảng Ninh",
                                                                  "Quảng Trị", "Sóc Trăng", "Sơn La", "Tây Ninh", "Thái Bình", "Thái Nguyên", "Thanh Hóa",
                                                                  "Thừa Thiên-Huế", "Tiền Giang", "Trà Vinh", "Tuyên Quang", "Vĩnh Long", "Vĩnh Phúc", "Yên Bái",
                                                                  "Phú Quốc", "Hải Phòng", "Hà Nội", "Cần Thơ", "Đà Nẵng", "Hồ Chí Minh"
                                                                ];
                                                            
                                                                provinces.forEach((province) => {
                                                                  document.write(`<option value="${province}">${province}</option>`);
                                                                });
                                                              </script>
														</select>
													</p>
												</div>  
												<div class="col-lg-4 col-md-4 col-sm-12">
													<p class="form-row form-row-wide">
														<label class="text">Quận/Huyện (*)</label>
														<input title="Địa chỉ" type="text" class="input-text data-address-munic" placeholder=""> 
													</p>
												</div>   
												<div class="col-lg-4 col-md-4 col-sm-12">
													<p class="form-row form-row-wide">
														<label class="text">Địa chỉ nhà (*) </label>
														<input title="ĐỊa chỉ" type="text" class="input-text data-address-detail" placeholder=""> 
													</p>
												</div>  
											</div>
											<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<p class="form-row form-row-wide">
														<label class="text">Số điện thoại (*)</label>
														<input title="" type="text" class="input-text data-number data-phone" placeholder=""> 
													</p>
												</div>  
											</div>

{{-- 											<div class="row">
												<div class="col-lg-4 col-md-4 col-sm-12">
													<p class="form-row form-row-wide">
														<label class="text">Số điện thoại (*)</label>

														<div class="col-sm-10">
															<div class="radio">
																<input type="radio" name="gridRadios" id="gridRadios1" value="option1" checked>
																<label for="gridRadios1">
																	First radio
																</label>
															</div>
															<div class="radio">
																<input type="radio" name="gridRadios" id="gridRadios2" value="option2">
																<label for="gridRadios2">
																	Second radio
																</label>
															</div>
															<div class="radio">
																<input type="radio" name="gridRadios" id="gridRadios3" value="option3" disabled>
																<label for="gridRadios3">
																	Third disabled radio
																</label>
															</div>
														</div>
													</p>
												</div>  
											</div> --}}
											
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-12">
													<p class="form-row form-row-wide">
														<label class="text">Email đăng nhập (*)</label>
														<input title="" type="text" class="input-text data-email" placeholder="Nhập email"> 
													</p>
												</div>  
											</div>
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-12">
													<p class="form-row form-row-wide">
														<label class="text">Mật khẩu (*)</label>
														<input title="" type="password" class="input-text data-password" placeholder="Nhập mật khẩu"> 
													</p>
												</div>  
												<div class="col-lg-6 col-md-6 col-sm-12">
													<p class="form-row form-row-wide">
														<label class="text">Xác nhận mật khẩu </label>
														<input title="" type="password" class="input-text data-password-confirm" placeholder="Xác nhận mật khẩu"> 
													</p>
												</div>  
											</div> 
											<div class="row">
												<div class="col-lg-6 col-md-6 col-sm-12">
													<p class="form-row form-row-wide">
														<span class="inline">
															<input type="checkbox" id="cb2" class="data-rule">
															<label for="cb2" class="label-text">Tôi đã đọc và đồng ý với  <span><a href="{{ route("customer.view.rule_agreement") }}">Điều kiện sử dụng- thỏa thuận </a></span> người dùng của Website</label>
														</span> 
													</p>
												</div>  
											</div>  
											<p class="">
												<button type="button" class="button-submit form-submit" atr="Register"><a href="#">Đăng ký tài khoản</a> </button>
											</p>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
@endsection()

@section('sub_layout')

@endsection()


@section('js')
<script type="text/javascript" src="{{ asset('customer/assets/js/page/register.js') }}"></script>
@endsection()