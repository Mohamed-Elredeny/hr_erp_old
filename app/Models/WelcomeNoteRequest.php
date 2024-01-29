<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WelcomeNoteRequest extends Model
{
    protected $table ='welcome_notes_requests';
    protected $guarded=[];

    public function employeeSender()
    {
        return $this->belongsTo('App\Models\Employee', 'emp_sender_request');
    }
    public function employeeReceiver()
    {
        return $this->belongsTo('App\Models\Employee', 'emp_receiver_request');
    }
    public function newemployee()
    {
        return $this->belongsTo(Employee::class,'new_emp_request');

    }

}
