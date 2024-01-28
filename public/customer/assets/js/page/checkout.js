const View = { 
	Cart: {
		total: 0,
		item: [],
		init(){ 
	        var card        = localStorage.getItem("sbtc-cart");  
	        var json_cart = JSON.parse(card);  
	        json_cart.cart.map(v => { 
	            View.Cart.item.push(v.id);
	        })
		}
	},
    Order: {
        getVal(){
            var resource = '.cart-form-data';
            var fd = new FormData();
            var required_data = [];
            var onPushData = true;

            var data_id      = $(`${resource}`).find('.data-id').val(); 
            var data_name      = $(`${resource}`).find('.data-name').val(); 
            var data_email      = $(`${resource}`).find('.data-email').val(); 
            var data_phone      = $(`${resource}`).find('.data-phone').val(); 
            var data_address      = $(`${resource}`).find('.data-address').val(); 
            var data_zipcode      = $(`${resource}`).find('.data-zipcode').val(); 
            var data_description      = $(`${resource}`).find('.data-description').val();

            //payment
            var data_payment    = $("input[name=payment_method]:checked").val();

            $(`${resource}`).find('.error-log .js-errors').remove();

            if (ViewIndex.Config.isEmail(data_email) == null) { 
                if (data_email == '') { 
                    /* required_data.push('Email is required.'); onPushData = false  */
                }else{
                    required_data.push('Email is invalid.'); onPushData = false 
                }
            }
            if (data_address == '') { required_data.push('Address is required.'); onPushData = false }
            if (data_phone == '') { required_data.push('Phone is required.'); onPushData = false }
            if (data_name == '') { required_data.push('Name is required.'); onPushData = false }
            /* if (data_zipcode == '') { required_data.push('Zipcode is required.'); onPushData = false } */
            
            if (onPushData) {
                fd.append('data_id', data_id);
                fd.append('data_name', ViewIndex.Config.toNoTag(data_name));
                fd.append('data_email', ViewIndex.Config.toNoTag(data_email));
                fd.append('data_phone', ViewIndex.Config.toNoTag(data_phone));
                fd.append('data_address', ViewIndex.Config.toNoTag(data_address));
                fd.append('data_zipcode', ViewIndex.Config.toNoTag(data_zipcode));
                fd.append('data_description', ViewIndex.Config.toNoTag(data_description));
                fd.append('metadata', localStorage.getItem("sbtc-cart-data"));
                fd.append('size_metadata', localStorage.getItem("sbtc-cart"));
                fd.append('data_payment', data_payment);

                // $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors"><li class="error">この機能を更新しています</li></ul> `)
                return fd;
            }else{
                $(`${resource}`).find('.error-log .js-errors').remove();
                var required_noti = ``;
                for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                return false;
            }
        },
        onPush(callback){
            $(document).on('click', `.button-payment`, function() {
                var data = View.Order.getVal();
                if (data) callback(data);
            });
        },
    },
	Product: { 
		render(data, meta, qty, size_index){
            var image           = data.images.split(",")[0];
            var metadata        = meta.data[size_index-1];  
            var real_prices     = metadata.discount == 0 ? metadata.prices : metadata.prices - (metadata.prices*metadata.discount/100); 
            var prices = metadata.discount != 0 
            				? `<del class="d-flex">${ViewIndex.Config.formatPrices(metadata.prices)} ₫ / 1 sản phẩm</del>
                                ${ViewIndex.Config.formatPrices(real_prices)} ₫`
                            : `${ViewIndex.Config.formatPrices(real_prices)} ₫`

			$(".list-product-order")
				.prepend(`<li class="product-item-order">
                            <div class="product-thumb">
                                <a href="/product/${data.id}-${data.slug}" >
                                    <img src="/${image}" alt="img">
                                </a>
                            </div>
                            <div class="product-order-inner">
                                <h5 class="product-name">
                                    <a href="/product/${data.id}-${data.slug}" >${data.name}</a>
                                </h5>
                                <span class="attributes-select attributes-color">${metadata.size} ml</span> 
                                <div class="price">
                                    ${prices}
                                    <span class="count">x${qty}</span>
                                </div>
                            </div>
                        </li>`)
			View.Cart.total += real_prices * qty;
			$(".total-price").text(`${ViewIndex.Config.formatPrices(View.Cart.total)} ₫`)
		}, 
	},
    response: { 
        success(message){
            $(".error-log .js-response").remove();
            $(".error-log").prepend(`<div class="js-response js-success"><li>${message}</li></div>`)
            setTimeout(function () {
                $('.error-log .js-response').remove();
            }, 5000);
        },
        error(message){
            $(".error-log .js-response").remove();
            $(".error-log").prepend(`<div class="js-response js-errors"><li>${message}</li></div>`)
            setTimeout(function () {
                $('.error-log .js-response').remove();
            }, 5000);
        },                  
    },
	init(){

	}
};
(() => {
    View.init();
    function init(){  
        var card        = localStorage.getItem("sbtc-cart-data");   
        var json_cart = JSON.parse(card); 
        if (json_cart == null) {
            window.location.replace("/cart"); 
        }
        
        //Lấy ra cụ thể loại sản phẩm
        var card_detail        = localStorage.getItem("sbtc-cart");
        var json_cart_detail = JSON.parse(card_detail);
        console.log(json_cart_detail['cart']); //index size được chọn


        json_cart.cart.map(v => {
            console.log(v);

            //Lấy ra index size được chọn
            var size_index = 0;
            json_cart_detail.cart.map(v2=>{
                if (v2.id == v.id){
                    size_index = v2.meta;
                }
            })

        	getOne(v.id, v.meta, v.qty, size_index)
        }) 
    }

    async function redirect_logined(url) {
        await delay(2000);
        window.location.replace(url);
    }
    function delay(delayInms) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve(2);
            }, delayInms);
        });
    } 
    View.Order.onPush((fd) => {
        Api.Order.Checkout(fd)
            .done(res => {
                if (res.status == 200) {
/*                     View.response.success(res.message)
                    localStorage.removeItem("sbtc-cart");
                    localStorage.removeItem("sbtc-cart-data"); */

                    //payment
                    if (res.payment == 1) {
                        View.response.success(res.message)
                        localStorage.removeItem("sbtc-cart");
                        localStorage.removeItem("sbtc-cart-data");
                        redirect_logined("/")
                    }else{
                        var formVNpay = new FormData();
                        formVNpay.append('data_id', res.id);
                        formVNpay.append('data_prices', res.total);
                        Api.VNpay.Create(formVNpay).done(res => {
                            window.location.replace(res);
                        })
                        .fail(err => { LayoutView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                        .always(() => { });
                    }

                    //redirect_logined(res.data)

                }else if (res.status == 201) {
                    
                    //payment
                    if (res.data.payment == 2) {
                        var formVNpay = new FormData();
                        formVNpay.append('data_id', res.data.order_id);
                        formVNpay.append('data_prices', res.data.total);
                        Api.VNpay.Create(formVNpay).done(res => {

                            localStorage.removeItem("sbtc-cart"); 
                            localStorage.removeItem("sbtc-cart-data");
                            // Open a new tab or window with the redirect URL
                            window.open(res, '_blank');
                            // Redirect the current page to the index
                            window.location.replace('/');
                        })
                        .fail(err => { LayoutView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                        .always(() => { });
                        
                    }else{
                        console.log("payment1");
                        View.response.success(res.message)
                        localStorage.removeItem("sbtc-cart"); 
                        localStorage.removeItem("sbtc-cart-data");
                        redirect_logined("/cart")
                    }
                    //redirect_logined("/")
                }else{
                    View.response.error(res.message)
                }
            })
            .fail(err => {  })
            .always(() => { });
    })
    function getOne(id, meta, qty, size_index){
        Api.Product.GetOne(id)
            .done(res => {  
            	View.Product.render(res.data[0], meta, qty, size_index)
            })
            .fail(err => {  })
            .always(() => { });
    } 
    init();
})();