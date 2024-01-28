//Xóa khách hàng
    // Sử dụng lớp chung cho tất cả nút "Delete"
    document.querySelectorAll('#delete-member-btn').forEach(function(button) {
        button.addEventListener('click', function () {
            // Lấy user ID từ thuộc tính data-user-id
            var userId2 = this.getAttribute('data-user-id');
            // Gửi yêu cầu Ajax đến Laravel route để lấy dữ liệu
            fetch('/admin/customer/api/getdetail/' + userId2) // Thay thế đường dẫn phù hợp với route của bạn
                .then(response => response.json())
                .then(data => {
                    // Hiển thị dữ liệu lấy được trong modal
                    document.getElementById('member-name').innerText = 'Xóa khách hàng ' + data.name + ' ?';

                    
                    //Xử lí khi bấm xác nhận xóa
                    var delete_submit = document.getElementById('delete-member-submit'); //
                    delete_submit.addEventListener('click',  function(){
                        var csrfToken = document.head.querySelector('meta[name="csrf-token"]').content;
                        fetch('/admin/customer/delete-customer/' + userId2,{
                            method: 'POST',
                            headers: {
                                'Content-Type': 'application/json',
                                'X-CSRF-TOKEN': csrfToken,
                            },
                        })
                            .then(response => response.json())
                            .then(data =>{
                                location.href = location.href;
                            })
                    })
                })
                .catch(error => console.error('Error:', error));
        });
    }); 

const View = {
    modals: {
        onControl(name, callback){
            $(document).on('click', '.modal-fs-control', function() {
                var id = $(this).attr('data-id');
                if($(this).attr('atr').trim() == name) {
                    callback(id);
                }
            });
        },
        
        onClose(){
            $(document).on('click', '.modal-close', function() {
                $('.modal-fullscreen').removeClass('show');
                $('body').removeClass('modal-fs-open');
            });
            $(document).on('click', '.close-modal', function() {
                $('.modal-fullscreen').removeClass('show');
                $('body').removeClass('modal-fs-open');
            });
            $(document).mouseup(function(e) {
                var container = $(".fs-body");
                if (!container.is(e.target) && container.has(e.target).length === 0) {
                    $('.modal-fullscreen').removeClass('show');
                    $('body').removeClass('modal-fs-open');
                }
            });
        },

        onShow(resource){
            $(resource).addClass('show');
            $('body').addClass('modal-fs-open');
            $(document).off('click', `${resource} .push-modal`);
        },

        launch(resource, modalTitleHTML, modalBodyHTML, modalFooterHTML){
            $(`${resource} .fs-title .modal-title`).html(modalTitleHTML);
            $(`${resource} .fs-content .fs-content-wrapper`).html(modalBodyHTML);
            $(`${resource} .fs-footer .close-modal`).html(modalFooterHTML[0]);
            $(`${resource} .fs-footer .push-modal`).html(modalFooterHTML[1]);
        },
        
        onHide(resource){
            $(resource).removeClass('show');
            $('body').removeClass('modal-fs-open');
        },

        Update: {
            resource: '#view-cus-modal',
            setVal1(data){
                $(".sub-customer tbody tr").remove()
                data.map(v => {
                    $(".sub-customer tbody")
                        .append(`<tr>
                            <td>${v.name}</td>
                            <td>${v.phone}</td>
                            <td>${v.sex}</td>
                            <td>${v.birthday}</td>
                            <td>${v.address}</td>
                            <td>${v.email}</td>
                            <td>${v.status}</td>
                          </tr>`)  
                })
          
            },
            setVal2(data){
                $(".sub-customer-order tbody tr").remove()
                data.map(v => { 
                    var order_status_title = [
                        "Chờ xử lí",
                        "Chưa hoàn thiện",
                        "Đã hoàn thiện",
                        "Chờ giao hàng",
                        "Đang giao hàng",
                        "Đã giao hàng",
                        "Kết thúc",
                        "Hoàn trả",
                    ];                   
                    $(".sub-customer-order tbody")
                        .append(`<tr>
                            <td>${v.id}</td>
                            <td>${order_status_title[v.order_status]}</td>
                            <td>${v.created_at}</td>
                            <td>${v.total}</td>
                          </tr>`)  
                })          
            },
            init() {
                var modalTitleHTML = `Thông tin chi tiết khách hàng`;
                var modalBodyHTML  = Template.Customer.Update();
                var modalFooterHTML = ['Đóng', 'Cập nhật'];
                View.modals.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML); 
            }
        },
        init() {
            this.onClose();
            this.Update.init();
        }
    },
    init(){
        View.modals.init();
    }
};

(() => {
    View.init();

    View.modals.onControl("View", (id) => {
        var resource = View.modals.Update.resource;  
        View.modals.onShow(resource);
        Api.Customer.getOne(id)
            .done(res => {
                View.modals.Update.setVal1(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });   
    })

    View.modals.onControl("View", (id) => {
        var resource = View.modals.Update.resource;  
        View.modals.onShow(resource);
        Api.Customer.getOneOrder(id)
            .done(res => {
                View.modals.Update.setVal2(res.data)
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });   
    })

})();


