<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Kpi extends Model
{
    protected $table ='kpi';
    protected $fillable = [
        'Evaluation1',
        'Evaluation2',

        'Objectives_No',
        'Objectives_Type',
        'Objectives_Objective',
        'Objectives_Results',
        'Objectives_Target',
        'Objectives_Weighting',
        'Objectives_Comments_Employee',
        'Objectives_Summary_Rating',

        'First_Approval',
        'Final_Approval',
        'Date',
        'Final_Date',
        'First_Date',

        'is_first_approval',
        'is_final_approval',

        'Review_Manager_Rating',
        'Review_Comments_Manager',
        'Development_Type',
        'Development_Level',
        'Development_Descripsion',
        'Development_Target',
        'Development_Cost',
        'First_Approval_Summary_Rating',
        'First_Approval_Remark',

        'Final_Summary_Rating',
        'Final_Approval_Remark',

        'Emp_Id',
        'manager_count',

        'Final_Admin_Rating',
        'Final_Admin__Remark',

        'Toty_Rating',

        'Admin_First_Approval',
        'Admin_Final_Approval',
        'Admin_Update',
        'Admin_Update_Date',
        'Admin_Update_Remark',
        'feedback',
        
        'Additional_role',
        'Additional_role_remark',
        'manager_additional_role',
        'manager_additional_role_remark'
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'Emp_Id');
    }
}







