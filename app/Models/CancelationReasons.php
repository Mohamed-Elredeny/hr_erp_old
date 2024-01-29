<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CancelationReasons extends Model
{
    protected $table ='cancelation_reasons';
    protected $fillable = [
        'id',
        'emp_id',
        'date',
        'reason',
        'specify',
        'type',
        'cancelation_emp',
        'updated_at',
        'created_at',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'cancelation_emp');
    }
}
