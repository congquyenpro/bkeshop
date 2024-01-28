<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Webhook extends Model
{
    use HasFactory;

    public function addstaff($data){
        $permissions = implode(',', $data['permissions']); // Chuyển mảng thành chuỗi, cách nhau bởi dấu phẩy
        DB::table('admin')->insert([
            'secret_key' => 8888,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'type' => $data['role'],
        ]);
        
    }

    //Doi soat
    public function getDoiSoat($statusID){
        if ($statusID==10){
            $list = DB::table('transport')
            ->get();
        }
        else {
            $list = DB::table('transport')
            ->where('status', $statusID)
            ->get();
        }
        return $list;
    }
    public function getTicketDetail($id){
        $list = DB::table('transport')
        ->where('id', $id)
        ->first();
    return $list;
    }

    //Lấy ra dữ liệu trạng thái cũ
    public function getOrderLog($id){
        $list = DB::table('transport')
        ->select('order_log','orderID')
        ->where('vandonID', $id)
        ->first();
    return $list;
    }

    public function updateOrderTime($id,$status){
        $list = DB::table('order_time')
        ->where('id', $id)
        ->update([
            'order_status' => $status,
        ]);
    }

    public function updateOrder($data){
        DB::table('transport')
        ->where('vandonID', $data['OrderCode'])
        ->update([
            /* 'status' => 1, */
            'order_log' => $data['Status_new'],
        ]);
    }

    //get order status for API
    public function getOrderStatusAPI($id){
        $list = DB::table('transport')
        ->select('order_log')
        ->where('orderID', $id)
        ->first();
        return $list;
    }

    //Thêm đơn hàng vào Transport
    public function insertOrder($orderCode, $orderID, $COD, $fee, $expected_delivery_time){
        DB::table('transport')->insert([
            'vandonID' => $orderCode,
            'orderID' => $orderID,
            'customerID' => 1,
            'partner' => "Giao hàng nhanh(GHN)",
            'COD' => $COD,
            'fee' => $fee,
            'employeeID' => 1,
            'expected_delivery_time' => $expected_delivery_time,
            'order_log' => "",
            'status' => 2,  //0: Chưa đối soát, 1: Đã đối soát, 2: Đang giao - không thể đối soát => Chờ xử lý
            'status_order' =>2,  //0: Hoàn trả, 1: Giao thành công
        ]);
    }

    //Update trạng thái đơn ( Giao thành công || Hoàn trả) vào Transport để đối soát
    public function updateStatusOrderTransport($orderID, $status_order, $status_new){
        $list = DB::table('transport')
        ->where('orderID', $orderID)
        ->update([
            'status_order' => $status_order,
            'status' => $status_new,
        ]);
    }
}
