const View = {
    Auth: {
        Register: {
            resource: "#signup",
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var regexp = /[\u{3000}-\u{301C}\u{30A1}-\u{30F6}\u{30FB}-\u{30FE}]/mu;
  
                var data_name_first         = $(`${resource}`).find('.data-name-first').val();
                var data_address_city       = $(`${resource}`).find('.data-address-city').val(); 
                var data_address_munic      = $(`${resource}`).find('.data-address-munic').val(); 
                var data_address_detail     = $(`${resource}`).find('.data-address-detail').val(); 
                var data_phone              = $(`${resource}`).find('.data-phone').val(); 
                var data_email              = $(`${resource}`).find('.data-email').val(); 
                var data_password           = $(`${resource}`).find('.data-password').val(); 
                var data_password_confirm   = $(`${resource}`).find('.data-password-confirm').val(); 
                var data_check              = $('input.data-rule:checked').val(); 

                if (data_name_first == '') { required_data.push('Vui lòng nhập Họ tên'); onPushData = false }
                /* if (data_kana_first == '') { required_data.push('Name is required.'); onPushData = false } */

                // if (regexp.test(data_kana_first) == false) { 
                //     if (data_kana_first == '') { 
                //         required_data.push('Name kana first is required.'); onPushData = false 
                //     }else{
                //         required_data.push('kana name first is malformed.'); onPushData = false
                //     } 
                // }  
                // if (data_company == '') { required_data.push('Company is required.'); onPushData = false }
                /* if (data_zipcode == '') { required_data.push('Zipcode is required.'); onPushData = false } */
                if (data_address_city == '') { required_data.push('Vui lòng thêm Tỉnh/Thành phố'); onPushData = false }
                if (data_address_munic == '') { required_data.push('Vui lòng thêm Quận/Huyện'); onPushData = false }
                if (data_address_detail == '') { required_data.push('Vui lòng thêm địa chỉ nhận'); onPushData = false }
                if (data_phone == '') { required_data.push('Vui lòng thêm số điện thoại'); onPushData = false } 
                if (ViewIndex.Config.isEmail(data_email) == null) { 
                    if (data_email == '') { 
                        required_data.push('Vui lòng thêm email, sử dụng email để đăng nhập'); onPushData = false 
                    }else{
                        required_data.push('Email không hợp lệ'); onPushData = false 
                    }
                }
                if (data_password.length < 8) { required_data.push('Mật khẩu tối thiểu 8 ký tự'); onPushData = false } 
                if (data_password != data_password_confirm) { required_data.push('Mật khẩu không trùng khớp'); onPushData = false } 
                if (!data_check) { required_data.push('Vui lòng đống ý với Điều khoản sử dụng'); onPushData = false } 


                if (onPushData) {
                    fd.append('data_name_first', ViewIndex.Config.toNoTag(data_name_first));
                    fd.append('data_address_city', ViewIndex.Config.toNoTag(data_address_city));
                    fd.append('data_address_munic', ViewIndex.Config.toNoTag(data_address_munic));
                    fd.append('data_address_detail', ViewIndex.Config.toNoTag(data_address_detail));
                    fd.append('data_phone', ViewIndex.Config.toNoTag(data_phone));
                    fd.append('data_email', ViewIndex.Config.toNoTag(data_email));
                    fd.append('data_password', ViewIndex.Config.toNoTag(data_password)); 
                    fd.append('data_password_confirm', ViewIndex.Config.toNoTag(data_password_confirm));  
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
                        var data = View.Auth.Register.getVal();
                        if (data) callback(resource, data); 
                    }
                });
            },
            init(){
                $(document).on('keypress', `.data-phone`, function(event) {
                    return View.Config.onNumberKey(event);
                });
            }
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
            View.Auth.Register.init()
        }
    }, 
    init(){ 

    }
};
(() => {
    View.init()
    function init(){  

    } 
    async function redirect_logined(url, time) {
        await delay(time);
        /* window.location.replace(url); */
        //redirect tạm về /login đến khi set up mail
        window.location.replace('/login');
    }
    function delay(delayInms) {
        return new Promise(resolve => {
            setTimeout(() => {
                resolve(2);
            }, delayInms);
        });
    }
    View.Auth.Register.onPush("Register", (resource, fd) => {
        $(".js-validate .js-response").remove();
        Api.Auth.Register(fd)
            .done(res => {   
                if (res.status == 500) {   
                    View.Auth.response.error(resource, res.message); 
                }else{
                    View.Auth.response.success(resource, res.message) 
                    redirect_logined(res.data, 1000)
                }
            })
            .fail(err => {   })
            .always(() => { });
    }) 
    init()
})();
