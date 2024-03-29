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
		setVal(data){
            var image           = data.images.split(",")[0];
            $(".image_preview_container").css({
            	"background-image": `url('/${image}')`
            })
            $(".image-preview-container img").attr("data-zoom-image", `/${image}`)
            $(".image-preview-container img").attr("src", `/${image}`)
            data.images.split(",").map((v, k )=> {
            	$(".image-list-carousel")
            		.append(`<a href="#" class="thumb-item-sub" data-image="/${v}"
                                   data-zoom-image="/${v}" class="${k == 0 ? "active" : ""}">
                                    <img src="/${v}"
                                         data-large-image="/${v}" alt="img">
                                </a>`)
            })
			View.Carousel.init(".image-list-carousel"); 

			data.description.split("<br />").map(v => {
				$(".product-details-description ul")
					.append(`<li>${v}</li>`)
			}) 
			$("#product-detail").append(data.detail)
			$(".product-title").text(data.name)
        	View.Product.Metadata = JSON.parse(data.metadata);   
			View.Product.Metadata.data.map((v, k) => { 
				$(".list-size")
					.append(`<a class="${k == 0 ? "is-active" : ""}" size-id="${v.id}" data-prices="${v.prices}" data-discount="${v.discount}">${v.size} ml</a>`)
			})
			View.Product.setPrice();

			if (data.sex == 1) {
				$(".list-sex").append(`<a class="is-active" value-id="1"> Nam </a>`)
			}else if(data.sex == 2){
				$(".list-sex").append(`<a class="is-active" value-id="2"> Nữ </a>`)
			}else{
				$(".list-sex").append(`<a class="is-active" value-id="1"> Nam </a>`)
				$(".list-sex").append(`<a class="" value-id="2"> Nữ </a>`)
			}

			$(".category-data-name a").text(data.category_name)
			$(".category-data-name a").attr("href", `/category?category=${data.category_id}`)
			$(".item-data-name").text(data.name)

			if (View.Cart.item.includes(data.id)) { 
				$(".quantity-add-to-cart").removeClass("action-add-to-card");
				$(".quantity-add-to-cart button").html('<i class="fas fa-check"></i>');
			}
			$(".details-infor .action-add-to-card").attr("product-id", data.id);
			$(".details-infor .action-add-to-card").attr("meta-id", $(".list-size a[class='is-active']").attr("size-id")); 
		},
		renderRelated(data){
			data.map(v => {
                var image           = v.images.split(",")[0];
                var rate 		= Math.floor(Math.random() * 5) + 3;
                var rate_total 	= Math.floor(Math.random() * 200) + 100;
				$(".product-related-list")
						.append(`<div class="product-item style-5">
			                        <div class="product-inner equal-element">
			                            <div class="product-top">
			                            
			                            </div>
			                            <div class="product-thumb">
			                                <div class="thumb-inner">
			                                    <a href="/product/${v.id}-${v.slug}" style="background-image: url('/${image}')"> </a>
			                                    <div class="thumb-group action-group action-add-to-card" atr="Add to card" product-id="${v.id}" meta-id="1"> 
			                                    	${View.Cart.item.includes(v.id) ? `<i class="fas fa-check"></i>` : `<div class="loop-form-add-to-cart">
			                                            <button class="single_add_to_cart_button button">Thêm vào giỏ</button>
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
			})
			View.Carousel.init2('.product-related-list');
		},
		setPrice(){
			var item = $(`.list-size a[class="is-active"]`); 
			var price = item.attr("data-prices");
			var discount = item.attr("data-discount");
			var real_price = price - ( price / 100 * discount )
             $(".data-prices").text(`${real_price.toFixed(2).replaceAll('.00', "")} ₫`)
             discount != 0 ? $(".data-discount").text(`${price} ₫`) : "";
			$(".details-infor .action-add-to-card").attr("meta-id", $(".list-size a[class='is-active']").attr("size-id")); 
		},
		onAddToCart(){
			$(document).on('click', `.list-size a`, function() {
                $(".list-size a").removeClass("is-active");
                $(this).addClass("is-active")
                View.Product.setPrice();
            });
		},
		init(){
			$(document).on('click', `.list-size a`, function() {
                $(".list-size a").removeClass("is-active");
                $(this).addClass("is-active")
                View.Product.setPrice();
            });
			$(document).on('click', `.list-sex a`, function() {
                $(".list-sex a").removeClass("is-active");
                $(this).addClass("is-active")
                View.Product.setPrice();
            });
		}
	},
	Carousel: {
		init2(resource){ 
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
		} ,
		init(resource){ 
			//owl has thumbs 
	        $(`${resource}.owl-carousel.has-thumbs`).owlCarousel({
	            loop: true,
	            items: 1,
	            thumbs: true,
	            thumbImage: true,
	            thumbContainerClass: 'owl-thumbs',
	            thumbItemClass: 'owl-thumb-item'
	        });
	        // owl config
	        $(`${resource}.owl-carousel`).each(function (index, el) {
	            var config = $(this).data();
	            config.navText = ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'];
	            var animateOut = $(this).data('animateout');
	            var animateIn = $(this).data('animatein');
	            var slidespeed = parseFloat($(this).data('slidespeed'));

	            if (typeof animateOut != 'undefined') {
	                config.animateOut = animateOut;
	            }
	            if (typeof animateIn != 'undefined') {
	                config.animateIn = animateIn;
	            }
	            if (typeof (slidespeed) != 'undefined') {
	                config.smartSpeed = slidespeed;
	            }

	            if ($('body').hasClass('rtl')) {
	                config.rtl = true;
	            }

	            var owl = $(this);
	            owl.on('initialized.owl.carousel', function (event) {
	                var total_active = parseInt(owl.find('.owl-item.active').length);
	                var i = 0;
	                owl.find('.owl-item').removeClass('item-first item-last');
	                setTimeout(function () {
	                    owl.find('.owl-item.active').each(function () {
	                        i++;
	                        if (i == 1) {
	                            $(this).addClass('item-first');
	                        }
	                        if (i == total_active) {
	                            $(this).addClass('item-last');
	                        }
	                    });

	                }, 100);
	            })
	            owl.on('refreshed.owl.carousel', function (event) {
	                var total_active = parseInt(owl.find('.owl-item.active').length);
	                var i = 0;
	                owl.find('.owl-item').removeClass('item-first item-last');
	                setTimeout(function () {
	                    owl.find('.owl-item.active').each(function () {
	                        i++;
	                        if (i == 1) {
	                            $(this).addClass('item-first');
	                        }
	                        if (i == total_active) {
	                            $(this).addClass('item-last');
	                        }
	                    });

	                }, 100);
	            })
	            owl.on('change.owl.carousel', function (event) {
	                var total_active = parseInt(owl.find('.owl-item.active').length);
	                var i = 0;
	                owl.find('.owl-item').removeClass('item-first item-last');
	                setTimeout(function () {
	                    owl.find('.owl-item.active').each(function () {
	                        i++;
	                        if (i == 1) {
	                            $(this).addClass('item-first');
	                        }
	                        if (i == total_active) {
	                            $(this).addClass('item-last');
	                        }
	                    });

	                }, 100);
	                owl.addClass('owl-changed');
	                setTimeout(function () {
	                    owl.removeClass('owl-changed');
	                }, config.smartSpeed)
	            })
	            owl.on('drag.owl.carousel', function (event) {
	                owl.addClass('owl-changed');
	                setTimeout(function () {
	                    owl.removeClass('owl-changed');
	                }, config.smartSpeed)
	            })
	            owl.owlCarousel(config);
	            // Sections backgrounds
	            if ($(window).width() < 992) {
	                var itembackground = $(".item-background");
	                itembackground.each(function (index) {
	                    if ($('.item-background').attr("data-background")) {
	                        $(this).css("background-image", "url(" + $(this).data("background") + ")");
	                        $(this).css("height", $(this).closest('.owl-carousel').data("height") + 'px');
	                        $('.slide-img').css("display", 'none');
	                    }
	                });
	            }
	        });
			if ($('#img_zoom').length) {
	            $('#img_zoom').elevateZoom({
	                zoomType: "inner",
	                gallery: 'thumbnails',
	                galleryActiveClass: 'active',
	                cursor: "crosshair",
	                responsive: true,
	                easing: true,
	                zoomWindowFadeIn: 500,
	                zoomWindowFadeOut: 500,
	                lensFadeIn: 500,
	                lensFadeOut: 500
	            });
	            $(".open_qv").on("click", function (e) {
	                var ez = $(this).siblings('img').data('elevateZoom');
	                $.fancybox(ez.getGalleryList());
	                e.preventDefault();
	            });
	        }
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
    	getRelatedProduct();
    	getData()
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
    function getData(){
        Api.Product.GetOne($(".product-id").val())
            .done(res => { 
            	View.Product.setVal(res.data[0]) 
            })
            .fail(err => {  })
            .always(() => { });
    }
    function getRelatedProduct(){
        Api.Product.GetRelated($(".product-id").val())
            .done(res => {
                View.Product.renderRelated(res.data);
            })
            .fail(err => {  })
            .always(() => { });
    } 

    init();
})();