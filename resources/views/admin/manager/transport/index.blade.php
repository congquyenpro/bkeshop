@extends('admin.layout')
@section('title', 'Sản phẩm')
@section('menu-data')
    <input type="hidden" name="" class="menu-data" value="manager-group | product">
@endsection()


@section('css')
    <link href="{{ asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="{{ asset('manager/assets/css/app.min.css') }}" rel="stylesheet">

    <link href="{{ asset('manager/assets/vendors/datatables/dataTables.bootstrap.min.css') }}" rel="stylesheet">

@endsection()

@section('body')


<div class="page-header no-gutters">
    <div class="row align-items-md-center">
        <div class="col-md-6">
            <div class="media m-v-10">
                <div class="avatar avatar-cyan avatar-icon avatar-square">
                    <i class="anticon anticon-star"></i>
                </div>
                <div class="media-body m-l-15">
                    <h6 class="mb-0">Vận chuyển</h6>
                    <span class="text-gray font-size-13">Quản lý vận đơn</span>
                </div>
            </div>
        </div>

    </div>
</div>
    <div class="card">
        <div class="card-body">
            <div class="row m-b-30">
                <div class="col-lg-8">
                    <div class="d-md-flex">
                        <div class="m-b-10">
                            <select class="custom-select" style="min-width: 180px;">
                                <option selected="">Status</option>
                                <option value="all">All</option>
                                <option value="approved">Approved</option>
                                <option value="pending">Pending</option>
                                <option value="rejected">Rejected</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-right">
                    <button class="btn btn-primary">
                        <i class="anticon anticon-file-excel m-r-5"></i>
                        <span>Export</span>
                    </button>
                </div>
            </div>
            <div class="table-responsive">
                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper dt-bootstrap4 no-footer">
                    <div class="row">
                        <div class="col-sm-12">
                            <table class="table table-hover e-commerce-table dataTable no-footer" id="DataTables_Table_0"
                                role="grid" aria-describedby="DataTables_Table_0_info">
                                <thead>
                                    <tr role="row">
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="ID: activate to sort column ascending"
                                            style="width:10%;">Mã vận đơn</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Customer: activate to sort column ascending"
                                            style="width: 10%;">Mã đơn hàng</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="Date: activate to sort column ascending"
                                            style="width: 15%;">Khách hàng</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Amount: activate to sort column ascending"
                                            style="width: 15%;">Đơn vị vận chuyển</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Status: activate to sort column ascending"
                                            style="width: 15%;">COD và Phí trả</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0" rowspan="1"
                                            colspan="1" aria-label="ID: activate to sort column ascending"
                                            style="width:10%;">Trạng thái</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label=": activate to sort column ascending" style="width: 10%;">
                                        </th>
                                               
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr role="row" class="even">
                                        <td>
                                            JHGN4
                                        </td>
                                        <td>
                                            #15
                                        </td>
                                        <td>
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-blue m-r-10">Nguyễn Công Quyền</span>
                                            </div>
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-green m-r-10">0866888222</span>
                                            </div>
                                        </td>
                                        <td>Giao hàng nhanh</td>
                                        <td>
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-green m-r-10">Phí trả ĐVVC: 40,000</span>
                                            </div>
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-red m-r-10">Thu hộ COD: 0</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="badge badge-success badge-dot m-r-10"></div>
                                                <div>Chờ lấy hàng</div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                <a class="view-data " style="cursor: pointer" href="#" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="anticon anticon-eye"></i></a>
                                            </button>   
                                            <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                <i class="anticon anticon-edit"></i>
                                            </button>
                                            <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                <i class="anticon anticon-delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                    <tr role="row" class="even">
                                        <td>
                                            JHGN7
                                        </td>
                                        <td>
                                            #12
                                        </td>
                                        <td>
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-blue m-r-10">Nguyễn Văn Huy</span>
                                            </div>
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-green m-r-10">0866888222</span>
                                            </div>
                                        </td>
                                        <td>Bk-eShop</td>
                                        <td>
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-green m-r-10">Phí trả ĐVVC: 40,000</span>
                                            </div>
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-red m-r-10">Thu hộ COD: 0</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="badge badge-danger badge-dot m-r-10"></div>
                                                <div>Hủy giao hàng</div>
                                            </div>
                                        </td>
                                        <td class="text-right">
                                            <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                <a class="view-data " style="cursor: pointer" href="#" data-toggle="modal" data-target=".bd-example-modal-xl"><i class="anticon anticon-eye"></i></a>
                                            </button>                                            
                                            <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                <i class="anticon anticon-edit"></i>
                                            </button>
                                            <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                <i class="anticon anticon-delete"></i>
                                            </button>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade bd-example-modal-xl">
        <div class="modal-dialog modal-xl modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title h4">Chi tiết đơn hàng</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
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
                                <td>Cong Quyen</td>
                              </tr>
                              <tr>
                                <td>Điện thoại</td>
                                <td>0888336888</td>
                              </tr>
                              <tr>
                                <td>Địa chỉ</td>
                                <td>Phường 14, Quận 10, Hồ Chí Minh, Vietnam</td>
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
                                    <td>Mã vận đơn</td>
                                    <td>JHGN7</td>
                                  </tr>
                                  <tr>
                                    <td>Mã đơn khách hàng</td>
                                    <td>12</td>
                                  </tr>
                                  <tr>
                                    <td>Ngày dự kiến lấy</td>
                                    <td>22-12-2023</td>
                                  </tr>
                                  <tr>
                                    <td>Ngày dự kiến giao</td>
                                    <td>25-12-2023</td>
                                  </tr>
                                  <tr>
                                    <td>Trạng thái hiện tại</td>
                                    <td>Chờ lấy hàng</td>
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
                                    <td>Nước hoa x3</td>
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
                                    <th>Thời gian</th>
                                    <th>Trạng thái đơn</th>
                                    <th>Chi tiết</th>
                                  </tr>
                                <tbody>
                                  <tr>
                                    <td>Thứ 5, 14/12/2023 11:27</td>
                                    <td>Chờ lấy hàng</td>
                                    <td>167 Giải Phóng, Phương Mai, Đống Đa, Hà Nội, Vietnam</td>
                                  </tr>
                                  <tr>
                                    <td>Thứ 6, 15/12/2023 11:27</td>
                                    <td>Đang giao hàng</td>
                                    <td>Đơn hàng đã đến bưu cục 20-HNI Long Bien Hub</td>
                                  </tr>
                                  <tr>
                                    <td>Thứ 7, 16/12/2023 11:27</td>
                                    <td>Đang giao hàng</td>
                                    <td>Đơn hàng đã đến kho phân loại BN B Mega SOC</td>
                                  </tr>
                                  <tr>
                                    <td>Thứ 7, 16/12/2023 11:27</td>
                                    <td>Đã giao hàng</td>
                                    <td>Đơn hàng đã được giao thành công</td>
                                  </tr>

                                </tbody>
                              </table>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button type="button" class="btn btn-primary">Lưu</button>
                </div>
            </div>
        </div>
    </div>


@endsection()

@section('js')
    <script src="{{ asset('manager/assets/js/page/staff_customer.js') }}"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Core Vendors JS -->
    <script src="{{ asset('manager/assets/js/vendors.min.js') }}"></script>

    <!-- page js -->
    <script src="{{ asset('manager/assets/vendors/datatables/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('manager/assets/vendors/datatables/dataTables.bootstrap.min.js') }}"></script>
    <script src="{{ asset('manager/assets/js/pages/e-commerce-order-list.js') }}"></script>

    <!-- Core JS -->
    <script src="{{ asset('manager/assets/js/app.min.js') }}"></script>

    <!-- Order Status API -->
    <script src="{{ asset('manager/assets/js/api.js') }}"></script>
    <script src="{{ asset('manager/assets/js/page/more/transport/order.js') }}"></script>

@endsection()
