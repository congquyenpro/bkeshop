<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\ProductRepository;
use App\Models\Product; 
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class ProductController extends Controller
{
    protected $product;

    public function __construct(Product $product){
        $this->product             = new ProductRepository($product); 
    }
    public function index(Request $request){
        $rule = isset($this->product->checkRule($request)->type) ? $this->product->checkRule($request)->type : 1;
        return view("admin.manager.product",compact('rule'));
    }
    public function get(){
        $data = $this->product->get_data();
        return $this->product->send_response(201, $data, null);
    }
    public function get_one($id){
        $data = $this->product->get_one($id);
        return $this->product->send_response(200, $data, null);
    }

    public function get_one_for_warehouse($id){
        $data = $this->product->get_one_for_warehouse($id);
        return $this->product->send_response(200, $data, null);
    }
 
    public function store(Request $request){   
        $data = [
            "category_id"   => $request->data_category, 
            "name"          => $request->data_name,
            "slug"          => $this->product->to_slug($request->data_name),
            "sex"           => $request->data_sex,
            "metadata"      => $request->data_meta,
            "property"      => $request->data_property,
            "price"         => $request->data_price,
            "description"   => nl2br($request->data_description ?? ""),
            "detail"        => $request->data_detail ?? "", 
        ];
        $image_list     = [];
        if ($request->image_list_length) {
            for ($i = 0; $i < $request->image_list_length; $i++) { 
                $image_name = $this->product->imageInventor('image-upload', $request['image_list_item_'.$i], 1200);
                array_push($image_list, $image_name); 
            }
            $data['images'] = implode(",",$image_list);;
        }
        $data_return = $this->product->create($data);
        return $this->product->send_response(201, $data_return, null);
    }
    public function update(Request $request){ 
        $data = [
            "category_id"   => $request->data_category, 
            "name"          => $request->data_name,
            "slug"          => $this->product->to_slug($request->data_name),
            "sex"           => $request->data_sex,
            "metadata"      => $request->data_meta,
            "property"      => $request->data_property,
            "price"         => $request->data_price,
            "description"   => nl2br($request->data_description ?? ""),
            "detail"        => $request->data_detail ?? "", 
        ];
        $image_list     = []; 
        if ($request->data_images_preview) {
            $image_preview = explode(",", $request->data_images_preview);  
            for ($i = 0; $i < count($image_preview); $i++) {  
                array_push($image_list, $image_preview[$i]); 
            }
        }
        if ($request->image_list_length) {
            for ($i = 0; $i < $request->image_list_length; $i++) { 
                $image_name = $this->product->imageInventor('image-upload', $request['image_list_item_'.$i], 1200); 
                array_push($image_list, $image_name); 
            }
        } 
        $data['images'] = implode(",",$image_list);
        $this->product->update($data, $request->data_id);
        return $this->product->send_response(201, "Update Success", null);
    }  

    public function update_price(){
        $data = $this->product->get_data();
        foreach ($data as $key => $value) { 
            $data_meta = json_decode($value->metadata)->data;
            if (count($data_meta) > 0) {
                $data = [
                    "price" => json_decode($value->metadata)->data[0]->prices
                ];
                $this->product->update($data, $value->id);
            } 
        } 
        return $this->product->send_response(200, "Update successful", null);
    }
    public function delete($id){
        $this->product->delete($id); 
        return $this->product->send_response(200, "Delete successful", null);
    }
    // cập nhật trending
    public function update_trending(Request $request){
        $this->product->update_trending($request->id);
        return $this->product->send_response(200, null, null);
    }

    //Cập nhật số lượng sản phẩm theo dung tích
    //Lấy dữ liệu cũ => update
    public function get_size_number(Request $request){
        $data = $this->product->getNumBySize($request->productId,$request->sizeId);
        $list_size = json_decode($data[0]->metadata)->data;

        //id của size = index trong mảng
        $size1 = $list_size[0]->quantity;
        $new_num = 1000;
        $update_num = $this->product->updateNumBySize($request->productId,1,$new_num);
        return $this->product->send_response(200, $update_num, null);
    }
}
