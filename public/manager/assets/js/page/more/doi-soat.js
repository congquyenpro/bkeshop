const ApiTransport = {
   Transport: {},
    config: {
        headers: {
            "X-CSRF-TOKEN": $('meta[name="csrf-token"]').attr('content'),
        },
        crossDomain: true,
    },
};
(() => {
    ApiTransport.Transport.getDoiSoat = (id) => $.ajax({
        url: `/admin/transport/get-doi-soat/${id}`,
        method: 'GET',
        headers: ApiTransport.config.headers,
/*         data: JSON.stringify({
        }), */
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });

    ApiTransport.Transport.getTicketDetail = (url) =>$.ajax({
        url: url,
        method: 'GET',
        headers: ApiTransport.config.headers,
/*         data: JSON.stringify({
        }), */
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    });

    ApiTransport.Transport.confirmDoiSoat = (id) =>$.ajax({
        url: `/admin/transport/confirm-doi-soat/${id}`,
        method: 'GET',
        headers: ApiTransport.config.headers,
/*         data: JSON.stringify({
        }), */
        success: function(response) {
            console.log(response);
        },
        error: function(error) {
            console.error(error);
        }
    })
    
})();

const View = {
    doiSoat: {
        activeClick() {
            document.addEventListener('DOMContentLoaded', function () {
                var statusEvents = document.querySelectorAll('.status-event');

                //default
                ApiTransport.Transport.getDoiSoat(0)             
                .done(res => {
                    if (res.length) console.log('Looxi roi')
                    var tableBody = document.querySelector('.table tbody');

                    tableBody.innerHTML = '';

                    /* 
                    Chờ xử lý: status=2, status_order=2 (Đang giao hàng)
                    Chưa đối soát: status=0, status_order=1 (Đã giao hàng) || status_order=0 (Hoàn hàng)
                    Đã đối soát: status=1, status_order=1 (Đã giao hàng) || status_order=0 (Hoàn hàng)
                    */
                    var rd_cus = ["Nguyen Quyen","Van Huy", "Hoan Minh", "Quyen New"];
                    res.forEach(function (item) {
                        var row = `
                        <tr role="row" class="even">
                            <td>${item.vandonID}</td>
                            <td>${item.orderID}</td>
                            <td>
                                <div class="metadata-table-wrapper">
                                    <span class="badge badge-pill badge-blue m-r-10">${rd_cus[Math.floor(Math.random() * 4)]}</span>
                                </div>
                                <div class="metadata-table-wrapper">
                                    <span class="badge badge-pill badge-green m-r-10">0866888222</span>
                                </div>
                            </td>
                            <td>${item.partner}</td>
                            <td>                                                
                                <div class="metadata-table-wrapper">
                                    <span class="badge badge-pill badge-green m-r-10">Phí trả ĐVVC: ${item.fee}</span>
                                </div>
                                <div class="metadata-table-wrapper">
                                    <span class="badge badge-pill badge-red m-r-10">Thu hộ COD: ${item.COD}</span>
                                </div>
                            </td>
                            <td>
                                <div class="d-flex align-items-center">
                                ${(() => {
                                    if (item.status_order === 1) {
                                        return `<div class="badge badge-success badge-dot m-r-10"></div> <div>Giao thành công</div>`;
                                    } else if (item.status_order === 0 || item.status_order === null) {
                                        return `<div class="badge badge-danger badge-dot m-r-10"></div> <div>Hoàn trả</div>`;
                                    } else {
                                        return `<div class="badge badge-success badge-dot m-r-10"></div> <div>Đang giao hàng</div>`;
                                    }
                                })()}
                                
                                </div>
                                <div class="d-flex align-items-center">
                                    ${item.status === 1
                                        ? `<div class="badge badge-success badge-dot m-r-10"></div> <div>Đã đối soát</div>`
                                        : `<div class="badge badge-danger badge-dot m-r-10"></div> <div>Chưa đối soát</div>`
                                    }
                                </div>
                            </td>
                            <td>
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                    <a class="view-data-2" ticket-id="${item.id}}" style="cursor: pointer" href="#" data-toggle="modal" data-target=".bd-example-modal-xl">
                                    <i class="anticon anticon-eye"></i>
                                    </a>
                                </button>                                         
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                    <i class="anticon anticon-edit"></i>
                                </button>
                                <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                    <i class="anticon anticon-delete"></i>
                                </button>
                            </td>
                            <!-- Add other columns as needed -->
                        </tr>`;
                        tableBody.innerHTML += row;
                    });

                    // Dispatch a custom event to signal that activeClick has completed
                    document.dispatchEvent(new Event('activeClickCompleted'));
                })
                .fail(err => {
                    console.log("Có lỗi");
                    // Dispatch the event even if there's an error
                    document.dispatchEvent(new Event('activeClickCompleted'));
                })
                .always(() => {

                })

                statusEvents.forEach(function (event) {
                    event.addEventListener('click', function () {
                        statusEvents.forEach(function (el) {
                            el.classList.remove('is-select');
                        });

                        event.classList.add('is-select');
                        var dataId = event.getAttribute('data-id');
                        console.log('Selected data-id:', dataId);
                        ApiTransport.Transport.getDoiSoat(dataId)             
                            .done(res => {
                                if (res.length) console.log('Looxi roi')
                                var tableBody = document.querySelector('.table tbody');

                                tableBody.innerHTML = '';

                                /* 
                                Chờ xử lý: status=2, status_order=2 (Đang giao hàng)
                                Chưa đối soát: status=0, status_order=1 (Đã giao hàng) || status_order=0 (Hoàn hàng)
                                Đã đối soát: status=1, status_order=1 (Đã giao hàng) || status_order=0 (Hoàn hàng)
                                */

                                res.forEach(function (item) {
                                    var rd_cus = ["Nguyen Quyen","Van Huy", "Hoan Minh", "Quyen New"];
                                    var row = `
                                    <tr role="row" class="even">
                                        <td>${item.vandonID}</td>
                                        <td>${item.orderID}</td>
                                        <td>
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-blue m-r-10">${rd_cus[Math.floor(Math.random() * 4)]}</span>
                                            </div>
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-green m-r-10">0866888222</span>
                                            </div>
                                        </td>
                                        <td>${item.partner}</td>
                                        <td>                                                
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-green m-r-10">Phí trả ĐVVC: ${item.fee}</span>
                                            </div>
                                            <div class="metadata-table-wrapper">
                                                <span class="badge badge-pill badge-red m-r-10">Thu hộ COD: ${item.COD}</span>
                                            </div>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                            ${(() => {
                                                if (item.status_order === 1) {
                                                    return `<div class="badge badge-success badge-dot m-r-10"></div> <div>Giao thành công</div>`;
                                                } else if (item.status_order === 0 || item.status_order === null) {
                                                    return `<div class="badge badge-danger badge-dot m-r-10"></div> <div>Hoàn trả</div>`;
                                                } else {
                                                    return `<div class="badge badge-success badge-dot m-r-10"></div> <div>Đang giao hàng</div>`;
                                                }
                                            })()}
                                            
                                            </div>
                                            <div class="d-flex align-items-center">
                                                ${item.status === 1
                                                    ? `<div class="badge badge-success badge-dot m-r-10"></div> <div>Đã đối soát</div>`
                                                    : `<div class="badge badge-danger badge-dot m-r-10"></div> <div>Chưa đối soát</div>`
                                                }
                                            </div>
                                        </td>
                                        <td>
                                            <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                <a class="view-data-2" ticket-id="${item.id}}" style="cursor: pointer" href="#" data-toggle="modal" data-target=".bd-example-modal-xl">
                                                <i class="anticon anticon-eye"></i>
                                                </a>
                                            </button>                                         
                                            <button class="btn btn-icon btn-hover btn-sm btn-rounded pull-right">
                                                <i class="anticon anticon-edit"></i>
                                            </button>
                                            <button class="btn btn-icon btn-hover btn-sm btn-rounded">
                                                <i class="anticon anticon-delete"></i>
                                            </button>
                                        </td>
                                        <!-- Add other columns as needed -->
                                    </tr>`;
                                    tableBody.innerHTML += row;
                                });

                                // Dispatch a custom event to signal that activeClick has completed
                                document.dispatchEvent(new Event('activeClickCompleted'));
                            })
                            .fail(err => {
                                console.log("Có lỗi");
                                // Dispatch the event even if there's an error
                                document.dispatchEvent(new Event('activeClickCompleted'));
                            })
                            .always(() => {

                            })
                    });
                });
            });
        },
        setStatus() {
            return new Promise(resolve => {
                document.addEventListener('activeClickCompleted', function () {
                    var viewDataElements = document.querySelectorAll('.view-data-2');
                    
                    viewDataElements.forEach(element => {
                        element.addEventListener('click', function () {
                            console.log("click");
                            var ticketID = element.getAttribute('ticket-id');
                            console.log('Clicked on button with ticket-id:', ticketID);
                            
                            // Resolve the Promise and pass ticketID
                            resolve(ticketID);
                        });
                    });
                });
            });
        },
        
        showDetail(id) {
            console.log(id);
            var url = '/admin/transport/get-ticket-detail/'+id
            ApiTransport.Transport.getTicketDetail(url)
                .done(res=>{
                    document.getElementById("partner").innerHTML=res.partner;
                    document.getElementById("id").innerHTML=res.id;
                    document.getElementById("vdID").innerHTML=res.vandonID;
                    document.getElementById("odID").innerHTML=res.orderID;
                    document.getElementById("COD_detail").innerHTML=res.COD;
                    document.getElementById("fee_detail").innerHTML=res.fee;

                    //disable khi đang giao hàng => không thể đối soát
                    const selectedElement = document.querySelector('.status-event.is-select');
                    // Kiểm tra xem phần tử có tồn tại không
                    if (selectedElement) {
                        // Lấy giá trị của thuộc tính 'data-id'
                        const dataIdValue = selectedElement.getAttribute('data-id');
                        
                        // In ra giá trị 'data-id'
                        console.log('Data ID of the selected element:', dataIdValue);

                        if (dataIdValue==2) {
                            document.getElementById("confirm-doi-soat").disabled=true;
                        }
                    }
                    

                    $("#confirm-doi-soat").on("click",function(){
                        ApiTransport.Transport.confirmDoiSoat(res.id)
                            .done(res=>{
                                document.getElementById("confirm-doi-soat").innerHTML=`<i class="anticon anticon-check"></i> Đối soát thành công`;
                                setTimeout(function () {
                                    location.reload();
                                }, 1000);
                            })
                    })
                })
                .fail(err=>{
                    console.log("err")
                })
        }
    },
};

(() => {
    View.doiSoat.activeClick();
    
    View.doiSoat.setStatus().then(ticketID => {
        View.doiSoat.showDetail(ticketID);
    });
})();
 
