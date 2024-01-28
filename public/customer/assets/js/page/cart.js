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
	Product: {
		getCart(){
			var cart_data = JSON.parse(`{ "cart": [] }`); 
			$(".shoppingcart-content table tbody")
				.find(".cart_item").each(function(index, el) {
		            cart_data.cart 
		                .push(
		                    JSON.parse(`{ "id": ${$(el).attr("product-id")}, "meta": ${$(el).attr("metadata")}, "qty": ${$(el).attr("qty")}}`)
		                ); 
				});
			return JSON.stringify(cart_data)
		},
		render(data, meta){
            var image           = data.images.split(",")[0];
            var metadata           = JSON.parse(data.metadata).data[meta-1];  
            var real_prices     = metadata.discount == 0 ? metadata.prices : metadata.prices - (metadata.prices*metadata.discount/100);
            var prices = metadata.discount != 0 
            				? `<del>${ViewIndex.Config.formatPrices(metadata.prices)} ₫ / 1 sản phẩm</del>
                                <span class="woocommerce-Price-currencySymbol">
                                    ${ViewIndex.Config.formatPrices(real_prices)} ₫
                                </span>`
                            : `<span class="woocommerce-Price-currencySymbol">
                                    ${ViewIndex.Config.formatPrices(real_prices)} ₫
                                </span>`

			$(".shoppingcart-content table tbody")
				.prepend(`<tr class="cart_item" product-id="${data.id}" metadata='${data.metadata}' prices="${real_prices}" qty="1">
                            <td class="product-remove">
                                <a class="remove"></a>
                            </td>
                            <td class="product-thumbnail">
                                <a href="/product/${data.id}-${data.slug}" target="_blank">
                                    <img src="/${image}" alt="img" class="attachment-shop_thumbnail size-shop_thumbnail wp-post-image">
                                </a>
                            </td>
                            <td class="product-name" data-title="Product">
                                <a href="/product/${data.id}-${data.slug}" target="_blank" class="title">${data.name}</a>
                                <span class="attributes-select attributes-color">${metadata.size} ml</span> 
                            </td>
                            <td class="product-quantity" data-title="Quantity">
                                <div class="quantity">
                                    <div class="control"> 
                                        <input type="text" data-step="1" data-min="0" value="1" title="Qty" class="input-qty qty" size="4"> 
                                    </div>
                                </div>
                            </td>
                            <td class="product-price" data-title="Price">
                                <span class="woocommerce-Price-amount amount">
                                	${prices}
                                </span>
                            </td>
                        </tr>`)
			View.Cart.total += real_prices;
			$(".order-total .total-price").text(`${ViewIndex.Config.formatPrices(View.Cart.total)} ₫`)
		},
		updateCart(productId){
			var total = 0;
			$(".shoppingcart-content table tbody")
				.find(".cart_item").each(function(index, el) {
					var total_row = +$(el).attr("prices") * +$(el).attr("qty");
					total += total_row;
					$(el).find(".woocommerce-Price-currencySymbol").text(`${ViewIndex.Config.formatPrices(total_row)} ₫`)
				});
			$(".order-total .total-price").text(`${ViewIndex.Config.formatPrices(total)} ₫`)

            //cập nhật lại local storage
            var card = localStorage.getItem("sbtc-cart");  
            var json_cart = JSON.parse(card);  

            // Lọc ra các phần tử có id khác productId : productId(string) #kiểu v.id (number)
            json_cart.cart = json_cart.cart.filter(v => v.id !== Number(productId));

            //Hết phần tử refresh, render 'giỏ hàng trống'
            if(json_cart.cart.length == 0) location.href = location.href;

            json_cart.cart.map(v => {
                View.Cart.item.push(v.id);
            });
            
            // Cập nhật lại dữ liệu trong localStorage
            localStorage.setItem("sbtc-cart", JSON.stringify(json_cart));
            
		},
		init(){
            $(document).on('click', `.product-remove a`, function() {
            	$(this).parent().parent().remove();
                var productId = $(this).closest('.cart_item').attr('product-id');
            	View.Product.updateCart(productId);
            }); 
            $(document).on('keyup', `.input-qty.qty`, function() {
            	var qty = $(this).val(); 
            	$(this).parent().parent().parent().parent().attr("qty", qty);
            	View.Product.updateCart();
            }); 
            $(document).on('click', `.btn-cart-to-checkout`, function() { 
            	localStorage.setItem("sbtc-cart-data", View.Product.getCart())
            });  
		}
	},
	init(){
		View.Cart.init();
		View.Product.init();
	}
};
(() => {
    View.init();
    function init(){  
        var card        = localStorage.getItem("sbtc-cart");  
        var json_cart = JSON.parse(card);   
        if (json_cart.cart.length == 0) {
            $(".cart-form").css({"display": "none"})
            $(".btn-cart-to-checkout").css({"display": "none"}) 
            $(".page-main-content").prepend(`<h3 class="text-center">Giỏ hàng trống</h3>`)
        }
        json_cart.cart.map(v => {
        	getOne(v.id, v.meta)
        }) 
    }
    async function redirect_logined(url) {
        await delay(1500);
        window.location.replace(url);
    }
    function delay(delayInms) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve(2);
            }, delayInms);
        });
    } 

    function getOne(id, meta){
        Api.Product.GetOne(id)
            .done(res => { 
            	View.Product.render(res.data[0], meta)
            })
            .fail(err => {  })
            .always(() => { });
    } 
    init();
})();