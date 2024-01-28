<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::middleware(['GlobalUser:global'])->group(function () {
    Route::get('/', 'Customer\DisplayController@index')->name('customer.view.index');

    //Webhook callback trạng thái đơn hàng
    Route::post('/update-order-status', 'Admin\WebhookController@update')->name('admin.webhook');

    //Test product detail
    Route::get('/ProductDetail', 'Customer\TestController@testProductDetail')->name('customer.test.productdetail');

    //get order status cho khach không login
    Route::get('my-order', 'Admin\WebhookController@getOrderCustomerNotLogin')->name('user.get.order.log');
    Route::get('my-order-2', 'Customer\DisplayController@my_order')->name('customer.view.my_order');


    Route::get('about', 'Customer\DisplayController@about')->name('customer.view.about'); 
    Route::get('category', 'Customer\DisplayController@category')->name('customer.view.category'); 
    Route::get('product/{id}-{slug}', 'Customer\DisplayController@product')->name('customer.view.product'); 
    Route::get('contact', 'Customer\DisplayController@contact')->name('customer.view.contact'); 
    Route::get('cart', 'Customer\DisplayController@cart')->name('customer.view.cart'); 
    Route::get('checkout', 'Customer\DisplayController@checkout')->name('customer.view.checkout'); 
    Route::get('iphone', 'Customer\DisplayController@iphone')->name('customer.view.iphone'); 

    Route::get('rule-agreement', 'Customer\DisplayController@rule_agreement')->name('customer.view.rule_agreement'); 
    Route::get('rule-buy', 'Customer\DisplayController@rule_buy')->name('customer.view.rule_buy'); 
    Route::get('rule-order', 'Customer\DisplayController@rule_order')->name('customer.view.rule_order'); 
    Route::get('rule-pay', 'Customer\DisplayController@rule_pay')->name('customer.view.rule_pay'); 
    Route::get('rule-back', 'Customer\DisplayController@rule_back')->name('customer.view.rule_back'); 
    Route::get('rule-product', 'Customer\DisplayController@rule_product')->name('customer.view.rule_product'); 
    Route::get('rule-ship', 'Customer\DisplayController@rule_ship')->name('customer.view.rule_ship'); 
    Route::get('rule-privacy', 'Customer\DisplayController@rule_privacy')->name('customer.view.rule_privacy'); 
    Route::get('rule-recruit', 'Customer\DisplayController@rule_recruit')->name('customer.view.rule_recruit'); 
     

    // Payment
    Route::post('payment', 'PaymentController@create_pay')->name('payment.create_pay');
    Route::get('return-vnpay', 'PaymentController@return_pay')->name('payment.return_vnpay');
    Route::get('payment-check', 'PaymentController@payment_check')->name('payment.check');
});

Route::middleware(['AuthCustomer:login'])->group(function () {
    Route::get('login', 'Customer\DisplayController@login')->name('customer.view.login'); 
    Route::get('register', 'Customer\DisplayController@register')->name('customer.view.register'); 
    Route::get('register-successful', 'Customer\DisplayController@register_successful')->name('customer.view.register.done'); 
});

Route::middleware(['AuthCustomer:logined'])->group(function () {
    Route::post('logout', 'Customer\AuthController@logout')->name('customer.logout');
    Route::get('profile', 'Customer\DisplayController@profile')->name('admin.profile.index'); 
});

Route::get('checkout-login', 'Customer\DisplayController@checkout_login')->name('customer.checkout_login');
Route::get('confirm', 'Customer\AuthController@confirm')->name('customer.confirm');
Route::get('confirm-invite', 'Customer\CollabController@confirm')->name('customer.invite.confirm');


Route::prefix('customer')->group(function () {
    Route::prefix('apip')->group(function () {
        Route::prefix('auth')->group(function () {
            Route::post('register', 'Customer\AuthController@register')->name('customer.auth.register');
            Route::post('login', 'Customer\AuthController@login')->name('customer.auth.login');
            Route::post('forgot', 'Customer\AuthController@forgot')->name('customer.auth.forgot');
            Route::post('reset', 'Customer\AuthController@reset')->name('customer.auth.reset');
            Route::post('code', 'Customer\AuthController@code')->name('customer.auth.code');
            Route::post('change', 'Customer\AuthController@change')->name('customer.auth.change');
            Route::post('update', 'Customer\AuthController@update')->name('customer.auth.update');
            Route::get('get-profile', 'Customer\AuthController@get_profile')->name('customer.auth.profile');
        }); 


        Route::prefix('category')->group(function () {
            Route::get('get', 'Customer\CategoryController@get')->name('customer.category.get');
        }); 
        Route::prefix('product')->group(function () {
            Route::get('get-all', 'Customer\ProductController@get_all')->name('customer.product.get.all');
            Route::get('get-trending', 'Customer\ProductController@get_trending')->name('customer.product.get.trending');
            Route::get('get-new-arrivals', 'Customer\ProductController@get_new_arrivals')->name('customer.product.get.new_arrivals');
            Route::get('get-top-view', 'Customer\ProductController@get_top_view')->name('customer.product.get.top_view');


            Route::get('get-discount', 'Customer\ProductController@get_discount')->name('customer.product.get.discount');
            Route::get('get-item-category/{id}', 'Customer\ProductController@get_item_category')->name('customer.product.get.item_category');

            Route::post('get-search', 'Customer\ProductController@get_search')->name('customer.product.get.search');
            Route::get('get-one/{id}', 'Customer\ProductController@get_one')->name('customer.product.get.one');
            Route::get('get-one-cart/{id}', 'Customer\ProductController@get_one_cart')->name('customer.product.get.cart');
            Route::get('get-recently/{item}', 'Customer\ProductController@get_recently')->name('customer.product.get.recently');
            Route::get('get-related/{id}', 'Customer\ProductController@get_related')->name('customer.product.get.related');

            //Xử lí lọc nâng cao
            Route::get('get-all-property', 'Customer\ProductController@get_all_property')->name('customer.product.get.allproperty');
            Route::post('advance-filter', 'Customer\ProductController@advance_filter')->name('customer.product.get.advance_filter');


        });
        Route::prefix('cart')->group(function () {
            Route::get('get-cart', 'Customer\CartController@get')->name('customer.cart.get');
            Route::post('update', 'Customer\CartController@update')->name('customer.cart.update');
        }); 
        Route::prefix('order')->group(function () {
            Route::post('checkout', 'Customer\OrderController@checkout')->name('customer.order.checkout');
            //Hiển thị đơn hàng cus
            Route::get('get', 'Customer\OrderController@get')->name('customer.order.get');
        });  
    });
});



Route::middleware(['AuthAdmin:auth'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::get('/login', 'Admin\DisplayController@login')->name('admin.login');
        Route::post('/login', 'Admin\AuthController@login')->name('admin.login');
    });
});

Route::middleware(['AuthAdmin:admin'])->group(function () {
    Route::prefix('admin')->group(function () {
        Route::post('logout', 'Admin\AuthController@logout')->name('admin.logout');
        
        Route::get('/', 'Admin\DisplayController@statistic')->name('admin.statistic.index');

        Route::prefix('category')->group(function () {
            Route::get('/', 'Admin\CategoryController@index')->name('admin.category.index');
        });
        Route::prefix('product')->group(function () {
            Route::get('/', 'Admin\ProductController@index')->name('admin.product.index');
            Route::get('/update-price', 'Admin\ProductController@update_price')->name('admin.product.update_price');
        });


        Route::prefix('watermark')->group(function () {
            Route::get('/', 'Admin\DisplayController@watermark')->name('admin.watermark.index');
        });
        Route::prefix('warehouse')->group(function () {
            Route::get('/', 'Admin\WarehouseController@index')->name('admin.warehouse.index');
        });
        Route::prefix('transport')->group(function () {
            Route::get('/', 'Admin\TransportController@transportIndex')->name('admin.transport.index');
            Route::get('/config', 'Admin\TransportController@transportConfig')->name('admin.transport.config');
            Route::get('/doi-soat', 'Admin\TransportController@doiSoat')->name('admin.transport.doi-soat');

            //get-all
            Route::post('/get-all', 'Admin\TransportController@getAll')->name('admin.transport.get-all');

            //api đối soát
            Route::get('get-doi-soat/{id}', 'Admin\TransportController@getDoiSoat')->name('admin.transport.get-doi-soat');
            Route::get('get-ticket-detail/{id}', 'Admin\TransportController@getTicketDetail')->name('admin.transport.get-ticket-detail');
            Route::get('confirm-doi-soat/{id}', 'Admin\TransportController@confirmDoiSoat')->name('admin.transport.confirm-doi-soat');

            //Cấu hình chung
            Route::post('/update-general-config', 'Admin\TransportController@updateGeneralConfig')->name('admin.transport.update-general-config');
            Route::post('/update-warehouse-address', 'Admin\TransportController@updateWarehouseConfig')->name('admin.transport.update-warehouse-address');
        });
        Route::prefix('order')->group(function () {
            Route::get('/', 'Admin\OrderController@index')->name('admin.order.index');
        });
        Route::prefix('manager')->group(function () {
            Route::get('/', 'Admin\ManagerController@index')->name('admin.manager.index');
        });

        //Quản lý nhân viên
        Route::prefix('staff')->group(function () {
            Route::get('/', 'Admin\StaffController@index')->name('admin.manager.staff');
            Route::post('/add-staff', 'Admin\StaffController@addStaff')->name('admin.manager.add-staff');
            Route::post('/update-staff/{id}', 'Admin\StaffController@updateStaff')->name('admin.manager.update-staff');
            Route::post('/delete-staff/{id}', 'Admin\StaffController@deleteStaff')->name('admin.manager.delete-staff');
            Route::get('/profile', 'Admin\StaffController@profileStaff')->name('admin.staff.profile');

            //api
            Route::get('/api/getdetail/{id}', 'Admin\StaffController@getInforDetail')->name('admin.staff.getdetail');

        });
        //Quản lý khách hàng
        Route::prefix('customer')->group(function () {
            Route::get('/', 'Admin\CustomerController@index')->name('admin.manager.customer');
            Route::post('/delete-customer/{id}', 'Admin\CustomerController@deleteCustomer')->name('admin.manager.delete-customer');

            //api
            Route::get('/api/getdetail/{id}', 'Admin\CustomerController@getInforDetail')->name('admin.customer.getdetail');
            // Route::get('/api/get-cus-one/{id}', 'Admin\CustomerController@getInforDetail')->name('admin.customer.getdetail');

        });

        //Báo cáo
        Route::prefix('report')->group(function () {
            Route::get('/general', 'Admin\ReportController@reportGeneral')->name('admin.manager.report-general');
            Route::get('/sales', 'Admin\ReportController@reportSales')->name('admin.manager.report-sales');
            Route::get('/financial', 'Admin\ReportController@reportFinancial')->name('admin.manager.report-financial');
            Route::get('/warehouse', 'Admin\ReportController@reportWarehouse')->name('admin.manager.report-warehouse');

            Route::get('/get-fee', 'Admin\StatisticController@getFee')->name('admin.manager.get-fee');
            Route::get('/get-general', 'Admin\StatisticController@getGeneral')->name('admin.manager.get-general');
        });


    });

    Route::prefix('apip')->group(function () {
        Route::post('post-image', 'Admin\DisplayController@image')->name('admin.image.post');

        Route::prefix('category')->group(function () {
            Route::get('get', 'Admin\CategoryController@get')->name('admin.category.get');
            Route::get('/get-one/{id}', 'Admin\CategoryController@get_one')->name('admin.category.get_one');
            Route::post('/store', 'Admin\CategoryController@store')->name('admin.category.store');
            Route::post('/update', 'Admin\CategoryController@update')->name('admin.category.update');
            Route::get('/delete/{id}', 'Admin\CategoryController@delete')->name('admin.category.delete');
        });



        Route::prefix('supplier')->group(function () {
            Route::get('get', 'Admin\SupplierController@get')->name('admin.supplier.get');
            Route::get('/get-one/{id}', 'Admin\SupplierController@get_one')->name('admin.supplier.get_one');
            Route::post('store', 'Admin\SupplierController@store')->name('admin.supplier.store');
            Route::post('/update', 'Admin\SupplierController@update')->name('admin.supplier.update');
            Route::get('/delete/{id}', 'Admin\SupplierController@delete')->name('admin.supplier.delete');
        });
        Route::prefix('product')->group(function () {
            Route::get('get', 'Admin\ProductController@get')->name('admin.product.get');
            Route::get('/get-one/{id}', 'Admin\ProductController@get_one')->name('admin.product.get_one');
            Route::get('/get-one-for-warehouse/{id}', 'Admin\ProductController@get_one_for_warehouse')->name('admin.product.get_one_for_warehouse');
            Route::post('store', 'Admin\ProductController@store')->name('admin.product.store');
            Route::put('/update-trending', 'Admin\ProductController@update_trending')->name('admin.product.trending.update');
            Route::post('/update', 'Admin\ProductController@update')->name('admin.product.update');
            Route::get('/delete/{id}', 'Admin\ProductController@delete')->name('admin.product.delete');
        });
        Route::prefix('order')->group(function () {
            Route::get('get', 'Admin\OrderController@get')->name('admin.order.get');
            Route::get('get-one/', 'Admin\OrderController@get_one')->name('admin.order.get_one');
            Route::post('/update', 'Admin\OrderController@update')->name('admin.order.update');

            //Get order status
            Route::get('get-order-status/{id}', 'Admin\WebhookController@getOrderStatusAPI')->name('admin.order.get_order_status_api');
            
            //Thêm order vào transport
            Route::post('insertOrder', 'Admin\WebhookController@insertOrder')->name('admin.order.insert_order');
            
            //Cập nhật số lượng theo từng loại size sản phẩm
            Route::post('get-size-number', 'Admin\ProductController@get_size_number')->name('admin.product.get-size-number');
            Route::post('update-size-number', 'Admin\ProductController@update_size_number')->name('admin.product.update-size-number');
        });

        Route::prefix('warehouse')->group(function () {
            Route::get('get-item', 'Admin\WarehouseController@get_item')->name('admin.warehouse.item.get');
            Route::get('get-history', 'Admin\WarehouseController@get_history')->name('admin.warehouse.history.get');
            Route::get('get-order-fullfil', 'Admin\WarehouseController@get_order_fullfil')->name('admin.warehouse.item.get');
            Route::get('get-order-export', 'Admin\WarehouseController@get_order_export')->name('admin.warehouse.item.get');
            Route::get('get-order-shipping', 'Admin\WarehouseController@get_order_shipping')->name('admin.warehouse.item.get');

            Route::post('store', 'Admin\WarehouseController@store')->name('admin.warehouse.store');
            Route::get('/get-ware-one/{id}', 'Admin\WarehouseController@get_ware_one')->name('admin.warehouse.get_ware_one');

            Route::get('/get-one/{id}', 'Admin\ProductController@get_one')->name('admin.warehouse.get_one');
            Route::post('/update', 'Admin\ProductController@update')->name('admin.warehouse.update');
        });

        Route::prefix('statistic')->group(function () {
            Route::get('get-total', 'Admin\OrderController@get_total')->name('admin.order.get_total');
            Route::get('get-best-sale', 'Admin\OrderController@get_best_sale')->name('admin.order.get_best_sale');
            Route::get('get-customer', 'Admin\OrderController@get_customer')->name('admin.order.get_customer');

            Route::get('get-financial', 'Admin\StatisticController@get_financial')->name('admin.static.get_financial');
        });

        Route::prefix('manager')->group(function () {
            Route::get('get', 'Admin\ManagerController@get')->name('admin.manager.get');
            Route::get('/get-one/{id}', 'Admin\ManagerController@get_one')->name('admin.manager.get_one');
            Route::post('store', 'Admin\ManagerController@store')->name('admin.manager.store');
            Route::post('/update', 'Admin\ManagerController@update')->name('admin.manager.update');
            Route::get('/delete/{id}', 'Admin\ManagerController@delete')->name('admin.manager.delete');
        });
        Route::prefix('customer')->group(function () {
            Route::get('/get-cus-one/{id}', 'Admin\CustomerController@get_cus_one')->name('admin.customer.get_cus_one');
            Route::get('/get-cus-one-order/{id}', 'Admin\CustomerController@get_cus_one_order')->name('admin.customer.get_cus_one_order');
        });
    });
});