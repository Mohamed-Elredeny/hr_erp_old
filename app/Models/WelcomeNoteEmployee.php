<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class WelcomeNoteEmployee extends Model
{
    protected $table ='welcome_note_employee';
    protected $fillable = [
        'id',
        'emp_id',
    ];

    public function employee()
    {
        return $this->belongsTo('App\Models\Employee', 'emp_id');
    }
}
