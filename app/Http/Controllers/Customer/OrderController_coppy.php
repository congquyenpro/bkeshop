<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;


use App\Repositories\CustomerRepository;
use App\Models\CustomerAuth;

use App\Repositories\Manager\OrderRepository;
use App\Models\Order;
use App\Models\OrderDetail; 

use App\Repositories\Manager\ProductRepository;
use App\Models\Product;

use Carbon\Carbon;
use Session;
use Hash;
use DB;
use Symfony\Component\Console\Logger\ConsoleLogger;
use Illuminate\Support\Facades\Mail;

class OrderController extends Controller
{
    protected $product;
    protected $customer;
    protected $order;
    protected $order_detail;


    public function __construct(Product $product, CustomerAuth $customer, Order $order, OrderDetail $order_detail){
        $this->customer         = new CustomerRepository($customer);
        $this->order            = new OrderRepository($order);
        $this->order_detail     = new OrderRepository($order_detail); 
        $this->product          = new ProductRepository($product);
    }

    // Lấy ra danh sách đơn hàng
    public function get(Request $request){
        $is_user = static::check_token($request); 
        $route_redirect = "/";
        if ($is_user) { 
            $tab = $request->tab;
            list($user_id, $token) = static::unpack_token($request);
            $data   = [];
            $order = $this->order->get_all_cus($tab, $user_id);           
            foreach ($order as $key => $value) {
            $order_detail = $this->order->get_detail($value->id);
                $order_group = [
                    "order"         => $value,
                    "order_detail"  => $order_detail,
                ];
                array_push($data, $order_group);   
            }
            return $this->order->send_response("Danh sách đơn hàng", $data, 200);
        }else{
            return $this->order->send_response("Phiên đăng nhập hết hạn", $route_redirect, 404); 
        } 
    }
    
    // Đặt hàng
    public function checkout(Request $request){ 
        $is_user = static::check_token($request); 
        $metadata = json_decode($request->metadata);
        
        //size
        $size_metadata = json_decode($request->size_metadata);

        $customer_id         = $request->data_id ? preg_replace('/(<([^>]+)>)/', '', $request->data_id) : "";
        $name       = preg_replace('/(<([^>]+)>)/', '', $request->data_name);
        $email      = preg_replace('/(<([^>]+)>)/', '', $request->data_email);
        $address    = preg_replace('/(<([^>]+)>)/', '', $request->data_address);
        $phone      = preg_replace('/(<([^>]+)>)/', '', $request->data_phone);
        $zipcode      = preg_replace('/(<([^>]+)>)/', '', $request->data_zipcode);
        $description      = preg_replace('/(<([^>]+)>)/', '', $request->data_description);
        $data_payment   = $request->data_payment;


        $sub_total  = 0;
        $discount   = 0;
        $total      = 0; 
/*         foreach ($metadata->cart as $key => $value) { 
            $sub_total  += $value->meta->data[0]->prices;
            $discount   += $sub_total / 100 * $value->meta->data[0]->discount;
            $total      += $value->meta->data[0]->prices - ( $value->meta->data[0]->prices / 100 * $value->meta->data[0]->discount );
        } */

        //Xử lý theo size
        foreach ($metadata->cart as $key => $value) {
            $size_index = 1;
            foreach ($size_metadata->cart as $key => $value_size) {
                if ($value->id == $value_size->id) {
                    $size_index = $value_size->meta;
                }
            }
            $num   = $value->qty;

            $sub_total  += $value->meta->data[$size_index-1]->prices;
            $discount   += $sub_total / 100 * $value->meta->data[$size_index-1]->discount;

            //$total += $sub_total - $discount;
            $total      += $value->meta->data[$size_index-1]->prices - ( $value->meta->data[$size_index-1]->prices / 100 * $value->meta->data[$size_index-1]->discount );
            
        }

        $route_redirect = "/profile?tab=Order";
        try {
            DB::beginTransaction();

            $order_id = mt_rand(1, 9999999);

            $data_order = [
                "customer_id"   => $customer_id ? $customer_id : null,
                "order_id"      => $order_id,
                "sub_total"     => $sub_total,
                "discount"      => $discount,
                "total"         => $total,
                "name"          => $name,
                // "email"         => $email,
                "phone"         => $phone,
                "zipcode"       => $zipcode,
                "address"       => $address,
                "description"   => $description,
                "order_value"   => Carbon::now()->toDateTimeString() . "|Đặt hàng thành công",
                "order_status"  => 0,
                /* "payment"       => $data_payment, */
                "payment"       => ($data_payment == 1) ? 1 : $order_id, //Nếu có payment id => Thanh toán online , nếu không thì trực tiếp
            ]; 
            $order_item = $this->order->create($data_order);
/*             foreach ($metadata->cart as $key => $value) {
                $product = $this->product->get_one($value->id);
                $item_order = [
                    "order_id"      => $order_item->id,
                    "product_id"    => $value->id,
                    // "size"          => $value->meta->data[0]->size,
                    "quantity"      => $value->qty,
                    "prices"        => $value->meta->data[0]->prices,
                    "discount"      => $value->meta->data[0]->discount,
                    "total_price"   => ($value->meta->data[0]->prices - ( $value->meta->data[0]->prices / 100 * $value->meta->data[0]->discount ) ) * $value->qty,
                ];
                $this->order_detail->create($item_order);
            } */
            foreach ($metadata->cart as $key => $value) {
                $size_index = 1;
                foreach ($size_metadata->cart as $key => $value_size) {
                    if ($value->id == $value_size->id) {
                        $size_index = $value_size->meta;
                    }
                }
                $product = $this->product->get_one($value->id);
                $item_order = [
                    "order_id"      => $order_item->id,
                    "product_id"    => $value->id,
                    // "size"          => $value->meta->data[0]->size,
                    "quantity"      => $value->qty,
                    "prices"        => $value->meta->data[$size_index-1]->prices,
                    "discount"      => $value->meta->data[$size_index-1]->discount,
                    "total_price"   => ($value->meta->data[$size_index-1]->prices - ( $value->meta->data[$size_index-1]->prices / 100 * $value->meta->data[$size_index-1]->discount ) ) * $value->qty,
                ];
                $this->order_detail->create($item_order);

                //Trừ số lượng trong sản phẩm và trong kho
                $this->update_size_number($value->id,$size_index);
            }

            $data_customer = null;
            if ($customer_id) {
                $data_customer = $this->customer->find_with_id($customer_id);
            } 
            $data = [
                'email'             => $email,
                'date_created'      => Carbon::now()->toDateTimeString(),
                'total'             => $total,
                'order_id'         => "BKShop_".$order_item->id."_".$order_id,
                'description'      => $description,
                'customer_login'   => $customer_id ? $customer_id : null,
                'metadata'          => $metadata,
                'customer_data'    => $data_customer,
                'order_data_name'    => $name,
                'order_data_phone'    => $phone,
                'order_data_email'    => $email,
                'order_data_zipcode'    => $zipcode,
                'order_data_address'    => $address,
                'order_data_description'    => $description,
            ];

/*             $data_new = "hihi";
            Mail::send('customer/confirm-order', array('data'=> $data_new), function($message) use ($email) {
                 $message->from('bkeshop@gmail.com', 'BKShop - Order email');
                 $message->to($email)->subject('Cảm ơn bạn đã đặt hàng!');
            }); */

/*             Mail::raw("123", function($message) use ($email) {
                $message->from('bkeshop@gmail.com', 'Thông tin đơn hàng');
                $message->to($email)->subject('Elite');
            }); */

            DB::commit();

            $data_return = [
                "customer_id"   => $customer_id ? $customer_id : null,
                "order_id"      => $order_id,
                "sub_total"     => $sub_total,
                "discount"      => $discount,
                "total"         => $total,
                "order_status"  => 0,
                /* "payment"       => $data_payment, */
                "payment"       => $data_payment, //Nếu có payment id => Thanh toán online , nếu không thì trực tiếp
            ]; 
            
            
            if ($customer_id) { 
                return $this->order->send_response("Cảm ơn bạn đã đặt hàng!", $data_return, 201); 
            }
            return $this->order->send_response("Cảm ơn bạn đã đặt hàng, chúng tôi sẽ gửi thông tin chi tiết qua Email và Số điện thoại !!", $data_return, 201); 
            //return $this->order->send_response("Cảm ơn bạn đã đặt hàng !!", $route_redirect, 201); 
        } catch (\Exception $exception) {
            dd( $exception);
            DB::rollBack(); 
            return $this->order->send_response("Error", $route_redirect, 404);  
        } 
    }

    //Cập nhật số lượng sản phẩm theo dung tích
    //Lấy dữ liệu cũ => update
    public function update_size_number($productId,$sizeId){
        $data = $this->product->getNumBySize($productId,$sizeId);
        $list_size = json_decode($data[0]->metadata)->data;

        //id của size -1 = index trong mảng
        $size1 = $list_size[0]->quantity;
        //$new_num = 1000;

        //Get old number
        $size_index = $sizeId - 1;
        $old_numer =  $list_size[$size_index]->quantity;
        $new_number = $old_numer - 5;

        $update_num = $this->product->updateNumBySize($productId,$sizeId,$new_number);
        return $this->product->send_response(200, $update_num, null);
    }

    // Kiểm tra token hợp lệ
    public function check_token(Request $request){
        $token = $request->cookie('_token_');
        if ($token) {
            list($user_id, $token) = explode('$', $token, 2); 
            $user = $this->customer->get_secret($user_id);
            if ($user) {
                return Hash::check($user_id . '$' . $user[0]->secret_key, $token);
            }else{
                return false;
            }
        }else{
            return false;
        }
        
    }

    // Tách token
    public function unpack_token(Request $request){
        $token = $request->cookie('_token_');
        return explode('$', $token, 2); 
    }
}
