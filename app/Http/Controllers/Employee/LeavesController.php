<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Leave;
use App\Models\LeaveStage;
use App\Models\LeaveType;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class LeavesController extends Controller
{

    protected $states = [
        'handOver' => 'Hand Over Stag',
        'ManagerApproval1' => 'Direct Supervisor Approval',
        'ManagerApproval2' => 'Manager Approval',
        'ManagerApproval3' => 'Head of Department (HOD) Approval',
        'ManagerApproval4' => 'Business Unit Head (BUH) Approval',
        'ManagerApproval5' => 'General Manager Approval',
        'gmApproval' => 'GM Approval',
        'EmployeeRelation' => 'Employee Relation',
        'HrApproval' => 'HR Approval',
        'GroupHRDirectorApproval' => 'Group HR Director Approval',
        'BookFlightTicket' => 'Book Flight Ticket',
        'ClearanceAccommodation' => 'Accommodation Department',
        'ClearancePlant' => 'Plant Department',
        'ClearanceStores' => 'Stores Department',
        'ClearanceFinance' => 'Finance Department',
        'ClearanceIT' => 'IT Department',
        'approved' => 'Approved',
        'DepartmentApproval' => 'Department Approval'
    ];

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employee = auth('employee')->user();

        $responsible_leaves_ids = array_unique(LeaveStage::where('responsible_employee', $employee->id)->pluck('leave_id')->toArray());
        $responsible_leaves_ids1 = [];
        $responsible_leaves_ids2 = [];
        $responsible_leaves_ids3 = [];
        $responsible_leaves_ids4 = [];
        $responsible_leaves_ids5 = [];
        $responsible_leaves_ids6 = [];
        $responsible_leaves_ids7 = [];
        $responsible_leaves_ids8 = [];
        if ($employee->isHasPermission('EmployeeRelation')) {
            $responsible_leaves_ids1 = array_unique(LeaveStage::where('responsible_employee', 'EmployeeRelation')->pluck('leave_id')->toArray());
        }
        if ($employee->isHasPermission('ClearanceAccommodation')) {
            $responsible_leaves_ids2 = array_unique(LeaveStage::where('responsible_employee', 'ClearanceAccommodation')->pluck('leave_id')->toArray());
        }
        if ($employee->isHasPermission('ClearancePlant')) {
            $responsible_leaves_ids3 = array_unique(LeaveStage::where('responsible_employee', 'ClearancePlant')->pluck('leave_id')->toArray());
        }
        if ($employee->isHasPermission('ClearanceStores')) {
            $responsible_leaves_ids4 = array_unique(LeaveStage::where('responsible_employee', 'ClearanceStores')->pluck('leave_id')->toArray());
        }
        if ($employee->isHasPermission('ClearanceFinance')) {
            $responsible_leaves_ids5 = array_unique(LeaveStage::where('responsible_employee', 'ClearanceFinance')->pluck('leave_id')->toArray());
        }
        if ($employee->isHasPermission('ClearanceIT')) {
            $responsible_leaves_ids6 = array_unique(LeaveStage::where('responsible_employee', 'ClearanceIT')->pluck('leave_id')->toArray());
        }
        if ($employee->isHasPermission('HrApproval')) {
            $responsible_leaves_ids7 = array_unique(LeaveStage::where('responsible_employee', 'HrApproval')->pluck('leave_id')->toArray());
        }
        if ($employee->isHasPermission('GroupHRDirectorApproval')) {
            $responsible_leaves_ids8 = array_unique(LeaveStage::where('responsible_employee', 'GroupHRDirectorApproval')->pluck('leave_id')->toArray());
        }
        $responsible_leaves_merge = array_merge($responsible_leaves_ids, $responsible_leaves_ids1, $responsible_leaves_ids2, $responsible_leaves_ids3, $responsible_leaves_ids4, $responsible_leaves_ids5, $responsible_leaves_ids6, $responsible_leaves_ids7, $responsible_leaves_ids8);
        $responsible_leaves_ids = array_unique($responsible_leaves_merge);
        $responsible_leaves = Leave::whereIn('id', $responsible_leaves_ids)->latest()->get();
        $leaves = Leave::where('employee_id', $employee->id)->latest()->get();
        $states = $this->states;
        return view('employees.leaves.index', compact('leaves', 'employee', 'responsible_leaves', 'states'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $employee = auth('employee')->user();
        $result = $employee;
        $stringDateFromDatabase = $employee->joiningDate;
        $carbonDate = Carbon::parse($stringDateFromDatabase);
        $today = Carbon::now();
        $differenceInDays = $today->diffInDays($carbonDate);
        $leaves_types = LeaveType::where('employee_category', $employee->designation)->orWhere('employee_category', 'all')->where('joining_days', '<=', $differenceInDays)->get();
        $employees = Employee::where('company_id', $employee->company_id)->orWhere('empCode', 6398)->get();
        $managers_and_head_need_gm = ['phasedfosdfjlkds'];
        return view('employees.leaves.create', compact('result', 'employee', 'leaves_types', 'employees', 'managers_and_head_need_gm'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $leave_type = $request->leave_type;
        $leave_type_record = LeaveType::find($leave_type);
        $available = LeaveType::find($leave_type)->joining_days ?? 0;
        $request->validate([
            'startDate' => 'required|date',
            'endDate' => 'required|date|after:startDate',
            'days' => 'required|numeric|gt:0|max:' . $available . '|min:0',
        ], [
            'endDate.after' => 'The end date must be after the start date.',
            'days.gt' => 'The number of days must be greater than 0.',
            'days.max' => 'The number of days must not exceed the available limit of your leaves which is ' . $available . '.',
        ]);
        $employee_id = auth('employee')->user()->id;

        if ($leave_type_record->getEmpLeaves(auth('employee')->user())['statistics'][$leave_type]['remain'] != 0) {
            return redirect()->back()->with('error', 'Dear Colleagues,<br>
 you need ' . $leave_type_record->getEmpLeaves(auth('employee')->user())['statistics'][$leave_type]['remain'] . ' more workdays to qualify for this leave.<br>
 In urgent situations, unpaid leave is an option.');
        }
        if ($leave_type_record->getEmpLeaves(auth('employee')->user())['statistics'][$leave_type]['available'] <= 0) {
            return redirect()->back()->with('error', 'This leave is not available');
        }

        $from_date = $request->startDate;
        $to_date = $request->endDate;
        $days = $request->days;
        $phoneNumber = $request->phoneNumber;
        $reasons = $request->reasons;
        $extraInfo = [
            'from_date' => $from_date,
            'to_date' => $to_date,
            'days' => $days,
            'phoneNumber' => $phoneNumber,
            'reasons' => $reasons,
            'leaveCountry' => $request->leaveCountry ?? '',
            'exitPermit' => $request->exitPermit ?? '',
            'TicketPurchasing' => $request->TicketPurchasing ?? '',
            'TicketPurchasingInput' => $request->TicketPurchasingInput ?? ''
        ];
        $extraInfo = implode('|', $extraInfo);
        $leave = Leave::create([
            'leave_type_id' => $leave_type,
            'employee_id' => $employee_id,
            'status' => 'handOver',
            'extraInfo' => $extraInfo
        ]);

        //HandOver
        $handOver = $request->handOver;
        if (isset($handOver) && count($handOver) > 0) {
            foreach ($handOver as $item) {
                LeaveStage::create([
                    'leave_id' => $leave->id,
                    'responsible_employee' => $item,
                    'stage_name' => 'handOver',
                    'comments' => $request->handOverComments,
                    'attachments' => '',
                    'extraInfo' => '',
                    'status' => 'pending'
                ]);
            }
        }
        //Approval
        for ($i = 1; $i <= 5; $i++) {
            $Approval = $request['Approval' . $i];
            if (isset($Approval) && count($Approval) > 0) {
                foreach ($Approval as $item) {
                    LeaveStage::create([
                        'leave_id' => $leave->id,
                        'responsible_employee' => $item,
                        'stage_name' => 'ManagerApproval' . $i,
                        'comments' => $request->ApprovalComments,
                        'attachments' => '',
                        'extraInfo' => '',
                        'status' => 'pending'
                    ]);
                }
            }
        }
        //GM
        $gmApproval = $request->gmApproval;
        if (isset($gmApproval) && count($gmApproval) > 0) {
            foreach ($gmApproval as $item) {
                LeaveStage::create([
                    'leave_id' => $leave->id,
                    'responsible_employee' => $item,
                    'stage_name' => 'gmApproval',
                    'comments' => $request->gmApprovalComments,
                    'attachments' => '',
                    'extraInfo' => '',
                    'status' => 'pending'
                ]);
            }
        }

        //EmployeeRelation
        LeaveStage::create([
            'leave_id' => $leave->id,
            'stage_name' => 'EmployeeRelation',
            'comments' => '',
            'attachments' => '',
            'extraInfo' => '',
            'status' => 'pending'
        ]);

        //HrApproval
        LeaveStage::create([
            'leave_id' => $leave->id,
            'stage_name' => 'HrApproval',
            'comments' => '',
            'attachments' => '',
            'extraInfo' => '',
            'status' => 'pending'
        ]);
        //GroupHRDirectorApproval
        LeaveStage::create([
            'leave_id' => $leave->id,
            'stage_name' => 'GroupHRDirectorApproval',
            'comments' => '',
            'attachments' => '',
            'extraInfo' => '',
            'status' => 'pending'
        ]);

        //EmployeeRelation
        LeaveStage::create([
            'leave_id' => $leave->id,
            'stage_name' => 'BookFlightTicket',
            'comments' => '',
            'attachments' => '',
            'extraInfo' => '',
            'status' => 'pending'
        ]);

        //ClearanceAccommodation
        LeaveStage::create([
            'leave_id' => $leave->id,
            'stage_name' => 'ClearanceAccommodation',
            'comments' => '',
            'attachments' => '',
            'extraInfo' => '',
            'status' => 'pending'
        ]);
        //ClearancePlant
        LeaveStage::create([
            'leave_id' => $leave->id,
            'stage_name' => 'ClearancePlant',
            'comments' => '',
            'attachments' => '',
            'extraInfo' => '',
            'status' => 'pending'
        ]);
        //ClearanceStores
        LeaveStage::create([
            'leave_id' => $leave->id,
            'stage_name' => 'ClearanceStores',
            'comments' => '',
            'attachments' => '',
            'extraInfo' => '',
            'status' => 'pending'
        ]);
        //ClearanceFinance
        LeaveStage::create([
            'leave_id' => $leave->id,
            'stage_name' => 'ClearanceFinance',
            'comments' => '',
            'attachments' => '',
            'extraInfo' => '',
            'status' => 'pending'
        ]);
        //ClearanceIT
        LeaveStage::create([
            'leave_id' => $leave->id,
            'stage_name' => 'ClearanceIT',
            'comments' => '',
            'attachments' => '',
            'extraInfo' => '',
            'status' => 'pending'
        ]);

        return redirect()->back()->with('success', 'Done Successfully ');
    }

    /**
     * Display the specified resource.
     */
    public function show(int $id)
    {
        $employee = auth('employee')->user();
        $stringDateFromDatabase = $employee->joiningDate;
        $carbonDate = Carbon::parse($stringDateFromDatabase);
        $today = Carbon::now();
        $differenceInDays = $today->diffInDays($carbonDate);
        $leaves_types = LeaveType::where('employee_category', $employee->designation)->orWhere('employee_category', 'all')->where('joining_days', '<=', $differenceInDays)->get();
        $employees = Employee::where('company_id', $employee->company_id)->get();
        $managers_and_head_need_gm = ['Group HR Director'];
        $leave_type_options = ['Annual leave'];
        //Leave
        $leave = Leave::find($id);
        $states = $this->states;
        return view('employees.leaves.show', compact('leave', 'employee', 'leaves_types', 'employees', 'managers_and_head_need_gm', 'states'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function getLeavePolicy()
    {
        return view('employees.leaves.policy');
    }

    public function getLeaveInstructions()
    {
        return view('employees.leaves.leaveInstructions');

    }
}
