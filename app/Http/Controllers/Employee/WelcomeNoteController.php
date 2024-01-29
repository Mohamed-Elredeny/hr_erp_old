<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Employee;
use App\Models\WelcomeNoteRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class WelcomeNoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:employee');
    }

    public function index(Request $request)
    {
        $id = $request->id;
        $manager = $request->manager;
        $welcome_note = WelcomeNoteRequest::find($id);
        $employee = Employee::find(auth('employee')->user()->id);
        return view('employees.welcomeNote.welcomeNote', compact('employee', 'welcome_note', 'manager'));
    }

    public function changeState(Request $request, $id, $status, $all)
    {
        if (isset($request->signature)) {
            $fileName = $request->signature->getClientOriginalName();
            $file_to_store = time() . '_' . $fileName;
            $request->signature->move(public_path('assets/images/'), $file_to_store);
        }


//        if ($all == 0) {
//
//            $requestWelcome = WelcomeNoteRequest::find($id);
//            $requestWelcome->update([
//                'status' => $status
//            ]);
//            if (isset($request->signature)) {
//                $requestWelcome->update([
//                    'signature' => $file_to_store
//                ]);
//            }
//            if (isset($request->cancelReason)) {
//                $requestWelcome->update([
//                    'cancellation_reasons' => $request->cancelReason
//                ]);
//            }
//            if (isset($request->specify)) {
//                $cancelReason = $requestWelcome->cancellation_reasons . " " . $request->specify;
//                $requestWelcome->update([
//                    'cancellation_reasons' => $cancelReason
//                ]);
//            }
//        } else {
        $requestWelcome = WelcomeNoteRequest::find($id);
        $request_id = $requestWelcome->request_id;
        $requests = WelcomeNoteRequest::where('request_id', $request_id)->get();
        foreach ($requests as $req) {
            $req->update([
                'status' => $status
            ]);
            if (isset($request->signature)) {
                $req->update([
                    'signature' => $file_to_store
                ]);
            }
            if (isset($request->cancelReason)) {
                $req->update([
                    'cancellation_reasons' => $request->cancelReason
                ]);
            }
            if (isset($request->specify)) {
                $cancelReason = $req->cancellation_reasons . ' ' . $request->specify;
                $req->update([
                    'cancellation_reasons' => $cancelReason
                ]);
            }
        }

        // }
        return redirect()->back()->with('success', 'Done Successfully');

    }

    function list()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        $requests = WelcomeNoteRequest::get();

        $auth_id = auth()->user()->id;
        $welcome_requests = WelcomeNoteRequest::where('emp_sender_request', $auth_id)->orWhere('emp_receiver_request', $auth_id);
        $requests = $welcome_requests->whereHas('newemployee', function ($welcome_requests) {
            $welcome_requests->where('company_id', '1');
        })->get();


        $statistics = [
            'all0' => $welcome_requests->count(),
            'pendingApproved0' => $welcome_requests->where('status', 'pending')->count(),
            'evaluted0' => $welcome_requests->where('status', 'evaluated')->count(),
            'canceled0' => $welcome_requests->where('status', 'canceled')->count(),
            'all1' => $welcome_requests->where('status', 'pending')->whereHas('newemployee', function ($query) {
                $query->where('company_id', '1');
            })->count(),
            'pendingApproved1' => 0,
            'evaluted1' => 0,
            'canceled1' => 0,
            'all2' => 0,
            'pendingApproved2' => 0,
            'evaluted2' => 0,
            'canceled2' => 0,
            'all3' => 0,
            'pendingApproved3' => 0,
            'evaluted3' => 0,
            'canceled3' => 0,
        ];

        $companies = Company::get();

        $all3 = 0;
        $pendingApproved3 = 0;
        $evaluted3 = 0;
        $canceled3 = 0;
        $finalApprovals = [];
        return view('employees.welcomeNote.list', compact('requests', 'employee', 'statistics', 'finalApprovals', 'companies'));
    }

    function create()
    {
        $employee = Employee::find(auth('employee')->user()->id);
        return view('employees.welcomeNote.create', compact('employee'));
    }

    function getManagers($employeeType, $entityId)
    {
        /*
         *  employee
            staffManager
            workersManager
         * */
        return Employee::where('company_id', $entityId)->where('welcomeNote', 'like', '%' . $employeeType . '%')->orWhere('view_all_notes_entities', 1)->get();
    }

    public function store(Request $request)
    {
        $welcomeNote = implode('|', $request->welcomeNote ?? ['unauthorized']);
        if ($request->image) {
            $fileName = $request->image->getClientOriginalName();
            $image = time() . '_' . $fileName;
            $request->image->move(public_path('assets/images/'), $image);
        } else {
            $image = '';
        }
        if ($request->signature) {
            $fileName = $request->signature->getClientOriginalName();
            $signature = time() . '_' . $fileName;
            $request->signature->move(public_path('assets/images/'), $signature);
        } else {
            $signature = '';

        }

        $emp = Employee::create([
            'image' => $image,
            'signature' => $signature,
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
        $send_id = auth()->user()->id;
        $new_employee = $emp->id;
        $receivers = $request->welcomeManagersDropdown;
        $rand = rand(0000000000, 9999999999);
        foreach ($receivers as $receiver) {
            WelcomeNoteRequest::create([
                'emp_sender_request' => $send_id,
                'new_emp_request' => $new_employee,
                'emp_receiver_request' => $receiver,
                'type' => $request->employee_type,
                'request_id' => $rand
            ]);
        }
        return redirect()->back()->with('success', 'Done Successfully');
    }

    public function edit($id)
    {
        $employee = Employee::find($id);
        return view('employees.welcomeNote.edit', compact('employee'));

    }

    public function update(Request $request, $id)
    {
        $employee = WelcomeNoteRequest::find($id);
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
        $welcomeNote = implode('|', $request->welcomeNote ?? ['unauthorized']);
        $employee->update([
            'image' => $image,
            'signature' => $signature,
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
        $send_id = auth()->user()->id;
        $new_employee = $employee->id;
        WelcomeNoteRequest::where('new_emp_request', $new_employee)->delete();
        $receivers = $request->welcomeManagersDropdown;
        $rand = rand(0000000000, 9999999999);
        foreach ($receivers as $receiver) {
            WelcomeNoteRequest::create([
                'emp_sender_request' => $send_id,
                'new_emp_request' => $new_employee,
                'emp_receiver_request' => $receiver,
                'type' => $request->employee_type,
                'request_id' => $rand
            ]);
        }
        return redirect()->back()->with('success', 'Done Successfully');

    }

}
