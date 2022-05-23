<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSkills extends Model
{
    protected $fillable = [
        'user_id',
        'skills'
    ];

    protected $table = "student_skills";
}
