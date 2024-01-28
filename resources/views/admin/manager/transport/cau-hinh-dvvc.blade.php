            {{-- Tab: Cấu hình đơn vị vận chuyển --}}
            <div class="tab-pane fade" id="profile-justified" role="tabpanel" aria-labelledby="profile-tab-justified">
                <div class="row">
                    <div class="col-md-12 col-lg-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-center m-b-20">
                                    <h5>Đơn vị vận chuyển</h5>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item p-h-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-icon" style="color: #005ef7; background: rgba(0, 94, 247, 0.1)">
                                                    <i class="fas fa-shipping-fast"></i>
                                                </div>
                                                <div class="font-size-15 font-weight-semibold m-l-15">Giao hàng nhanh (GHN)</div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="switch m-t-5 m-l-10">
                                                    <input type="checkbox" id="switch-inst" checked>
                                                    <label for="switch-inst"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                    <li class="list-group-item p-h-0">
                                        <div class="d-flex justify-content-between align-items-center">
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-icon" style="color: #fff; background: radial-gradient(circle at 30% 107%, #fdf497 0%, #fdf497 5%, #fd5949 45%,#d6249f 60%,#285AEB 90%)">
                                                    <i class="fas fa-truck"></i>
                                                </div>
                                                <div class="font-size-15 font-weight-semibold m-l-15">BK-eShop (Tự vận chuyển)</div>
                                            </div>
                                            <div class="d-flex align-items-center">
                                                <div class="switch m-t-5 m-l-10">
                                                    <input type="checkbox" id="switch-db" checked>
                                                    <label for="switch-db"></label>
                                                </div>
                                            </div>
                                        </div>
                                    </li>

                                </ul> 
                            </div>
                        </div>
                    </div>
        
                    <div class="col-md-12 col-lg-8">
                        <div class="card">
                            <div class="card-body">
                               <div class="d-flex justify-content-between align-items-center">
                                    <h5>Top Sản phẩm</h5>
                                </div>
                                <div class="m-t-30">
                                    <div class="d-flex">
                                        <ul class="nav nav-tabs flex-column" id="myTabVertical" role="tablist">
                                            <li class="nav-item">
                                                <a class="nav-link active" id="home-tab-vertical" data-toggle="tab" href="#home-vertical" role="tab" aria-controls="home-vertical" aria-selected="true">GHN</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="profile-tab-vertical" data-toggle="tab" href="#profile-vertical" role="tab" aria-controls="profile-vertical" aria-selected="false">BK-eShop</a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link" id="contact-tab-vertical" data-toggle="tab" href="#contact-vertical" role="tab" aria-controls="contact-vertical" aria-selected="false">More</a>
                                            </li>
                                        </ul>
                                    
                                        <div class="tab-content m-l-15" id="myTabContentVertical">
                                            <div class="tab-pane fade show active" id="home-vertical" role="tabpanel" aria-labelledby="home-tab-vertical">
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">Settings</label>
                                                    <div class="radio3">
                                                        <input type="radio" name="gridRadios3" id="gridRadios3" value="option3" checked="">
                                                        <label for="gridRadios1">
                                                            Option1
                                                        </label>
                                                    </div>
                                                    <div class="radio3">
                                                        <input type="radio" name="gridRadios3" id="gridRadios4" value="option4">
                                                        <label for="gridRadios2">
                                                            Option2
                                                        </label>
                                                    </div>
                                                </div>
                                                <div class="form-group">
                                                    <label for="formGroupExampleInput2">Nhập token</label>
                                                    <input type="text" class="form-control" id="formGroupExampleInput2" placeholder="Token lấy từ GHN">
                                                </div>
                                                <div class="row">
                                                    <div class="col-sm-12 col-md-2">
                                                    </div>
                                                    <div class="col-sm-12 col-md-10">
                                                        <div class="align-justify-center">
                                                            <a href="#" class="btn btn-default btn-sm flex-right modal-control" atr="Create"><i class="fas fa-save"></i> Lưu cấu hình</a> 
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="tab-pane fade" id="profile-vertical" role="tabpanel-vertical" aria-labelledby="profile-tab-vertical">
                                                ...
                                            </div>
                                            <div class="tab-pane fade" id="contact-vertical" role="tabpanel-vertical" aria-labelledby="contact-tab-vertical">
                                                Contact to update !
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
