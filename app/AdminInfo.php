<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AdminInfo extends Model
{
    protected $fillable = [
        'user_id',
        'fname',
        'mname',
        'lname',
        'sname',
        'contact_num',
        'email',
        'address',
        'city',
        'province',
        'region',
        'bio',
        'birthday',
        'sex',
        'prof_pic',
        'student_id_number',
    ];

    protected $table = "admin_info";
}
