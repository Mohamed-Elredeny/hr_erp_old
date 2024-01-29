<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class LeaveStage extends Model
{
    protected $table = 'user_leaves_stages';
    protected $guarded = [];

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

    public function empLeaves($employee_id, $status)
    {
        return Leave::where('leave_type_id', $this->id)->where('status', $status)->where('employee_id', $employee_id)->get();
    }

    public function employee()
    {
        return $this->belongsTo(Employee::class, 'responsible_employee');
    }

    public function leave()
    {
        return $this->belongsTo(Leave::class, 'leave_id');
    }

    public function avilableStage($stageName)
    {
        //List of states
        $flag = 1;
        foreach ($this->states as $state => $value) {
            if ($stageName != $state) {
                $original_leave_stages = LeaveStage::where('leave_id', $this->leave_id)->where('stage_name', $state)->count();
                $approved_leave_stages = LeaveStage::where('leave_id', $this->leave_id)->where('stage_name', $state)->where('status', 'approved')->count();
                if ($original_leave_stages > $approved_leave_stages && $original_leave_stages >= 0) {
                    $flag = 0;
                }
            } else {
                break;
            }
        }
        return $flag;

    }

}
