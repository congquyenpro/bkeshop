const Template = {
	Category: {
		Create() {
			return `<div class="error-log"></div>
					<input type="hidden" class="form-control data-id" required="">
					<div class="form-group">
                        <label >Tiêu đề <span class="data-name-return"></span></label>
                        <input type="text" class="form-control data-name" placeholder="Tiêu đề">
                    </div> `
		},
		Delete() {
			return `<div class="wrapper d-flex justify-center"><img src="/manager/images_global/funny.gif" alt=""></div>`
		}
	},
	Product: {
		Create() {
			return `<input type="hidden" class="form-control data-id" required="">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="error-log"></div>
                            <div class="form-group">
                                <label >Tên sản phẩm *</label>
                                <input type="text" class="form-control data-name" placeholder="Tên sản phẩm">
                            </div>    
                            <div class="form-group">
                                <label >Thương hiệu *</label>
                                <select name="" class="form-control category-list data-category"></select>
                                <div class="row metadata-list m-t-20"></div>
                            </div>   
                            <div class="form-group">
                                <label >Giới tính *</label>
                                <div class="row">
                                	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		                                <div class="radio">
		                                    <input id="style-01" name="data-sex" type="radio" value="1" checked="checked">
		                                    <label for="style-01">Nam</label> 
		                                </div>
                                	</div>
                                	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		                                <div class="radio">
		                                    <input id="style-02" name="data-sex" type="radio" value="2">
		                                    <label for="style-02">Nữ</label> 
		                                </div>
                                	</div>
                                	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		                                <div class="radio">
		                                    <input id="style-03" name="data-sex" type="radio" value="3">
		                                    <label for="style-03">Cả hai</label> 
		                                </div>
                                	</div>
                                </div> 
                            </div>   
                            <div class="form-group">
                                <label >Mô tả ngắn <span class="data-description-return"></span></label>
                                <textarea class="form-control data-description " name="description" placeholder="Mô tả ngắn" rows="4" required=""></textarea>
                            </div>
							<div class="form-group">
								<label >Chi tiết đặc tính <span class="data-description-return"></span></label>
								<div class="metadata-item2">
									<div class="form-group">
										<label>Nồng độ</label>
										<input type="text" class="form-control data-nongdo" placeholder="">
									</div> 
									<div class="form-group">
										<label>Phong cách</label>
										<input type="text" class="form-control data-style" placeholder="">
									</div> 
									<div class="form-group">
										<label>Nhóm hương</label>
										<input type="text" class="form-control data-perfume" placeholder="">
									</div>
									<div class="form-group">
										<label>Độ tuổi</label>
										<input type="text" class="form-control data-agegroup" placeholder="">
									</div>
									<div class="form-group">
										<label>Thành phần</label>
										<input type="text" class="form-control data-ingredient" placeholder="">
									</div>    
                    			</div>
							</div>     
                            <div class="form-group summernote">
                                <label >Mô tả đầy đủ </label>
                                <textarea class="form-control data-detail " name="detail" placeholder="Mô tả đầy đủ" rows="4" required=""></textarea>
                            </div>   
						</div> 
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 border-left">  
	                        <div class="form-group image-select-group col-md-12">
	                        	<div class="form-header">
	                                <label>Hình ảnh *( 600 x 600 ) </label>
	                                <label class="image-select" for="image_list"><i class="fas fa-search m-r-10"></i>Chọn ảnh</label>
	                                <input type="file" class="form-control image-list" id="image_list" name="image_list[]" required="" accept="image/*" multiple="">
	                            </div>
		                        <div class="form-preview multi-upload">
		                        </div>
				            </div>
                            <div class="form-group">
                                <label >Phân loại sản phẩm</label> 
                                <div class="item-list metadata-group row"> 

                                </div>  
                        		<div class="form-group"> 
	                                <button class="btn btn-primary metadata-create" atr="Create">Thêm thuộc tính</button>
	                            </div> 
                            </div>    
						</div>
	            	</div>`
		},
		Update() {
			return `<input type="hidden" class="form-control data-id" required="">
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6">
							<div class="error-log"></div>
                            <div class="form-group">
                                <label >Tên sản phẩm *</label>
                                <input type="text" class="form-control data-name" placeholder="Tên sản phẩm">
                            </div>    
                            <div class="form-group">
                                <label >Thương hiệu *</label>
                                <select name="" class="form-control category-list data-category"></select>
                                <div class="row metadata-list m-t-20"></div>
                            </div>   
                            <div class="form-group">
                                <label >Giới tính *</label>
                                <div class="row">
                                	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		                                <div class="radio">
		                                    <input id="style-update-01" name="data-sex" type="radio" value="1" checked="checked">
		                                    <label for="style-update-01">Nam</label> 
		                                </div>
                                	</div>
                                	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		                                <div class="radio">
		                                    <input id="style-update-02" name="data-sex" type="radio" value="2">
		                                    <label for="style-update-02">Nữ</label> 
		                                </div>
                                	</div>
                                	<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
		                                <div class="radio">
		                                    <input id="style-update-03" name="data-sex" type="radio" value="3">
		                                    <label for="style-update-03">Cả hai</label> 
		                                </div>
                                	</div>
                                </div> 
                            </div>   
                            <div class="form-group">
                                <label >Mô tả ngắn <span class="data-description-return"></span></label>
                                <textarea class="form-control data-description " name="description" placeholder="Mô tả ngắn" rows="4" required=""></textarea>
                            </div>
							<div class="form-group">
							<label >Mô tả ngắn <span class="data-description-return"></span></label>
							<textarea class="form-control data-description " name="description" placeholder="Mô tả ngắn" rows="4" required=""></textarea>
						</div>
						<div class="form-group">
							<label >Chi tiết đặc tính <span class="data-description-return"></span></label>
							<div class=" metadata-item2">
								<div class="form-group">
									<label>Nồng độ</label>
									<input type="text" class="form-control data-nongdo" placeholder="">
								</div> 
								<div class="form-group">
									<label>Phong cách</label>
									<input type="text" class="form-control data-style" placeholder="">
								</div> 
								<div class="form-group">
									<label>Nhóm hương</label>
									<input type="text" class="form-control data-perfume" placeholder="">
								</div>
								<div class="form-group">
									<label>Độ tuổi</label>
									<input type="text" class="form-control data-agegroup" placeholder="">
								</div>
								<div class="form-group">
									<label>Thành phần</label>
									<input type="text" class="form-control data-ingredient" placeholder="">
								</div>     
							</div>
						</div>     
                            <div class="form-group summernote">
                                <label >Mô tả đầy đủ </label>
                                <textarea class="form-control data-detail " name="detail" placeholder="Mô tả đầy đủ" rows="4" required=""></textarea>
                            </div>   
						</div> 
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 border-left">  
	                        <div class="form-group image-select-group col-md-12">
	                        	<div class="form-header">
	                                <label>Hình ảnh *( 600 x 600 ) </label>
	                                <label class="image-select" for="image_list-update"><i class="fas fa-search m-r-10"></i>Chọn ảnh</label>
	                                <input type="file" class="form-control image-list" id="image_list-update" name="image_list[]" required="" accept="image/*" multiple="">
	                            </div>
		                        <div class="form-preview multi-upload">
		                        </div>
				            </div>
                            <div class="form-group">
                                <label >Phân loại sản phẩm</label> 
                                <div class="item-list metadata-group row"> 

                                </div>  
                        		<div class="form-group"> 
	                                <button class="btn btn-primary metadata-create" atr="Create">Thêm thuộc tính</button>
	                            </div> 
                            </div>    
						</div>
	            	</div>`
		},
		Delete() {
			return `<div class="wrapper d-flex justify-center"><img src="/manager/images_global/funny.gif" alt=""></div>`
		}
	},
	Warehouse: {
		Create() {
			return `<div class="row warehouse-modal">
						<div class="col-xs-12 col-sm-12 col-md-8 col-lg-8 offset-2">
							<div class="card">
								<div class="card-body">
									<div class="item-list">

									</div>
									<button type="button" class="btn btn-success item-create" atr="Item Create">Tạo mới</button>
								</div>
							</div>
						</div>
	            	</div>`
		},
		Update() {
			return `<div class="row warehouse-modal">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-3">
							<table class="table table-bordered sub-warehouse">
							    <thead>
							      <tr>
							        <th>Tên sản phẩm</th>
							        <th>Số lượng</th>
									<th>Giới tính</th>
									<th>Loại</th>
							        <th>Đơn giá nhập</th>
							        <th>Thành tiền</th>
							      </tr>
							    </thead>
							    <tbody> 
							    </tbody>
							  </table>
						</div>
	            	</div>`
		},

	},
	Order: {
		Update() {
			return `<div class="container">
						<div class="notification-toast top-right" id="notification-toast"></div>
						
                        <div class="card">
                            <div class="card-body">
                                <div class="row align-items-center">
                                    <div class="col-md-7">
                                        <div class="d-md-flex align-items-center">
                                            <div class="text-center text-sm-left ">
                                                <div class="avatar avatar-image" style="width: 150px; height:150px">
                                                    <img src="https://static-00.iconduck.com/assets.00/user-icon-2048x2048-ihoxz4vq.png" alt="">
                                                </div>
                                            </div>
                                            <div class="text-center text-sm-left m-v-15 p-l-30">
                                                <h2 class="m-b-5 customer-name"></h2>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-5">
                                        <div class="row">
                                            <div class="d-md-block d-none border-left col-1"></div>
                                            <div class="col">
                                                <ul class="list-unstyled m-t-10">
													<li class="row">
														<p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
															<i class="m-r-10 text-primary anticon anticon-idcard"></i>
															<span>Phân loại: </span> 
														</p>
														<p class="col font-weight-semibold customer-type"> </p>
													</li>
                                                    <li class="row">
                                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-mail"></i>
                                                            <span>Email: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold customer-email"> </p>
                                                    </li>
                                                    <li class="row">
                                                        <p class="col-sm-4 col-4 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-phone"></i>
                                                            <span>Điện thoại: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold customer-telephone"></p>
                                                    </li>
                                                    <li class="row">
                                                        <p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
                                                            <i class="m-r-10 text-primary anticon anticon-compass"></i>
                                                            <span>Địa chỉ: </span> 
                                                        </p>
                                                        <p class="col font-weight-semibold customer-address"></p>
                                                    </li>
													<li class="row">
													<p class="col-sm-4 col-5 font-weight-semibold text-dark m-b-5">
														<i class="m-r-10 text-primary anticon anticon-shopping"></i>
														<span>Mã đơn: </span> 
													</p>
													<p id="order_id_api" class="col font-weight-semibold order-id-api"></p>
												</li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-9">
                                <div class="card">
                                    <div class="card-body ">
										<table id="list-product-order" class="table table-bordered">
									    	<thead>
									      		<tr>
											        <th>Mã</th>
											        <th>Tên sản phẩm</th>
											        <th>Số lượng</th>
											        <th>Đơn giá</th>
											        <th>Giảm giá</th>
											        <th>Thành tiền</th>
											        <th>Kho</th>
											        <th>Yêu cầu</th>
									      		</tr>
									    	</thead>
										    <tbody class="data-list"> 
										    </tbody>
									  	</table>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-3">
                                <div class="card">
                                    <div class="card-body">
                                    	<select name="" id="form-select-status" class="form-control order-status">
                                    		<option value="0">Chờ xử lí</option>
                                    		<option value="1">Chưa hoàn thiện</option>
                                    		<option value="2">Đã hoàn thiện</option>
                                    		<option value="3">Đã giao hàng</option>
                                    		<option value="4">Hoàn trả</option>
                                    	</select>
										<textarea class="form-control m-t-5" aria-label="With textarea" placeholder="Ghi chú"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>

						<div id="ship-setting"></div>

                    </div>`
		},
		ShipSetting(){
			return `
			
			<h5>Tạo đơn giao hàng</h5>
			
				<div class="row">
					<div class="col-md-9">
						<div class="card">
							<div class="card-body ">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Mã</th>
											<th>Tên sản phẩm</th>
											<th>Số lượng</th>
											<th>Giá</th>
										</tr>
									</thead>
									<tbody class="data-list">
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body">
								<select name="" id="" class="form-control">
									<option value="0">Chọn đơn vị vận chuyển</option>
									<option value="1" selected >Giao hàng nhanh</option>
									<option value="2">Bk-Eshop</option>
								</select>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-12 col-lg-4">
						<div class="card">
							<div class="card-body">
								<h5 class="m-b-20">Thông tin gói hàng</h5>
								<form
									action=""
									method="post">
									<input type="hidden" name="_token"
										value="LwWv2HobMbboa1IeIc9QvV5ZMS4z6XjqfcdGcIOt">
									<div class="form-row">
										<div class="form-group col-md-4">
											<label for="inputLong">Dài(*)</label>
											<input name="length" type="text" class="form-control"
												id="length" placeholder="" value="30">
										</div>
										<div class="form-group col-md-4">
											<label for="inputWidth">Rộng(*)</label>
											<input name="width" type="text" class="form-control"
												id="width" placeholder="Width" value="10">
										</div>
										<div class="form-group col-md-3">
											<label for="inputHeight">Cao(*)</label>
											<input name="height" type="text"
												class="form-control" id="Height"
												placeholder="Height" value="10">
										</div>
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Khối lượng</label>
										<div class="radio">
											<input type="radio" name="massOption"
												id="gridRadios1" value="option1">
											<label for="gridRadios1">
												Theo sản phẩm theo đơn hàng 
											</label>
										</div>
										<div class="radio">
											<input type="radio" name="massOption"
												id="gridRadios2" value="option2" checked="">
											<label for="gridRadios2">
												Tùy chỉnh
											</label>
										</div>
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Nhập khối lượng tùy
											chỉnh (gam)</label>
										<input name="mass" type="text" class="form-control"
											id="weight" placeholder="Nhập khối lượng"
											value="500">
									</div>
									<div class="form-group">
										<label for="formGroupExampleInput2">Yêu cầu</label>
										<select name="role" id="required_note" class="form-control">
											<option value="CHOTHUHANG">Cho xem hàng, cho thử</option>
											<option value="KHONGCHOXEMHANG">Không cho xem hàng</option>
											<option value="CHOXEMHANGKHONGTHU">Cho xem hàng, không cho thử
											</option>
										</select>

									</div>
									<div class="form-group">
										<label for="formGroupExampleInput">Ghi chú</label>
										<input name="note" type="text" class="form-control"
											id="note" placeholder="Ghi chú"
											value="">
									</div>
									<div class="row m-b-30">
										<div class="col-lg-6">
										</div>
									</div>
								</form>
							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-6">
						<div class="card">
							<div class="card-body">
								<div
									class="d-flex justify-content-between align-items-center m-b-10">
									<h5>Thông tin người gửi</h5>
								</div>
								<form
									action=""
									method="post">
									<input type="hidden" name="_token"
										value="LwWv2HobMbboa1IeIc9QvV5ZMS4z6XjqfcdGcIOt">
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="inputEmail4">Địa chỉ kho gửi
												hàng:</label>
											<select id="inputWarehouse" class="form-control">
												<option selected>Chọn kho</option>
												<option  value="1" selected>Kho Trương Định, Quận Hai Bà Trưng, Hà
													Nội, 167</option>
												<option  value="2">Kho Ecopark, Hưng Yên</option>
											</select>
										</div>
										<div class="form-group col-md-4">
											<label for="inputShift">Ca lấy hàng:</label>
											<select id="inputShift" class="form-control">
												<option selected>Chọn ca lấy hàng</option>
												<option>Ca lấy 14-12-2023(7h-12h)</option>
												<option>Ca lấy 14-12-2023(12h-18h)</option>
												<option>Ca lấy 15-12-2023(7h-12h)</option>
											</select>
										</div>
										<div class="form-group col-md-4">
											<label for="senderPhone">Số điện thoại:</label>
											<input name="" type="text" class="form-control"
												id="from_phone" placeholder="" value="0888888888">
										</div>
									</div>
									<hr>
									<div
										class="d-flex justify-content-between align-items-center m-b-10">
										<h5>Thông tin người nhận</h5>
									</div>
									<div class="form-row">
										<div class="form-group col-md-6">
											<label for="receiverName">Tên người nhận:</label>
											<input name="" type="text" class="form-control"
												id="to_name" placeholder="" value="Cong Quyen">
										</div>
										<div class="form-group col-md-6">
											<label for="receiverPhone">Số điện thoại:</label>
											<input name="" type="text" class="form-control"
												id="to_phone" placeholder="" value="0888666888">
										</div>
										<div class="form-group col-md-3">
											<label for="inputEmail4">Tỉnh/Thành Phố</label>
											<select name="warehouse_pro" class="form-control"
												id="provinceSelect" onchange="loadDistricts()">
												<option value="90816">Hồ Chí Minh
												</option>
											</select>
										</div>
										<div class="form-group col-md-3">
											<label for="inputPassword4">Quận/Huyện</label>
											<select name="warehouse_dis" class="form-control"
												id="districtSelect" onchange="loadWards()">
												<option value="90816"> Quận 10
												</option>
											</select>
										</div>
										<div class="form-group col-md-3">
											<label for="inputPassword4">Phường/Thị Xã</label>
											<select name="warehouse_ward" class="form-control"
												id="wardSelect">
												<option value="90816">Phường 14
												</option>
											</select>
										</div>
										<div class="form-group col-md-3">
											<label for="inputPassword4">Chi tiết</label>
											<input name="warehouse_detail" class="form-control"
												id="addressDetail" type="text" value="72 Thành Thái">
										</div>
										<input hidden="" name="addressFull" class="form-control"
											id="addressFull">
									</div>
								</form>


								<hr>
								<div
									class="d-flex justify-content-between align-items-center m-b-10">
									<h5>Thông tin đơn hàng</h5>
								</div>
								<div class="row">
									<div class="form-group col-md-6">
										<label for="inputEmail4">Mã đơn khách hàng</label>
										<input name="" type="text" class="form-control"
											id="client_order_code" placeholder="Nhập mã đơn"
											value="12">
									</div>
									<div class="form-group col-md-6">
										<label for="inputEmail4">Tiền thu hộ (COD):</label>
										<input name="" type="text" class="form-control" id="cod_amount" placeholder=""value="">
									</div>
									<div class="form-group col-md-6">
										<label for="inputEmail4">Tổng giá trị đơn:</label>
										<input name="" type="text" class="form-control" id="insurance_value" placeholder=""value="">
									</div>
									<div class="form-group col-md-6">
										<label for="inputEmail4">Gói dịch vụ:</label>
										<select id="inputState" class="form-control">
											<option selected>Hàng nhẹ (&lt;20kg) </option>
											<option>Hàng nặng (&gt;20kg) </option>
										</select>
									</div>
									<div class="form-group col-md-6">
										<label for="payment_type_id">Trả phí:</label>
										<select id="payment_type_id" class="form-control">
											<option value="1">Bên gửi trả phí</option>
											<option value="2">Bên nhận trả phí</option>
										</select>
									</div>
								</div>

							</div>
						</div>
					</div>
					<div class="col-md-12 col-lg-2">
						<div class="card">

							<div class="card-body">
								<label for="inputEmail4">Phí dịch vụ:</label>
								<div class="service-fee text-bold">44.000 đ</div>
								<hr>
								<label for="inputEmail4">Tổng phí:</label>
								<div class="total-fee text-bold">44.000 đ</div>
								<hr>
								<div class="form-group">
									<label for="formGroupExampleInput2">Mã hỗ trợ:</label>
									<input name="" type="text" class="form-control" id="coupon"
										placeholder="Nhập mã hỗ trợ từ GHN" value="">
								</div>
								<hr>
								<button id="save-order-btn" type="button" class="btn btn-primary push-modal2"
									atr="Push2" data-toggle="modal"
									data-target="#exampleModalCenter">Xác nhận</button>
							</div>
						</div>
					</div>
				</div>

			




<!-- Modal Xác nhận -->
<div class="modal fade" id="exampleModalCenter">
	<div class="modal-dialog modal-dialog-centered">
		<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalCenterTitle">Xác nhận tạo đơn</h5>
				<button type="button" class="close" data-dismiss="modal">
					<i class="anticon anticon-close"></i>
				</button>
			</div>
			<div class="modal-body">
				<div class="row">
					<div class="col-sm-3 col-md-3 col-lg-3 text-bold">Người gửi:</div>
					<div id="from_name_cf" class="col-sm-3 col-md-3 col-lg-3">Bk-Eshop</div>
					<div id="from_phone_cf" class="col-sm-3 col-md-3 col-lg-3">0888388888</div>
					<div id="from_address_cf" class="col-sm-3 col-md-3 col-lg-3">167 Trương Định</div>
				</div>
			   
				<div class="row">
					<div class="col-sm-3 col-md-3 col-lg-3 text-bold">Người nhận:</div>
					<div id="to_name_cf" class="col-sm-3 col-md-3 col-lg-3">Cong Quyen</div>
					<div id="to_phone_cf" class="col-sm-3 col-md-3 col-lg-3">0888388888</div>
					<div id="to_address_cf" class="col-sm-3 col-md-3 col-lg-3">72 Thành Thái, Phường 14, Quận 10, Hồ Chí Minh, Vietnam</div>
				</div>
				<hr>
				<div class="p-10" style="background-color: rgb(204 213 221 / 50%);">
						<div class="row">
							<div class="col-sm-4 col-md-4 col-lg-4 text-bold">COD:</div>
							<div id="COD_cf" class="col-sm-4 col-md-4 col-lg-4">50.000</div>
						</div>
<!--                                                 <div class="row">
							<div class="col-sm-4 col-md-4 col-lg-4 text-bold">GTB thu tiền:</div>
							<div class="col-sm-4 col-md-4 col-lg-4">20000</div>
						</div> -->
						<div class="row">
							<div class="col-sm-4 col-md-4 col-lg-4 text-bold">Trả phí:</div>
							<div class="col-sm-4 col-md-4 col-lg-4">Bên gửi trả phí</div>
						</div>
						<div class="row">
							<div class="col-sm-4 col-md-4 col-lg-4 text-bold">Tổng phí:</div>
							<div class="col-sm-4 col-md-4 col-lg-4">44.000đ</div>
						</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default"
					data-dismiss="modal">Quay lại</button>
				<button id="submit-order-btn" type="button" class="btn btn-primary">Tạo đơn</button>
			</div>
		</div>
	</div>
</div>
			`
		},
		printOrder(){
			return `
			<h5>Đóng gói hàng</h5>
				<div class="row">
					<div class="col-md-9">
						<div class="card">
							<div class="card-body ">
								<table class="table table-bordered">
									<thead>
										<tr>
											<th>Mã vận đơn</th>
											<th>Mã đơn hàng</th>
											
											<th>Dự kiến lấy</th>
										</tr>
									</thead>
									<tbody class="data-list">
										<tr>
											<td id="print_vandonID" >LF7GNK</td>
											<td id="print_orderID">12</td>
											
											<td id="print_plan_date">28-1-2024 (7h-12h)</td>
										</tr>
									</tbody>
								</table>
							</div>
						</div>
					</div>
					<div class="col-md-3">
						<div class="card">
							<div class="card-body">
								  <button id="print_order" type="button" class="btn btn-primary push-modal2">In đơn hàng<i class="anticon anticon-printer"></i></button>
							</div>
						</div>
					</div>
				</div>

			`
		},
		vanchuyenDetail(){
			return `
			<hr>
			<h5>Theo dõi đơn hàng</h5>
			<div class="row">
			<div class="col-sm-4 m-b-5">
				<table class="table">
					<thead class="table-success">
					  <tr>
						<th>Người gửi</th>
						<th></th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Tên người gửi</td>
						<td>Bk-eShop</td>
					  </tr>
					  <tr>
						<td>Điện thoại</td>
						<td>0888222666</td>
					  </tr>
					  <tr>
						<td>Địa chỉ</td>
						<td>167 Trương Định, Hai Bà Trưng, Hà Nội</td>
					  </tr>
					</tbody>
				  </table>
			</div>
			<div class="col-sm-4 m-b-5">
			  <table class="table">
				<thead class="table-success">
				  <tr>
					<th colspan="2">Người nhận</th>
				  </tr>
				</thead>
				<tbody>
				  <tr>
					<td>Tên người nhận</td>
					<td id="rtp-customer-name">Cong Quyen</td>
				  </tr>
				  <tr>
					<td>Điện thoại</td>
					<td id="rtp-customer-phone">0888336888</td>
				  </tr>
				  <tr>
					<td>Địa chỉ</td>
					<td id="rtp-customer-address">Phường 14, Quận 10, Hồ Chí Minh, Vietnam</td>
				  </tr>
				</tbody>
			  </table>
			</div>
			<div class="col-sm-4 m-b-5">
				<table class="table">
					<thead class="table-success">
					  <tr>
						<th>Thông tin đơn  hàng</th>
						<th></th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Mã đơn hàng</td>
						<td id="rtp-vandonID">JHGN7</td>
					  </tr>
					  <tr>
						<td>Mã đơn khách hàng</td>
						<td id="rtp-orderID">12</td>
					  </tr>
					  <tr>
						<td>Ngày dự kiến lấy</td>
						<td>2024-01-27T08:59:59Z</td>
					  </tr>
					  <tr>
						<td>Ngày dự kiến giao</td>
						<td id="rtp-expected_delivery_time" >2024-01-30T23:59:59Z</td>
					  </tr>
					  <tr>
						<td>Trạng thái hiện tại</td>
						<td id="order-transport-product">Chờ lấy hàng</td>
					  </tr>
					</tbody>
				  </table>
			</div>
			<div class="col-sm-4 m-b-5">
				<table class="table">
					<thead class="table-success">
					  <tr>
						<th>Thông tin chi tiết</th>
						<th></th>
					  </tr>
					</thead>
					<tbody>
					  <tr>
						<td>Sản phẩm</td>
						<td><a href="#list-product-order">Danh sách sản phẩm</a></td>
					  </tr>
					  <tr>
						<td>Cân nặng</td>
						<td>600 gram</td>
					  </tr>
					  <tr>
						<td>Lưu ý giao hàng</td>
						<td>Cho thử hàng</td>
					  </tr>
					  <tr>
						<td>Người trả</td>
						<td>Người gửi trả phí</td>
					  </tr>
					</tbody>
				  </table>
			</div>
			<div class="col-sm-8 m-b-5">
				<table class="table">
					<thead class="table-success">
					  <tr>
						<th>Theo dõi đơn hàng</th>
						<th></th>
						<th></th>
					  </tr>
					</thead>
					<tr>
						<th>Trạng thái</th>
						<th>Thời gian</th>
						<th>Chi tiết</th>
					  </tr>
					<tbody id="order-log-table">
					  <tr>
						<td>Chờ lấy hàng</td>
						<td>2024-01-04 8:27:22</td>
						<td>167 Giải Phóng, Phương Mai, Đống Đa, Hà Nội, Vietnam</td>
					  </tr>
					</tbody>
				  </table>
			</div>
		</div>
			`
		}
	},

	Customer: {
		Update() {
			return `
		  		  <div class="row customer-modal">
						<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 offset-3">
							<table class="table table-bordered sub-customer">
								<thead>
									<tr>
										<th style="width: 210.825px;">Tên khách hàng</th>
										<th style="width: 128.025px;">Số điện thoại</th>
										<th>Giới tính</th>
										<th>Ngày sinh</th>
										<th style="width: 300.7375px;">Địa chỉ</th>
										<th>Email</th>
										<th>Trạng thái</th>
									</tr>
								</thead>
							    <tbody> 
							    </tbody>
							</table>

							<h5 class="modal-title" id="myModalLabel">Đơn hàng đã đặt</h5>
							<table class="table table-bordered sub-customer-order">
								<thead>
									<tr>
										<th>Mã đơn hàng</th>
										<th>Trạng thái</th>
										<th>Ngày tạo</th>
										<th>Tổng giá trị</th>
									</tr>
								</thead>
								<tbody> 
								</tbody>
							</table>
						</div>
	            	</div> `
		},
	},
}