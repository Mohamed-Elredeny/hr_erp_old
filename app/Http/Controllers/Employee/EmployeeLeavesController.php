<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\EmployeeSettledLeave;
use App\Models\Leave;
use App\Models\LeaveType;
use Carbon\Carbon;
use Illuminate\Http\Request;

class EmployeeLeavesController extends Controller
{
    public function test()
    {
        $employee = Employee::find(5);
        $this->getEmpLeaves($employee);
    }

    //Get Employee Leaves
    public function getEmpLeaves($employee, $year = 'this')
    {
        $joiningDate = $employee->joiningDate;
        $today = date('d-m-Y');
        $date1 = Carbon::parse($joiningDate);
        $date2 = Carbon::parse($today);
        $years_diff = abs(intval($date1->year) - intval($date2->year));
        $working_years = [];
        for ($i = 0; $i <= $years_diff; $i++) {
            $working_years [] = intval($date1->year) + $i;
        }
        //We Have Different Types in leaves
        //1. Normal Leaves
        if ($year == 'this') {
            $searching_year = $date2->year;
        }
        $leave_types = LeaveType::get();

        $statistics = [];
        foreach ($leave_types as $leave_type) {
            $statistics [$leave_type->id] = $this->leaveAvailability($employee, $leave_type, 2024);
        }
        return [
            'working_years' => $working_years,
            'statistics' => $statistics
        ];
    }

    public function leaveAvailability($employee, $leave_type, $year)
    {
        $quantity = 0;
        $leaves_pending = 0;
        $leaves_approved = 0;
        $leaves_available = 0;
        $remain = 0;
        //Normal
        if ($leave_type->id != 3 && $leave_type->id != 14) {
            $quantity = $leave_type->quantity;
            $actual_leaves_pending = Leave::where('leave_type_id', $leave_type->id)->where('employee_id', $employee->id)->whereNotIn('leave_type_id', [3, 14])->whereYear('created_at', $year)->where('status', '!=', 'approved')->get();
            $leaves_pending = $this->calcLeaveDays($actual_leaves_pending);
            $actual_leaves_approved = Leave::where('leave_type_id', $leave_type->id)->where('employee_id', $employee->id)->whereNotIn('leave_type_id', [3, 14])->whereYear('created_at', $year)->where('status', 'approved')->get();
            $leaves_approved = $this->calcLeaveDays($actual_leaves_approved);
            $leaves_available = $quantity - ($leaves_pending + $leaves_approved);
        } elseif ($leave_type->id == 3) {
            //Old
            $settled_leaves = EmployeeSettledLeave::where('leave_type_id', $leave_type->id)->where('employee_id', $employee->id)->latest()->first();
            $today = date('d-m-Y');
            $date2 = Carbon::parse($today);
            if ($settled_leaves) {
                $settled_leaves_date = $settled_leaves->date;
                $date1 = Carbon::parse($settled_leaves_date);
                $dif = abs($date1->diffInDays($date2));
                $waiting_days = 336;
                $remain = $waiting_days - $dif;
                if ($remain < 0) {
                    $remain = 0;
                }
            } else {
                $joiningDate = $employee->joiningDate;
                $date1 = Carbon::parse($joiningDate);
                $dif = abs($date1->diffInDays($date2));
                $waiting_days = 365;
                $remain = $waiting_days - $dif;
                if ($remain < 0) {
                    $remain = 0;
                }
            }
            $actual_leaves_pending = Leave::where('leave_type_id', $leave_type->id)->where('employee_id', $employee->id)->whereIn('leave_type_id', [3])->whereYear('created_at', $year)->where('status', '!=', 'approved')->get();
            $leaves_pending = $this->calcLeaveDays($actual_leaves_pending);
            $actual_leaves_approved = Leave::where('leave_type_id', $leave_type->id)->where('employee_id', $employee->id)->whereIn('leave_type_id', [3])->whereYear('created_at', $year)->where('status', 'approved')->get();
            $leaves_approved = $this->calcLeaveDays($actual_leaves_approved);
            $leaves_available = $quantity - ($leaves_pending + $leaves_approved);
        } elseif ($leave_type->id == 14) {
            //New
            $settled_leaves = EmployeeSettledLeave::where('leave_type_id', $leave_type->id)->where('employee_id', $employee->id)->latest()->first();
            $today = date('d-m-Y');
            $date2 = Carbon::parse($today);
            if (!$settled_leaves) {
                $joiningDate = $employee->joiningDate;
                $date1 = Carbon::parse($joiningDate);
                $dif = abs($date1->diffInDays($date2));
                $waiting_days = 90;
                $remain = $waiting_days - $dif;
                if ($remain < 0) {
                    $remain = 0;
                }
            }
            $actual_leaves_pending = Leave::where('leave_type_id', $leave_type->id)->where('employee_id', $employee->id)->whereIn('leave_type_id', [14])->whereYear('created_at', $year)->where('status', '!=', 'approved')->get();
            $leaves_pending = $this->calcLeaveDays($actual_leaves_pending);
            $actual_leaves_approved = Leave::where('leave_type_id', $leave_type->id)->where('employee_id', $employee->id)->whereIn('leave_type_id', [14])->whereYear('created_at', $year)->where('status', 'approved')->get();
            $leaves_approved = $this->calcLeaveDays($actual_leaves_approved);
            $leaves_available = $quantity - ($leaves_pending + $leaves_approved);
        }
        return [
            'total' => $quantity,
            'pending' => $leaves_pending,
            'approved' => $leaves_approved,
            'available' => $leaves_available,
            'remain' => $remain,
            'name' => $leave_type->name,
            'id' => $leave_type->id
        ];
    }

    public function calcLeaveDays($leaves)
    {
        $days = 0;
        foreach ($leaves as $leave) {
            $extra_info = explode('|', $leave->extraInfo);
            $date2 = Carbon::parse($extra_info[0]);
            $date1 = Carbon::parse($extra_info[1]);
            $dif = abs($date1->diffInDays($date2)) + 1;
            $days+=$dif;
        }
        return $days;
    }
}
