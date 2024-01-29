<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Certificate extends Model
{
    protected $table ='certificates';
    protected $fillable = [
        'Emp_Id',
        'id',
        'type',
        'remark',
        'salary',
        'date_submit',
        'state',
        'embassy',
        'prepared_date',
        'prepared_name',
        'prepared_remark',
        'chicking_date',
        'chicking_name',
        'chicking_remark',
        'review_date',
        'review_name',
        'review_remark',
        'approval_date',
        'approval_remark',
        'ref'
        ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'Emp_Id');
    }
}
