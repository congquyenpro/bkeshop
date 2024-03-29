const View = {
    table: {
        __generateDTRow(data){
            var order_status = [
                "badge-warning badge-pill",
                "badge-secondary badge-pill",
                "badge-info badge-pill",
                "badge-purple badge-pill",
                "badge-cyan badge-pill",
                "badge-geekblue badge-pill",
                "badge-success badge-pill",
                "badge-danger badge-pill",
                "badge-danger badge-pill",
            ]; 
            var order_status_title = [
                "Chờ xử lí",
                "Chưa hoàn thiện",
                "Đã hoàn thiện",
                "Chờ lấy hàng",
                "Đang giao hàng",
                "Đã giao hàng",
                "Hoàn thành",
                "Hủy đơn",
                "Hoàn trả",
            ];
            var order_payment = [ 
                "badge-pill badge-gold",
                "badge-pill badge-green",
            ];
            var order_payment_title= [ 
                "Chưa thanh toán",
                "Đã thanh toán",
            ];
            var order_payment_value = [ 
                "",
                "Thanh toán khi nhận hàng",
                "Thanh toán online",
            ];
            return [
                `<div class="id-order">${data.id}</div>`,
                `<p><i class="far fa-user m-r-10"></i>${data.name}</p>
                <p><i class="far fa-envelope m-r-10"></i>${data.email??''}</p>
                <p><i class="fas fa-phone-alt m-r-10"></i>${data.phone}</p>`,
                `
                <div class="d-flex align-items-center">
                    <div class="badge badge-success badge-dot m-r-10"></div>
                    <div>Thực tính: $ ${data.total}</div>
                </div>`,
                data.created_at,
                `<span class="badge m-b-5 ${order_status[data.order_status]}">${order_status_title[data.order_status]}</span>

                
                ${data.status == 2 ? `<span class="badge m-b-5 badge-pill badge-cyan">Đã thanh toán</span>`:`<span class="badge m-b-5 badge-pill badge-orange">Chưa thanh toán</span>`}
                ${data.payment == 1 || data.payment == 0 ?  `<span class="badge m-b-5 ">Thanh toán khi nhận</span>` : `<span class="badge m-b-5 ">Thanh toán Online</span>`}

                `,
                
                `<div class="view-data modal-fs-control" style="cursor: pointer" atr="View" data-id="${data.id}"><i class="anticon anticon-eye"></i></div>`
            ]
        },
        init(){
            var row_table = [
                    {
                        title: 'ID',
                        name: 'id',
                        orderable: true,
                        width: '5%',
                    },
                    {
                        title: 'Thông tin',
                        name: 'name',
                        orderable: true,
                    },
                    {
                        title: 'Đơn hàng',
                        name: 'name',
                        orderable: true,
                    },
                    {
                        title: 'Ngày đặt',
                        name: 'icon',
                        orderable: true,
                    },
                    {
                        title: 'Trạng thái',
                        name: 'icon',
                        orderable: true,
                        width: '10%',
                    },
                    {
                        title: 'Hành động',
                        name: 'Action',
                        orderable: true,
                        width: '10%',
                    },
                ];
            IndexView.table.init("#data-table", row_table);
        }
    },
    TabData: {
        onChange(callback){
            $(document).on('click', `.status-event`, function() {
                $(".status-event").removeClass("is-select");
                $(this).addClass("is-select");
                callback($(this).attr("data-id"));
            });
        },
    },
    modals: {
        onControl(name, callback){
            $(document).on('click', '.modal-fs-control', function() {
                var id = $(this).attr('data-id');
                if($(this).attr('atr').trim() == name) {
                    callback(id);
                }
            });
        },
        onClose(){
            $(document).on('click', '.modal-close', function() {
                $('.modal-fullscreen').removeClass('show');
                $('body').removeClass('modal-fs-open');
            });
            $(document).on('click', '.close-modal', function() {
                $('.modal-fullscreen').removeClass('show');
                $('body').removeClass('modal-fs-open');
            });
            $(document).mouseup(function(e) {
                var container = $(".fs-body");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $('.modal-fullscreen').removeClass('show');
                    $('body').removeClass('modal-fs-open');
                }
            });
        },
        launch(resource, modalTitleHTML, modalBodyHTML, modalFooterHTML){
            $(`${resource} .fs-title .modal-title`).html(modalTitleHTML);
            $(`${resource} .fs-content .fs-content-wrapper`).html(modalBodyHTML);
            $(`${resource} .fs-footer .close-modal`).html(modalFooterHTML[0]);
            $(`${resource} .fs-footer .push-modal`).html(modalFooterHTML[1]);
        },
        onShow(resource){
            $(resource).addClass('show');
            $('body').addClass('modal-fs-open');
            $(document).off('click', `${resource} .push-modal`);
        },
        onHide(resource){
            $(resource).removeClass('show');
            $('body').removeClass('modal-fs-open');
        },
        Update: {
            resource: '#update-modal',
            has_full: true,
            setDefaul(){ this.init();  },
            textDefaul(){
                IndexView.textCount.defaul(this.resource +' .data-name', this.resource + ' .data-name-return', 254)
            },
            createCategory(data){ 
                var resource = this.resource;
                $(`${this.resource} .category-list`).find("option").remove()
                $(`${this.resource} .category-list`).append(`<option value="0">----------</option>`)
                data.map(v => {
                    $(`${this.resource} .category-list`).append(`<option value="${v.id}">${v.name}</option>`)
                })
            },
            setVal(data){ 
                View.modals.Update.has_full = true;
                $(".customer-type").html(data.order[0].customer_id == 0 ? "Khách tự do" : "Thành viên")
                $(".customer-email").html(data.order[0].email)

                $(".customer-name").html(data.order[0].name)
                $(".customer-address").html(data.order[0].address)
                $(".customer-telephone").html(data.order[0].phone)
                $("#order_id_api").html(data.order[0].id)

                $(".customer-order-price").html(data.order[0].sub_total)
                $(".customer-order-discount").html(data.order[0].discount_total)
                $(".customer-order-total").html(data.order[0].total)

                $(".customer-payment-type").html(data.order[0].payment_value == 1 ? "Thanh toán khi nhận hàng" : "Thanh toán online")
                $(".customer-payment-status").html(data.order[0].payment_status == 0 ? "Chưa thanh toán" : "Đã thanh toán")
                $(".customer-order-comment").html(data.order[0].comment)

                var order_status = [
                    "badge-warning badge-pill",
                    "badge-success badge-pill",
                ];
                var order_status_title = [
                    "Chờ xử lí",
                    "Đã hoàn thiện",
                ];
                $(".data-list").find("tr").remove()
                data.order_detail.map(v => {
                    var warehouse_value = "";
                    if (v.warehouse_quatity == null || v.warehouse_quatity == 0 || v.warehouse_quatity < v.quantity) {
                        warehouse_value = `<div class="badge badge-red badge-pill m-r-10">${v.warehouse_quatity ?? 0+250}</div>`
                        View.modals.Update.has_full = false;
                    }else{
                        warehouse_value = `<div class="badge badge-green badge-pill m-r-10">${v.warehouse_quatity}</div>`
                    }
                    $(".data-list")
                        .append(`<tr>
                                    <td>${v.product_id}</td>
                                    <td><a href="http://127.0.0.1:8000/product/3-nuoc-hoa-province" target="_blank">${v.name}</a></td>
                                    <td>${v.quantity}</td>
                                    <td>${v.prices}</td>
                                    <td>${v.discount}%</td>
                                    <td>${v.total_price}</td>
                                    <td>${warehouse_value}</td>
                                </tr>`)
                })

                                    // <option value="0">Chờ xử lí</option>
                                    // <option value="1">Chưa hoàn thiện</option>
                                    // <option value="2">Đã hoàn thiện</option>
                                    // <option value="3">Chờ lấy hàng</option>
                                    // <option value="4">Đang giao hàng</option>
                                    // <option value="5">Đã giao hàng</option>
                                    // <option value="6">Hoàn thành</option>
                                    // <option value="7">Hủy đơn</option>
                                    //<option value="8">Hoàn trả đơn</option>

                $(".order-status option").remove()     
                if (data.order[0].order_status == 0) {
                    $(".order-status").append(`<option value="1">Chưa hoàn thiện</option>`)
                    $(".order-status").append(`<option value="2">Đã hoàn thiện</option>`)
                    $(".order-status").append(`<option value="7">Hủy đơn</option>`)

                    
                }
                if (data.order[0].order_status == 1) { 
                    $(".order-status").append(`<option value="2">Đã hoàn thiện</option>`) 
                    $(".order-status").append(`<option value="7">Hủy đơn</option>`)

                    //Thêm thông tin đơn giao hàng
                    $("#ship-setting").html(Template.Order.ShipSetting());

                    //status = 2: Đã thanh toán => code =0
                    if (data.order[0].status == 2) {
                        $('#cod_amount').val(0);
                    } else {
                        $('#cod_amount').val(data.order[0].total);
                    }

                    $('#insurance_value').val(data.order[0].total);
                    $('#client_order_code').val(data.order[0].id);
                    $('#to_name').val(data.order[0].name);
                    $('#to_phone').val(data.order[0].phone);

                    ViewGHN.CreateStep.show();

                }
                if (data.order[0].order_status == 2) { 
                    $(".order-status").append(`<option value="3">Chờ lấy hàng</option>`) 
                    $(".order-status").append(`<option value="1">Chưa hoàn thiện</option>`)
                    $(".order-status").append(`<option value="7">Hủy đơn</option>`)
                    
                    $("#ship-setting").html(Template.Order.printOrder());
                    ViewGHN.PackageStep.show();
                    
                }
                if (data.order[0].order_status == 3) { 
                    $(".order-status").append(`<option value="4">Đang giao hàng</option>`)
                    $(".order-status").append(`<option value="6">Hoàn thành</option>`)  
                    $(".order-status").append(`<option value="7">Hủy đơn</option>`)

                    $("#ship-setting").html(Template.Order.vanchuyenDetail());
                    ViewGHN.ReadyToPickStep.show();
                    ViewGHN.OrderLog.getOrderlog(data.order[0].id);
                    $("#order-transport-product").html("Chờ lấy hàng");

                }
                if (data.order[0].order_status == 4) { 
                    $(".order-status").append(`<option value="5">Đã giao hàng</option>`) 
                    $(".order-status").append(`<option value="6">Hoàn thành</option>`)
                    $(".order-status").append(`<option value="8">Hoàn trả</option>`)  
                    $(".order-status").append(`<option value="7">Hủy đơn</option>`)

                    $("#ship-setting").html(Template.Order.vanchuyenDetail());
                    ViewGHN.OrderLog.getOrderlog(data.order[0].id);
                    $("#order-transport-product").html("Đang giao hàng");
                    $('#form-select-status option[value="7"]').prop('disabled', true);
                    
                }
                if (data.order[0].order_status == 5) { 
                    $(".order-status").append(`<option value="6">Hoàn thành</option>`)
                    
                    //update trạng thái
                    $("#ship-setting").html(Template.Order.vanchuyenDetail());
                    ViewGHN.OrderLog.getOrderlog(data.order[0].id);
                    $("#order-transport-product").html("Đã giao hàng");
                    
                }

                if (data.order[0].order_status == 6) { 
                    //update trạng thái
                    $("#ship-setting").html(Template.Order.vanchuyenDetail());

                    ViewGHN.OrderLog.getNewOrderInfo(data.order[0].id);
                    ViewGHN.OrderLog.getOrderlog(data.order[0].id);
                    $("#order-transport-product").html("Giao hàng thành công");

                }
                if (data.order[0].order_status == 7) { 
                    //update trạng thái
                    $("#ship-setting").html(Template.Order.vanchuyenDetail());

                    ViewGHN.OrderLog.getNewOrderInfo(data.order[0].id);
                    ViewGHN.OrderLog.getOrderlog(data.order[0].id);
                    ViewGHN.ReadyToPickStep.show();
                    $("#order-transport-product").html("Hủy đơn");

                }
                if (data.order[0].order_status == 8) { 
                    //update trạng thái
                    $("#ship-setting").html(Template.Order.vanchuyenDetail());

                    ViewGHN.OrderLog.getNewOrderInfo(data.order[0].id);
                    ViewGHN.OrderLog.getOrderlog(data.order[0].id);
                    ViewGHN.ReadyToPickStep.show();
                    $("#order-transport-product").html("Hoàn trả");

                }

                // $(".order-status").val(data.data_order[0].order_status)
            },
            getVal(){ 
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${this.resource} .push-modal`, function() {
                    if($(this).attr('atr').trim() == name) {
                        callback();
                    }
                });
            }, 
            init() {
                var modalTitleHTML = `Cập nhật`;
                var modalBodyHTML  = Template.Order.Update();
                var modalFooterHTML = ['Đóng', 'Cập nhật'];
                View.modals.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML);
            }
        },
        init() {
            $(document).on('click', `.order-status`, function() {
                /* if(!View.modals.Update.has_full)  $(".order-status option[value=2]").remove() */
            });
            this.onClose();

            this.Update.init();
        }
    },
    init(){
        View.table.init();
        View.modals.init();
    }
};
(() => {
    View.init();


    View.TabData.onChange((id) => {
        getData(id)
        localStorage.setItem("item_tab", id);
    })
    View.TabData.onChange("Unfulfilled", () => {
        getData(1)
        localStorage.setItem("item_tab", 1);
    })
    View.TabData.onChange("Fulfilled", () => {
        getData(2)
        localStorage.setItem("item_tab", 2);
    })
    View.TabData.onChange("Shipped", () => {
        getData(3)
        localStorage.setItem("item_tab", 3);
    })
    View.TabData.onChange("Refund", () => {
        getData(4)
        localStorage.setItem("item_tab", 4);
    })

    function init(){
        getData(0);
        localStorage.setItem("item_tab", 0);
    }

    View.modals.onControl("View", (id) => {
        var resource = View.modals.Update.resource;
        Api.Order.GetOne(id)
            .done(res => {
                View.modals.onShow(resource);
                View.modals.Update.setVal(res.data);
                View.modals.Update.onPush("Push", () => {
                    var fd = new FormData();
                    var data_id             = id;
                    var data_status         = $('.order-status').val();
                    fd.append('data_id', data_id);
                    fd.append('data_status', data_status);
                    Api.Order.Update(fd)
                        .done(res => {
                            if (res.message == 501) {
                                IndexView.helper.showToastError('Success', 'Cập nhật thất bại 2 !');
                            }else{
                                IndexView.helper.showToastSuccess('Success', 'Cập nhật thành công !');
                            }
                            getData(localStorage.getItem("item_tab"))
                        })
                        .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                        .always(() => { });
                    View.modals.onHide(resource)
                    View.modals.Update.setDefaul();
                })
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { }); 
    })

    function getData(id){
        Api.Order.GetAll(id)
            .done(res => {
                IndexView.table.clearRows();
                Object.values(res.data).map(v => {
                    IndexView.table.insertRow(View.table.__generateDTRow(v));
                    IndexView.table.render();
                })
                IndexView.table.render();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }

    init();
})();
