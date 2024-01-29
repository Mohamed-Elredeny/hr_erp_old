<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Employee extends Authenticatable
{
    use Notifiable;

    protected $guard = 'employee';
    protected $table = 'employees';
    protected $fillable = [
        'id',
        'welcomeNote',
        'status',
        'empCode',
        'empName',
        'nationality',
        'designation',
        'projectDepartmentNumber',
        'projectDepartmentName',
        'minimum',
        'maximum',
        'class',
        'jobFamily',
        'jobCode',
        'categoryPayroll',
        'empAcc',
        'joiningDate',
        'service',
        'birthDate',
        'age',
        'warning',
        'payType',
        'eligibility',
        'vacDays',
        'sector',
        'ticketAmount',
        'numTickets',
        'familyStatus',
        'settDate',
        'campedsc',
        'passportNo',
        'passportValidity',
        'visaNo',
        'visaExpiry',
        'visaType',
        'sponsor',
        'sex',
        'empStatus',
        'effectiveDate',
        'visaIssueDate',
        'emailWork',
        'mobileWork',
        'mobile',
        'finger',
        'medical',
        'dutyResumption',
        'hcCode',
        'hcCode',
        'hcExpDate',
        'agency',
        'basic',
        'hra',
        'ta',
        'fixedOt',
        'otherAllowance',
        'total',
        'image',
        'token',
        'password',
        'company_id',
        'mobile_new',
        'activation_token',
        'arabic_name',
        'arabic_designation',
        'arabic_nationality',
        'total_salary',
        'signature',
        'image',
        'view_all_notes_entities',


        'grade',
        'food',
        'oTMedgulf',
        'telephoneOT',
        'other',
        'pPCEDSC',
        'jLGC_EMPCARD_GRADE',
        'mOBIRANGE',
        'national_Add_Remarks',
        'national_Add_STS',
        'license',
        'cARVALID',
        'last_resump_Laeve',
        'leave_Entitl_Days',
        'leave_Settled_Date',
        'available_Employee_Leaves',
        'flight_Ticket_Sector',
        'available_Employee_Leaves',
        'job_Expire',
        'last_Date_Flight_Ticket'
    ];

    public function calcJoiningYears($employee, $counter = 0)
    {
        //2022-04-01
        //2026-04-01
        $joiningDate = $employee->joiningDate;
        //2027-01-18
        $today = date('Y-m-d');
        $date11 = Carbon::parse($joiningDate);
        $joiningDate_day = $date11->day;
        $joiningDate_month = $date11->month;
        $date22 = Carbon::parse($today);
        $diff = $date11->diffInYears($date22);
        //2
        //0 => new employee.
        //1 => settled date.
        $diff -= $counter;
        //diff represent all years
        if ($date11 > $date22) {
            $newDate = $date11->addYears($diff);
            $newDate_joining_year = $newDate->year;
        } else {
            $newDate_joining_year = $date11->year;
        }
        $new_year_date = Carbon::create($newDate_joining_year, $joiningDate_month, $joiningDate_day);
       // dd($new_year_date);
        $add_new_year = 0;
        //Till
        if ($date11 > $date22) {
            $next_newDate = $date11->addYears($diff + 1);
            $next_newDate_joining_year = $next_newDate->year;
        } else {
            $next_newDate = $date11->addYears($diff);
            $next_newDate_joining_year = $date11->year;
        }
        $next_new_year_date = Carbon::create($next_newDate_joining_year, $joiningDate_month, $joiningDate_day);
        $next_direct_new_year_date = Carbon::create($next_newDate_joining_year, $joiningDate_month, $joiningDate_day);
        if ($diff > 0 && $next_new_year_date < $date22) {
            $employee->update([
                'leave_Settled_Date_generated' => $next_new_year_date
            ]);
        }
        return [
            'years_num' => $diff,
            'this_year' => [
                'day' => $joiningDate_day,
                'month' => $joiningDate_month,
                'year' => $newDate_joining_year,
                'date' => $new_year_date
            ],
            'next_year' => [
                'day' => $joiningDate_day,
                'month' => $joiningDate_month,
                'year' => $next_newDate_joining_year,
                'date' => $next_new_year_date
            ]
        ];
    }

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }

    public function kpi()
    {
        return $this->hasOne('App\Models\Kpi', 'Emp_Id');
    }


    public function welcome()
    {
        return $this->hasOne('App\Models\WelcomeNoteEmployee', 'emp_id');
    }

    public function welcomeRequest()
    {
        return $this->belongsTo(WelcomeNoteRequest::class, 'new_emp_request', 'id');
    }

    public function isHasPermission($permission)
    {
        if($permission == 'BookFlightTicket'){
            $permission = 'EmployeeRelation';
        }
        $permissions = UserPermission::where('permission', $permission)->where('employee_id', $this->id)->count();
        if ($permissions > 0) {
            return 1;
        } else {
            return 0;
        }

    }

}
