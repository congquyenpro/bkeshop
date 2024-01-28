<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Transport;
use App\Repositories\Manager\OrderRepository;
use Illuminate\Support\Facades\DB;

class TransportController extends Controller
{   
    protected $transport;
    public function __construct(){
        $this->transport = new Transport();
    }
    public function transportIndex(Request $request){
        $name = "Quyen";

        $token = Session('_token__') ? Session('_token__') : $request->cookie('_token__');
        list($user_id, $token) = explode('$', $token, 2);
        $sqlAuth = DB::table('admin')->where('id', $user_id)->first();

        $rule = isset($sqlAuth->type) ? $sqlAuth->type : 1;

        return view('admin.manager.transport.index',[
            'name' => $name,
            'rule' => $rule
        ]);
    }

    public function transportConfig(Request $request){
        //Xử lý tách size theo ||
        $generalConfig = $this->transport->getConfigGeneral();
        $size_order = explode("||", $generalConfig[0]->size_order);
        $address_warehouse = explode("||", $generalConfig[0]->address_warehouse);

        $token = Session('_token__') ? Session('_token__') : $request->cookie('_token__');
        list($user_id, $token) = explode('$', $token, 2);
        $sqlAuth = DB::table('admin')->where('id', $user_id)->first();

        $rule = isset($sqlAuth->type) ? $sqlAuth->type : 1;

        return view('admin.manager.transport.config',[
            'size_order' => $size_order,
            'address_warehouse' => $address_warehouse,
            'generalConfig' => $generalConfig[0],
            'rule' => $rule
        ]);
    }

    public function updateGeneralConfig(Request $request){
        dd($request->input());
    }
    public function updateWarehouseConfig(Request $request){
        dd($request->input());
    }

    //get-all transport
    public function getAll(Request $request){
        $orderID = $request->orderId;
        $list = $this->transport->getAll($orderID);
        return response()->json($list[0]);
/*         {
            "id": 1,
            "vandonID": "LF7GNK",
            "orderID": 4,
            "customerID": 1,
            "partner": "Giao hàng nhanh (GHN)",
            "COD": 200000,
            "fee": 44000,
            "status_order": 2,
            "status": 0,
            "employeeID": 1,
            "order_log": ""
        } */
    }

    //Đối soát
    public function doiSoat(Request $request){
        $token = Session('_token__') ? Session('_token__') : $request->cookie('_token__');
        list($user_id, $token) = explode('$', $token, 2);
        $sqlAuth = DB::table('admin')->where('id', $user_id)->first();

        $rule = isset($sqlAuth->type) ? $sqlAuth->type : 1;

        return view("admin.manager.transport.doi-soat",compact('rule'));
    }

    /* 
    Chờ xử lý: status=2, status_order=2 (Đang giao hàng)
    Chưa đối soát: status=0, status_order=1 (Đã giao hàng) || status_order=0 (Hoàn hàng)
    Đã đối soát: status=1, status_order=1 (Đã giao hàng) || status_order=0 (Hoàn hàng)
    */
    public function getDoiSoat($statusID){
        $list = $this->transport->getDoiSoat($statusID);
        return response()->json($list);
    }
    public function getTicketDetail($id){
        $list = $this->transport->getTicketDetail($id);
        return response()->json($list);
    }
    public function confirmDoiSoat($id){
        $data = $this->transport->confirmDoiSoat(($id));
        return response()->json($data);
    }
}
