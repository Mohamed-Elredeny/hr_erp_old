<?php

namespace App\Http\Controllers\Admin;

use App\Imports\EmployeeImport;
use App\Imports\EditEmployeeImport;
use App\Models\UserPermission;
use Illuminate\Support\Str;
use Maatwebsite\Excel\Facades\Excel;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Employee;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function importEmployee(Request $request)
    {

        $fileName = $request->file->getClientOriginalName();
        $file_to_store = time() . '_' . $fileName;
        $request->file->move(public_path('assets/images/files/'), $file_to_store);
        Excel::import(new EmployeeImport, public_path("assets/images/files/$file_to_store"));

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function editExcelEmployee(Request $request)
    {

        $fileName = $request->editFile->getClientOriginalName();
        $file_to_store = time() . '_' . $fileName;
        $request->editFile->move(public_path('assets/images/files/'), $file_to_store);
        Excel::import(new EditEmployeeImport($request->column_name), public_path("assets/images/files/$file_to_store"));

        $employees = Employee::where('empCode', 'EmpCode')->get();
        Employee::destroy($employees[0]->id);
        $employees = Employee::where('empCode', 'Manual')->get();
        Employee::destroy($employees[0]->id);

        return redirect()->back()->with('success', 'Data imported successfully!');
    }

    public function removeRegister($id)
    {
        $employee = Employee::find($id);
        $employee->update([
            "password" => null,
            "activation_token" => null,
        ]);
        return view('admin.employees.edit', compact('employee'))->with('success', 'Remove Register Successfully!');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $employees = Employee::paginate(30);
        return view('admin.employees.index', compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.employees.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $welcomeNote = implode('|', $request->welcomeNote ?? ['unauthorized']);
        if ($request->image) {
            $fileName = $request->image->getClientOriginalName();
            $image = time() . '_' . $fileName;
            $request->image->move(public_path('assets/images/'), $image);
        } else {
            $image = "";
        }
        if ($request->signature) {
            $fileName = $request->signature->getClientOriginalName();
            $signature = time() . '_' . $fileName;
            $request->signature->move(public_path('assets/images/'), $signature);
        } else {
            $signature = '';
        }


        Employee::create([
            'view_all_notes_entities' => $request->view_all_notes_entities,
            'signature' => $signature,
            'image' => $image,
            'welcomeNote' => $welcomeNote,
            'status' => $request->status,
            'empCode' => $request->empCode,
            'empName' => $request->empName,
            'nationality' => $request->nationality,
            'designation' => $request->designation,
            'projectDepartmentNumber' => $request->projectDepartmentNumber,
            'projectDepartmentName' => $request->projectDepartmentName,
            'minimum' => $request->minimum,
            'maximum' => $request->maximum,
            'class' => $request->class,
            'jobFamily' => $request->jobFamily,
            'jobCode' => $request->jobCode,
            'categoryPayroll' => $request->categoryPayroll,
            'empAcc' => $request->empAcc,
            'joiningDate' => $request->joiningDate,
            'service' => $request->service,
            'birthDate' => $request->birthDate,
            'age' => $request->age,
            'warning' => $request->warning,
            'payType' => $request->payType,
            'eligibility' => $request->eligibility,
            'vacDays' => $request->vacDays,
            'sector' => $request->sector,
            'ticketAmount' => $request->ticketAmount,
            'numTickets' => $request->numTickets,
            'familyStatus' => $request->familyStatus,
            'settDate' => $request->settDate,
            'campedsc' => $request->campedsc,
            'passportNo' => $request->passportNo,
            'passportValidity' => $request->passportValidity,
            'visaNo' => $request->visaNo,
            'visaExpiry' => $request->visaExpiry,
            'visaType' => $request->visaType,
            'sponsor' => $request->sponsor,
            'sex' => $request->sex,
            'empStatus' => $request->empStatus,
            'effectiveDate' => $request->effectiveDate,
            'visaIssueDate' => $request->visaIssueDate,
            'emailWork' => $request->emailWork,
            'mobileWork' => $request->mobileWork,
            'mobile' => $request->mobile,
            'finger' => $request->finger,
            'medical' => $request->medical,
            'dutyResumption' => $request->dutyResumption,
            'hcCode' => $request->hcCode,
            'hcExpDate' => $request->hcExpDate,
            'agency' => $request->agency,
            'basic' => $request->basic,
            'hra' => $request->hra,
            'ta' => $request->ta,
            'fixedOt' => $request->fixedOt,
            'otherAllowance' => $request->otherAllowance,
            'total' => $request->total,
            'arabic_name' => $request->arabic_name,
            'arabic_nationality' => $request->arabic_nationality,
            'arabic_designation' => $request->arabic_designation,
            'total_salary' => $request->total_salary,
            'company_id' => $request->company_id,
        ]);

        return redirect()->back()->with('success', 'Done Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $employee = Employee::find($id);
        return view('admin.employees.show', compact('employee'));
    }

    public function searchEmp(Request $request)
    {
        $employee1 = Employee::where('empCode', $request->code)->first();
        if($employee1) {
            $employee = Employee::find($employee1->id);
            //return view('admin.employees.edit', compact('employee'));
            return redirect()->route('admin.employees.edit', ['employee' => $employee->id]);
        }else{
            return redirect()->back()->with('error','invalid id');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('admin.employees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {


        $employee = Employee::find($id);
        if ($request->image) {
            $fileName = $request->image->getClientOriginalName();
            $image = time() . '_' . $fileName;
            $request->image->move(public_path('assets/images/'), $image);
        } else {
            $image = $employee->image;
        }
        if ($request->signature) {
            $fileName = $request->signature->getClientOriginalName();
            $signature = time() . '_' . $fileName;
            $request->signature->move(public_path('assets/images/'), $signature);
        } else {
            $signature = $employee->signature;
        }
        if (isset($request->EmployeeRelation)) {
            $record = UserPermission::where('permission', $request->EmployeeRelation)->where('employee_id', $id)->first();
            if (!$record) {
                UserPermission::create([
                    'permission' => 'EmployeeRelation',
                    'employee_id' => $id
                ]);
            }
        } else {
            UserPermission::where('permission', 'EmployeeRelation')->where('employee_id', $id)->delete();
        }
        if (isset($request->ClearanceAccommodation)) {
            $record = UserPermission::where('permission', $request->ClearanceAccommodation)->where('employee_id', $id)->first();
            if (!$record) {
                UserPermission::create([
                    'permission' => 'ClearanceAccommodation',
                    'employee_id' => $id
                ]);
            }
        } else {
            UserPermission::where('permission', 'ClearanceAccommodation')->where('employee_id', $id)->delete();
        }
        if (isset($request->ClearancePlant)) {
            $record = UserPermission::where('permission', $request->ClearancePlant)->where('employee_id', $id)->first();
            if (!$record) {
                UserPermission::create([
                    'permission' => 'ClearancePlant',
                    'employee_id' => $id
                ]);
            }
        } else {
            UserPermission::where('permission', 'ClearancePlant')->where('employee_id', $id)->delete();
        }
        if (isset($request->ClearanceStores)) {
            $record = UserPermission::where('permission', $request->ClearanceStores)->where('employee_id', $id)->first();
            if (!$record) {
                UserPermission::create([
                    'permission' => 'ClearanceStores',
                    'employee_id' => $id
                ]);
            }
        } else {
            UserPermission::where('permission', 'ClearanceStores')->where('employee_id', $id)->delete();
        }
        if (isset($request->ClearanceFinance)) {
            $record = UserPermission::where('permission', $request->ClearanceFinance)->where('employee_id', $id)->first();
            if (!$record) {
                UserPermission::create([
                    'permission' => 'ClearanceFinance',
                    'employee_id' => $id
                ]);
            }
        } else {
            UserPermission::where('permission', 'ClearanceFinance')->where('employee_id', $id)->delete();
        }
        if (isset($request->ClearanceIT)) {
            $record = UserPermission::where('permission', $request->ClearanceIT)->where('employee_id', $id)->first();
            if (!$record) {
                UserPermission::create([
                    'permission' => 'ClearanceIT',
                    'employee_id' => $id
                ]);
            }
        } else {
            UserPermission::where('permission', 'ClearanceIT')->where('employee_id', $id)->delete();
        }
        if (isset($request->HrApproval)) {
            $record = UserPermission::where('permission', $request->HrApproval)->where('employee_id', $id)->first();
            if (!$record) {
                UserPermission::create([
                    'permission' => 'HrApproval',
                    'employee_id' => $id
                ]);
            }
        } else {
            UserPermission::where('permission', 'HrApproval')->where('employee_id', $id)->delete();
        }
        if (isset($request->GroupHRDirectorApproval)) {
            $record = UserPermission::where('permission', $request->GroupHRDirectorApproval)->where('employee_id', $id)->first();
            if (!$record) {
                UserPermission::create([
                    'permission' => 'GroupHRDirectorApproval',
                    'employee_id' => $id
                ]);
            }
        } else {
            UserPermission::where('permission', 'GroupHRDirectorApproval')->where('employee_id', $id)->delete();
        }
        $welcomeNote = implode('|', $request->welcomeNote ?? ['unauthorized']);
        $employee->update([
            'view_all_notes_entities' => $request->view_all_notes_entities ?? 0,
            'signature' => $signature,
            'image' => $image,
            'welcomeNote' => $welcomeNote,
            'status' => $request->status,
            'empCode' => $request->empCode,
            'empName' => $request->empName,
            'nationality' => $request->nationality,
            'designation' => $request->designation,
            'projectDepartmentNumber' => $request->projectDepartmentNumber,
            'projectDepartmentName' => $request->projectDepartmentName,
            'minimum' => $request->minimum,
            'maximum' => $request->maximum,
            'class' => $request->class,
            'jobFamily' => $request->jobFamily,
            'jobCode' => $request->jobCode,
            'categoryPayroll' => $request->categoryPayroll,
            'empAcc' => $request->empAcc,
            'joiningDate' => $request->joiningDate,
            'service' => $request->service,
            'birthDate' => $request->birthDate,
            'age' => $request->age,
            'warning' => $request->warning,
            'payType' => $request->payType,
            'eligibility' => $request->eligibility,
            'vacDays' => $request->vacDays,
            'sector' => $request->sector,
            'ticketAmount' => $request->ticketAmount,
            'numTickets' => $request->numTickets,
            'familyStatus' => $request->familyStatus,
            'settDate' => $request->settDate,
            'campedsc' => $request->campedsc,
            'passportNo' => $request->passportNo,
            'passportValidity' => $request->passportValidity,
            'visaNo' => $request->visaNo,
            'visaExpiry' => $request->visaExpiry,
            'visaType' => $request->visaType,
            'sponsor' => $request->sponsor,
            'sex' => $request->sex,
            'empStatus' => $request->empStatus,
            'effectiveDate' => $request->effectiveDate,
            'visaIssueDate' => $request->visaIssueDate,
            'emailWork' => $request->emailWork,
            'mobileWork' => $request->mobileWork,
            'mobile' => $request->mobile,
            'finger' => $request->finger,
            'medical' => $request->medical,
            'dutyResumption' => $request->dutyResumption,
            'hcCode' => $request->hcCode,
            'hcExpDate' => $request->hcExpDate,
            'agency' => $request->agency,
            'basic' => $request->basic,
            'hra' => $request->hra,
            'ta' => $request->ta,
            'fixedOt' => $request->fixedOt,
            'otherAllowance' => $request->otherAllowance,
            'total' => $request->total,
            'arabic_name' => $request->arabic_name,
            'arabic_nationality' => $request->arabic_nationality,
            'arabic_designation' => $request->arabic_designation,
            'total_salary' => $request->total_salary,
            'company_id' => $request->company_id,
        ]);

        $employees = Employee::paginate(30);
        //   return view('admin.employees.index', compact('employees'))->with('success', 'Done Successfully');
        return redirect()->back()->with('success', 'Done Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        AcademicLevel::destroy($id);
        return redirect()->back()->with('success', 'Done Successfully');
    }
}
