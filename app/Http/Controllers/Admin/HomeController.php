<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Kpi;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index(){
        $employee = Employee::count();
        $KPI = Kpi::count();
        $kpiPending = Kpi::where('is_first_approval',0)->count();
        $kpiFirst = Kpi::where('is_first_approval',1)->where('is_final_approval',0)->where('manager_count',2)->count();
        $kpiFinal = Kpi::where('is_final_approval',1)->count();
        $kpiAll = Kpi::where('is_first_approval',1)->where('manager_count',1)->count();
        $kpiSA = Kpi::where('is_first_approval',1)->where('manager_count',1)->where('Toty_Rating','A-VERY GOOD')->count();
        $kpiSB = Kpi::where('is_first_approval',1)->where('manager_count',1)->where('Toty_Rating','B-GOOD')->count();
        $kpiSC = Kpi::where('is_first_approval',1)->where('manager_count',1)->where('Toty_Rating','C-AVERAGE')->count();
        $kpiSD = Kpi::where('is_first_approval',1)->where('manager_count',1)->where('Toty_Rating','D-BELOW AVERAGE')->count();
        $kpiSE = Kpi::where('is_first_approval',1)->where('manager_count',1)->where('Toty_Rating','E-UNSATISFACTORY')->count();
        $kpiFA = Kpi::where('is_final_approval',1)->where('Toty_Rating','A-VERY GOOD')->count();
        $kpiFB = Kpi::where('is_final_approval',1)->where('Toty_Rating','B-GOOD')->count();
        $kpiFC = Kpi::where('is_final_approval',1)->where('Toty_Rating','C-AVERAGE')->count();
        $kpiFD = Kpi::where('is_final_approval',1)->where('Toty_Rating','D-BELOW AVERAGE')->count();
        $kpiFE = Kpi::where('is_final_approval',1)->where('Toty_Rating','E-UNSATISFACTORY')->count();

        $kpiA = $kpiSA + $kpiFA;
        $kpiB = $kpiSB + $kpiFB;
        $kpiC = $kpiSC + $kpiFC;
        $kpiD = $kpiSD + $kpiFD;
        $kpiE = $kpiSE + $kpiFE;
        $kpiFinal += $kpiAll;
        return view('admin.home', compact('employee','kpiPending','kpiFirst','kpiFinal','kpiA','kpiB','kpiC','kpiD','kpiE','KPI','kpiAll'));
    }
}
