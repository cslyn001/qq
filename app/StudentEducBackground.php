<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentEducBackground extends Model
{
    protected $fillable = [
        'user_id',
        "educ_level",
        "institution_name",
        "institution_address",
        "degree",
        "from",
        "to",
        "privacy_type"
    ];

    protected $table = "student_educ_backgrounds"; //tbl name
}
