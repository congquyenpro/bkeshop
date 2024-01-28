<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;

use App\Repositories\Manager\OrderRepository;
use App\Models\Order;

use Carbon\Carbon;
use Hash;
use DB;

class PaymentController extends Controller
{
    protected $order;

    public function __construct(Order $order)
    {
        $this->order             = new OrderRepository($order);
    }
    public function create_pay(Request $request)
    {
        $prices = $request->data_prices;
        $item_id = $request->data_id;

        session(['url_prev' => '/profile', 'item_id' => $item_id]);

        $vnp_TmnCode = "Q67ZHFMF"; //Mã định danh merchant kết nối (Terminal Id)
        $vnp_HashSecret = "RJUNKGBHEQDXNAZRMJNQNHEZEIBSJBUF"; //Secret key
        $vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
        $vnp_Returnurl = "http://127.0.0.1:8000/return-vnpay";
        $vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
        $apiUrl = "https://sandbox.vnpayment.vn/merchant_webapi/api/transaction";
        //Config input format
        //Expire
        $startTime = date("YmdHis");
        $expire = date('YmdHis', strtotime('+15 minutes', strtotime($startTime)));


        $vnp_TxnRef = rand(1, 10000); //Mã giao dịch thanh toán tham chiếu của merchant
        $vnp_Amount = $prices; // Số tiền thanh toán
        $vnp_Locale = 'vn'; //Ngôn ngữ chuyển hướng thanh toán
        //$vnp_BankCode = $_POST['bankCode']; //Mã phương thức thanh toán

        //$vnp_IpAddr = $_SERVER['REMOTE_ADDR']; //IP Khách hàng thanh toán
        $vnp_IpAddr = $request->ip(); //IP Khách hàng thanh toán

        $inputData = array(
            "vnp_Version" => "2.1.0",
            "vnp_TmnCode" => $vnp_TmnCode,
            "vnp_Amount" => $vnp_Amount * 100,
            "vnp_Command" => "pay",
            "vnp_CreateDate" => date('YmdHis'),
            "vnp_CurrCode" => "VND",
            "vnp_IpAddr" => $vnp_IpAddr,
            "vnp_Locale" => $vnp_Locale,
            "vnp_OrderInfo" => "Thanh toan GD:",
            "vnp_OrderType" => "other",
            "vnp_ReturnUrl" => $vnp_Returnurl,
            "vnp_TxnRef" => $vnp_TxnRef,
            "vnp_ExpireDate" => $expire
        );

        if (isset($vnp_BankCode) && $vnp_BankCode != "") {
            $inputData['vnp_BankCode'] = $vnp_BankCode;
        }

        ksort($inputData);
        $query = "";
        $i = 0;
        $hashdata = "";
        foreach ($inputData as $key => $value) {
            if ($i == 1) {
                $hashdata .= '&' . urlencode($key) . "=" . urlencode($value);
            } else {
                $hashdata .= urlencode($key) . "=" . urlencode($value);
                $i = 1;
            }
            $query .= urlencode($key) . "=" . urlencode($value) . '&';
        }

        $vnp_Url = $vnp_Url . "?" . $query;
        if (isset($vnp_HashSecret)) {
            $vnpSecureHash =   hash_hmac('sha512', $hashdata, $vnp_HashSecret); //  
            $vnp_Url .= 'vnp_SecureHash=' . $vnpSecureHash;
        }
        return $vnp_Url;
    }
    public function return_pay(Request $request)
    {
        //$url = session('url_prev', '/profile');
        $url = '/profile?tab=Order';
        if ($request->vnp_ResponseCode == "00") {
            /* $this->order->update(["status" => 2], session('item_id')); */
            $this->order->update_payment(session('item_id'));
            return redirect($url)->with('success', 'Đã thanh toán phí dịch vụ');
        }
        session()->forget('url_prev');
        return redirect($url)->with('errors', 'Lỗi trong quá trình thanh toán phí dịch vụ');
    }

    public function payment_check(Request $request)
    {
        $customer_data = static::generate_logined($request);
        return view('customer/payment-check', compact("customer_data"));
    }
    // Generate user detail
    public function generate_logined($request)
    {
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
            $sql_getAuth    = 'SELECT   customer.id,
                                            customer.email,
                                            customer_detail.name,
                                            customer_detail.phone,
                                            customer_detail.avatar,
                                            customer_detail.address,
                                            customer_detail.zipcode
                                    FROM customer 
                                    LEFT JOIN customer_detail
                                    ON customer.id = customer_detail.customer_id
                                    WHERE customer.id = "' . $user_id . '"';
            $hasAuth    = DB::select($sql_getAuth);
            if (count($hasAuth) != 0) {
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
