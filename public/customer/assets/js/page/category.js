const View = {
    Cart: {
        item: [],
        init() {
            var card = localStorage.getItem("sbtc-cart");
            var json_cart = JSON.parse(card);
            json_cart.cart.map(v => {
                View.Cart.item.push(v.id);
            })
        }
    },
    Product: {
        render(data) {
            $(".product-grid li").remove();
            $(".product-list li").remove();
            data.map(v => {
                var image = v.images.split(",")[0];
                var rate = Math.floor(Math.random() * 5) + 3;
                var rate_total = Math.floor(Math.random() * 200) + 100;
                $(".product-grid")
                    .append(`<li class="product-item  col-lg-4 col-md-6 col-sm-6 col-xs-6 col-ts-12 style-1">
	                            <div class="product-inner">
			                            <div class="product-top">
			                            </div>
			                            <div class="product-thumb">
			                                <div class="thumb-inner">
			                                    <a href="/product/${v.id}-${v.slug}" style="background-image: url('/${image}')"> </a>
			                                    <div class="thumb-group action-group action-add-to-card" atr="Add to card" product-id="${v.id}" meta-id="1"> 
			                                        <div class="loop-form-add-to-cart">  
			                                            <button class="single_add_to_cart_button button">
                                                            ${View.Cart.item.includes(v.id) ? `<i class="fas fa-check"></i>` : `Thêm vào giỏ hàng`}  
                                                        </button>
			                                        </div>
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
	                        </li> `)
                $(".product-list")
                    .append(` <li class="product-item style-list col-lg-12 col-lg-12 col-md-12 col-sm-12 col-xs-12 col-ts-12">
                            <div class="product-inner" >
                                <div class="product-top">
                                </div>
                                <div class="products-bottom-content">
                                    <div class="product-thumb">
                                        <div class="thumb-inner">
                                            <a href="/product/${v.id}-${v.slug}">
                                                <img src="/${image}" alt="img">
                                            </a> 
                                        </div>
                                    </div>
                                    <div class="product-info-left"> 
                                        <h5 class="product-name product_title">
                                            <a href="/product/${v.id}-${v.slug}">${v.name}</a>
                                        </h5>
                                        <div class="stars-rating">
                                            <div class="star-rating">
                                                <span class="star-${rate}"></span>
                                            </div>
                                            <div class="count-star">
                                                (${rate_total})
                                            </div>
                                        </div>
                                        <ul class="product-attributes"> 
                                            ${v.description.split("<br />").map(v => {
                        return `<li>${v}</li>`;
                    }).join("")} 
                                        </ul>
                                        <ul class="attributes-display">
                                            <li class="swatch-color">
                                                Size:
                                            </li>
                                            ${JSON.parse(v.metadata).data.map((v, k) => {
                        return ` <li class="swatch-color" size-id="${v.id}" data-prices="${v.prices}" data-discount="${v.discount}"> <a href="#">${v.size} ml</a> </li>`
                    }).join("")} 
                                        </ul> 
                                    </div>
                                    <div class="product-info-right">
                                        <div class="price">
                                            ${ViewIndex.Config.formatPrices(v.price)} ₫
                                        </div> 
                                        <div class="cart">
                                            <div class="single_variation_wrap">  
                                                <button class="single_add_to_cart_button button">
                                                    ${View.Cart.item.includes(v.id)
                            ? `<i class="fas fa-check"></i>`
                            : `<span class="loop-form-add-to-cart action-add-to-card d-flex" atr="Add to card" product-id="${v.id}" meta-id="1">
                                                            Thêm vào giỏ hàng
                                                        </span>`}  
                                                </button>
                                            </div> 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li> `)
            })
        }
    },
    Category: {
        id: 0,
        render(data) {
            $(".category-list-tag")
                .append(`<li class="tag-cloud-link for-you" for-you="for-you"><a>Đề xuất cho bạn</a> </li>`)
            $(".category-list-tag")
                .append(`<li class="tag-cloud-link status-tag" status-id="new"><a>Sản phẩm mới</a> </li>`)
            $(".category-list-tag")
                .append(`<li class="tag-cloud-link status-tag" status-id="hot"><a>Sản phẩm bán chạy</a> </li>`)
            $(".category-list-tag")
                .append(`<li class="tag-cloud-link status-tag" status-id="colections"><a>Bộ sưu tập</a> </li>`)
            $(".category-list-tag")
                .append(`<h3 style="margin-top: 37px;" class="widgettitle">Thương hiệu</h3>`)
            data.map((v, k, a) => {
                $(".category-list-tag")
                    .append(`<li class="tag-cloud-link category-tag" category-id="${v.id}"><a category-id="${v.id}">${v.name}</a> </li>`)
            })
            // Button Chọn Giới Tính
            $(".category-list-sex")
                .append(`<li class="tag-cloud-link sex-tag" value="1"><a>Nam</a> </li>`)
            $(".category-list-sex")
                .append(`<li class="tag-cloud-link sex-tag" value="2"><a>Nữ</a> </li>`)
            $(".category-list-sex")
                .append(`<li class="tag-cloud-link sex-tag" value="3"><a>Cả Nam và Nữ</a> </li>`)
        },
        onEvent(callback) {
            $(document).on('click', `.tag-cloud-link.category-tag`, function () {
                $(".category-list-tag .tag-cloud-link").removeClass("active");
                $(this).addClass("active")
                callback($(this).find("a").attr("category-id"))
            });
        },
        onStatusEvent(callback) {
            $(document).on('click', `.tag-cloud-link.status-tag`, function () {
                $(".category-list-tag .tag-cloud-link").removeClass("active");
                $(this).addClass("active")
                console.log($(this).attr("status-id"));
                callback($(this).attr("status-id"))
            });
            //Đề xuất cho bạn
            $(document).on('click', `.tag-cloud-link.for-you`, function () {
                $(".category-list-tag .tag-cloud-link").removeClass("active");
                $(this).addClass("active")
                console.log($(this).attr("for-you"));
                callback($(this).attr("for-you"))
            });
            // Button Chọn Giới Tính
            $(document).on('click', `.tag-cloud-link.sex-tag`, function () {
                $(".category-list-sex .tag-cloud-link").removeClass("active");
                $(this).addClass("active")

                console.log($(this).attr("value"));
                callback($(this).attr("value"))
            });
        },
        init() {
            $(".category-list-tag .tag-cloud-link.category-tag").removeClass("active")
            $(`.category-list-tag .tag-cloud-link.category-tag[category-id=${View.Category.id}]`).addClass("active")

            $(".category-list-tag .tag-cloud-link.status-tag").removeClass("active")
            $(`.category-list-tag .tag-cloud-link.status-tag[status-id='${View.URL.get("status") ?? 0}']`).addClass("active")
            // Button Chọn Giới Tính
            $(".category-list-sex .tag-cloud-link.sex-tag").removeClass("active")
            $(`.category-list-sex .tag-cloud-link.sex-tag[value='${View.URL.get("sex") ?? 0}']`).addClass("active")
        }
    },
    SlidesRange: {
        onStop(callback) {
            $('.slider-range-price').slider({
                stop: function (e, ui) {
                    callback();
                }
            });
        }
    },
    pagination: {
        page: 1,
        pageSize: 6,
        total: 0,
        onChange(callback) {
            const oThis = View.pagination;
            $(document).on('click', '.pagination .page-numbers:not(.disabled, .active)', function () {
                const page = $(this).attr("atr");
                let nextPage = null;
                if (page.match(/Next/g)) {
                    nextPage = oThis.page + 1;
                }
                else if (page.match(/Back/g)) {
                    nextPage = oThis.page - 1;
                }
                else {
                    nextPage = +page;
                }
                // callback first
                callback(+nextPage);
                // page change after
                oThis.page = +nextPage;

            });
        },
        length() {
            return Math.ceil(this.total / this.pageSize);
        },
        render() {
            const paginationHTML = generatePagination(this.page, Math.ceil(this.total / this.pageSize));
            if ($('.pagination.clearfix.style3').length) {
                $('.pagination.clearfix.style3').remove();
            }
            $('.pagination-navigation').append(paginationHTML);
            const startEntry = this.pageSize * (this.page - 1) + 1;
            const lastEntry = Math.min(this.pageSize * this.page, this.total);
        }
    },

    //Lấy ra một số thông tin người dùng để hiện sản phẩm đề xuất
    UserData:{
        age: null,
        sex:null,
        getData(){
            Api.Auth.GetProfile()
            .done(res => { 
                if (res.status == 200) {
                    //Xử lý tuổi
                    var birthDate = new Date(res.data[0].birthday); 
                    var currentDate = new Date();
                    View.UserData.age = currentDate.getFullYear() - birthDate.getFullYear();

                    //Xử lý sex
                    View.UserData.sex = res.data[0].sex;

                    console.log(View.UserData.age)
                    console.log(View.UserData.sex)

                }else{ 
                    redirect_logined(res.data)
                }
            })
            .fail(err => {   })
            .always(() => { });
        }
    },

    URL: {
        setURL(filters) {
            const param = (new URLSearchParams({ ...filters })).toString();
            window.history.pushState('', '', '?' + param);
        },
        getFilterURL() {
            // lấy ra url và trả về chuỗi filter tương ứng
            var urlParam = new URLSearchParams(window.location.search);
            return filters = {
                keyword: View.Keyword ?? '',
                category: View.Category.id ?? '0',
                sort: urlParam.get('sort') ?? $(".sort-by").val(),
                status: urlParam.get('status') ?? '',
                prices: $(".js-range-slider").val(),
                page: View.pagination.page ?? '1',
                sex: $('.tag-cloud-link.sex-tag.active').attr('value')===undefined?3:$('.tag-cloud-link.sex-tag.active').attr('value'),
                for_you:[View.UserData.age,View.UserData.sex],
            };
        },
        set(item) {
            const pageState = item;
            const param = (new URLSearchParams({ ...pageState })).toString();
            window.history.pushState('', '', '?' + param);
        },
        get(id) {
            var urlParam = new URLSearchParams(window.location.search);
            return urlParam.get(id)
        }
    },
    Sort: {
        onChange(callback) {
            $(document).on('change', `.sort-by`, function () {
                callback($(this).val())
            });
        }
    },
    Layout: {
        onChange() {
            $(".grid-view-mode .modes-mode").on("click", function () {
                $(".grid-view-mode .modes-mode").removeClass("active");
                $(this).addClass("active");
                var control = $(this).attr("atr");
                $(".list-products").removeClass("active");
                $(`.list-products[option-control=${control}]`).addClass("active");
            })
        }
    },

    //Lọc nâng cao theo các đặc tính
    FilerBox :{
        property1 : null,
        property2 : null,
        property3 : null,
        property4 : null,
        property5 : null,

    },
    FilterAdvanced: {
        onChange(callback) {
            const selectedValues = {};
            $(document).on('change', '.select-option', function () {
/*                 const property1 = {};
                const property2 = {};
                const property3 = {};
                const property4 = {};
                const property5 = {}; */
   
                const dropdownName = $(this).attr('name');
                const selectedValue = $(this).val();

                // Lưu giá trị được chọn vào đối tượng selectedValues
                selectedValues[dropdownName] = selectedValue;
                // Ánh xạ giá trị của mỗi select box với biến tương ứng
                property1 = selectedValues['nong-do'];
                property2 = selectedValues['phong-cach'];
                property3 = selectedValues['nhom-huong'];
                property4 = selectedValues['do-tuoi'];
                property5 = selectedValues['thanh-phan'];

                View.FilerBox.property1 =  property1;
                View.FilerBox.property2 =  property2;
                View.FilerBox.property3 =  property3;
                View.FilerBox.property4 =  property4;
                View.FilerBox.property5 =  property5;

                if (property1 === undefined || property1 === "nongdo-any" || property1 === "Nồng độ") property1 = "";
                if (property2 === undefined || property2 === "phongcach-any" || property2 === "Phong cách") property2 = "";
                if (property3 === undefined || property3 === "nhomhuong-any" || property3 === "Nhóm hương") property3 = "";
                if (property4 === undefined || property4 === "dotuoi-any" || property4 === "Độ tuổi") property4 = "";
                if (property5 === undefined || property5 === "thanhphan-any" || property5 === "Thành phần") property5 = "";

                /* View.URL.set({'status': 0, 'sort': 0}); */
                data_request = [property1,property2,property3,property4,property5]
                console.log(data_request);
                Api.Product.GetForAdvanceFilter(data_request)
                    .done(res => {
                        View.Product.render(res.data)
                        View.pagination.total = 2;
                        View.pagination.render();
                    })
                    .fail(err => { })
                    .always(() => { });


                /* console.log(`Selected value for ${dropdownName}: ${selectedValue}`); */
                
            });
        }
    },

    init() {
        View.Layout.onChange();
        View.Cart.init();
    }
};
(() => {
    View.init();
    function init() {
        View.UserData.getData()
        
        View.Category.id = View.URL.get("category")
        View.URL.setURL(View.URL.getFilterURL())
        getCategory();
        getData();
        new Promise(() => {
            setTimeout(() => {
                View.Category.init();
            }, 1000);
        });

        // getOrder( )
    }
    async function redirect_logined(url) {
        await delay(1500);
        window.location.replace(url);
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

    View.Sort.onChange(() => {
        View.pagination.page = 1;
        View.pagination.render();
        View.URL.set({ 'sort': $(".sort-by").val() });
        View.URL.setURL(View.URL.getFilterURL())
        getData();
    })

    View.Category.onEvent((id) => {
        View.Category.id = id;
        View.pagination.page = 1;
        View.pagination.render();
        View.URL.set({ 'status': 0, 'sort': 0 });
        View.URL.setURL(View.URL.getFilterURL())
        getData();
    })
    View.Category.onStatusEvent((tag) => {
        View.Category.id = 0;
        View.pagination.page = 1;
        View.pagination.render();
        View.URL.set({ 'status': tag, 'sort': 0 });
        View.URL.setURL(View.URL.getFilterURL())
        getData();
    })


    View.pagination.onChange((page) => {
        View.pagination.page = +page;
        View.pagination.render();
        View.URL.setURL(View.URL.getFilterURL())
        getData()
    })

    View.SlidesRange.onStop(() => {
        View.pagination.page = 1;
        View.pagination.render();
        View.URL.setURL(View.URL.getFilterURL())
        getData()
    });

    //Lọc nâng cao
    View.FilterAdvanced.onChange(() => {
        console.log('onChange event triggered');

    });

    function getData() {
        Api.Product.GetAll(View.URL.getFilterURL())
            .done(res => {
                View.Product.render(res.data.data)
                View.pagination.total = res.data.count;
                View.pagination.render();
            })
            .fail(err => { })
            .always(() => { });
    }

    function getCategory() {
        Api.Category.GetAll()
            .done(res => {
                View.Category.render(res.data);
            })
            .fail(err => { })
            .always(() => { });
    }

    init();
})();


// Xử lí bộ lọc
var btnOpen = document.querySelector('.open-modal-boloc')
var modal = document.querySelector('.form-boloc')
var btnClose = document.querySelector('.form-boloc hide')
function toggleModal() {
    modal.classList.toggle('hide')
}
Api.Product.GetListProperty()
.done(res => {
    var listProperty = res.data;
    var nongdo_pro = listProperty[0];
    var phongcach_pro = listProperty[1];
    var nhomhuong = listProperty[2];
    var dotuoi = listProperty[3]
    var thanhphan = listProperty[4];

    $.each(nongdo_pro, function(index, option) {
        $('#nong-do-select').append('<option value="' + option + '">' + option + '</option>');
    });
    $.each(phongcach_pro, function(index, option) {
        $('#phong-cach-select').append('<option value="' + option + '">' + option + '</option>');
    });
    $.each(nhomhuong, function(index, option) {
        $('#nhom-huong-select').append('<option value="' + option + '">' + option + '</option>');
    });
    $.each(dotuoi, function(index, option) {
        $('#do-tuoi-select').append('<option value="' + option + '">' + option + '</option>');
    });
    $.each(thanhphan, function(index, option) {
        $('#thanh-phan-select').append('<option value="' + option + '">' + option + '</option>');
    });
})
.fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
.always(() => { });
btnOpen.addEventListener('click', toggleModal)
btnClose.addEventListener('click', toggleModal)

