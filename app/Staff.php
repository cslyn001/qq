<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
    protected $fillable = [
        'user_id',
        'fname',
        'mname',
        'lname',
        'sname',
        'contact_num',
        'address',
        'city',
        'province',
        'region',
        'prof_pic',
        'department_id',
    ];

    protected $table = "staffs";
}
