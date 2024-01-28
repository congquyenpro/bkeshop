const Api = {
    Category: {},
    Product: {},
    Image: {},
    Warehouse: {},
    Order: {},
    Statistic: {},
    Customer: {},
    Report: {},
    
};
(() => {
    $.ajaxSetup({
        headers: { 
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        crossDomain: true
    });
})();


//Category
(() => {
    Api.Category.GetAll = () => $.ajax({
        url: `/apip/category/get`,
        method: 'GET',
    });
    Api.Category.Trending = (id, status) => $.ajax({
        url: `/apip/category/update-trending`,
        method: 'PUT',
        dataType: 'json',
        data: {
            id: id ?? '',
            status: status ?? '',
        }
    });
    Api.Category.Store = (data) => $.ajax({
        url: `/apip/category/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Category.getOne = (id) => $.ajax({
        url: `/apip/category/get-one/${id}`,
        method: 'GET',
    });
    Api.Category.Update = (data) => $.ajax({
        url: `/apip/category/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Category.Delete = (id) => $.ajax({
        url: `/apip/category/delete/${id}`,
        method: 'GET',
    });
})();

//Product
(() => {
    Api.Product.GetAll = () => $.ajax({
        url: `/apip/product/get`,
        method: 'GET',
    });
    Api.Product.Store = (data) => $.ajax({
        url: `/apip/product/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    
    Api.Product.getOne = (id) => $.ajax({
        url: `/apip/product/get-one/${id}`,
        method: 'GET',
    });

    Api.Product.getOneForWarehouse = (id) => $.ajax({
        url: `/apip/product/get-one-for-warehouse/${id}`,
        method: 'GET',
    });

    Api.Product.Update = (data) => $.ajax({
        url: `/apip/product/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Product.Delete = (id) => $.ajax({
        url: `/apip/product/delete/${id}`,
        method: 'GET',
    });
    Api.Product.Trending = (id) => $.ajax({
        url: `/apip/product/update-trending`,
        method: 'PUT',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    });
    
})();

//Order
(() => {
    Api.Order.GetAll = (id) => $.ajax({
        url: `/apip/order/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    });
    Api.Order.GetOne = (id) => $.ajax({
        url: `/apip/order/get-one`,
        method: 'GET',
        dataType: 'json',
        data: {
            id: id ?? '',
        }
    });
    Api.Order.Update = (data) => $.ajax({
        url: `/apip/order/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });

    //Get trạng thái đơn hàng
    Api.Order.GetOrderStatus = (id) => $.ajax({
        url: `/apip/order/get-order-status/${id}`,
        method: 'GET',
        dataType: 'json',
    });
})();

// Warehouse
(() => {
    Api.Warehouse.GetDataItem = () => $.ajax({
        url: `/apip/warehouse/get-item`,
        method: 'GET',
    });
    Api.Warehouse.GetDataHistory = () => $.ajax({
        url: `/apip/warehouse/get-history`,
        method: 'GET',
    }); 
    Api.Warehouse.Store = (data) => $.ajax({
        url: `/apip/warehouse/store`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Warehouse.getOne = (id) => $.ajax({
        url: `/apip/warehouse/get-ware-one/${id}`,
        method: 'GET',
    });
})();

// Statistic
(() => {
    Api.Statistic.getTotal = () => $.ajax({
        url: `/apip/statistic/get-total`,
        method: 'GET',
    });
    Api.Statistic.getBestSale = () => $.ajax({
        url: `/apip/statistic/get-best-sale`,
        method: 'GET',
    });
    Api.Statistic.getCustomerBuy = () => $.ajax({
        url: `/apip/statistic/get-customer`,
        method: 'GET',
    });
    
})();


// Image
(() => {
    Api.Image.Create = (data) => $.ajax({
        url: `/apip/post-image`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();

// Customer
(() => {
    Api.Customer.getOne = (id) => $.ajax({
        url: `/apip/customer/get-cus-one/${id}`,
        method: 'GET',
    });
    Api.Customer.getOneOrder = (id) => $.ajax({
        url: `/apip/customer/get-cus-one-order/${id}`,
        method: 'GET',
    })
})();


//Report
(() => {
    Api.Report.getFinancial = (data) => $.ajax({
        url: `/admin/report/get-fee`,
        method: 'GET',
        data: data,
    });

    Api.Report.getGeneral = (data) => $.ajax({
        url: `/admin/report/get-general`,
        method: 'GET',
        data: data,
    });

})();