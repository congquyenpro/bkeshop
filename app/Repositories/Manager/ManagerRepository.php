<?php

namespace App\Repositories\Manager;

use Illuminate\Database\Eloquent\Model;
use App\Repositories\BaseRepository;
use App\Repositories\RepositoryInterface;
use Session;
use Hash;
use DB;

class ManagerRepository extends BaseRepository implements RepositoryInterface
{
    protected $model;

    public function __construct(Model $model){
        $this->model = $model;
    }

    // Kiểm tra người dùng đã đánh giá chưa
    public function get_admin(){
        $sql = "SELECT * 
                FROM admin
                LEFT JOIN admin_detail
                ON admin.id = admin_detail.admin_id";
        return DB::select($sql);
    }
    
    public function get_all($id){
        $sql = "SELECT comment.*,
                        customer_detail.name
                    FROM comment
                    LEFT JOIN customer_detail
                    ON customer_detail.customer_id = comment.customer_id 
                    WHERE product_id = ".$id."
                    ORDER BY comment.created_at DESC LIMIT 5";
        return DB::select($sql);
    }
    public function get_rate($id){
        $sql = "SELECT rating,
                        count(rating) as count
                FROM comment
                WHERE product_id = ".$id."
                GROUP BY rating;";
        return DB::select($sql);
    }
    public function get_cus_one($id){
        $sql = "SELECT 
                    customer_detail.name,
                    customer_detail.phone,
                    customer_detail.sex,
                    customer_detail.birthday,
                    customer_detail.address,                    
                    customer.email,
                    customer.status
                    FROM customer_detail 
                    LEFT JOIN customer
                    ON customer.id = customer_detail.customer_id
                    WHERE customer_id = ".$id;
        return DB::select($sql);
    }
    public function get_cus_one_order($id){
        $sql = "SELECT 
                    order_time.id,
                    order_time.order_status,
                    order_time.created_at,
                    order_time.total
                    FROM order_time
                    LEFT JOIN customer
                    ON customer.id = order_time.customer_id
                    WHERE customer_id = ".$id;
        return DB::select($sql);
    }
}
