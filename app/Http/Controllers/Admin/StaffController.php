<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use App\Models\ManageStaffCustomer;

use function Ramsey\Uuid\v1;

class StaffController extends Controller
{
    protected $staff;
    public function __construct(){
        $this->staff = new ManageStaffCustomer();
    }
    public function index(Request $request){
        $token = Session('_token__') ? Session('_token__') : $request->cookie('_token__');
        list($user_id, $token) = explode('$', $token, 2);
        $sqlAuth = DB::table('admin')->where('id', $user_id)->first();
        $rule = isset($sqlAuth->type) ? $sqlAuth->type : 1;

        $staffInfor = $this->staff->getStaff();
        return view('admin.manager.staff',[
            'staffInfor' => $staffInfor,
            'rule' => $rule
        ]);
    }
    public function addStaff(Request $request){
        // Lấy mảng các quyền được chọn
        $data = $request->input();
        $this->staff->addStaff($data);
        return redirect(route('admin.manager.staff'));
    }
    public function profileStaff(){
        return view('admin.staff.profile');
    }

    //Edit staff
    //Lấy ra thông tin cũ
    public function getInforDetail($id){
        $data =  $this->staff->getStaffDetail($id);
        return response()->json($data);
    }
    //Update thông tin
    public function updateStaff(Request $request,$id){
        $data = $request->input();
        dd($data);
        /* $this->staff->updateStaff($data,$id); */
    }

    //Update thông tin
    public function deleteStaff($id){
        $this->staff->deleteStaff($id);
        return response()->json('success');
            /* $this->staff->updateStaff($data,$id); */
    }


}
