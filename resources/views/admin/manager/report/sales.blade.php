@extends('admin.layout')
@section('title', 'Báo cáo tài chính')
@section('menu-data')
    <input type="hidden" name="" class="menu-data" value="statistic-group | statistic">
@endsection()


@section('css')
    <link href="{{ asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.css') }}" rel="stylesheet">
    <link href="{{ asset('manager/assets/css/app.min.css') }}" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        #print-report:hover, #question-ans:hover{
            cursor: pointer;
            color: #070572;
        }
        .explain{
        white-space: pre-line;
        }
    </style>
@endsection()

@section('body')
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-12">
            <div class="d-flex flex-wrap align-items-center justify-content-between mb-4">
                <div>
                    <h4 class="mb-3">Sale List</h4>
                    <p class="mb-0">Sales enables you to effectively control sales KPIs and monitor them in one central<br>
                     place while helping teams to reach sales goals. </p>
                </div>
                <a href="page-add-sale.html" class="btn btn-primary add-list"><i class="las la-plus mr-3"></i>Add Sale</a>
            </div>
        </div>
        <div class="col-lg-12">
            <div class="table-responsive rounded mb-3">
            <table class="data-table table mb-0 tbl-server-info">
                <thead class="bg-white text-uppercase">
                    <tr class="ligth ligth-data">
                        <th>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox1">
                                <label for="checkbox1" class="mb-0"></label>
                            </div>
                        </th>
                        <th>Date</th>
                        <th>Customer</th>
                        <th>Total</th>
                        <th>Paid</th>
                        <th>Status</th>
                        <th>Biller</th>
                        <th>Tax</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody class="ligth-body">
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox2">
                                <label for="checkbox2" class="mb-0"></label>
                            </div>
                        </td>
                        <td>01 jan 2020</td>
                        <td>Bill Yerds</td>
                        <td>38.50</td>
                        <td>38.50</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>Yerds</td>
                        <td>1.3</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox3">
                                <label for="checkbox3" class="mb-0"></label>
                            </div>
                        </td>
                        <td>03 jan 2020</td>
                        <td>Anna Sthesia</td>
                        <td>40.50</td>
                        <td>40.50</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>Sthesia</td>
                        <td>1.4</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox4">
                                <label for="checkbox4" class="mb-0"></label>
                            </div>
                        </td>
                        <td>05 jan 2020</td>
                        <td>Paul Molive</td>
                        <td>50.00</td>
                        <td>50.00</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>Molive</td>
                        <td>1.5</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox5">
                                <label for="checkbox5" class="mb-0"></label>
                            </div>
                        </td>
                        <td>15 jan 2020</td>
                        <td>Anna Mull</td>
                        <td>85.50</td>
                        <td>85.50</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>Anna</td>
                        <td>1.8</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox6">
                                <label for="checkbox6" class="mb-0"></label>
                            </div>
                        </td>
                        <td>24 jan 2020</td>
                        <td>Paige Turner</td>
                        <td>38.50</td>
                        <td>38.50</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>Turner</td>
                        <td>1.9</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox7">
                                <label for="checkbox7" class="mb-0"></label>
                            </div>
                        </td>
                        <td>09 Feb 2020</td>
                        <td>Bob Frapples</td>
                        <td>48.50</td>
                        <td>48.50</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>Frapples</td>
                        <td>1.4</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox8">
                                <label for="checkbox8" class="mb-0"></label>
                            </div>
                        </td>
                        <td>25 feb 2020</td>
                        <td>Barb Ackue</td>
                        <td>58.50</td>
                        <td>55.50</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>Ackue</td>
                        <td>1.6</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox9">
                                <label for="checkbox9" class="mb-0"></label>
                            </div>
                        </td>
                        <td>28 feb 2020</td>
                        <td>Greta Life</td>
                        <td>60.45</td>
                        <td>60.45</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>Yerds</td>
                        <td>1.8</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="checkbox d-inline-block">
                                <input type="checkbox" class="checkbox-input" id="checkbox10">
                                <label for="checkbox10" class="mb-0"></label>
                            </div>
                        </td>
                        <td>05 Mar 2020</td>
                        <td>Pete Sariya</td>
                        <td>52.48</td>
                        <td>52.48</td>
                        <td><div class="badge badge-success">Paid</div></td>
                        <td>Sariya</td>
                        <td>1.2</td>
                        <td>
                            <div class="d-flex align-items-center list-action">
                                <a class="badge badge-info mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="View" href="#"><i class="ri-eye-line mr-0"></i></a>
                                <a class="badge bg-success mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Edit" href="#"><i class="ri-pencil-line mr-0"></i></a>
                                <a class="badge bg-warning mr-2" data-toggle="tooltip" data-placement="top" title="" data-original-title="Delete" href="#"><i class="ri-delete-bin-line mr-0"></i></a>
                            </div>
                        </td>
                    </tr>
                </tbody>
            </table>
            </div>
        </div>
    </div>
    <!-- Page end  -->
</div>
<div class="container-fluid add-form-list">
        <div class="row">
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex justify-content-between">
                        <div class="header-title">
                            <h4 class="card-title">Add Sale</h4>
                        </div>
                    </div>
                    <div class="card-body">
                        <form action="page-list-returns.html" data-toggle="validator" novalidate="true">
                            <div class="row">                                  
                                <div class="col-md-6">                      
                                    <div class="form-group">
                                        <label>Date *</label>
                                        <input type="text" class="form-control" placeholder="Date">
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Reference No *</label>
                                        <input type="text" class="form-control" placeholder="Enter Reference No" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Biller *</label>
                                        <div class="dropdown bootstrap-select form-control"><select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>Test Biller</option>
                                        </select><button type="button" tabindex="-1" class="btn dropdown-toggle py-0" data-toggle="dropdown" role="combobox" aria-owns="bs-select-1" aria-haspopup="listbox" aria-expanded="false" title="Test Biller"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Test Biller</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-1" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                    </div> 
                                </div>  
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Customer *</label>
                                        <input type="text" class="form-control" placeholder="Enter Customer Name" required="">
                                        <div class="help-block with-errors"></div>
                                    </div>
                                </div>   
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Order Tax *</label>
                                        <div class="dropdown bootstrap-select form-control"><select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>No Text</option>
                                            <option>GST @5%</option>
                                            <option>VAT @10%</option>
                                        </select><button type="button" tabindex="-1" class="btn dropdown-toggle py-0" data-toggle="dropdown" role="combobox" aria-owns="bs-select-2" aria-haspopup="listbox" aria-expanded="false" title="No Text"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">No Text</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-2" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                    </div>
                                </div> 
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Order Discount</label>
                                        <input type="text" class="form-control" placeholder="Discount">
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Shipping</label>
                                        <input type="text" class="form-control" placeholder="Shpping">
                                    </div>
                                </div>
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Attach Document</label>
                                        <input type="file" class="form-control image-file" name="pic" accept="image/*">
                                    </div>
                                </div>
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Sale Status *</label>
                                        <div class="dropdown bootstrap-select form-control"><select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>Completed</option>
                                            <option>Pending</option>
                                        </select><button type="button" tabindex="-1" class="btn dropdown-toggle py-0" data-toggle="dropdown" role="combobox" aria-owns="bs-select-3" aria-haspopup="listbox" aria-expanded="false" title="Completed"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Completed</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-3" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                    </div>
                                </div> 
                                <div class="col-md-6"> 
                                    <div class="form-group">
                                        <label>Payment Status *</label>
                                        <div class="dropdown bootstrap-select form-control"><select name="type" class="selectpicker form-control" data-style="py-0">
                                            <option>Pending</option>
                                            <option>Due</option>
                                            <option>Paid</option>
                                        </select><button type="button" tabindex="-1" class="btn dropdown-toggle py-0" data-toggle="dropdown" role="combobox" aria-owns="bs-select-4" aria-haspopup="listbox" aria-expanded="false" title="Pending"><div class="filter-option"><div class="filter-option-inner"><div class="filter-option-inner-inner">Pending</div></div> </div></button><div class="dropdown-menu "><div class="inner show" role="listbox" id="bs-select-4" tabindex="-1"><ul class="dropdown-menu inner show" role="presentation"></ul></div></div></div>
                                    </div>
                                </div> 
                                <div class="col-md-12">
                                    <div class="form-group">
                                        <label>Sale Note *</label>
                                        <div id="quill-tool" class="ql-toolbar ql-snow">
                                            <button class="ql-bold" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Bold" type="button"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,4H9.5A2.5,2.5,0,0,1,12,6.5v0A2.5,2.5,0,0,1,9.5,9H5A0,0,0,0,1,5,9V4A0,0,0,0,1,5,4Z"></path> <path class="ql-stroke" d="M5,9h5.5A2.5,2.5,0,0,1,13,11.5v0A2.5,2.5,0,0,1,10.5,14H5a0,0,0,0,1,0,0V9A0,0,0,0,1,5,9Z"></path> </svg></button>
                                            <button class="ql-underline" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Underline" type="button"><svg viewBox="0 0 18 18"> <path class="ql-stroke" d="M5,3V9a4.012,4.012,0,0,0,4,4H9a4.012,4.012,0,0,0,4-4V3"></path> <rect class="ql-fill" height="1" rx="0.5" ry="0.5" width="12" x="3" y="15"></rect> </svg></button>
                                            <button class="ql-italic" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Add italic text <cmd+i>" type="button"><svg viewBox="0 0 18 18"> <line class="ql-stroke" x1="7" x2="13" y1="4" y2="4"></line> <line class="ql-stroke" x1="5" x2="11" y1="14" y2="14"></line> <line class="ql-stroke" x1="8" x2="10" y1="14" y2="4"></line> </svg></button>
                                            <button class="ql-image" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Upload image" type="button"><svg viewBox="0 0 18 18"> <rect class="ql-stroke" height="10" width="12" x="3" y="4"></rect> <circle class="ql-fill" cx="6" cy="7" r="1"></circle> <polyline class="ql-even ql-fill" points="5 12 5 11 7 9 8 10 11 7 13 9 13 12 5 12"></polyline> </svg></button>
                                            <button class="ql-code-block" data-toggle="tooltip" data-placement="bottom" title="" data-original-title="Show code" type="button"><svg viewBox="0 0 18 18"> <polyline class="ql-even ql-stroke" points="5 7 3 9 5 11"></polyline> <polyline class="ql-even ql-stroke" points="13 7 15 9 13 11"></polyline> <line class="ql-stroke" x1="10" x2="8" y1="5" y2="13"></line> </svg></button>
                                        </div>
                                        <div id="quill-toolbar" class="ql-container ql-snow"><div class="ql-editor ql-blank" data-gramm="false" contenteditable="true" data-placeholder="Compose an epic..."><p><br></p></div><div class="ql-clipboard" contenteditable="true" tabindex="-1"></div><div class="ql-tooltip ql-hidden"><a class="ql-preview" rel="noopener noreferrer" target="_blank" href="about:blank"></a><input type="text" data-formula="e=mc^2" data-link="https://quilljs.com" data-video="Embed URL"><a class="ql-action"></a><a class="ql-remove"></a></div></div>
                                    </div>
                                </div> 
                            </div>                            
                            <button type="submit" class="btn btn-primary mr-2 disabled">Add Sale</button>
                            <button type="reset" class="btn btn-danger">Reset</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- Page end  -->
    </div>
@endsection()


@section('sub_layout')


@endsection()
@section('js')

    <script src="{{ asset('manager/assets/vendors/chartjs/Chart.min.js') }}"></script>
    <script src="{{ asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js') }}"></script>
    <script src="{{ asset('manager/assets/js/pages/dashboard-project.js') }}"></script>

    <script src="{{ asset('manager/assets/vendors/chartist/chartist.min.js') }}"></script>
    <script src="{{ asset('manager/assets/js/pages/dashboard-default.js') }}"></script>

        <!-- Core Vendors JS -->
        <script src="{{asset('manager/assets/js/vendors.min.js')}}"></script>

        <!-- page js -->
        <script src="{{asset('manager/assets/vendors/select2/select2.min.js')}}"></script>
        <script src="{{asset('manager/assets/vendors/bootstrap-datepicker/bootstrap-datepicker.min.js')}}"></script>
        <script src="{{asset('manager/assets/vendors/quill/quill.min.js')}}"></script>
        <script src="{{asset('manager/assets/js/pages/form-elements.js')}}"></script>
        {{-- <script src="{{asset('manager/assets/js/app.min.js')}}"></script> --}}
@endsection()
