const View = {
	Cart: {
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
		Trending: { 
			render(data){
				data.map(v => {
	                var image           = v.images.split(",")[0];
					$(".product-trending-list")
						.append(`<div class="slider-item style7">
	                                <div class="slider-inner" style="background-image: url('/${image}')">
	                                    <div class="slider-infor"> 
	                                    	<h5 class="title-small">
                                                 
                                            </h5>
	                                        <h3 class="title-big">
	                                            ${v.name}
	                                        </h3>
	                                        <div class="price">
	                                            New Price:
	                                            <span class="number-price"> ${ViewIndex.Config.formatPrices(v.price)} ₫ </span>
	                                        </div>
	                                        <a href="/product/${v.id}-${v.slug}" class="button btn-shop-the-look bgroud-style">Shop now</a>
	                                    </div>
	                                </div>
	                            </div>`)
				})
				View.Carousel.init('.product-trending-list');
			},
		},
		New: { 
			render(data){ 
				data.map(v => {
	                var image           = v.images.split(",")[0];
	                var rate 		= Math.floor(Math.random() * 5) + 3;
	                var rate_total 	= Math.floor(Math.random() * 200) + 100;
					$(".product-new-list")
						.append(`<div class="product-item style-5">
			                        <div class="product-inner">
			                            <div class="product-top">
			                            </div>
			                            <div class="product-thumb">
			                                <div class="thumb-inner">
			                                    <a href="/product/${v.id}-${v.slug}" style="background-image: url('/${image}')"> </a>
			                                    <div class="thumb-group action-group action-add-to-card" atr="Add to card" product-id="${v.id}" meta-id="1"> 
			                                    	${View.Cart.item.includes(v.id) ? `<i class="fas fa-check"></i>` : `<div class="loop-form-add-to-cart">
			                                            <button class="single_add_to_cart_button button">Thêm vào giỏ hàng</button>
			                                        </div>`} 
			                                    </div>
			                                </div> 
			                            </div>
			                            <div class="product-info">
			                                <h5 class="product-name product_title">
			                                    <a href="/product/${v.id}-${v.slug}">${v.name}</a>
			                                </h5> 
			                                <div class="group-info">
			                                    <div class="stars-rating">
			                                        <div class="star-rating">
			                                            <span class="star-${rate}"></span>
			                                        </div>
			                                        <div class="count-star">
			                                            (${rate_total})
			                                        </div>
			                                    </div>
			                                    <div class="price">
			                                        <ins>${ViewIndex.Config.formatPrices(v.price)} ₫</ins>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
			                    </div>`)

					$("#new_arrivals ul")
						.append(`<li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                    <div class="product-inner">
			                            <div class="product-top">
			                            </div>
			                            <div class="product-thumb">
			                                <div class="thumb-inner">
			                                    <a href="/product/${v.id}-${v.slug}" style="background-image: url('/${image}')"> </a>
			                                    <div class="thumb-group action-group action-add-to-card" atr="Add to card" product-id="${v.id}" meta-id="1"> 
			                                    	${View.Cart.item.includes(v.id) ? `<i class="fas fa-check"></i>` : `<div class="loop-form-add-to-cart">
			                                            <button class="single_add_to_cart_button button">Thêm vào giỏ hàng</button>
			                                        </div>`} 
			                                    </div>
			                                </div> 
			                            </div>
			                            <div class="product-info">
			                                <h5 class="product-name product_title">
			                                    <a href="/product/${v.id}-${v.slug}">${v.name}</a>
			                                </h5> 
			                                <div class="group-info">
			                                    <div class="stars-rating">
			                                        <div class="star-rating">
			                                            <span class="star-${rate}"></span>
			                                        </div>
			                                        <div class="count-star">
			                                            (${rate_total})
			                                        </div>
			                                    </div>
			                                    <div class="price">
			                                        <ins>${ViewIndex.Config.formatPrices(v.price)} ₫</ins>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
                                </li>`)
				})
				View.Carousel.init('.product-new-list');
			},
		},
		TopView: {
			render(data){
				data.map(v => {
	                var image           = v.images.split(",")[0];
	                var rate 		= Math.floor(Math.random() * 5) + 3;
	                var rate_total 	= Math.floor(Math.random() * 200) + 100;  
					$("#top-rated ul")
						.append(`<li class="product-item  col-lg-3 col-md-4 col-sm-6 col-xs-6 col-ts-12 style-1">
                                    <div class="product-inner">
			                            <div class="product-top">
			                            </div>
			                            <div class="product-thumb">
			                                <div class="thumb-inner">
			                                    <a href="/product/${v.id}-${v.slug}" style="background-image: url('/${image}')"> </a>
			                                    <div class="thumb-group action-group action-add-to-card" atr="Add to card" product-id="${v.id}" meta-id="1"> 
			                                    	${View.Cart.item.includes(v.id) ? `<i class="fas fa-check"></i>` : `<div class="loop-form-add-to-cart">
			                                            <button class="single_add_to_cart_button button">Thêm vào giỏ hàng</button>
			                                        </div>`} 
			                                    </div>
			                                </div> 
			                            </div>
			                            <div class="product-info">
			                                <h5 class="product-name product_title">
			                                    <a href="/product/${v.id}-${v.slug}">${v.name}</a>
			                                </h5> 
			                                <div class="group-info">
			                                    <div class="stars-rating">
			                                        <div class="star-rating">
			                                            <span class="star-${rate}"></span>
			                                        </div>
			                                        <div class="count-star">
			                                            (${rate_total})
			                                        </div>
			                                    </div>
			                                    <div class="price">
			                                        <ins>${ViewIndex.Config.formatPrices(v.price)} ₫</ins>
			                                    </div>
			                                </div>
			                            </div>
			                        </div>
                                </li>`)
				}) 
			},
		}
	},
	Carousel: {
		init(resource){ 
			$(resource).not('.slick-initialized').each(function () {
	            var _this = $(this),
	                _responsive = _this.data('responsive'),
	                _config = [];

	            if ($('body').hasClass('rtl')) {
	                _config.rtl = true;
	            }
	            if (_this.hasClass('slick-vertical')) {
	                _config.prevArrow = '<span class="pe-7s-angle-up"></span>';
	                _config.nextArrow = '<span class="pe-7s-angle-down"></span>';
	            } else {
	                _config.prevArrow = '<span class="fa fa-angle-left"></span>';
	                _config.nextArrow = '<span class="fa fa-angle-right"></span>';
	            }
	            _config.responsive = _responsive;
	            _config.cssEase = 'linear';

	            _this.slick(_config);
	            _this.on('afterChange', function (event, slick, direction) {
	                _this.find('.slick-active:first').addClass('first-slick');
	                _this.find('.slick-active:last').addClass('last-slick');
	            });
	            _this.on('beforeChange', function (event, slick, currentSlide) {
	                _this.find('.slick-slide').removeClass('last-slick');
	                _this.find('.slick-slide').removeClass('first-slick');
	            });
	            if (_this.hasClass('slick-vertical')) {
	                equal_elems();
	                setTimeout(function () {
	                    _this.slick('setPosition');
	                }, 0);
	            }
	            _this.find('.slick-active:first').addClass('first-slick');
	            _this.find('.slick-active:last').addClass('last-slick');
	        });
		} 
	},
	init(){
		View.Cart.init();
	}
};
(() => {
    View.init();
    function init(){
    	getTrending();
    	getNewArrivals();
    	getTopView();

    	// getOrder( )
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
    function getTrending(){
    	Api.Product.Trending()
            .done(res => { 
            	View.Product.Trending.render(res.data)
            })
            .fail(err => {   })
            .always(() => { });
    } 
    function getNewArrivals(){
        Api.Product.NewArrivals()
            .done(res => { 
            	View.Product.New.render(res.data)
            })
            .fail(err => {  })
            .always(() => { });
    }
    function getTopView(){
        Api.Product.TopView()
            .done(res => { 
            	View.Product.TopView.render(res.data)
            })
            .fail(err => {  })
            .always(() => { });
    }

    init();
})();