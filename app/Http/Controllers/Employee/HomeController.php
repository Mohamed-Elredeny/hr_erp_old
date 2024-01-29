<?php

namespace app\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\CancelationReasons;
use App\Models\Employee;
use App\Models\Kpi;
use App\Models\Manager;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function home()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        return view('employees.home', compact('employee'));
    }

    public function index()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $kpi = Kpi::where('Emp_Id', $employee->id)->count();
        $firstApproval = Kpi::where('First_Approval', $employee->empName)->where('is_first_approval', 0)->count();
        $firstApprovalAll = Kpi::where('First_Approval', $employee->empName)->count();
        $finalApproval = Kpi::where('Final_Approval', $employee->empName)->where('is_final_approval', 0)->count();
        $finalApprovalAll = Kpi::where('Final_Approval', $employee->empName)->count();
        $cancelationReasons = CancelationReasons::where('emp_id', $employee->id)->count();
        $kip_updateable =  Kpi::where('Emp_Id', $employee->id)->where('is_first_approval', 2)->orWhere('is_final_approval',2)->count();
        return view('employees.kpi.index', compact('employee', 'kpi', 'finalApproval', 'firstApproval', 'firstApprovalAll', 'finalApprovalAll', 'cancelationReasons','kip_updateable'));
    }

    public function showKpi()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $kpi = Kpi::where('Emp_Id', $employee->id)->get();
        return view('employees.kpi.show_kpi', compact('employee', 'kpi'));
    }

    public function cancelationReasons()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $cancelationReasons = CancelationReasons::where('emp_id', $employee->id)->get();
        return view('employees.kpi.cancelation_reasons', compact('employee', 'cancelationReasons'));
    }

    public function showKpiid($id)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $kpi = Kpi::where('id', $id)->get();
        return view('employees.kpi.show_kpi', compact('employee', 'kpi'));
    }

    public function kpi()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $managers = Employee::where('company_id', $employee->company_id)->select('id', 'empName')->get();
        $kpi = Kpi::where('Emp_Id', $employee->id)->get();
        $names = [];
        for ($i = 0; $i < count($managers); $i++) {
            $names[$i] = $managers[$i]->empName;
        }
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        // dd($names);
        return view('employees.kpi.kpi', compact('employee', 'kpi', 'managers', 'names', 'projectNames'));
    }

    public function editKpi()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $managers = Employee::where('company_id', $employee->company_id)->select('id', 'empName')->get();
        $kpi = Kpi::where('Emp_Id', $employee->id)->get();
        $names = [];
        for ($i = 0; $i < count($managers); $i++) {
            $names[$i] = $managers[$i]->empName;
        }
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        // dd($names);
        return view('employees.kpi.editKpi', compact('employee', 'kpi', 'managers', 'names', 'projectNames'));
    }
    public function submitKpi(Request $request)
    {
        $employee = Employee::find(auth('employee')->user()->id);

        $key = Kpi::where('Emp_Id', $employee->id)->get();
// dd($request);
        $request->Objectives_No = json_encode($request->Objectives_No);
        $request->Objectives_Type = json_encode($request->Objectives_Type);
        $request->Objectives_Objective = json_encode($request->Objectives_Objective);
        $request->Objectives_Results = json_encode($request->Objectives_Results);
//        $request->Objectives_Target = json_encode( $request->Objectives_Target);
        $request->Objectives_Weighting = json_encode($request->Objectives_Weighting);
        $request->Objectives_Comments_Employee = json_encode($request->Objectives_Comments_Employee);

// $fmail = Kpi::where('First_Approval',$request->First_Approval)->get();
//$mmail = Employee::where('empName',$request->First_Approval)->get();
//$request->empmail = $mmail[0]->emailWork;

        if ($request->manager_count == 1) {
            $request->Final_Approval = null;
//            Mail::send('employees.all_approval_email', ['token' => $employee], function($message) use($request){
//            $message->to($request->empmail);
//            $message->subject('Key Performance Indicator');
//        });


        } else {
//            Mail::send('employees.first_approval_email', ['token' => $employee], function($message) use($request){
//            $message->to($request->empmail);
//            $message->subject('Key Performance Indicator');
//        });
        }
        if (count($key) == 0) {
            $employeeKpi = Kpi::insertGetId([
                'Evaluation1' => $request->Evaluation1,
                'Evaluation2' => $request->Evaluation2,
                // 'Additional_role'=>$request->additional_role,
                // 'Additional_role_remark'=>$request->additional_role_remark,
                'Objectives_No' => $request->Objectives_No,
                'Objectives_Type' => $request->Objectives_Type,
                'Objectives_Objective' => $request->Objectives_Objective,
                'Objectives_Results' => $request->Objectives_Results,
//                'Objectives_Target'=>$request->Objectives_Target,
                'Objectives_Weighting' => $request->Objectives_Weighting,
                'Objectives_Comments_Employee' => $request->Objectives_Comments_Employee,
                'Objectives_Summary_Rating' => $request->Objectives_Summary_Rating,
                'Review_Self_Rating' => $request->Review_Self_Rating,
                'First_Approval' => $request->First_Approval,
                'Final_Approval' => $request->Final_Approval,
                'manager_count' => $request->manager_count,
                'Date' => date("Y/m/d"),
                'Emp_Id' => auth('employee')->user()->id,
            ]);
            return redirect()->route('employee.kpi.dashboard')->with('success', 'The request has been registered successfully');
        }
    }

    public function firstApproval()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $firstApprovals = Kpi::where('First_Approval', $employee->empName)->orderBy('is_first_approval')->get();
        $state = 2;
        $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        return view('employees.kpi.first_approval', compact('employee', 'firstApprovals', 'state', 'companies', 'projectNames'));
    }

    public function firstApprovalSearch(Request $request)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $firstApprovals = Kpi::where('First_Approval', $employee->empName)->orderBy('is_first_approval')->get();
        $state = 2;
        $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();

        $searchTermProject = $request->Project;
        $searchTermempName = $employee->empName;

        $entity = Company::where('name', $request->Entity)->get();
        if (isset($entity[0])) {
            $searchTermEntity = $entity[0]->id;
        } else {
            $searchTermEntity = '';
        }

        $searchTermState1 = '';
        if ($request->State == 'Pending') {
            $searchTermState1 = 0;
        } elseif ($request->State == 'Evaluated') {
            $searchTermState1 = 1;
        }
        $searchTermState = $request->State;


        $projects = Employee::whereHas('Kpi', function ($query) use ($searchTermProject, $searchTermEntity, $searchTermState1, $searchTermempName) {
            $query->where('is_first_approval', 'like', '%' . $searchTermState1 . '%')
                ->where('First_Approval', $searchTermempName);
        })
            ->where('projectDepartmentName', 'like', '%' . $searchTermProject . '%')
            ->Where('company_id', 'like', '%' . $searchTermEntity . '%')
            ->get();
        //   dd($projects);
        return view('employees.kpi.first_approval', compact('employee', 'firstApprovals', 'state', 'companies', 'projectNames', 'projects'));
    }


    public function firstApprovalState($state)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $firstApprovals = Kpi::where('First_Approval', $employee->empName)->where('is_first_approval', $state)->get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        $companies = Company::get();
        return view('employees.kpi.first_approval', compact('employee', 'firstApprovals', 'state', 'projectNames', 'companies'));
    }

    public function evaluateFirstApproval($id)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $kpi = Kpi::where('id', $id)->get();

        $managers = Employee::where('company_id', $employee->company_id)->select('id', 'empName')->get();

        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
//        if($kpi[0]->manager_count == 1){
//            return view('employees.evaluate_first_final_approval', compact('employee', 'kpi', 'managers'));
//        }
        return view('employees.kpi.evaluate_first_approval', compact('employee', 'kpi', 'managers', 'projectNames'));
    }

    public function submitKpiFirstApproval(Request $request)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $kpi = Kpi::where('id', $request->id)->get();

        $Review_Manager_Rating = [];
        $Objectives_No = json_decode($kpi[0]->Objectives_No);
        for ($x = 0; $x < count($Objectives_No); $x++) {
            $Review_Manager_Rating[$x] = $request["Review_Manager_Rating$x"];
        }
        $request->Review_Manager_Rating = json_encode($Review_Manager_Rating);
        $request->Review_Comments_Manager = json_encode($request->Review_Comments_Manager);
        $request->Development_Type = json_encode($request->Development_Type);
        $request->Development_Level = json_encode($request->Development_Level);
        $request->Development_Descripsion = json_encode($request->Development_Descripsion);
        $request->Development_Target = json_encode($request->Development_Target);
        $request->Development_Cost = json_encode($request->Development_Cost);


        $kpi[0]->update([
            'Review_Manager_Rating' => $request->Review_Manager_Rating,
            'Review_Comments_Employee' => $request->Review_Comments_Employee,
            'Review_Comments_Manager' => $request->Review_Comments_Manager,
            'Development_Type' => $request->Development_Type,
            'Development_Level' => $request->Development_Level,
            'Development_Descripsion' => $request->Development_Descripsion,
            'Development_Target' => $request->Development_Target,
            'Development_Cost' => $request->Development_Cost,
            'First_Approval_Summary_Rating' => $request->First_Approval_Summary_Rating,
            'First_Approval_Remark' => $request->First_Approval_Remark,
            'Final_Approval' => $request->Final_Approval,
            'First_Date' => date("Y/m/d"),
            'is_first_approval' => 1,
            'Toty_Rating' => $request->Final_Summary_Rating,
            'manager_additional_role' => $request->additional_role1,
            'manager_additional_role_remark' => $request->manager_additional_role_remark,
        ]);

        $firstApprovals = Kpi::where('First_Approval', $employee->empName)->orderBy('is_first_approval')->get();
        $state = 2;

        if ($kpi[0]->manager_count == 1) {
            $emp = $kpi[0]->employee->emailWork;
            $request->empmail = $emp;
            //     Mail::send('employees.email', ['token' => $employee], function($message) use($request){
            //     $message->to($request->empmail);
            //     $message->subject('Key Performance Indicator');
            // });
        }

        if ($kpi[0]->manager_count == 2) {
            $finalMail = Employee::where('empName', $request->Final_Approval)->get();
            $request->empmail = $finalMail[0]->emailWork;

            // Mail::send('employees.final_approval_email', ['token' => $employee], function($message) use($request){
            //     $message->to($request->empmail);
            //     $message->subject('Key Performance Indicator');
            // });
        }


        $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        return view('employees.kpi.first_approval', compact('employee', 'firstApprovals', 'state', 'companies', 'projectNames'));
        // return 1;
        // return redirect('employee/first_approval')->with('success','Evaluated Successfully');

    }

    public function showFirstApproval($id)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $kpi = Kpi::where('id', $id)->get();
        return view('employees.kpi.show_first_approval', compact('employee', 'kpi'));
    }

    public function finalApproval()
    {
        // dd(2);
        $employee = Employee::find(auth('employee')->user()->id);
        $finalApprovals = Kpi::where('Final_Approval', $employee->empName)->orderBy('is_final_approval', 'ASC')->orderBy('is_first_approval', 'DESC')->get();
        $state = 2;
        $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        return view('employees.kpi.final_approval', compact('employee', 'finalApprovals', 'state', 'companies', 'projectNames'));
    }

    public function finalApprovalSearch(Request $request)
    {
        // dd(3);
        $employee = Employee::find(auth('employee')->user()->id);
        $finalApprovals = Kpi::where('Final_Approval', $employee->empName)->orderBy('is_final_approval', 'ASC')->get();
        // return $finalApprovals;
        $state = 2;
        $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();

        $searchTermProject = $request->Project;
        $searchTermempName = $employee->empName;

        $entity = Company::where('name', $request->Entity)->get();
        if (isset($entity[0])) {
            $searchTermEntity = $entity[0]->id;
        } else {
            $searchTermEntity = '';
        }

        $searchTermState1 = '';
        $searchTermState2 = '';
        if ($request->State == 'Pending') {
            $searchTermState1 = 1;
            $searchTermState2 = 0;
        } elseif ($request->State == 'Pending At First Approval') {
            $searchTermState1 = 0;
            $searchTermState2 = 0;
        } elseif ($request->State == 'Evaluated') {
            $searchTermState1 = '';
            $searchTermState2 = 1;
        }
        $searchTermState = $request->State;


        $projects = Employee::whereHas('Kpi', function ($query) use ($searchTermProject, $searchTermEntity, $searchTermState1, $searchTermState2, $searchTermempName) {
            $query->where('is_final_approval', 'like', '%' . $searchTermState2 . '%')
                ->where('is_first_approval', 'like', '%' . $searchTermState1 . '%')
                ->where('Final_Approval', $searchTermempName)
                ->orderBy('is_final_approval', 'ASC');
        })
            ->where('projectDepartmentName', 'like', '%' . $searchTermProject . '%')
            ->Where('company_id', 'like', '%' . $searchTermEntity . '%')
            ->get();
        //   dd($projects);
        // return $projects;
        return view('employees.kpi.final_approval', compact('employee', 'finalApprovals', 'state', 'companies', 'projectNames', 'projects'));
    }

    public function finalApprovalState($state)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $finalApprovals = Kpi::where('Final_Approval', $employee->empName)->where('is_final_approval', $state)->orderBy('is_first_approval', 'DESC')->get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();
        $companies = Company::get();
        return view('employees.kpi.final_approval', compact('employee', 'finalApprovals', 'state', 'projectNames', 'companies'));
    }

    public function evaluateFinalApproval($id)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $kpi = Kpi::where('id', $id)->get();
        $managers = Employee::select('id', 'emailWork')->get();
        return view('employees.kpi.evaluate_final_approval', compact('employee', 'kpi', 'managers'));
    }

    public function submitKpiFinalApproval(Request $request)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $kpi = Kpi::where('id', $request->id)->get();

        $emp = $kpi[0]->employee->emailWork;
        $request->empmail = $emp;
// dd($emp);


        $kpi[0]->update([
            'Final_Summary_Rating' => $request->Final_Summary_Rating,
            'Final_Approval_Remark' => $request->Final_Approval_Remark,
            'Final_Date' => date("Y/m/d"),
            'is_final_approval' => 1,
            'Toty_Rating' => $request->Final_Summary_Rating,
        ]);

        // Mail::send('employees.email', ['token' => $employee], function($message) use($request){
        //     $message->to($request->empmail);
        //     $message->subject('Key Performance Indicator');
        // });

        return redirect('employee/final_approval')->with('success', 'Evaluated Successfully');
    }

    public function showFinalApproval($id)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $kpi = Kpi::where('id', $id)->get();
        return view('employees.kpi.show_final_approval', compact('employee', 'kpi'));
    }

    public function kpiPolicy()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $kpi = Kpi::where('Emp_Id', $employee->id)->count();
        return view('employees.kpi.policy', compact('employee', 'kpi'));
    }

    public function editPhoto()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        return view('employees.kpi.edit_photo', compact('employee'));
    }

    public function updatePhoto(Request $request)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $fileName = $request->image->getClientOriginalName();
        $file_to_store = time() . '_' . $fileName;
        $request->image->move(public_path('assets/images/employees/'), $file_to_store);

        $employee->image = $file_to_store;
        $employee->save();

        return redirect('employee')->with('success', 'Photo Updated Successfully');
    }

    public function firstApprovalCancel(Request $request)
    {
        $request->cancelReason = json_encode($request->cancelReason);
        $employeeKpi = CancelationReasons::insertGetId([
            'emp_id' => $request->emp_id,
            'date' => date("Y/m/d"),
            'reason' => $request->cancelReason,
            'specify' => $request->specify,
            'type' => "First Approval",
            'cancelation_emp' => auth('employee')->user()->id,
        ]);

        // return 1;
        $kpi = Kpi::find($request->kpi_id);
        $kpi->delete();

        return redirect('employee/first_approval')->with('success', 'KPI Canceled Successfully');
    }

    public function finalApprovalCancel(Request $request)
    {
        $request->cancelReason = json_encode($request->cancelReason);
        $employeeKpi = CancelationReasons::insertGetId([
            'emp_id' => $request->emp_id,
            'date' => date("Y/m/d"),
            'reason' => $request->cancelReason,
            'specify' => $request->specify,
            'type' => "Final Approval",
            'cancelation_emp' => auth('employee')->user()->id,
        ]);

        // return 1;
        $kpi = Kpi::find($request->kpi_id);
        $kpi->delete();

        return redirect('employee/final_approval')->with('success', 'KPI Canceled Successfully');
    }

    public function dashboardCancel(Request $request)
    {
        $request->cancelReason = json_encode($request->cancelReason);
        $employeeKpi = CancelationReasons::insertGetId([
            'emp_id' => $request->emp_id,
            'date' => date("Y/m/d"),
            'reason' => $request->cancelReason,
            'specify' => $request->specify,
            'type' => "Admin",
            'cancelation_emp' => auth('employee')->user()->id,
        ]);

        // return 1;
        $kpi = Kpi::find($request->kpi_id);
        $kpi->delete();

        return redirect('employee/kpi/dashboard')->with('success', 'KPI Canceled Successfully');
    }

    public function dashboard()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        if ($employee->empCode == 5473 || $employee->empCode == 6335 || $employee->empCode == 6398 || $employee->empCode == 101121) {
            $finalApprovals = Kpi::paginate(20);
            $countApprovals = Kpi::count();
            $state = 2;
            $companies = Company::get();
            $projectNames = Employee::select('projectDepartmentName')->distinct()->get();

            $empnum1 = Employee::where('company_id', 1)->count();
            $empnum2 = Employee::where('company_id', 2)->count();
            $empnum3 = Employee::where('company_id', 3)->count();

            $searchTermState2 = '';
            $kpi1all = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('id', 'like', '%' . $searchTermState2 . '%');
            })
                ->Where('company_id', '1')
                ->count();

            $kpi2all = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('id', 'like', '%' . $searchTermState2 . '%');
            })
                ->Where('company_id', '2')
                ->count();

            $kpi3all = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('id', 'like', '%' . $searchTermState2 . '%');
            })
                ->Where('company_id', '3')
                ->count();

            $kpi1pending = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '0')
                    ->where('is_first_approval', '0');
            })
                ->Where('company_id', '1')
                ->count();

            $kpi2pending = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '0')
                    ->where('is_first_approval', '0');
            })
                ->Where('company_id', '2')
                ->count();

            $kpi3pending = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '0')
                    ->where('is_first_approval', '0');
            })
                ->Where('company_id', '3')
                ->count();

            $kpi1pendingfinal = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '0')
                    ->where('is_first_approval', '1')
                    ->where('manager_count', '2');
            })
                ->Where('company_id', '1')
                ->count();

            $kpi2pendingfinal = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '0')
                    ->where('is_first_approval', '1')
                    ->where('manager_count', '2');
            })
                ->Where('company_id', '2')
                ->count();

            $kpi3pendingfinal = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '0')
                    ->where('is_first_approval', '1')
                    ->where('manager_count', '2');
            })
                ->Where('company_id', '3')
                ->count();

            $kpi1approved1 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '1')
                    ->where('is_first_approval', '1')
                    ->where('manager_count', '2');
            })
                ->Where('company_id', '1')
                ->count();

            $kpi1approved2 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '0')
                    ->where('is_first_approval', '1')
                    ->where('manager_count', '1');
            })
                ->Where('company_id', '1')
                ->count();

            $kpi1approved = $kpi1approved1 + $kpi1approved2;

            $kpi2approved1 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '1')
                    ->where('is_first_approval', '1')
                    ->where('manager_count', '2');
            })
                ->Where('company_id', '2')
                ->count();

            $kpi2approved2 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '0')
                    ->where('is_first_approval', '1')
                    ->where('manager_count', '1');
            })
                ->Where('company_id', '2')
                ->count();

            $kpi2approved = $kpi2approved1 + $kpi2approved2;

            $kpi3approved1 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '1')
                    ->where('is_first_approval', '1')
                    ->where('manager_count', '2');
            })
                ->Where('company_id', '3')
                ->count();

            $kpi3approved2 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
                $query->where('is_final_approval', '0')
                    ->where('is_first_approval', '1')
                    ->where('manager_count', '1');
            })
                ->Where('company_id', '3')
                ->count();

            $kpi3approved = $kpi3approved1 + $kpi3approved2;

            return view('employees.kpi.dashboard', compact('employee', 'finalApprovals', 'state', 'companies', 'projectNames', 'countApprovals', 'kpi1all', 'kpi2all', 'kpi3all', 'kpi1pending', 'kpi2pending', 'kpi3pending', 'kpi1pendingfinal', 'kpi2pendingfinal', 'kpi3pendingfinal', 'kpi1approved', 'kpi2approved', 'kpi3approved', 'empnum1', 'empnum2', 'empnum3'));
        }else{
            return redirect()->back()->with('error','you dontt have the right');
        }
    }

    public function dashboardSearch(Request $request)
    {
        $employee = Employee::find(auth('employee')->user()->id);
        // $finalApprovals = Kpi::get();
        $state = 2;
        $companies = Company::get();
        $projectNames = Employee::select('projectDepartmentName')->distinct()->get();

        $empnum1 = Employee::where('company_id', 1)->count();
        $empnum2 = Employee::where('company_id', 2)->count();
        $empnum3 = Employee::where('company_id', 3)->count();


        $searchTermProject = $request->Project;

        $entity = Company::where('name', $request->Entity)->get();
        if (isset($entity[0])) {
            $searchTermEntity = $entity[0]->id;
        } else {
            $searchTermEntity = '';
        }

        $searchTermState1 = '';
        $searchTermState2 = '';
        $searchTermState11 = '11';
        $searchTermState22 = '121';
        $searchTermCount = '';
        $searchTermCount2 = '11';
        if ($request->State == 'Pending') {
            $searchTermState1 = 1;
            $searchTermState2 = 0;
        } elseif ($request->State == 'Pending At First Approval') {
            $searchTermState1 = 0;
            $searchTermState2 = 0;
        } elseif ($request->State == 'Pending At Final Approval') {
            $searchTermState1 = 1;
            $searchTermState2 = 0;
            $searchTermCount = 2;
        } elseif ($request->State == 'Evaluated') {
            $searchTermState1 = 1;
            $searchTermState2 = 1;
            $searchTermCount = 2;

            $searchTermState11 = 1;
            $searchTermState22 = 0;
            $searchTermCount2 = 1;
        }
        $searchTermState = $request->State;


        $projects = Employee::whereHas('Kpi', function ($query) use ($searchTermProject, $searchTermEntity, $searchTermState1, $searchTermCount, $searchTermState2, $searchTermState11, $searchTermState22, $searchTermCount2) {
            $query->where(function ($subquery) use ($searchTermState2, $searchTermCount, $searchTermState1) {
                $subquery->where('is_final_approval', 'like', '%' . $searchTermState2 . '%')
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
            ->get();


        $countApprovals = Employee::whereHas('Kpi', function ($query) use ($searchTermProject, $searchTermEntity, $searchTermState1, $searchTermCount, $searchTermState2, $searchTermState11, $searchTermState22, $searchTermCount2) {
            $query->where(function ($subquery) use ($searchTermState2, $searchTermCount, $searchTermState1) {
                $subquery->where('is_final_approval', 'like', '%' . $searchTermState2 . '%')
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
            ->count();

        //   dd($projects);


        $searchTermState2 = '';
        $kpi1all = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('id', 'like', '%' . $searchTermState2 . '%');
        })
            ->Where('company_id', '1')
            ->count();

        $kpi2all = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('id', 'like', '%' . $searchTermState2 . '%');
        })
            ->Where('company_id', '2')
            ->count();

        $kpi3all = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('id', 'like', '%' . $searchTermState2 . '%');
        })
            ->Where('company_id', '3')
            ->count();

        $kpi1pending = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '0')
                ->where('is_first_approval', '0');
        })
            ->Where('company_id', '1')
            ->count();

        $kpi2pending = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '0')
                ->where('is_first_approval', '0');
        })
            ->Where('company_id', '2')
            ->count();

        $kpi3pending = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '0')
                ->where('is_first_approval', '0');
        })
            ->Where('company_id', '3')
            ->count();

        $kpi1pendingfinal = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '0')
                ->where('is_first_approval', '1')
                ->where('manager_count', '2');
        })
            ->Where('company_id', '1')
            ->count();

        $kpi2pendingfinal = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '0')
                ->where('is_first_approval', '1')
                ->where('manager_count', '2');
        })
            ->Where('company_id', '2')
            ->count();

        $kpi3pendingfinal = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '0')
                ->where('is_first_approval', '1')
                ->where('manager_count', '2');
        })
            ->Where('company_id', '3')
            ->count();

        $kpi1approved1 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '1')
                ->where('is_first_approval', '1')
                ->where('manager_count', '2');
        })
            ->Where('company_id', '1')
            ->count();

        $kpi1approved2 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '0')
                ->where('is_first_approval', '1')
                ->where('manager_count', '1');
        })
            ->Where('company_id', '1')
            ->count();

        $kpi1approved = $kpi1approved1 + $kpi1approved2;

        $kpi2approved1 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '1')
                ->where('is_first_approval', '1')
                ->where('manager_count', '2');
        })
            ->Where('company_id', '2')
            ->count();

        $kpi2approved2 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '0')
                ->where('is_first_approval', '1')
                ->where('manager_count', '1');
        })
            ->Where('company_id', '2')
            ->count();

        $kpi2approved = $kpi2approved1 + $kpi2approved2;

        $kpi3approved1 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '1')
                ->where('is_first_approval', '1')
                ->where('manager_count', '2');
        })
            ->Where('company_id', '3')
            ->count();

        $kpi3approved2 = Employee::whereHas('Kpi', function ($query) use ($searchTermState2) {
            $query->where('is_final_approval', '0')
                ->where('is_first_approval', '1')
                ->where('manager_count', '1');
        })
            ->Where('company_id', '3')
            ->count();

        $kpi3approved = $kpi3approved1 + $kpi3approved2;
        return view('employees.kpi.dashboard', compact('employee', 'state', 'companies', 'projectNames', 'projects', 'countApprovals', 'kpi1all', 'kpi2all', 'kpi3all', 'kpi1pending', 'kpi2pending', 'kpi3pending', 'kpi1pendingfinal', 'kpi2pendingfinal', 'kpi3pendingfinal', 'kpi1approved', 'kpi2approved', 'kpi3approved', 'empnum1', 'empnum2', 'empnum3'));
    }


    public function submitKpitest(Request $request)
    {
        // dd(2);
        $employees = Employee::where('company_id', 1)->get();
        $request->Objectives_No = json_encode($request->Objectives_No);
        $request->Objectives_Type = json_encode($request->Objectives_Type);
        $request->Objectives_Objective = json_encode($request->Objectives_Objective);
        $request->Objectives_Results = json_encode($request->Objectives_Results);
        $request->Objectives_Weighting = json_encode($request->Objectives_Weighting);
        $request->Objectives_Comments_Employee = json_encode($request->Objectives_Comments_Employee);

        foreach ($employees as $employee) {

            $key = Kpi::where('Emp_Id', $employee->id)->get();


            if ($request->manager_count == 1) {
                $request->Final_Approval = null;

            }
            if (count($key) == 0) {
                $employeeKpi = Kpi::insertGetId([
                    'Evaluation1' => $request->Evaluation1,
                    'Evaluation2' => $request->Evaluation2,
                    'Additional_role' => $request->additional_role,
                    'Additional_role_remark' => $request->additional_role_remark,
                    'Objectives_No' => $request->Objectives_No,
                    'Objectives_Type' => $request->Objectives_Type,
                    'Objectives_Objective' => $request->Objectives_Objective,
                    'Objectives_Results' => $request->Objectives_Results,
                    'Objectives_Weighting' => $request->Objectives_Weighting,
                    'Objectives_Comments_Employee' => $request->Objectives_Comments_Employee,
                    'Objectives_Summary_Rating' => $request->Objectives_Summary_Rating,
                    'Review_Self_Rating' => $request->Review_Self_Rating,
                    'First_Approval' => $request->First_Approval,
                    'Final_Approval' => $request->Final_Approval,
                    'manager_count' => $request->manager_count,
                    'Date' => date("Y/m/d"),
                    'Emp_Id' => $employee->id,
                ]);
            }
        }
        return redirect()->route('employee.kpi.dashboard')->with('success', 'The cc');

    }

}
