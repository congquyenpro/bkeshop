<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;

use App\Repositories\Manager\CategoryRepository;
use App\Models\Category; 
use Carbon\Carbon;
use Session;
use Hash;
use DB;

class CategoryController extends Controller
{
    protected $category;

    public function __construct(Category $category){
        $this->category             = new CategoryRepository($category); 
    }
    public function index(Request $request){
        $rule = isset($this->category->checkRule($request)->type) ? $this->category->checkRule($request)->type : 1;
        return view("admin.manager.category",compact('rule'));
    }
    public function get(){
        $data = $this->category->get_data();
        return $this->category->send_response(201, $data, null);
    }
    public function get_one($id){
        $data = $this->category->get_one($id);
        return $this->category->send_response(200, $data, null);
    }
 
    public function store(Request $request){  
        $data = [ 
            "name"      => $request->data_name,  
            "slug"      => $this->category->to_slug($request->data_name),
        ];
        $this->category->create($data); 
        return $this->category->send_response(201, null, null);
    }
    public function update(Request $request){  
        $data = [
            "name"      => $request->data_name, 
            "slug"      => $this->category->to_slug($request->data_name),
        ];
        $this->category->update($data, $request->data_id);
        return $this->category->send_response(200, null, null);
    }

    public function delete($id){
        $this->category->delete($id); 
        return $this->category->send_response(200, "Delete successful", null);
    }
}
