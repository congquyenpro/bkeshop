<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class ManageStaffCustomer extends Model
{
    //Manage staff
    public function getStaff(){
        $sql = "SELECT id,name,email,type,status FROM admin";
        return DB::select($sql);
    }

    public function addstaff($data){
        $permissions = implode(',', $data['permissions']); // Chuyển mảng thành chuỗi, cách nhau bởi dấu phẩy
        DB::table('admin')->insert([
            'secret_key' => 8888,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'type' => $data['role'],
        ]);   
    }

    //Edit nhân viên
    //Lấy ra thông tin cũ
    public function getStaffDetail($id){
        $result = DB::table('admin')
        ->select('id', 'name', 'email', 'type', 'status', 'permissions')
        ->where('id', $id)
        ->first();
        return $result;
    }
    //Update thông tin mới
    public function updateStaff($data,$id){
        DB::table('admin')
        ->where('id', $id) // Điều kiện để xác định bản ghi cần cập nhật, $id là giá trị ID của bản ghi
        ->update([
            'secret_key' => 8888,
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => $data['password'],
            'type' => $data['role'],
        ]);    
    }

    public function getData(){
        $sql = "SELECT name,email,password,type FROM admin";
        return DB::select($sql);
    }

    public function deleteStaff($id)
    {
        DB::table('admin')->where('id', $id)->delete();
    }
}
