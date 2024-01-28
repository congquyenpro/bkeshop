<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function reportGeneral(){
        return view("admin.manager.report.general");
    }
    public function reportSales(){
        return view("admin.manager.report.sales");
    }
    public function reportFinancial(){
        return view("admin.manager.report.financial");
    }
    public function reportWarehouse(){
        return view("admin.manager.report.warehouse");
    }
}
