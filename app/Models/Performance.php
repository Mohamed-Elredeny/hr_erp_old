<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Performance  extends Authenticatable
{
    use Notifiable;

    protected $guard = 'performance';
    protected $table ='performance';
    protected $fillable = [
        'name',
        'email',
        'password',
        'num',
        'phone',
    ];
}
