const View = {
    Category: [],
    table: {
        __generateDTRow(data){
            var metadata = "";
            JSON.parse(data.metadata).data.map(v => {
                metadata += `<div class="metadata-table-wrapper">
                        <span class="badge badge-pill badge-blue m-r-10">Kích thước: ${v.size} ml</span>
                        <span class="badge badge-pill badge-green m-r-10">Đơn giá: ${IndexView.Config.formatPrices(v.prices)}</span>
                        <span class="badge badge-pill badge-orange m-r-10">Giảm giá: ${v.discount} %</span>
                        <span class="badge badge-pill badge-red m-r-10">SL: ${v.quantity}</span>
                    </div>`;
            })
            return [
                `<div class="id-order">${data.id}</div>`,
                data.name,
                data.category_name,
                data.images == "" ? null : data.images.split(",").map(v => {
                    return `<div class="image-table-preview" style="background-image: url('/${v}')"></div>`
                }).join(""),
                metadata,
                `<label class="switch" data-id="${data.id}" data-status="${data.status == '1' ? '0' : '1'}" atr="Status"> <span class="slider round ${data.trending == '1' ? 'active' : ''}"></span> </label>`,
                `<a class="view-data " style="cursor: pointer" target="_blank" href="/product/${data.id}-${data.slug}"><i class="anticon anticon-eye"></i></a>
                <div class="view-data modal-control" style="cursor: pointer" atr="View" data-id="${data.id}"><i class="anticon anticon-edit"></i></div>
                <div class="view-data modal-control" style="cursor: pointer" atr="Delete" data-id="${data.id}"><i class="anticon anticon-delete"></i></div>`
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
                        width: '10%',
                    },
                    {
                        title: 'Danh mục',
                        name: 'name',
                        orderable: true,
                        width: '10%',
                    },
                    {
                        title: 'Hình ảnh',
                        name: 'name',
                        orderable: true,
                        width: '30%',
                    },
                    {
                        title: 'Phân loại',
                        name: 'icon',
                        orderable: true,
                        width: '20%',
                    },
                    {
                        title: 'Trending',
                        name: 'icon',
                        orderable: true,
                        width: '10%',
                    },
                    {
                        title: 'Hành động',
                        name: 'Action',
                        orderable: true,
                        width: '10%',
                    },
                ];
            IndexView.table.init("#data-table", row_table);
        }
    },
    Metadata: {
        getVal(resource){
            var data_return = JSON.parse(`{ "data": [] }`); 
            var list_metadata = $( `${resource} .metadata-item` );
            var global_price = 0;
            list_metadata.each(function( index ) {
                var father = $(this);
                var data_size       = father.find(".data-size").val();
                var data_prices     = father.find(".data-prices").val();
                var data_discount   = father.find(".data-discount").val();
                var data_quantity  = father.find(".data-quantity").val();  
                if (index == 0) global_price = data_prices;
                data_return.data
                    .push(
                        JSON.parse(`{ "id": ${index+1}, "size": ${data_size}, "prices": ${data_prices}, "discount": ${data_discount}, "quantity": ${data_quantity} }`)
                    );
            });
            return [
                JSON.stringify(data_return),
                global_price
            ];
        },
        setVal(resource, value_input){
            $(`${resource} .metadata-group`).append(`
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-l-5 p-r-5 m-b-10 meta-item">   
                     <div class=" metadata-item">
                        <div class="form-group">
                            <label >Dung lượng *</label>
                            <input type="text" class="form-control data-size number-type" placeholder="ml" value="${value_input.size}">
                        </div> 
                        <div class="form-group">
                            <label >Đơn giá *</label>
                            <input type="text" class="form-control data-prices number-type" placeholder="" value="${value_input.prices}">
                        </div> 
                        <div class="form-group">
                            <label >Giảm giá *</label>
                            <input type="text" class="form-control data-discount number-type" placeholder="%" value="${value_input.discount}">
                        </div>
                        <div class="form-group">
                        <label >Số lượng * </label>
                        <input type="text" class="form-control data-quantity  number-type" placeholder="%" value="${value_input.quantity}">
                        </div>  
                        <div class="form-group">
                            <button class="btn btn-danger metadata-remove" atr="Delete">Xóa thuộc tính</button>
                        </div>  
                    </div>  
                </div>   
            `);
        },
        Create(resource){
            $(`${resource} .metadata-group`).append(`
                <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 p-l-5 p-r-5 m-b-10 meta-item">   
                     <div class=" metadata-item">
                        <div class="form-group">
                            <label >Dung lượng *</label>
                            <input type="text" class="form-control data-size number-type" placeholder="ml">
                        </div> 
                        <div class="form-group">
                            <label >Đơn giá *</label>
                            <input type="text" class="form-control data-prices number-type" placeholder="">
                        </div> 
                        <div class="form-group">
                            <label >Giảm giá *</label>
                            <input type="text" class="form-control data-discount number-type" placeholder="%">
                        </div>
                        <div class="form-group">
                            <label >Số lượng * (Mặc định 0)</label>
                            <input type="text" class="form-control data-quantity number-type" placeholder="">
                        </div>  
                        <div class="form-group">
                            <button class="btn btn-danger metadata-remove" atr="Delete">Xóa thuộc tính</button>
                        </div>  
                    </div>  
                </div>   
            `);
        },
        onCreate(resource, name){
            $(document).on('click', `${resource} .metadata-create`, function() {
                if($(this).attr('atr').trim() == name) {
                    View.Metadata.Create(resource);
                }
            });
        },
        onRemove(resource, name){
            $(document).on('click', `${resource} .metadata-remove`, function() {
                if($(this).attr('atr').trim() == name) {
                    $(this).parent().parent().parent().remove();
                }
            });
        },
        clear(resource){
            $(`${resource} .metadata-group`).find('.meta-item').remove()
        }
    },

    SideModal: {
        Create: {
            resource: '#side-modal-create',
            setDefaul(){ this.init();  },
            setVal(data){ 
                var resource = this.resource;
                View.Category.map(v => {
                    $(resource)
                        .find(".category-list")
                        .append(`<option value="${v.id}">${v.name}</option>`)
                })
                
            },
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;
 
                var data_name           = $(`${resource}`).find('.data-name').val();   
                var data_category       = $(`${resource}`).find('.data-category').val(); 
                var data_description    = $(`${resource}`).find('.data-description').val();
                var data_detail         = $(`${resource}`).find('.data-detail').val();
                var data_images         = $(`${resource}`).find(".image-list")[0].files;
                var data_sex            = $(`${resource}`).find('input[name=data-sex]:checked').val(); 
                var data_meta           = View.Metadata.getVal(resource);

                //Chi tiết đặc tính
                var data_nongdo           = $(`${resource}`).find('.data-nongdo').val();
                var data_style           = $(`${resource}`).find('.data-style').val();
                var data_perfume           = $(`${resource}`).find('.data-perfume').val();
                var data_agegroup          = $(`${resource}`).find('.data-agegroup').val();
                var data_ingredient          = $(`${resource}`).find('.data-ingredient').val();
                var data_property =  data_nongdo + "||" + data_style + "||" + data_perfume + "||" + data_agegroup + "||" + data_ingredient;
 
                if (data_name == '') { required_data.push('Hãy nhập tên.'); onPushData = false }
                if (data_sex == null) { required_data.push('Hãy chọn giới tính.'); onPushData = false }
                if (data_description == '') { required_data.push('Nhập mô tả ngắn.'); onPushData = false } 
                if (data_detail == '') { required_data.push('Nhập mô tả đầy đủ.'); onPushData = false } 
                if (data_images.length <= 0) { required_data.push('Hãy chọn ảnh.'); onPushData = false } 

                if (onPushData) { 
                    fd.append('data_name', data_name);   
                    fd.append('data_category', data_category);  
                    fd.append('data_sex', data_sex);  
                    fd.append('data_description', data_description); 
                    fd.append('data_property', data_property);
                    fd.append('data_detail', data_detail); 
                    fd.append('data_meta', data_meta[0]); 
                    fd.append('data_price', data_meta[1]); 
                    fd.append('image_list_length', data_images.length);
                    for (var i = 0; i < data_images.length; i++) {
                        fd.append('image_list_item_'+i, data_images[i]);
                    }
                    return fd;
                }else{
                    $(`${resource}`).find('.error-log .js-errors').remove();
                    var required_noti = ``;
                    for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                    $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${this.resource} .push-modal`, function() {
                    if($(this).attr('atr').trim() == name) {
                        var data = View.SideModal.Create.getVal();
                        if (data) callback(data);
                    }
                });
            },
            init(){
                var modalTitleHTML  = `Tạo mới`;
                var modalBodyHTML   = Template.Product.Create();
                var modalFooterHTML = ['Đóng', 'Tạo mới'];

                IndexView.SideModal.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML);
                IndexView.summerNote.init(".data-detail", "Mô tả đầy đủ", 400);
            }
        },
        Update: {
            resource: '#side-modal-update',
            setDefaul(){ this.init();  },
            setVal(data){ 
                var resource = this.resource; 
                View.Category.map(v => {
                    $(resource)
                        .find(".category-list")
                        .append(`<option value="${v.id}">${v.name}</option>`)
                })
                $(`${resource} .data-id`).val(data[0].id) 
                $(`${resource}`).find('.data-name').val(data[0].name);  
                $(`${resource} .data-category`).val(data[0].category_id);
                data[0].images == "" ? null : IndexView.multiImage.setVal(data[0].images); 
                $(`input[name=data-sex][value=${data[0].sex}]`).attr('checked', 'checked');
                $(`${resource}`).find('.data-description').val(IndexView.Config.toNoTag(data[0].description));  
                IndexView.summerNote.update(`${resource} .data-detail`, data[0].detail);
                JSON.parse(data[0].metadata).data.map(v => {
                    View.Metadata.setVal(resource, v);
                }) 
                //Xử lý đặc tính sản phẩm
                var data_property =  data[0].property; 
                data_property = data_property.split('||'); 
                $(`${resource}`).find('.data-nongdo').val(data_property[0]);
                $(`${resource}`).find('.data-style').val(data_property[1]);
                $(`${resource}`).find('.data-perfume').val(data_property[2]);
                $(`${resource}`).find('.data-agegroup').val(data_property[3]);
                $(`${resource}`).find('.data-ingredient').val(data_property[4]);

            },
            getVal(){
                var resource = this.resource;
                var fd = new FormData();
                var required_data = [];
                var onPushData = true;

                var data_id      = $(`${resource}`).find('.data-id').val();
 
                var data_name           = $(`${resource}`).find('.data-name').val();   
                var data_category       = $(`${resource}`).find('.data-category').val(); 
                var data_description    = $(`${resource}`).find('.data-description').val();
                var data_detail         = $(`${resource}`).find('.data-detail').val(); 
                var data_sex            = $(`${resource}`).find('input[name=data-sex]:checked').val(); 
                var data_meta           = View.Metadata.getVal(resource);

                //Chi tiết đặc tính
                var data_nongdo           = $(`${resource}`).find('.data-nongdo').val();
                var data_style           = $(`${resource}`).find('.data-style').val();
                var data_perfume           = $(`${resource}`).find('.data-perfume').val();
                var data_agegroup          = $(`${resource}`).find('.data-agegroup').val();
                var data_ingredient          = $(`${resource}`).find('.data-ingredient').val();
                var data_property =  data_nongdo + "||" + data_style + "||" + data_perfume + "||" + data_agegroup + "||" + data_ingredient;

                var data_images         = $(`${resource}`).find(".image-list")[0].files;
                var data_images_preview = [];
                $(`${resource}`).find('.image-preview-item.image-load-data').each(function(index, el) { 
                    data_images_preview.push($(this).attr("data-url"));
                });
 
                if (data_images.length <= 0 && data_images_preview.length == 0) { required_data.push('Hãy chọn ảnh.'); onPushData = false } 
                if (data_name == '') { required_data.push('Hãy nhập tên.'); onPushData = false }
                if (data_sex == null) { required_data.push('Hãy chọn giới tính.'); onPushData = false }
                if (data_description == '') { required_data.push('Nhập mô tả ngắn.'); onPushData = false } 
                if (data_detail == '') { required_data.push('Nhập mô tả đầy đủ.'); onPushData = false }  

                if (onPushData) {
                    fd.append('data_id', data_id);  
                    fd.append('data_name', data_name);   
                    fd.append('data_category', data_category);  
                    fd.append('data_sex', data_sex);  
                    fd.append('data_description', data_description); 
                    fd.append('data_detail', data_detail);
                    fd.append('data_property',data_property);
                    fd.append('data_meta', data_meta[0]); 
                    fd.append('data_price', data_meta[1]); 
                    fd.append('data_images_preview', data_images_preview.toString()); 
                    fd.append('image_list_length', data_images.length);
                    for (var i = 0; i < data_images.length; i++) {
                        fd.append('image_list_item_'+i, data_images[i]);
                    }
                    return fd;
                }else{
                    $(`${resource}`).find('.error-log .js-errors').remove();
                    var required_noti = ``;
                    for (var i = 0; i < required_data.length; i++) { required_noti += `<li class="error">${required_data[i]}</li>`; }
                    $(`${resource}`).find('.error-log').prepend(` <ul class="js-errors">${required_noti}</ul> `)
                    return false;
                }
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${this.resource} .push-modal`, function() { 
                    if($(this).attr('atr').trim() == name) {
                        var data = View.SideModal.Update.getVal();
                        if (data) callback(data);
                    }
                });
            },
            init(){
                var modalTitleHTML  = `Cập nhật`;
                var modalBodyHTML   = Template.Product.Update();
                var modalFooterHTML = ['Đóng', 'Cập nhật'];

                IndexView.SideModal.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML);
                IndexView.summerNote.init(".data-detail", "Mô tả đầy đủ", 400);
            }
        },
        Delete: {
            resource: '#side-modal-delete',
            setDefaul(){ this.init(); },
            textDefaul(){ },
            setVal(data){ },
            getVal(){
            },
            onPush(name, callback){
                var resource = this.resource;
                $(document).on('click', `${this.resource} .push-modal`, function() {
                    if($(this).attr('atr').trim() == name) {
                        callback($(this).attr('data-id'));
                    }
                });
            },
            init() {
                var modalTitleHTML = `Xóa`;
                var modalBodyHTML  = Template.Product.Delete();
                var modalFooterHTML = ['Đóng', 'Xóa'];
                IndexView.SideModal.launch(this.resource, modalTitleHTML, modalBodyHTML, modalFooterHTML);
            }
        },
        init(){
            View.SideModal.Create.init(); 
            View.SideModal.Update.init(); 
            View.SideModal.Delete.init(); 
        }
    },
    init(){
        View.table.init();
        View.SideModal.init();
        View.Metadata.onCreate("#side-modal-create", "Create");
        View.Metadata.onRemove("#side-modal-create", "Delete");
        View.Metadata.onCreate("#side-modal-update", "Create");
        View.Metadata.onRemove("#side-modal-update", "Delete");       
    }
};
(() => {
    View.init();


    IndexView.SideModal.onControl("Create", () => {
        var resource = View.SideModal.Create.resource;
        View.SideModal.Create.setDefaul();
        IndexView.SideModal.onShow(resource);
        View.SideModal.Create.setVal();
        View.SideModal.Create.onPush("Push", (fd) => {
            IndexView.helper.showToastProcessing('Processing', 'Đang tạo!');
            IndexView.SideModal.onHide(resource)
            Api.Product.Store(fd)
                .done(res => {
                    IndexView.helper.showToastSuccess('Success', 'Tạo thành công !');
                    getData();
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
            View.SideModal.Create.setDefaul();
        })
    }) 
    IndexView.SideModal.onControl("View", (id) => {
        var resource = View.SideModal.Update.resource;
        View.Metadata.clear(View.SideModal.Update.resource) 
        Api.Product.getOne(id)
            .done(res => { 
                View.SideModal.Update.setVal(res.data); 
                IndexView.SideModal.onShow(resource);
                View.SideModal.Update.onPush("Push", (fd) => {
                    IndexView.helper.showToastProcessing('Processing', 'Đang cập nhật!');
                    Api.Product.Update(fd)
                        .done(res => {
                            IndexView.helper.showToastSuccess('Success', 'Cập nhật thành công !');
                            getData();
                        })
                        .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                        .always(() => { });
                        IndexView.SideModal.onHide(resource)
                        View.SideModal.Update.setDefaul();
                })
            })
            .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi xảy ra'); })
            .always(() => { }); 
    }) 
    IndexView.SideModal.onControl("Delete", (id) => {
        var resource = View.SideModal.Delete.resource;
        IndexView.SideModal.onShow(resource);
        View.SideModal.Delete.onPush("Push", () => {
            IndexView.helper.showToastProcessing('Processing', 'Đang xóa!');
            Api.Product.Delete(id)
                .done(res => {
                    IndexView.helper.showToastSuccess('Success', 'Xóa thành công !');
                    getData();
                })
                .fail(err => { IndexView.helper.showToastError('Error', 'Có lỗi sảy ra'); })
                .always(() => { });
                IndexView.SideModal.onHide(resource)
                IndexView.SideModal.Delete.setDefaul();
        })
    })
    IndexView.table.onSwitch(debounce((item) => {
        Api.Product.Trending(item.attr('data-id'))
            .done(res => {
                getData()
                item.find('.slider').toggleClass('active');
            })
            .fail(err => {
                console.log(err);
            })
            .always(() => {
            });
    }, 500));


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
    function debounce(f, timeout) {
        let isLock = false;
        let timeoutID = null;
        return function(item) {
            if(!isLock) {
                f(item);
                isLock = true;
            }
            clearTimeout(timeoutID);
            timeoutID = setTimeout(function() {
                isLock = false;
            }, timeout);
        }
    }
    init();
})();
