const ApiGHN = {
    Order: {},
    config: {
        headers: {
            'Content-Type': 'application/json',
            'token': 'a26e2748-971a-11ee-b1d4-92b443b7a897',
            'shop_id': 190517,
        },
        crossDomain: true,
    },
};

/* (() => {
    $.ajaxSetup({
        headers: {
            'Content-Type': 'application/json',
            'token': 'a26e2748-971a-11ee-b1d4-92b443b7a897',
            'shop_id': 190517,
        },
        crossDomain: true
    });
})(); */

// Calculate fee
(() => {
    ApiGHN.Order.Fee = () => $.ajax({
        url: `https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/fee`,
        method: 'POST',
        headers: ApiGHN.config.headers,
        data: JSON.stringify({
            "from_district_id": 1454,
            "from_ward_code": "21211",
            "service_id": 53320,
            "service_type_id": null,
            "to_district_id": 1452,
            "to_ward_code": "21012",
            "height": 50,
            "length": 20,
            "weight": 200,
            "width": 20,
            "insurance_value": 10000,
            "cod_failed_amount": 2000,
            "coupon": null
        }),
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
    
})();
// Create Order
(() => {
    ApiGHN.Order.CreateOrder2 = () => $.ajax({
        url: `https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create`,
        method: 'POST',
        headers: ApiGHN.config.headers,
        data: JSON.stringify({
            "payment_type_id": 1,
            "note": "Tintest 123",
            "required_note": "KHONGCHOXEMHANG",
            "return_phone": "0332190158",
            "return_address": "39 NTT",
            "return_district_id": null,
            "return_ward_code": "",
            "client_order_code": "",
            "from_name": "TinTest124",
            "from_phone": "0987654321",
            "from_address": "72 Thành Thái, Phường 14, Quận 10, Hồ Chí Minh, Vietnam",
            "from_ward_name": "Phường 14",
            "from_district_name": "Quận 10",
            "from_province_name": "HCM",
            "to_name": "TinTest124",
            "to_phone": "0987654321",
            "to_address": "72 Thành Thái, Phường 14, Quận 10, Hồ Chí Minh, Vietnam",
            "to_ward_name": "Phường 14",
            "to_district_name": "Quận 10",
            "to_province_name": "HCM",
            "cod_amount": 200000,
            "content": "Theo New York Times",
            "weight": 200,
            "length": 1,
            "width": 19,
            "height": 10,
            "cod_failed_amount": 2000,                  
            "pick_station_id": 1444,
            "deliver_station_id": null,
            "insurance_value": 10000000,
            "service_id": 0,
            "service_type_id":2,
            "coupon":null,
            "pickup_time":1692840132,
            "pick_shift":[2],
/*             "items": [
                 {
                     "name":"Áo Polo",
                     "code":"Polo123",
                     "quantity": 1,
                     "price": 200000,
                     "length": 12,
                     "width": 12,
                     "weight": 1200,
                     "height": 12,
                     "category": 
                     {
                         "level1":"Áo"
                     }
                 }
                 
             ] */
             "items": data_input.items, 
        }),
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
    
})();

(() => {
    ApiGHN.Order.CreateOrder = (data_input) => $.ajax({
        url: `https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/create`,
        method: 'POST',
        headers: ApiGHN.config.headers,
        data: JSON.stringify({
            "payment_type_id": data_input.payment_type_id,
            "note": data_input.note,
            "required_note": data_input.required_note,
            "return_phone": null, //
            "return_address": null, //
            "return_district_id": null, //
            "return_ward_code": null, //
            "client_order_code": data_input.client_order_code,
            "from_name": "BkEShop", //
            "from_phone": data_input.from_phone,
            "from_address": "167 Giải Phóng, Phương Mai, Đống Đa, Hà Nội, Vietnam",
            "from_ward_name": "Phương Mai",
            "from_district_name": "Đống Đa",
            "from_province_name": "Hà Nội",
            "to_name": data_input.to_name,
            "to_phone": data_input.to_phone,
            "to_address": data_input.to_address,
            "to_ward_name": data_input.to_ward_name,
            "to_district_name": data_input.to_district_name,
            "to_province_name": data_input.to_province_name,
            "cod_amount": data_input.cod_amount, //
            "content": null, //
            "weight": data_input.weight,
            "length": data_input.length,
            "width": data_input.width,
            "height": data_input.height,
            "cod_failed_amount": null,                  
            "pick_station_id": null, // 
            "deliver_station_id": null, // 
            "insurance_value": data_input.insurance_value,
            "service_id": null, //
            "service_type_id":data_input.service_type_id,
            "coupon":null,
            "pickup_time":null, //
            "pick_shift":null, //
/*             "items": [
                 {
                     "name":data_input.items[0].name,
                     "code":data_input.items[0].code,
                     "quantity": data_input.items[0].quantity,
                     "price": null,
                     "length": null,
                     "width": null,
                     "weight": null,
                     "height": null,
                     "category": 
                     {
                         "level1":"Áo"
                     }
                 },
                 
                 
             ] */
            "items": data_input.items,
        }),
        success: function(response) {
            console.log(response);
            document.getElementById("submit-order-btn").innerHTML = `Tạo đơn thành công <i class="fas fa-check"></i>`
        },
        error: function(error) {
            console.error(error);
        }
    });
    
})();

//Get order detail
(() => {
    ApiGHN.Order.GetOrderDetail = () => $.ajax({
        url: `https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/detail-by-client-code`,
        method: 'POST',
        data: JSON.stringify({
            "client_order_code": "LF7FXA"
        }),
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
    
})();

//Preview order
(()=>{
    ApiGHN.Order.Preview = (data_input)=>$.ajax({
        url: `https://dev-online-gateway.ghn.vn/shiip/public-api/v2/shipping-order/preview`,
        method: 'POST',
        headers: ApiGHN.config.headers,
        data: JSON.stringify({
            "payment_type_id": data_input.payment_type_id,
            "note": data_input.note,
            "required_note": data_input.required_note,
            "return_phone": null, //
            "return_address": null, //
            "return_district_id": null, //
            "return_ward_code": null, //
            "client_order_code": data_input.client_order_code,
            "from_name": "BkEShop", //
            "from_phone": data_input.from_phone,
            "from_address": "167 Giải Phóng, Phương Mai, Đống Đa, Hà Nội, Vietnam",
            "from_ward_name": "Phương Mai",
            "from_district_name": "Đống Đa",
            "from_province_name": "Hà Nội",
            "to_name": data_input.to_name,
            "to_phone": data_input.to_phone,
            "to_address": data_input.to_address,
            "to_ward_name": data_input.to_ward_name,
            "to_district_name": data_input.to_district_name,
            "to_province_name": data_input.to_province_name,
            "cod_amount": data_input.cod_amount, //
            "content": null, //
            "weight": data_input.weight,
            "length": data_input.length,
            "width": data_input.width,
            "height": data_input.height,
            "cod_failed_amount": null,                  
            "pick_station_id": null, // 
            "deliver_station_id": null, // 
            "insurance_value": data_input.insurance_value,
            "service_id": null, //
            "service_type_id":data_input.service_type_id,
            "coupon":null,
            "pickup_time":null, //
            "pick_shift":null, //
/*             "items": [
                 {
                     "name":data_input.items[0].name,
                     "code":data_input.items[0].code,
                     "quantity": data_input.items[0].quantity,
                     "price": null,
                     "length": null,
                     "width": null,
                     "weight": null,
                     "height": null,
                     "category": 
                     {
                         "level1":"Nước hoa"
                     }
                 }
                 
             ] */
             "items": data_input.items,
        }),
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    })
})();

//Print order
(()=>{
    ApiGHN.Order.genToken = (id)=>$.ajax({
        url: `https://dev-online-gateway.ghn.vn/shiip/public-api/v2/a5/gen-token`,
        method: 'POST',
        headers: ApiGHN.config.headers,
        data: JSON.stringify({
            "order_codes" : id,
        }),
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    })
})();


//Update trong transport
(()=>{
    ApiGHN.Order.updateTransport = (data_r)=>$.ajax({
        url: `/apip/order/insertOrder`,
        method: 'POST',
        headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                
        },
        data: {
            'OrderCode' : data_r['OrderCode'],
            'orderID' : data_r['orderID'],
            'customer_id' : 1,
            'partner' : "Giao hàng nhanh(GHN)",
            'COD' : data_r['COD'],
            'fee' : data_r['fee'],
            'employeeID' : 1,
            'order_log' : "",
            'expected_delivery_time' : data_r['expected_delivery_time'],
            'status' : 0,
        },
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    })
})();

(()=>{
        //Get trạng thái đơn hàng
        ApiGHN.Order.GetOrderStatus = (id) => $.ajax({
            url: `/apip/order/get-order-status/${id}`,
            method: 'GET',
            headers: {
                "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
                'Content-Type': 'application/json',
            },
            crossDomain: true,
            success: function(response) {
                console.log(response);
            },
            error: function(error) {
                console.error(error);
            }
        });
})();

//Get trạng thái đơn hàng của khách không login
(()=>{
    //Get trạng thái đơn hàng
    ApiGHN.Order.GetOrderStatus2 = (id) => $.ajax({
        url: `my-order`,
        method: 'GET',
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json',
        },
        crossDomain: true,
        data: {
            'id' : id,
        },
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
})();

(()=>{
    //Get các thông tin đơn hàng từ khâu Chờ lấy hàng
    ApiGHN.Order.GetOrderStatus = (id) => $.ajax({
        url: `/apip/order/get-order-status/${id}`,
        method: 'GET',
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
            'Content-Type': 'application/json',
        },
        crossDomain: true,
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
})();


//Get all transport 
(()=>{
    ApiGHN.Order.getAllTransport = (data_input) => $.ajax({
        url: `/admin/transport/get-all`,
        method: 'POST',
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        data: data_input,
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });
})();