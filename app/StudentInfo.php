<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentInfo extends Model
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
        'bio',
        'birthday',
        'sex',
        'prof_pic',
        'status',
        'student_id_number',
        'email',
        'attachment_filename',
        'objective',
        'signature',
    ];

    protected $table = "student_info";
}
