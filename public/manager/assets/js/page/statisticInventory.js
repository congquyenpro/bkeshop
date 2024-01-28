const View = {
    Category: [],
    table: {
        __generateDTRow(data){
            var size = "";
            JSON.parse(data.metadata).data.map(v => {
                size += `<div class="metadata-table-wrapper">
                        <span class="badge badge-pill badge-blue m-r-10">Kích thước: ${v.size} ml</span>
                    </div>`;
            });
            var sex_status = [
                "Nam",
                "Nữ",
                "Bất kỳ",
            ];               
            var price = "";
            JSON.parse(data.metadata).data.map(v => {
                price += `<div class="metadata-table-wrapper">
                        <span class="badge badge-pill badge-green m-r-10">${IndexView.Config.formatPrices(v.prices)} ₫</span>
                    </div>`;
            });
            var inventory = "";
            JSON.parse(data.metadata).data.map(v => {
                inventory += `<div class="metadata-table-wrapper">
                        <span class="badge badge-pill badge-red m-r-10">SL: ${v.quantity}</span>
                    </div>`;
            })
            var inventory1 = "";
            JSON.parse(data.metadata).data.map(v => {
                inventory1 += `<div class="metadata-table-wrapper">
                        <span class="badge badge-pill badge-red m-r-10">SL: ${v.prices}</span>
                    </div>`;
            })
            var valueInventory = "";
            JSON.parse(data.metadata).data.map(v => {
                valueInventory += `<div class="metadata-table-wrapper">
                        <span class="badge badge-pill badge-red m-r-10">${v.quantity * v.prices} ₫</span>
                    </div>`;
            })
            return [
                `<div class="id-order">${data.id}</div>`,
                data.name,
                data.category_name,
                data.images == "" ? null : data.images.split(",").map(v => {
                    return `<div class="image-table-preview" style="background-image: url('/${v}')"></div>`
                }).join(""),
                size,
                sex_status[data.sex-1],
                price,
                inventory1,
                inventory,
                valueInventory,

            ]
        },
        init(){
            var row_table = [
                    {
                        title: 'ID',
                        name: 'id',
                        orderable: true,
                        width: '5%',
                    },
                    {
                        title: 'Tên',
                        name: 'name',
                        orderable: true,
                        width: '20%',
                    },
                    {
                        title: 'Danh mục',
                        name: 'name',
                        orderable: true,
                        width: '15%',
                    },
                    {
                        title: 'Hình ảnh',
                        name: 'name',
                        orderable: true,
                        width: '15%',
                    },
                    {
                        title: 'Phân loại',
                        name: 'icon',
                        orderable: true,
                        width: '20%',
                    },
                    {
                        title: 'Giới tính',
                        name: 'icon',
                        orderable: true,
                        width: '16%',
                    },
                    {
                        title: 'Đơn giá',
                        name: 'icon',
                        orderable: true,
                        width: '20%',
                    },
                    {
                        title: 'Giá vốn',
                        name: 'icon',
                        orderable: true,
                        width: '20%',
                    },
                    {
                        title: 'Tồn kho',
                        name: 'icon',
                        orderable: true,
                        width: '20%',
                    },
                    {
                        title: 'Giá trị tồn kho',
                        name: 'icon',
                        orderable: true,
                        width: '20%',
                    },                  
                  
                ];
            IndexView.table.init("#data-table", row_table);
        }
    },
    Metadata: {
    },

    init(){
        View.table.init();
        
    }
};
(() => {
    View.init();

    function init(){
        getData();
    }

    function getData(){
        Api.Product.GetAll()
            .done(res => {
                IndexView.table.clearRows();
                Object.values(res.data).map(v => {
                    IndexView.table.insertRow(View.table.__generateDTRow(v));
                    IndexView.table.render();
                })
                IndexView.table.render();
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
        Api.Category.GetAll()
            .done(res => {
                View.Category = res.data;
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
            .always(() => { });
    }
    init();
})();
