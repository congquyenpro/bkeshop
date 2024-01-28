<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\OrderRepository;
use App\Models\Order; 
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class TestController extends Controller
{
    protected $order;

    public function __construct(){
        /* $this->order             = new OrderRepository($order);  */
    }
    public function index(){
        /* print_r($this->get()); */
/*         return view("admin.test.test",[
            'data' => $this->get2()
        ]); */
    }
    public function get2(){
        $data = $this->order->get_full_order(1);
        /* return $this->order->send_response(201, $data, null); */
        return $data;
    }
    public function get(){
        $data = $this->order->get_full_order(1);
        return $this->order->send_response(201, $data, null);
        return $data;
    }
    public function get_one($id){
        $data = $this->order->get_one($id);
        return $this->order->send_response(200, $data, null);
    }
 
    public function store(Request $request){  
        $data = [ 
            "name"      => $request->data_name,  
            "slug"      => $this->order->to_slug($request->data_name),
        ];
        $this->order->create($data); 
        return $this->order->send_response(201, null, null);
    }
    public function update(Request $request){  
        $data = [
            "name"      => $request->data_name, 
            "slug"      => $this->order->to_slug($request->data_name),
        ];
        $this->order->update($data, $request->data_id);
        return $this->order->send_response(200, null, null);
    }

    public function delete($id){
        $this->order->delete($id); 
        return $this->order->send_response(200, "Delete successful", null);
    }

    public function testProductDetail(Request $request){
        $customer_data = static::generate_logined($request);  
        return view("customer.Test.product-detail", compact("customer_data"));
    }
    public function generate_logined($request){
        $user_login = [
            'id'        => null,
            'email'     => null,
            'name'      => null,
            'phone'     => null,
            'avatar'    => null,
            'address'   => null,
            'is_login'  => false
        ];
        $token = $request->cookie('_token_');
        if ($token) {
            list($user_id, $token) = explode('$', $request->cookie('_token_'), 2);

            $hasAuth    = 0;
            if ($hasAuth != 0) {
                $user_login['id']           = $hasAuth[0]->id;
                $user_login['email']        = $hasAuth[0]->email;
                $user_login['name']         = $hasAuth[0]->name;
                $user_login['avatar']       = $hasAuth[0]->avatar;
                $user_login['phone']        = $hasAuth[0]->phone;
                $user_login['address']      = $hasAuth[0]->address;
                $user_login['zipcode']      = $hasAuth[0]->zipcode;
                $user_login['is_login']     = true;
            }
        }
        return $user_login;
    }

    
}
