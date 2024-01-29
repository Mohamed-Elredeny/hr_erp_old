<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Leave extends Model
{
    protected $table = 'leaves';
    protected $guarded = [];
    protected $states = [
        'handOver' => 'Hand Over Stag',
        'ManagerApproval1' => 'Direct Supervisor Approval',
        'ManagerApproval2' => 'Manager Approval',
        'ManagerApproval3' => 'Head of Department (HOD) Approval',
        'ManagerApproval4' => 'Business Unit Head (BUH) Approval',
        'ManagerApproval5' => 'General Manager Approval',
        'gmApproval' => 'Gm Approval',
        'EmployeeRelation' => 'Employee Relation',
        'HrApproval' => 'Hr Approval',
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

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'employee_id');
    }

    public function hasStages()
    {
        return $this->hasMany(LeaveStage::class, 'leave_id');
    }

    public function type()
    {
        return $this->belongsTo(LeaveType::class, 'leave_type_id');
    }

    public function responsible_employees($stage)
    {
        $res = [];
        $stages = LeaveStage::where('leave_id', $this->id)->where('stage_name', $stage)->pluck('responsible_employee')->toArray();
        foreach ($stages as $stage) {
            $emp = Employee::find($stage);
            if (isset($emp->empName)) {
                $res[] = $emp->empName . '-' . $emp->mobile;
            }
        }
        return $res;
    }

    public function my_role_in_leave($employee_id)
    {
        $res = [];
        $stages = LeaveStage::where('leave_id', $this->id)->where('responsible_employee', $employee_id)->pluck('stage_name')->toArray();
        foreach ($stages as $stage) {
            if (isset($this->states[$stage])) {
                $res[] = $this->states[$stage];
            }
        }
        return $res;
    }

    public function next_stage_pending_employees()
    {
        $stagex = $this->next_stage();
        $stages = LeaveStage::where('leave_id', $this->id)->where('stage_name', $stagex)->where('status', '!=', 'approved')->pluck('responsible_employee')->toArray();
        foreach ($stages as $stage) {
            $emp = Employee::find($stage);
            if (isset($emp->empName)) {
                $res[] = $emp->empName . '-' . $emp->mobile;
            }
        }
        return $res ?? [$this->states[$stagex] . " team"];
    }

    public function next_stage()
    {
        $res = [];
        $stages = LeaveStage::where('leave_id', $this->id)->pluck('stage_name')->toArray();
        $current_stages = array_values(array_unique($stages));
        $index = array_search($this->status, $current_stages);
        $count_stages = LeaveStage::where('leave_id', $this->id)->where('stage_name', $current_stages[$index] ?? $this->status)->where('status', '!=', 'approved')->count();
        if (isset($current_stages[$index + 1]) && $count_stages <= 0) {
            return $current_stages[$index + 1];
        }
        return $current_stages[$index] ?? $this->status;
    }

    public function getStageStatus($stage_name)
    {
        $status = array_unique(LeaveStage::where('leave_id', $this->id)->where('stage_name', $stage_name)->pluck('status')->toArray());
        if(count($status) == 1){
            return $status[0];
        }else{
            return 'pending';
        }
        //approved
        //rejected
        //cancelled
        //pending
    }
}
