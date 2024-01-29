<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class UserPermission extends Authenticatable
{
    use Notifiable;
    protected $guarded=[];

    public function employee(){
        return $this->belongsTo(Employee::class,'employee_id');
    }
}
