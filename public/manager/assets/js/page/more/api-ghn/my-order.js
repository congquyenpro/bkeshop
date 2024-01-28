
const ViewMyOrder = {
    DataSend: [],
    Category: {},
    Toast: {
        showToast(message) {
            $(document).ready(function () {
                var toastHTML = `<div class="toast fade hide" data-delay="3000">
                <div class="toast-header">
                    <i class="anticon anticon-info-circle text-primary m-r-5"></i>
                    <strong class="mr-auto">Thông báo</strong>
                    <small>now</small>
                    <button type="button" class="ml-2 close" data-dismiss="toast" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="toast-body">
                    `+ message + `
                </div>
            </div>`;

                $('#notification-toast').append(toastHTML)
                $('#notification-toast .toast').toast('show');
                setTimeout(function () {
                    $('#notification-toast .toast:first-child').remove();
                }, 3000);

            });
        }
    },
    OrderLog: {
        getOrderlog() {
            // Use $(document).ready() to ensure the DOM is ready
            $(document).ready(function () {
                // Lấy URL hiện tại
                var url = window.location.href;
                console.log(' URL:', url);
    
                // Phân tích URL để lấy danh sách các tham số
                var urlParams = new URLSearchParams(url);
    
                // Lấy giá trị của tham số 'id'
                var idValue = urlParams.get('id');
    
                // In giá trị ra console để kiểm tra
                console.log('ID from URL:', idValue);
    
                ApiGHN.Order.GetOrderStatus2(idValue)
                    .done(res => {
                        console.log(res.data);
                        var data_log = res.data.order_log.split('|');
                        console.log(data_log);
                        var tbody = document.getElementById('order-log-table');
    
                        console.log(data_log[0].split(',')[0]);
    
                        // Tạo một hàng mới
                        var newRow = tbody.insertRow();
                        // Duyệt qua mảng chứa các mảng con
                        data_log.forEach(function (log) {
                            // Tạo một hàng mới
                            var newRow = tbody.insertRow();
    
                            // Tách dữ liệu từ chuỗi log bằng dấu ','
                            var newarray = log.split(',');
    
                            // Thêm mỗi phần tử của mảng con vào ô tương ứng
                            for (var i = 0; i < newarray.length; i++) {
                                var newCell = newRow.insertCell(i);
                                newCell.textContent = newarray[i];
                            }
                        });
                    });
            });
        },
    },
    

    init() {
        // ViewGHN.SenderInfor.init();
    }
};

(() => {
    ViewMyOrder.init();
    ViewMyOrder.OrderLog.getOrderlog();

    /*     ViewMyOrder.SenderInfor.getInfor().then((data) => {
            ViewGHN.Order.preview(data);
            ViewGHN.Order.create(data);
        }); */


})();



