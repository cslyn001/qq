<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class FacultyInfo extends Model
{
    protected $fillable = [
        'user_id',
        'fname',
        'mname',
        'lname',
        'sname',
        'contact_num',
        'address',
        'birthday',
        'sex',
        'prof_pic',

    ];

}
