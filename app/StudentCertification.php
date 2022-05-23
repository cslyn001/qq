<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentCertification extends Model
{


protected $fillable = [
        'user_id',
        'cert_name',
        'cert_author',
        'cert_address',
        'date_give',
        'attachment_file',
        'expiration',
    ];

    protected $table = "student_certifications";


}
