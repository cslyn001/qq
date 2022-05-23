<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentOrganization extends Model
{
    protected $fillable = [
        'user_id',
        'org_name',
        'org_associated_with',
        'position',
        'start_date',
        'end_date',
    ];

    protected $table = "student_organization";
}
