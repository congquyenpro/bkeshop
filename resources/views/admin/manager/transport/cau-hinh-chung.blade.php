            {{-- Tab: Cấu hình chung --}}
            <div class="tab-pane fade show active" id="home-justified" role="tabpanel" aria-labelledby="home-tab-justified">
                <div class="row">
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="m-b-20">Thông tin giao hàng <i class="anticon anticon-info-circle"
                                        data-toggle="tooltip"
                                        title="Thiết lập mặc định thông tin giao hàng khi gửi hàng sang Đơn vị vận chuyển tích hợp"></i>
                                </h5>
                                <form action="{{route('admin.transport.update-general-config')}}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-4">
                                            <label for="inputLong">Dài(*)</label>
                                            <input name="long" type="text" class="form-control" id="inputLong"
                                                placeholder="Long" value="{{$size_order[0]}}">
                                        </div>
                                        <div class="form-group col-md-4">
                                            <label for="inputWidth">Rộng(*)</label>
                                            <input name="width" type="text" class="form-control" id="inputWidth"
                                                placeholder="Width" value="{{$size_order[1]}}">
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputHeight">Cao(*)</label>
                                            <input name="height" type="text" class="form-control" id="inputHeight"
                                                placeholder="Height" value="{{$size_order[2]}}">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Khối lượng</label>
                                        <div class="radio">
                                            <input type="radio" name="massOption" id="gridRadios1" value="option1">
                                            <label for="gridRadios1">
                                                Theo sản phẩm theo đơn hàng <i class="anticon anticon-info-circle"></i>
                                            </label>
                                        </div>
                                        <div class="radio">
                                            <input type="radio" name="massOption" id="gridRadios2" value="option2" checked>
                                            <label for="gridRadios2">
                                                Tùy chỉnh
                                            </label>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Nhập khối lượng tùy chỉnh (gam)</label>
                                        <input name="mass" type="text" class="form-control" id="customWeightInput"
                                            placeholder="Nhập khối lượng" value="{{$generalConfig->mass_order}}">
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput2">Yêu cầu</label>
                                        <select name="role" id="inputState" class="form-control">
                                            @if ($generalConfig->require_order == 1)
                                                <option value="1">Cho xem hàng, không cho thử</option>
                                            @endif
                                            <option value="2">Cho xem hàng, cho thử</option>
                                            <option value="3">Không cho xem hàng</option>
                                            @if ($generalConfig->require_order == 2)
                                                <option value="1">Cho xem hàng, không cho thử</option>
                                            @elseif ($generalConfig->require_order == 3)
                                                <option value="1">Cho xem hàng, không cho thử</option>
                                                <option value="2">Cho xem hàng, cho thử</option>
                                            @endif
                                        </select>
                                        
                                    </div>
                                    <div class="form-group">
                                        <label for="formGroupExampleInput">Ghi chú</label>
                                        <input name="note" type="text" class="form-control" id="formGroupExampleInput"
                                            placeholder="Ghi chú" value="{{$generalConfig->note_order}}">
                                    </div>
                                    <div class="row m-b-30">
                                        <div class="col-lg-6">
                                        </div>
                                        <div class="col-lg-6 text-right">
                                            <button class="btn btn-primary" data-bs-toggle="modal"
                                                data-bs-target="#add-member-modal">
                                                <span>Lưu</span>
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 col-lg-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center m-b-10">
                                    <h5>Thông tin kho</h5>
                                </div>
                                <form action="{{route('admin.transport.update-warehouse-address')}}" method="post">
                                    @csrf
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="inputEmail4">Tên kho</label>
                                            <input name="warehouse_name" type="text" class="form-control" id="inputEmail4" placeholder="">
                                        </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-3">
                                            <label for="inputEmail4">Tỉnh/Thành Phố</label>
                                            <select name="warehouse_pro" class="form-control" id="provinceSelect" onchange="loadDistricts()">
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Quận/Huyện</label>
                                            <select name="warehouse_dis" class="form-control" id="districtSelect" onchange="loadWards()">
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Phường/Thị Xã</label>
                                            <select name="warehouse_ward" class="form-control" id="wardSelect">
                                            </select>
                                        </div>
                                        <div class="form-group col-md-3">
                                            <label for="inputPassword4">Chi tiết</label>
                                            <input name="warehouse_detail" class="form-control" id="addressDetail" type="text"
                                                name="address-detail">
                                        </div>
                                        <input hidden name="addressFull" class="form-control" id="addressFull">
                                    </div>
                                    <div class="row">
                                        <div class="col-sm-12 col-md-6">
                                        </div>
                                        <div class="col-sm-12 col-md-6">
                                            <div class="align-justify-center">
                                                <input class="btn btn-default btn-sm flex-right modal-control" type="submit" value="Thêm kho" id="saveAddress">
                                                
                                            </div>
                                        </div>
                                    </div>
                                </form>
                                <div class="m-t-30">
                                    <div class="table-responsive">
                                        <table class="table table-hover">
                                            <thead>
                                                <tr>
                                                    <th>Kho hàng</th>
                                                    <th>Địa chỉ</th>
                                                    <th>Thao tác</th>
                                                </tr>
                                            </thead>
                                            <tbody class="sale-list">
                                                <tr>
                                                    <td>{{$address_warehouse[0]}}</td>
                                                    <td>{{$address_warehouse[5]}}</td>
                                                    <td><div class="view-data modal-control" style="cursor: pointer" atr="Delete" data-id="3"><i class="anticon anticon-delete"></i></div></td>
                                                </tr>
                                                <tr>
                                                    <td>Tên kho</td>
                                                    <td>Địa chỉ</td>
                                                    <td>Thao tác</td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                // Lắng nghe sự kiện khi radio button thay đổi
                document.querySelectorAll('input[name="massOption"]').forEach(function(radio) {
                    radio.addEventListener('change', function() {
                        // Kiểm tra xem radio button "Tùy chỉnh" có được chọn hay không
                        if (this.value === 'option2') {
                            // Nếu được chọn, enable thẻ input
                            document.getElementById('customWeightInput').removeAttribute('disabled');
                        } else {
                            // Nếu không được chọn, disable thẻ input và xóa giá trị
                            document.getElementById('customWeightInput').setAttribute('disabled', 'disabled');
                            document.getElementById('customWeightInput').value = '';
                        }
                    });
                });
            </script>
