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
                        <h6 class="mb-0">Nhân viên (9)</h6>
                        <span class="text-gray font-size-13">Quản lý nhân viên</span>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="text-md-right m-v-10">
                    <div class="btn-group">
                        <button id="list-view-btn" type="button" class="btn btn-default btn-icon">
                            <i class="anticon anticon-ordered-list"></i>
                        </button>
                        <button id="card-view-btn" type="button" class="btn btn-default btn-icon active">
                            <i class="anticon anticon-appstore"></i>
                        </button>
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
                        <div class="m-b-10 m-r-15">
                            <select class="custom-select" style="min-width: 180px;">
                                <option selected="">Vai trò</option>
                                <option value="all">Tất cả</option>
                                <option value="homeDeco">Admin</option>
                                <option value="eletronic">Nhân viên quản lý</option>
                                <option value="jewellery">Nhân viên kho</option>
                                <option value="jewellery">Nhân viên kế toán</option>
                            </select>
                        </div>
                        <div class="m-b-10">
                            <select class="custom-select" style="min-width: 180px;">
                                <option selected="">Trạng thái</option>
                                <option value="all">Tất cả</option>
                                <option value="inStock">Hoạt động</option>
                                <option value="outOfStock">Khóa</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 text-right">
                    <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#add-member-modal">
                        <i class="anticon anticon-plus-circle m-r-5"></i>
                        <span>Thêm nhân viên</span>
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
                                        <th class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1" aria-sort="ascending"
                                            aria-label="
                                
                                    
                                    
                                
                            : activate to sort column descending"
                                            style="width: 48.075px;">
                                            <div class="checkbox">
                                                <input id="checkAll" type="checkbox">
                                                <label for="checkAll" class="m-b-0"></label>
                                            </div>
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="ID: activate to sort column ascending" style="width: 28.375px;">ID
                                        </th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Product: activate to sort column ascending"
                                            style="width: 210.825px;">Họ tên</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Category: activate to sort column ascending"
                                            style="width: 128.025px;">Vai trò</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Stock Left: activate to sort column ascending"
                                            style="width: 88.7375px;">Email</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label="Status: activate to sort column ascending"
                                            style="width: 108.688px;">Trạng thái</th>
                                        <th class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                            rowspan="1" colspan="1"
                                            aria-label=": activate to sort column ascending" style="width: 71.475px;">
                                        </th>
                                    </tr>
                                </thead>
                                <tbody>

                                    {{-- Staff information --}}
                                    @foreach ($staffInfor as $user)
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">
                                                <div class="checkbox">
                                                    <input id="check-item-{{$user->id}}" type="checkbox">
                                                    <label for="check-item-{{$user->id}}" class="m-b-0"></label>
                                                </div>
                                            </td>
                                            <td>
                                                {{ $user->id }}
                                            </td>
                                            <td>
                                                <div class="d-flex align-items-center">
                                                    <img class="img-fluid rounded" src="assets/images/others/thumb-9.jpg"
                                                        style="max-width: 60px" alt="">
                                                    <h6 class="m-b-0 m-l-10">{{ $user->name }}</h6>
                                                </div>
                                            </td>
                                            <td>
                                                @if ($user->type==1)
                                                    Admin
                                                @elseif ($user->type==2)
                                                    Nhân viên quản lý
                                                @elseif ($user->type==3)
                                                    Nhân viên Kho  
                                                @else
                                                    Nhân viên kế toán
                                                @endif
                                            </td>
    
                                            <td>{{ $user->email }}</td>
                                            <td>
                                                @if ($user->status==1)
                                                    <div class="d-flex align-items-center">
                                                        <div class="badge badge-success badge-dot m-r-10"></div>
                                                        <div>Hoạt động</div>
                                                    </div>
                                                @else
                                                    <div class="d-flex align-items-center">
                                                        <div class="badge badge-danger badge-dot m-r-10"></div>
                                                        <div>Tạm khóa</div>
                                                    </div>
                                                @endif

                                            </td>
                                            <td class="text-right">
                                                <button data-user-id={{$user->id}}  id="edit-member-btn" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right " data-bs-toggle="modal" data-bs-target="#edit-member-modal">
                                                    <i class="anticon anticon-edit"></i>
                                                </button>
                                                <button data-user-id={{$user->id}} id="delete-member-btn" class="btn btn-icon btn-hover btn-sm btn-rounded pull-right " data-bs-toggle="modal" data-bs-target="#delete-member-modal">
                                                    <i class="anticon anticon-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>


    {{-- Add member --}}
    <div class="add-member-box">
        <!-- The Modal -->
        <div class="modal" id="add-member-modal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm nhân viên</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form action="{{route('admin.manager.add-staff')}}" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="inputname" class="col-sm-2 col-form-label">Họ tên</label>
                                <div class="col-sm-10">
                                    <input type="name" name="name" class="form-control" id="inputname3" placeholder="Họ tên">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail3" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Mật khẩu</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword3"
                                        placeholder="Mật khẩu">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 pt-0">Vai trò</label>
                                <div class="col-sm-10">
                                    <select name="role" id="inputState" class="form-control">
                                        <option>Choose...</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Nhân viên Quản lý</option>
                                        <option value="3">Nhân viên Kho</option>
                                        <option value="4">Nhân viên Kế toán</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Phân quyền</div>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule0" value="rule0" >
                                        <label for="rule0">Tất cả</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule1" value="rule1">
                                        <label for="rule1">Sản phẩm</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule2" value="rule2">
                                        <label for="rule2">Đơn hàng</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule3" value="rule3">
                                        <label for="rule3">Vận chuyển</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule4" value="rule4">
                                        <label for="rule4">Kho hàng</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule5" value="rule5">
                                        <label for="rule5">Khách hàng</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule6" value="rule6">
                                        <label for="rule6">Nhân viên</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule7" value="rule7">
                                        <label for="rule7">Cấu hình</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule8" value="rule8">
                                        <label for="rule8">Đóng gói</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule9" value="rule9">
                                        <label for="rule9">Thống kê</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule" value="rule">
                                        <label for="rule">Etc</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Lưu lại</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

    {{-- Edit member --}}
    <div class="edit-member-box">
        <!-- The Modal -->
        <div class="modal" id="edit-member-modal">
            <div class="modal-dialog modal-xl">
                <div class="modal-content">

                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Thêm nhân viên</h4>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>

                    <!-- Modal body -->
                    <div class="modal-body">
                        <form id="edit-member-form" action="" method="POST">
                            @csrf
                            <div class="form-group row">
                                <label for="inputname" class="col-sm-2 col-form-label">Họ tên</label>
                                <div class="col-sm-10">
                                    <input type="name" name="name" class="form-control" id="inputname4" placeholder="Họ tên">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputEmail3" class="col-sm-2 col-form-label">Email</label>
                                <div class="col-sm-10">
                                    <input type="email" name="email" class="form-control" id="inputEmail4" placeholder="Email">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputPassword3" class="col-sm-2 col-form-label">Mật khẩu</label>
                                <div class="col-sm-10">
                                    <input type="password" name="password" class="form-control" id="inputPassword4"
                                        placeholder="Mật khẩu">
                                </div>
                            </div>
                            <div class="form-group row">
                                <label class="col-form-label col-sm-2 pt-0">Vai trò</label>
                                <div class="col-sm-10">
                                    <select name="role" id="inputState4" class="form-control">
                                        <option>Choose...</option>
                                        <option value="1">Admin</option>
                                        <option value="2">Nhân viên Quản lý</option>
                                        <option value="3">Nhân viên Kho</option>
                                        <option value="4">Nhân viên Kế toán</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-sm-2">Phân quyền</div>
                                <div class="col-sm-10">
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule0a" value="rule0" >
                                        <label for="rule0">Tất cả</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule1a" value="rule1">
                                        <label for="rule1">Sản phẩm</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule2a" value="rule2">
                                        <label for="rule2">Đơn hàng</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule3a" value="rule3">
                                        <label for="rule3">Vận chuyển</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule4a" value="rule4">
                                        <label for="rule4">Kho hàng</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule5a" value="rule5">
                                        <label for="rule5">Khách hàng</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule6a" value="rule6">
                                        <label for="rule6">Nhân viên</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule7a" value="rule7">
                                        <label for="rule7">Cấu hình</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule8a" value="rule8">
                                        <label for="rule8">Đóng gói</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rule9a" value="rule9">
                                        <label for="rule9">Thống kê</label>
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" name="permissions[]" id="rulea" value="rule">
                                        <label for="rule">Etc</label>
                                    </div>
                                </div>
                            </div>
                            <!-- Modal footer -->
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Lưu lại</button>
                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Đóng</button>
                            </div>
                        </form>
                    </div>


                </div>
            </div>
        </div>
    </div>

    {{-- Delete member --}}
    <div class="modal fade" id="delete-member-modal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Xác nhận</h5>
                    <button type="button" class="close" data-dismiss="modal">
                        <i class="anticon anticon-close"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div id="member-name"></div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Đóng</button>
                    <button id="delete-member-submit" type="button" class="btn btn-danger">Xóa nhân viên</button>
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
@endsection()
