<?php

namespace App\Repositories;

use Illuminate\Database\Eloquent\Model;
use Session;
use Hash;
use DB;

class CustomerRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }

    public function getOne($id){
        return $this->model->where('id', '=', $id)->get();
    }
    // Kiểm tra Email tồn tại
    public function check_email($email){
        return $this->model->where('email', '=', $email)->first() ? true : false;
    }

    // Tìm customer với Email
    public function find_with_email($email){
        return $this->model->where('email', '=', $email)->first();
    }

    // Tìm customer với Id
    public function find_with_id($id){
        return $this->model->where('customer.id', '=', $id)->leftjoin("customer_detail", "customer.id", "=", "customer_detail.customer_id")->first();
    }
    
    // Kiểm tra Email / Mật khẩu
    public function checkEmailPassword($request){
        $user = $this->model->where('email', '=', $request->data_email)->first();
        if ($user) {
            return Hash::check($request->data_password, $user->password) ? $user->id : false;
        }else{
            return false;
        }
    }

    // Tạo token client
    public function createTokenClient($id){
        return $id . '$' . Hash::make($id . '$' . $this->model->findOrFail($id)->secret_key);
    }

    // Lấy ra secret_key
    public function get_secret($id){
         $sql = "SELECT secret_key
                    FROM customer
                    WHERE id = ".$id;
        return DB::select($sql);
    } 

    // Lấy ra Name, Phone, Address 
    public function get_profile($id){
         $sql = "SELECT id, name, address, phone,sex,birthday
                    FROM customer_detail 
                    WHERE customer_id = ".$id;
        return DB::select($sql);
    }

    // Lây ra giỏ hàng
    public function get_cart($id){
         $sql = "SELECT id, cart
                    FROM customer_detail 
                    WHERE customer_id = ".$id;
        return DB::select($sql);
    }
 
    
}
