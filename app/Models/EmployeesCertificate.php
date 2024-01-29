<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class EmployeesCertificate extends Model
{
    protected $table = 'employees_certificate';

    protected $fillable = [
        'id',
        'EmpCode',
        'EmpName',
        'Nationality',
        'Designation',
        'ProjectDepartmentName',
        'ProjectDepartmentNumber',
        'BirthDate',
        'Passport',
        'EmplAcco',
        'ArabicName',
        'ArabicJobTitle',
        'ArabicNationality',
        'Visa',
        'Gender',
        'JoiningDate',
        'TotalSalary',
        'company_id'
    ];

    public function company()
    {
        return $this->belongsTo('App\Models\Company', 'company_id');
    }
}
