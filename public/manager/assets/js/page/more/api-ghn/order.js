
const ViewGHN = {
    DataSend: [],
    Category: {},
    Toast:{
        showToast(message) {
            $(document).ready(function () {
                var toastHTML = `<div class="toast fade hide" data-delay="3000">
                <div class="toast-header">
                    <i class="anticon anticon-info-circle text-primary m-r-5"></i>
                    <strong class="mr-auto">Thông báo</strong>
                    <small>now</small>
                    <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    `+ message + `
                </div>
            </div>`;

            $('#notification-toast').append(toastHTML)
            $('#notification-toast .toast').toast('show');
            setTimeout(function(){ 
                $('#notification-toast .toast:first-child').remove();
            }, 3000);

            });
        }
    },
    Order: {
        create(data) {
            //Api.Order.CreateOrder2();
            $(document).on('click', `#submit-order-btn`, function () {
                ApiGHN.Order.CreateOrder(data)
                    .done(res => {
                        let dta = {
                            'OrderCode': res.data.order_code,
                            'orderID': data.client_order_code,
                            'COD': data.insurance_value,
                            'fee': res.data.total_fee,
                            'expected_delivery_time': res.data.expected_delivery_time,
                            'status': 2, //0:Hoàn trả, 1: Giao thành công, 2:Đang vận chuyển-chưa thể đối soát
                        };
                        
                        console.log("thông tin đơn hàng: " + dta['OrderCode'] + " " + dta['orderID'] + " " + dta['COD'] + " " + dta['fee'] + " " + dta['expected_delivery_time']);
                        

                        ApiGHN.Order.updateTransport(dta)
                            .done(res => {
                                ViewGHN.Toast.showToast(res.message);
                                console.log(res);
                            })
                            .fail(err => {
                                ViewGHN.Toast.showToast("Sai định dạng: số điện thoại !");
                                console.log(err);
                            })
                            .always(() => {

                            });

                    })
            });


        },
        preview(data) {
            ApiGHN.Order.Preview(data)
                .done(res => {
                    data_confirm = res.data
                    console.log(data)
                    $(document).ready(function () {
                        // Đảm bảo tất cả các phần tử trong DOM đã được tải xong
                        $("#from_phone_cf").html(data.from_phone);
                        $("#to_name_cf").html(data.to_name);
                        $("#to_phone_cf").html(data.to_phone);
                        $("#to_address_cf").html(data.to_address);
                        $("#COD_cf").html(data.insurance_value);
                        $("#total_fee_cf").html(data_confirm.fee.total_fee);
                    });

                })
                .fail(err => {
                    ViewGHN.Toast.showToast("Sai định dạng: số điện thoại !");
                })
                .always(() => { });
        },
        delete() {

        },
        print() {
            $(document).on('click', `#print_order`, function () {
                console.log("print");
                vandonID = $("#order_id_api").text()

                ApiGHN.Order.getAllTransport({ orderId: vandonID })
                    .done(res => {
                        //console.log(res);
                        ApiGHN.Order.genToken([res.vandonID])
                            .done(res=>{
                                url = "https://dev-online-gateway.ghn.vn/a5/public-api/printA5?token="+res.data.token;
                                window.open(url, "_blank");
                            })
                            .fail(err=>{
        
                            })
                            .always(()=>{
        
                            });
                    })
                    .fail(err => {
                    })
            });
        },
    },

    //Đơn hàng cho khách không phải thành viên
    OrderNotLogin: {
        dataArray: [],
        show(){
            $(document).ready(function () {
                orderID = $("#order_id_api").text()
                Api.Order.GetOne(orderID)
                .done(res => {

                    let orderDetailArray = res.data.order_detail;
                    
                    ViewGHN.CreateStep.dataArray = orderDetailArray.map(element => ({ 
                            name: element.name, 
                            code: element.product_id.toString(),
                            quantity: element.quantity ,
                            price: null,
                            length: null,
                            width: null,
                            weight: null,
                            height: null,
                            category: 
                            {
                                "level1":"Nước hoa"
                            }
                    }));
                    console.log(ViewGHN.CreateStep.dataArray);
                    
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { }); 
            });
            
        }
    },

    //Bước tạo đơn hàng
    CreateStep: {
        dataArray: [],
        show(){
            $(document).ready(function () {
                orderID = $("#order_id_api").text()
                Api.Order.GetOne(orderID)
                .done(res => {

                    let orderDetailArray = res.data.order_detail;
                    
                    ViewGHN.CreateStep.dataArray = orderDetailArray.map(element => ({ 
                            name: element.name, 
                            code: element.product_id.toString(),
                            quantity: element.quantity ,
                            price: null,
                            length: null,
                            width: null,
                            weight: null,
                            height: null,
                            category: 
                            {
                                "level1":"Nước hoa"
                            }
                    }));
                    console.log(ViewGHN.CreateStep.dataArray);
                    
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { }); 
            });
            
        }
    },

    //Bước in đóng gói
    PackageStep: {
        show(){
            $(document).ready(function () {
                
                vandonID = $("#order_id_api").text()
                ApiGHN.Order.getAllTransport({ orderId: vandonID })
                .done(res => {
                    $("#print_plan_date").html('28-02-2024 (7h-12h)');
                    $("#print_vandonID").html(res.vandonID);
                    $("#print_orderID").html(res.orderID);
                    
                })
                .fail(err => {
                })
            });

        }
    },

    //Chờ lấy hàng
    ReadyToPickStep:{
        show(){
            $(document).ready(function () {
                
                vandonID = $("#order_id_api").text()
                ApiGHN.Order.getAllTransport({ orderId: vandonID })
                .done(res => {
                    console.log(res)
                    //$("#print_plan_date").html('28-02-2024 (7h-12h)');
                    $("#rtp-vandonID").html(res.vandonID);
                    $("#rtp-orderID").html(res.orderID);
                    $("#rtp-expected_delivery_time").html(res.expected_delivery_time);
                    $('#rtp-customer-name').html($(".customer-name").text());
                    $('#rtp-customer-phone').html($(".customer-telephone").text());
                    $('#rtp-customer-address').html($(".customer-address").text());
                })
                .fail(err => {
                })
            });

        }
    },

    SenderInfor: {
        getInfor() {
            return new Promise((resolve) => {
                var data = [];
                $(document).on('click', `#save-order-btn`, function () {
                    data['payment_type_id'] = parseInt($("#payment_type_id").val());
                    data['note'] = $("#note").val();
                    data['required_note'] = $("#required_note").val();
                    data['client_order_code'] = $("#client_order_code").val();
                    data['from_phone'] = $("#from_phone").val();
                    data['to_name'] = $("#to_name").val();
                    data['to_phone'] = $("#to_phone").val();

                    //Xử lý địa chỉ tĩnh
                    data['to_address'] = "72 Thành Thái, Phường 14, Quận 10, Hồ Chí Minh, Vietnam";
                    data['to_ward_name'] = "Phường 14";
                    data['to_district_name'] = "Quận 10";
                    data['to_province_name'] = "HCM";

                    //Size
                    data['weight'] = parseInt($("#weight").val());
                    data['length'] = parseInt($("#length").val());
                    data['width'] = parseInt($("#width").val());
                    data['height'] = parseInt($("#height").val());

                    data['cod_amount'] = parseInt($("#cod_amount").val());
                    data['insurance_value'] = parseInt($("#insurance_value").val());
                    data['service_type_id'] = 2;

                    data['coupon'] = ($("#coupon").val() == null) ? null : $("#coupon").val();

                    data_product = ViewGHN.CreateStep.dataArray;
                    data['items'] = ViewGHN.CreateStep.dataArray;

                    //Sản phẩm
/*                     data['items'] = [
                        {
                            "name": "Nước hoa province",
                            "code": "3",
                            "quantity": 3,
                        }
                    ] */

                    ViewGHN.DataSend = data
                    resolve(ViewGHN.DataSend);

                });


            });
        },
        onPreview(callback) {
            $(document).on('click', `#preview-order-btn`, function () {
                callback();
            });
        },
        onSubmit(callback) {
            $(document).on('click', `#submit-order-btn`, function () {
                callback();
            });
        },
    },
    ReceiverInfor: {

    },
    OrderLog: {
        getOrderlog(id) {
            $(document).ready(function () {
                ApiGHN.Order.GetOrderStatus(id)
                    .done(res => {
                        console.log(res.data.order_log);
                        var data_log = res.data.order_log.split('|');
                        console.log(data_log);
                        var tbody = document.getElementById('order-log-table');

                        console.log(data_log[0].split(',')[0]);


/*                         var newDataArray = ['Thứ 2, 20/12/2023 14:30', 'Đang vận chuyển', '123 Đường ABC, Quận XYZ, Thành phố ABC'];

                        // Duyệt qua mảng dữ liệu và thêm mỗi phần tử vào ô tương ứng
                        for (var i = 0; i < newDataArray.length; i++) {
                            var newCell = newRow.insertCell(i);
                            newCell.textContent = newDataArray[i];
                        } */

                        // Tạo một hàng mới
                        var newRow = tbody.insertRow();
                        // Duyệt qua mảng chứa các mảng con
                        data_log.forEach(function (log) {
                            // Tạo một hàng mới
                            var newRow = tbody.insertRow();

                            // Tách dữ liệu từ chuỗi log bằng dấu ','
                            var newarray = log.split(',');

                            // Thêm mỗi phần tử của mảng con vào ô tương ứng
                            for (var i = 0; i < newarray.length; i++) {
                                var newCell = newRow.insertCell(i);
                                newCell.textContent = newarray[i];
                            }
                        });

                    })
            });

        },
        getNewOrderInfo(id) {
            $(document).ready(function () {

                document.getElementById('new-order-id').textContent = "ok2";

                //Người nhận
                document.getElementById('').textContent = "";
                document.getElementById('').textContent = "";
                document.getElementById('').textContent = "";

                //Thông tin đơn hàng
                document.getElementById('').textContent = "";
                document.getElementById('').textContent = "";
                document.getElementById('').textContent = "";
                document.getElementById('').textContent = "";
                document.getElementById('').textContent = "";

                //Thông tin chi tiết
                document.getElementById('').textContent = "";
                document.getElementById('').textContent = "";
                document.getElementById('').textContent = "";
                document.getElementById('').textContent = "";

/*                 ApiGHN.Order.GetOrderInfo(id)
                    .done(res => {
                        console.log(res.data);
                        var tbody = document.getElementById('new-order-info-table');

                        var newDataArray = [res.data.order_code, res.data.order_status, res.data.to_name, res.data.to_phone, res.data.to_address, res.data.to_ward_name, res.data.to_district_name, res.data.to_province_name, res.data.total_fee, res.data.insurance_fee, res.data.cod_fee, res.data.weight, res.data.length, res.data.width, res.data.height, res.data.created_at, res.data.updated_at];

                        // Duyệt qua mảng dữ liệu và thêm mỗi phần tử vào ô tương ứng
                        for (var i = 0; i < newDataArray.length; i++) {
                            var newCell = newRow.insertCell(i);
                            newCell.textContent = newDataArray[i];
                        }

                    }) */
            });
        },
    },
    init() {
        // ViewGHN.SenderInfor.init();
    }
};

(() => {
    ViewGHN.init();

    ViewGHN.SenderInfor.getInfor().then((data) => {
        ViewGHN.Order.preview(data);
        ViewGHN.Order.create(data);
    });

    
    ViewGHN.Order.print();


    /*  
        ViewGHN.SenderInfor.onSubmit(() => {
            ApiGHN.Order.CreateOrder(ViewGHN.DataSend)
        });
    */

})();



