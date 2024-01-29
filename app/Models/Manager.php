<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Manager  extends Authenticatable
{
    use Notifiable;

    protected $guard = 'manager';
    protected $table ='managers';
    protected $fillable = [
        'name',
        'email',
        'password',
        'num',
        'phone',
        'department_id',
    ];
}
