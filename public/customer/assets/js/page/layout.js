const ViewIndex = {
    Auth: {
        isLogin(){
            return $("#auth-value").val() == 1 ? true : false;
        },
        Register: {
            resource: "#signup",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_email              = $(`${resource}`).find('.data-email').val();
                var data_password           = $(`${resource}`).find('.data-password').val(); 
                var data_name               = $(`${resource}`).find('.data-name').val(); 
 
                if (ViewIndex.Config.isEmail(data_email) == null) { 
                    if (data_email == '') { 
                        required_data.push('Email is required.'); onPushData = false 
                    }else{
                        required_data.push('Email is invalid.'); onPushData = false 
                    }
                }
                if (data_password == '') { required_data.push('Password is required.'); onPushData = false }
                if (data_name == '') { required_data.push('Name is required.'); onPushData = false }

                if (onPushData) {
                    fd.append('data_email', data_email);
                    fd.append('data_password', data_password); 
                    fd.append('data_name', data_name); 
                    return fd;
                }else{ 
                    var required_noti = ``;
                    $(`${resource} .js-errors`).remove()
                    for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                    $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${resource} .form-submit`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = ViewIndex.Auth.Register.getVal();
                        if (data) callback(resource, data); 
                    }
                });
            },
            init(){
                $(document).on('keypress', `.data-phone`, function(event) {
                    return ViewIndex.Config.onNumberKey(event);
                });
            }
        },
        Login: {
            resource: "#login",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_email              = $(`${resource}`).find('.data-email').val();
                var data_password           = $(`${resource}`).find('.data-password').val(); 

                if (ViewIndex.Config.isEmail(data_email) == null) { 
                    if (data_email == '') { 
                        required_data.push('Email is required.'); onPushData = false 
                    }else{
                        required_data.push('Email is invalid.'); onPushData = false 
                    }
                }
                if (data_password == '') { required_data.push('Password is required.'); onPushData = false }

                if (onPushData) {
                    fd.append('data_email', data_email);
                    fd.append('data_password', data_password);  
                    return fd;
                }else{ 
                    var required_noti = ``;
                    $(`${resource} .js-errors`).remove()
                    for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                    $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${resource} .form-submit`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = ViewIndex.Auth.Login.getVal();
                        if (data) callback(resource, data); 
                    }
                });
            },
            init(){
                $(document).on('keypress', `.data-phone`, function(event) {
                    return ViewIndex.Config.onNumberKey(event);
                });
            }
        },
        Forgot: {
            resource: "#forgotPassword",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
                var data_email              = $(`${resource}`).find('.data-email').val(); 
                if (ViewIndex.Config.isEmail(data_email) == null || data_email == '')  onPushData = false;  
                if (onPushData) {
                    fd.append('data_email', data_email); 
                    return fd;
                }else{ 
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${resource} .form-submit`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = ViewIndex.Auth.Forgot.getVal();
                        if (data) callback(data); 
                    }
                });
            },
        },
        Reset: {
            resource: "#forgotPassword",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
                var data_email              = $(`${resource}`).find('.data-email').val(); 
                var data_password              = $(`${resource}`).find('.data-password').val();
                var data_code              = $(`${resource}`).find('.data-code').val();
                if (ViewIndex.Config.isEmail(data_email) == null || data_email == '')  onPushData = false;  
                if (data_password == "")  onPushData = false; 
                if (data_code == "")  onPushData = false; 

                if (onPushData) {
                    fd.append('data_email', data_email); 
                    fd.append('data_password', data_password); 
                    fd.append('data_code', data_code); 
                    return fd;
                }else{ 
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${resource} .form-submit`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = ViewIndex.Auth.Reset.getVal();
                        if (data) callback(data); 
                    }
                });
            },
        },
        response: { 
            success(resource, message){
                $(resource).find(".js-validate .js-response").remove();
                $(resource).find(".js-validate").prepend(`<div class="js-response js-success"><li>${message}</li></div>`)
            },
            error(resource, message){
                $(resource).find(".js-validate .js-response").remove();
                $(resource).find(".js-validate").prepend(`<div class="js-response js-errors"><li>${message}</li></div>`)
            },                  
        },
        init(){
            ViewIndex.Auth.Register.init()
        }
    }, 
    Config: {
        onNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
        isEmail(email){
            return email.match( /^(([^<>()[\]\\.,;:\s@\"]+(\.[^<>()[\]\\.,;:\s@\"]+)*)|(\".+\"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/ );
        },
        formatPrices(num) {
            return num.toString().replace(/(\d)(?=(\d{3})+(?!\d))/g, '$1,')
        },
        toNoTag(string){
            return string.replace(/(<([^>]+)>)/ig, "");
        },
        isNumberKey(evt){
            var charCode = (evt.which) ? evt.which : event.keyCode
            if (charCode > 31 && (charCode < 48 || charCode > 57))
                return false;
            return true;
        },
    },
    Category: { 
        render_top(data){  
            $(".clone-mobile-category")
                .append(`<li class="menu-item">
                            <a href="/category?category=0" class="stelina-menu-item-title">Xem tất cả sản phẩm</a>
                        </li>`)
            $(".clone-mobile-category")
                .append(`<li class="menu-item">
                            <a href="/category?status=new" class="stelina-menu-item-title">Sản phẩm mới</a>
                        </li>`)
            $(".clone-mobile-category")
                .append(`<li class="menu-item">
                            <a href="/category?status=hot" class="stelina-menu-item-title">Sản phẩm bán chạy</a>
                        </li>`)

            data.map((v, k) => { 
                $('.category-list-top').append(`
                    <option value="${v.id}">${v.name}</option>
                `)
                $(".clone-mobile-category")
                    .append(`<li class="menu-item">
                                <a href="/category?category=${v.id}" class="stelina-menu-item-title">${v.name}</a>
                            </li>`) 
                $(".category-list-footer")
                    .append(`<li class="menu-item">
                                <a href="/category?category=${v.id}" class="stelina-menu-item-title">${v.name}</a>
                            </li>`)
                    
            })
            $(".chosen-select").chosen({disable_search_threshold: 10});
        },
    },
    Cart: { 
        add_to_card(name, callback){
            $(document).on('click', `.action-add-to-card`, function() {
                if($(this).attr('atr').trim() == name) {
                    callback($(this));
                }
            });
        },
        update(){
            var card = localStorage.getItem("sbtc-cart"); 
            var json_cart = JSON.parse(card);   
            $(".footer-device-mobile .count-icon").html(json_cart.cart.length)
            $(".shopcart-icon .count").html(json_cart.cart.length)
        }
    },
    onSearch(callback){
        $(document).on('keyup', '.search-input-wrapper', function() {
            $('.suggest-list .suggess-wrapper').remove()
            var data_text = $(this).val();  
            var data_category  = $(`#category-search`).val();
            var fd = new FormData();
            fd.append('data_text', data_text);
            fd.append('data_category', data_category); 
            if (data_text) callback(fd, data_text);
        });

        $(document).mouseup(function(e) {
            var container = $(".searchProduct");
            if (!container.is(e.target) && container.has(e.target).length === 0) {
                $('.suggest-list .suggess-wrapper').remove()
            }
        });
    }, 
    Sort:{
        onChange(callback){
            $(document).on('change', `.sort-by`, function() { 
                callback($(this).val())
            });
        }
    },
    Layout: {
        onChange(){
            $(".grid-view-mode .modes-mode").on("click", function(){
                $(".grid-view-mode .modes-mode").removeClass("active");
                $(this).addClass("active");
                var control = $(this).attr("atr");
                $(".list-products").removeClass("active");
                $(`.list-products[option-control=${control}]`).addClass("active");
            })
        }
    },
    init(){ 
        ViewIndex.Auth.init();  
        $(document).on('mouseover', `.product-item`, function() {
            var father = $(this).find(".action-group")
            var card        = localStorage.getItem("sbtc-cart");  
            var json_cart = JSON.parse(card);  
            var card_list = [];
            json_cart.cart.map(v => { 
                card_list.push(v.id);
            })  
            father.html(card_list.includes(+father.attr("product-id")) 
                                    ? `<i class="fas fa-check"></i>` 
                                    : `<div class="loop-form-add-to-cart">
                                            <button class="single_add_to_cart_button button">Thêm vào giỏ hàng</button>
                                        </div>`) 
        });
        $(document).on('keypress', `.data-number`, function(event) {
            return ViewIndex.Config.isNumberKey(event);
        });

    }
};
(() => {
    ViewIndex.init()
    function init(){  
        if (localStorage.getItem("sbtc-cart") == null) {localStorage.setItem("sbtc-cart", `{ "cart": [] }`)}
        // getCart(); 
        getCategory();
        ViewIndex.Cart.update();
    }
    async function redirect_logined(url, time) {
        await delay(time);
        window.location.replace(url);
    }
    function delay(delayInms) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve(2);
            }, delayInms);
        });
    }
    ViewIndex.onSearch((fd, text) => {
        Api.Product.GetSearch(fd)
            .done(res => { 
                $('.suggest-list .suggess-wrapper').remove()
                $('.suggest-list')
                    .append(`<div class="suggess-wrapper"></div>`)
                if (res.data.length > 0) {
                    res.data.map(v => {
                        $(".suggess-wrapper").append(`<div class="suggess-item"><a title="${v.name}" href="/product/${v.id}-${v.slug}">${highlight(text, v.name)}</a></div>`)
                    })
                }else{
                    $(".suggess-wrapper").append(`<div class="suggess-item">No resurt</div>`)
                }
            })
    })
    function highlight(text, inputText) {
        var index = inputText.toLowerCase().indexOf(text.toLowerCase());
        inputText = inputText.substring(0,index) + "<span class='highlight'>" + inputText.substring(index,index+text.length) + "</span>" + inputText.substring(index + text.length);
        return inputText
        
    } 

    ViewIndex.Cart.add_to_card("Add to card", (item) => {
        var card        = localStorage.getItem("sbtc-cart"); 
        var product_id     = item.attr("product-id");
        var meta_id     = item.attr("meta-id");
        var json_cart = JSON.parse(card);  

        // Kiểm tra sản phẩm đã có trong giở hàng
        var has_in_cart = false;
        json_cart.cart.map(v => { 
            if (v.id == product_id) {
                has_in_cart = true;
            }
        })

        if (!has_in_cart) {
            json_cart.cart 
                .push(
                    JSON.parse(`{ "id": ${product_id}, "meta": ${meta_id}}`)
                );
            localStorage.setItem("sbtc-cart", JSON.stringify(json_cart));

        } else{
            console.log("%cProduct inside Cart", "color: #f00");
        }
        item.html(`<i class="fas fa-check"></i>`)
        ViewIndex.Cart.update();
    })

    function getCart(){
        if (ViewIndex.Auth.isLogin()) {
            Api.Cart.GetCart()
                .done(res => { 
                    if (res.status == 200) {
                        var cart = localStorage.getItem("card") == null ? [] : localStorage.getItem("card").split(","); 
                        if (res.data.cart != null) {
                            res.data.cart.split(",").map(v => {
                                cart.includes(v) ? "" : cart.push(v);
                            })
                            localStorage.setItem("card", cart);
                        }
                        updateCartUser();
                    }else{
                        redirect_logined(res.data, 1000)
                    }
                })
        }
    }
    function updateCartUser(){
        var cart = localStorage.getItem("card");
        if (cart != null) {
            var fd = new FormData();
            fd.append('cart', cart); 
            Api.Cart.Update(fd)
                .done(res => {
                    ViewIndex.Cart.update();
                })
                .fail(err => {  })
                .always(() => { });
        }
    }

    // ViewIndex.Auth.Register.onPush("Register", (resource, fd) => {
    //     Api.Auth.Register(fd)
    //         .done(res => {  
    //             if (res.status == 500) {   
    //                 ViewIndex.Auth.response.error(resource, res.message); 
    //             }else{
    //                 ViewIndex.Auth.response.success(resource, res.message) 
    //                 redirect_logined(res.data, 1000)
    //             }
    //         })
    //         .fail(err => {   })
    //         .always(() => { });
    // }) 
    ViewIndex.Auth.Login.onPush("Login", (resource, fd) => {
        Api.Auth.Login(fd)
            .done(res => {  
                if (res.status == 500) {
                    ViewIndex.Auth.response.error(resource, res.message); 
                }else{
                    ViewIndex.Auth.response.success(resource, res.message) ;
                    redirect_logined(res.data, 1000)
                }
            })
            .fail(err => {   })
            .always(() => { });
    }) 
    ViewIndex.Auth.Forgot.onPush("Forgot", (fd) => {
        $(".form-submit[atr=Forgot]").html(`<i class="fas fa-spinner"></i>`);
        Api.Auth.Forgot(fd)
            .done(res => {  
                if (res.status == 200) {
                    ViewIndex.Auth.response.success(res.message) 
                    $(".form-email").css({"display": "none"})
                    $(".form-code").css({"display": "block"})
                    $(".form-password").css({"display": "block"})
                    $(".form-submit[atr=Forgot]").html(`Đổi mật khẩu`);
                    $("#forgotPassword .form-submit").attr("atr", "Reset");
                }else{
                    ViewIndex.Auth.response.error(res.message); 
                    $(".form-submit[atr=Forgot]").html(`Lấy lại mật khẩu`);
                }
            })
            .fail(err => {   })
            .always(() => { });
    }) 
    ViewIndex.Auth.Reset.onPush("Reset", (fd) => {
        $(".form-submit[atr=Forgot]").html(`<i class="fas fa-spinner"></i>`);
        Api.Auth.Reset(fd)
            .done(res => {  
                if (res.status == 200) {
                    ViewIndex.Auth.response.success(res.message)  
                    redirect_logined(res.data, 1000)
                }else{
                    ViewIndex.Auth.response.error(res.message); 
                }
            })
            .fail(err => {   })
            .always(() => { });
    }) 
 
    function getCategory(){
        Api.Category.GetAll()
            .done(res => { 
                ViewIndex.Category.render_top(res.data); 
                stelina_menuclone_all_menus(); 
            })
            .fail(err => {  })
            .always(() => { });
    }
    function stelina_menuclone_all_menus() { 
        if ( !$('.stelina-menu-clone-wrap').length && $('.stelina-clone-mobile-menu').length > 0 ) {
            $('body').prepend('<div class="stelina-menu-clone-wrap">' +
                '<div class="stelina-menu-panels-actions-wrap">' +
                '<span class="stelina-menu-current-panel-title">MENU</span>' +
                '<a class="stelina-menu-close-btn stelina-menu-close-panels" href="#">x</a></div>' +
                '<div class="stelina-menu-panels"></div>' +
                '</div>');
        }
        var i                = 0,
            panels_html_args = Array();
        if ( !$('.stelina-menu-clone-wrap .stelina-menu-panels #stelina-menu-panel-main').length ) {
            $('.stelina-menu-clone-wrap .stelina-menu-panels').append('<div id="stelina-menu-panel-main" class="stelina-menu-panel stelina-menu-panel-main"><ul class="depth-01"></ul></div>');
        }

        $('.stelina-clone-mobile-menu').each(function () {
            var $this              = $(this),
                thisOfficeu           = $this,
                this_menu_id       = thisOfficeu.attr('id'),
                this_menu_clone_id = 'stelina-menu-clone-' + this_menu_id;

            if ( !$('#' + this_menu_clone_id).length ) {
                var thisClone = $this.clone(true); // Clone Wrap
                thisClone.find('.menu-item').addClass('clone-menu-item');

                thisClone.find('[id]').each(function () {
                    // Change all tab links with href = this id
                    thisClone.find('.vc_tta-panel-heading a[href="#' + $(this).attr('id') + '"]').attr('href', '#' + stelina_menuadd_string_prefix($(this).attr('id'), 'stelina-menu-clone-'));
                    thisClone.find('.stelina-menu-tabs .tabs-link a[href="#' + $(this).attr('id') + '"]').attr('href', '#' + stelina_menuadd_string_prefix($(this).attr('id'), 'stelina-menu-clone-'));
                    $(this).attr('id', stelina_menuadd_string_prefix($(this).attr('id'), 'stelina-menu-clone-'));
                });

                thisClone.find('.stelina-menu-menu').addClass('stelina-menu-menu-clone');

                // Create main panel if not exists

                var thisMainPanel = $('.stelina-menu-clone-wrap .stelina-menu-panels #stelina-menu-panel-main ul');
                thisMainPanel.append(thisClone.html());

                stelina_menu_insert_children_panels_html_by_elem(thisMainPanel, i);
            }
        });
    }

    // i: For next nav target
    function stelina_menu_insert_children_panels_html_by_elem($elem, i) {
        if ( $elem.find('.menu-item-has-children').length ) {
            $elem.find('.menu-item-has-children').each(function () {
                var thisChildItem = $(this);
                stelina_menu_insert_children_panels_html_by_elem(thisChildItem, i);
                var next_nav_target = 'stelina-menu-panel-' + i;

                // Make sure there is no duplicate panel id
                while ( $('#' + next_nav_target).length ) {
                    i++;
                    next_nav_target = 'stelina-menu-panel-' + i;
                }
                // Insert Next Nav
                thisChildItem.prepend('<a class="stelina-menu-next-panel" href="#' + next_nav_target + '" data-target="#' + next_nav_target + '"></a>');

                // Get sub menu html
                var sub_menu_html = $('<div>').append(thisChildItem.find('> .submenu').clone()).html();
                thisChildItem.find('> .submenu').remove();

                $('.stelina-menu-clone-wrap .stelina-menu-panels').append('<div id="' + next_nav_target + '" class="stelina-menu-panel stelina-menu-sub-panel stelina-menu-hidden">' + sub_menu_html + '</div>');
            });
        }
    }
    init()
})();
