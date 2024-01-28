const Api = {
    Auth: {},
    Category: {},
    Product: {},
    Cart: {},
    Order: {},
    Comment: {},
    VNpay: {},

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
        url: `/customer/apip/category/get`,
        method: 'GET',
    });
    Api.Category.GetTypeCategory = (id) => $.ajax({
        url: `/customer/apip/category/get-type/${id}`,
        method: 'GET',
    });
})();

//Product
(() => {
    //Lọc nâng cao
    Api.Product.GetListProperty = () => $.ajax({
        url: `customer/apip/product/get-all-property`,
        method: 'GET',
    });
    Api.Product.GetForAdvanceFilter = (data_input) => $.ajax({
        url: `/customer/apip/product/advance-filter`,
        method: 'POST',
        data: {
            property1: data_input[0],
            property2: data_input[1],
            property3: data_input[2],
            property4: data_input[3],
            property5: data_input[4],
        }
  
    });


    Api.Product.GetAll = (filter) => $.ajax({
        url: `/customer/apip/product/get-all`,
        method: 'GET',
        dataType: 'json',
        data: {
            keyword: filter.keyword ?? '',
            category: filter.category ?? '',
            page: filter.page ?? '',
            pageSize: filter.pageSize ?? '',
            prices: filter.prices ?? '',
            sort: filter.sort ?? '',
            status: filter.status ?? '',
            sex: filter.sex ?? '',
            foryou :filter.for_you?? '',
        }
    });
    Api.Product.Trending = () => $.ajax({
        url: `/customer/apip/product/get-trending`,
        method: 'GET',
    });
    Api.Product.NewArrivals = () => $.ajax({
        url: `/customer/apip/product/get-new-arrivals`,
        method: 'GET',
    });
    Api.Product.TopView = () => $.ajax({
        url: `/customer/apip/product/get-top-view`,
        method: 'GET',
    });

    
    Api.Product.DiscountProducts = () => $.ajax({
        url: `/customer/apip/product/get-discount`,
        method: 'GET',
    });
    Api.Product.GetItemCategory = (id) => $.ajax({
        url: `/customer/apip/product/get-item-category/${id}`,
        method: 'GET',
    });
    Api.Product.GetOne = (id) => $.ajax({
        url: `/customer/apip/product/get-one/${id}`,
        method: 'GET',
    });
    Api.Product.GetOneItem = (id) => $.ajax({
        url: `/customer/apip/product/get-one-cart/${id}`,
        method: 'GET',
    });
    Api.Product.GetRecently = (item) => $.ajax({
        url: `/customer/apip/product/get-recently/${item}`,
        method: 'GET',
    });
    Api.Product.GetRelated = (id) => $.ajax({
        url: `/customer/apip/product/get-related/${id}`,
        method: 'GET',
    });
    Api.Product.GetSearch = (data) => $.ajax({
        url: `/customer/apip/product/get-search`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });

})();

//Comment
(() => {
    Api.Comment.GetAll = (id) => $.ajax({
        url: `/customer/apip/comment/get/${id}`,
        method: 'GET',
    });
    Api.Comment.Create = (data) => $.ajax({
        url: `/customer/apip/comment/create`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    }); 
})();

//Auth
(() => {
    Api.Auth.Register = (data) => $.ajax({
        url: `/customer/apip/auth/register`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Login = (data) => $.ajax({
        url: `/customer/apip/auth/login`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Forgot = (data) => $.ajax({
        url: `/customer/apip/auth/forgot`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Reset = (data) => $.ajax({
        url: `/customer/apip/auth/reset`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Code = () => $.ajax({
        url: `/customer/apip/auth/code`,
        method: 'POST',
        contentType: false,
        processData: false,
    });
    Api.Auth.Change = (data) => $.ajax({
        url: `/customer/apip/auth/change`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.Update = (data) => $.ajax({
        url: `/customer/apip/auth/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Auth.GetProfile = (id) => $.ajax({
        url: `/customer/apip/auth/get-profile`,
        method: 'GET',
    });

})();

// Cart
(() => {
    Api.Cart.GetCart = () => $.ajax({
        url: `/customer/apip/cart/get-cart`,
        method: 'GET',
    });
    Api.Cart.Update = (data) => $.ajax({
        url: `/customer/apip/cart/update`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();

// Order
(() => {
    Api.Order.Checkout = (data) => $.ajax({
        url: `/customer/apip/order/checkout`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
    Api.Order.GetOrder = (tab) => $.ajax({
        url: `/customer/apip/order/get`,
        method: 'GET',
        dataType: 'json',
        data: {
            tab: tab ?? null,
        }
    });
})();

//VNpay
(() => {
    Api.VNpay.Create = (data) => $.ajax({
        url: `/payment`,
        method: 'POST',
        data: data,
        contentType: false,
        processData: false,
    });
})();

