
const ViewGHN = {
    DataSend: [],
    Category: {},
    Order: {
        create(data) {
            //Api.Order.CreateOrder2();
            ApiGHN.Order.CreateOrder(data);

        },
        preview(data) {
            ApiGHN.Order.Preview(data)
                .done(res => {
                    data_confirm = res.data
                    console.log(data)
                    $("#from_phone_cf").html(data.from_phone);
                    $("#to_name_cf").html(data.to_name);
                    $("#to_phone_cf").html(data.to_phone);
                    $("#to_address_cf").html(data.to_address);
                    $("#COD_cf").html(data.cod_amount);

                    $("#total_fee_cf").html(data_confirm.total_fee);
                })
                .fail(err => {

                })
                .always(() => { });
        },
        delete() {

        },
        print() {
            $("#print_order").on("click", function () {
                ApiGHN.Order.genToken([$("#order_code").val()])
                    .done(res => {
                        window.location.href = "https://dev-online-gateway.ghn.vn/a5/public-api/printA5?token=" + res.data.token;
                    })
                    .fail(err => {

                    })
                    .always(() => {

                    });
            })
        },
    },
    PackageInfor: {

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

                    data['insurance_value'] = parseInt($("#insurance_value").val());
                    data['service_type_id'] = 2;

                    data['coupon'] = ($("#coupon").val() == null) ? null : $("#coupon").val();


                    //Sản phẩm
                    data['items'] = [
                        {
                            "name": "Nước hoa province",
                            "code": "3",
                            "quantity": 3,
                        }
                    ]

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
        // init(){
        //     $(document).on('click', `#submit-order-btn`, function() {
        //         console.log(1)
        //         ApiGHN.Order.CreateOrder(ViewGHN.DataSend)
        //         ApiGHN.Order.CreateOrder2()
        //     });
        //     // $("#submit-order-btn").on("click",function(){
        //     //     console.log(1)
        //     //     ApiGHN.Order.CreateOrder(ViewGHN.DataSend)
        //     //     ApiGHN.Order.CreateOrder2()
        //     // })
        // }
    },
    ReceiverInfor: {

    },

    OrderLog: {
        getOrderlog() {
            ApiGHN.Order.GetOrderStatus()
                .done(res => {
                    console.log(res)
                })
        },
    },


    init() {
        // ViewGHN.SenderInfor.init();
    }
};

(() => {
    ViewGHN.init();

    ViewGHN.SenderInfor.getInfor().then((data) => {
        ViewGHN.Order.create(data);
    });

    




    ViewGHN.SenderInfor.onSubmit(() => {

        ApiGHN.Order.CreateOrder(ViewGHN.DataSend)
        /*         ApiGHN.Order.CreateOrder2() */
    });


})();



