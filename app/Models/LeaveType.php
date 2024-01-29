<?php

namespace App\Models;

use App\Http\Controllers\Employee\EmployeeLeavesController;
use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class LeaveType extends Model
{
    protected $table = 'leave_types';
    protected $guarded = [];

    public function empLeaves($employee_id, $status)
    {
        $employee = Employee::find($employee_id);
        $JoiningYears = $employee->calcJoiningYears($employee);
        $new_year_date = $JoiningYears['this_year']['date'];
        $next_new_year_date = $JoiningYears['next_year']['date'];
        //dd($joiningDate_day . " " . $joiningDate_month. " " . $newDate_joining_year . " ". $today);
        //This year
        if ($status == '!approved') {
            $leaves = Leave::where('leave_type_id', $this->id)->whereNotIn('status', ['approved'])->where('employee_id', $employee_id)->whereBetween('created_at', [$new_year_date, $next_new_year_date])->get();
        } else {
            $leaves = Leave::where('leave_type_id', $this->id)->where('status', $status)->where('employee_id', $employee_id)->whereBetween('created_at', [$new_year_date, $next_new_year_date])->get();
        }
        $days = 0;
        foreach ($leaves as $leave) {
            $extraInfo = explode('|', $leave->extraInfo);
            $date1 = Carbon::parse($extraInfo[0]);
            $date2 = Carbon::parse($extraInfo[1]);
            $dif = abs($date1->diffInDays($date2));
            $days += $dif;
        }
        return $days;
    }

    public function empLeavesRemain($employee_id)
    {
        //IF THE LEAVE HAS REAMIN
        //CALCULATE REMAIN
        $available_after = LeaveType::where('id', $this->id)->first()->available_after ?? 0;
        if ($this->name == 'Annual leave') {
            //Exist before
            $employee = Employee::find($employee_id);
            $JoiningYears = $employee->calcJoiningYears($employee);
            $new_year_date = $JoiningYears['this_year']['date'];
            $next_new_year_date = $JoiningYears['next_year']['date'];
            $leaves = Leave::where('leave_type_id', $this->id)->where('employee_id', $employee_id)->latest('created_at')->whereBetween('created_at', [$new_year_date, $next_new_year_date])->get();
            //empLeaves
            $days = 0;
            foreach ($leaves as $leave) {
                $extraInfo = explode('|', $leave->extraInfo);
                $date1 = Carbon::parse($extraInfo[0]);
                $date2 = Carbon::parse($extraInfo[1]);
                $dif = abs($date1->diffInDays($date2));
                $days += $dif;
            }
            if ($days >= $this->quantity) {
                //old employee
                $submission = $leaves[0]->updated_at;
                $date1 = Carbon::parse($submission);
            } else {
                $emp = Employee::find($employee_id);
                $date1 = Carbon::parse($emp->joiningDate);
            }
            $date2 = Carbon::parse(date('y-m-d'));
            $dif = $date1->diffInDays($date2);
            if ($this->available_after <= $dif) {
                return 0;
            } else {
                return $dif;
            }
        }
    }

    public function getEmpLeaves($employee)
    {
        $empLeaves = new EmployeeLeavesController();
        //dd($empLeaves->getEmpLeaves($employee));
        return $empLeaves->getEmpLeaves($employee);
    }

}
