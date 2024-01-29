<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use App\Models\Employee;
use App\Models\Kpi;
use App\Models\Company;
use Illuminate\Http\Request;

class KPIController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function all(){
        $kpis = Kpi::paginate(30);
        $state = 'All KPI';
         $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        return view('admin.kpi.index', compact('kpis', 'state','companies','projectNames'));
    }

    public function pendingFirst(){
        $kpis = Kpi::where('is_first_approval', 0)->paginate(30);
        $state = 'Pending First Approval';
         $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        return view('admin.kpi.index', compact('kpis', 'state','companies','projectNames'));
    }

    public function pendingFinal(){
        $kpis = Kpi::where('is_first_approval', 1)->where('is_final_approval',0)->where('manager_count',2)->paginate(30);
        $state = 'Pending Final Approval';
         $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        return view('admin.kpi.index', compact('kpis', 'state','companies','projectNames'));
    }

    public function approved(){
        $kpis = Kpi::where('is_first_approval',1)->where('manager_count',1)->orWhere('is_final_approval',1)->paginate(30);
        $state = 'KPI Approved';
         $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        return view('admin.kpi.index', compact('kpis', 'state','companies','projectNames'));
    }

    public function evaluateFirst($id){
        $kpi = Kpi::where('id',$id)->get();
        $admin = Admin::find(auth('admin')->user()->id);
        $managers = Employee::select('id','emailWork')->get();
        return view('admin.kpi.evaluate_first_approval', compact('kpi', 'managers', 'admin'));
    }

    public function storeEvaluateFirst(Request $request){
        $admin = Admin::find(auth('admin')->user()->id);
        $kpi = Kpi::where('id',$request->id)->get();

        $Review_Manager_Rating=[];
        $Objectives_No = json_decode($kpi[0]->Objectives_No);
        for($x=0; $x < count($Objectives_No); $x++){
            $Review_Manager_Rating[$x] =$request["Review_Manager_Rating$x"];
        }
        $request->Review_Manager_Rating = json_encode( $Review_Manager_Rating);
        $request->Review_Comments_Manager = json_encode( $request->Review_Comments_Manager);
        $request->Development_Type = json_encode( $request->Development_Type);
        $request->Development_Level = json_encode( $request->Development_Level);
        $request->Development_Descripsion = json_encode( $request->Development_Descripsion);
        $request->Development_Target = json_encode( $request->Development_Target);
        $request->Development_Cost = json_encode( $request->Development_Cost);


        $kpi[0]->update([
            'Review_Manager_Rating'=>$request->Review_Manager_Rating,
            'Review_Comments_Employee'=>$request->Review_Comments_Employee,
            'Review_Comments_Manager'=>$request->Review_Comments_Manager,
            'Development_Type'=>$request->Development_Type,
            'Development_Level'=>$request->Development_Level,
            'Development_Descripsion'=>$request->Development_Descripsion,
            'Development_Target'=>$request->Development_Target,
            'Development_Cost'=>$request->Development_Cost,
            'First_Approval_Summary_Rating'=>$request->First_Approval_Summary_Rating,
            'First_Approval_Remark'=>$request->First_Approval_Remark,
            'Final_Approval'=>$request->Final_Approval,
            'First_Date'=>date("Y/m/d"),
            'is_first_approval'=>1,
            'Toty_Rating'=>$request->Final_Summary_Rating,
            'Admin_First_Approval'=>$admin->name,
        ]);

        return redirect('admin/kpi/all')->with('success','Evaluated Successfully');
    }

    public function evaluateFinal($id){
        $kpi = Kpi::where('id',$id)->get();
        $admin = Admin::find(auth('admin')->user()->id);
        $managers = Employee::select('id','emailWork')->get();
        return view('admin.kpi.evaluate_final_approval', compact('kpi', 'managers', 'admin'));
    }

    public function storeEvaluateFinal(Request $request){
        $admin = Admin::find(auth('admin')->user()->id);
        $employee = Employee::find(auth('employee')->user()->id);
        $kpi = Kpi::where('id',$request->id)->get();

        $kpi[0]->update([
            'Final_Summary_Rating'=>$request->Final_Summary_Rating,
            'Final_Approval_Remark'=>$request->Final_Approval_Remark,
            'Final_Date'=>date("Y/m/d"),
            'is_final_approval'=>1,
            'Toty_Rating'=>$request->Final_Summary_Rating,
            'Admin_Final_Approval'=>$admin->name,
        ]);

        return redirect('admin/kpi/all')->with('success','Evaluated Successfully');
    }

    public function show($id){
        $kpi = Kpi::where('id',$id)->get();
        $admin = Admin::find(auth('admin')->user()->id);
        $managers = Employee::select('id','emailWork')->get();
        return view('admin.kpi.evaluated', compact('kpi', 'managers', 'admin'));
    }

    public function update(Request $request){
        $admin = Admin::find(auth('admin')->user()->id);
        $kpi = Kpi::where('id',$request->id)->get();

        $kpi[0]->update([
            'Admin_Update'=>$request->Admin_Update,
            'Admin_Update_Remark'=>$request->Admin_Update_Remark,
            'Toty_Rating'=>$request->Admin_Update,
            'Admin_Update_Date'=>date("Y/m/d"),
        ]);

        return redirect('admin/kpi/all')->with('success','Evaluated Successfully');
    }
    
    public function feedback(Request $request){
        $admin = Admin::find(auth('admin')->user()->id);
        $kpi = Kpi::where('id',$request->id)->get();

        $kpi[0]->update([
            'feedback'=>$request->feedback,
        ]);

        $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        
        return redirect('admin/kpi/all')->with('success','Feedback Successfully');
    }

    public function kpiSearch(Request $request){
        $state = 2;
        $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();

        $searchTermProject = $request->Project;

        $entity = Company::where('name',$request->Entity)->get();
        if(isset($entity[0])){
            $searchTermEntity = $entity[0]->id;
        } else{
            $searchTermEntity = '';
        }

        $searchTermState1 = '';
        $searchTermState2 = '';
        $searchTermState11 = '11';
        $searchTermState22 = '121';
        $searchTermCount ='';
        $searchTermCount2 ='11';
        if($request->State == 'Pending'){
            $searchTermState1 = 1;
            $searchTermState2 = 0;
        } elseif($request->State == 'Pending At First Approval'){
            $searchTermState1 = 0;
            $searchTermState2 = 0;
        } elseif($request->State == 'Pending At Final Approval'){
            $searchTermState1 = 1;
            $searchTermState2 = 0;
            $searchTermCount = 2;
        } elseif($request->State == 'Evaluated'){
            $searchTermState1 = 1;
            $searchTermState2 = 1;
            $searchTermCount = 2;

            $searchTermState11 = 1;
            $searchTermState22 = 0;
            $searchTermCount2 = 1;
        }
        $searchTermState = $request->State;

        $serchGrade = $request->Grade;
        $projects = Employee::whereHas('Kpi', function ($query) use ($serchGrade, $searchTermProject, $searchTermEntity, $searchTermState1, $searchTermCount, $searchTermState2, $searchTermState11, $searchTermState22, $searchTermCount2) {
            $query->where(function ($subquery) use ($serchGrade,$searchTermState2, $searchTermCount, $searchTermState1) {
                $subquery
                    ->where(function ($subquery) use ($serchGrade) {
                        // Add the new filter based on the condition for Final_Summary_Rating and First_Approval_Summary_Rating
                        $subquery->where(function ($gradeQuery) use ($serchGrade) {
                            $gradeQuery->whereNotNull('Final_Summary_Rating')
                                ->where('Final_Summary_Rating', 'like', '%' . $serchGrade . '%');
                        })
                            ->orWhere(function ($gradeQuery) use ($serchGrade) {
                                $gradeQuery->whereNull('Final_Summary_Rating')
                                    ->whereNull('First_Approval_Summary_Rating')
                                    ->whereNotNull('First_Approval_Summary_Rating')
                                    ->where('First_Approval_Summary_Rating', 'like', '%' . $serchGrade . '%');
                            });
                    })
                    ->where('is_final_approval', 'like', '%' . $searchTermState2 . '%')
                    ->where('manager_count', 'like', '%' . $searchTermCount . '%')
                    ->where('is_first_approval', 'like', '%' . $searchTermState1 . '%');
            })
                ->orWhere(function ($subquery) use ($searchTermState11, $searchTermState22, $searchTermCount2) {
                    $subquery->where('is_final_approval', 'like', '%' . $searchTermState22 . '%')
                        ->where('manager_count', 'like', '%' . $searchTermCount2 . '%')
                        ->where('is_first_approval', 'like', '%' . $searchTermState11 . '%');
                });
        })
            ->where('projectDepartmentName', 'like', '%' . $searchTermProject . '%')
            ->Where('company_id', 'like', '%' . $searchTermEntity . '%')
            ->Where('empCode', 'like', '%' . $request->code . '%')
            ->get();

        //   dd($projects);


        return view('admin.kpi.index', compact('state','companies','projectNames', 'projects'));
    }
}
