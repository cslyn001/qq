<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentSeminar extends Model
{
    protected $fillable = [
    'user_id',
    'title',
    'venue',
    'date_given',
    'type',
    'attachment_file',

];

protected $table = "student_seminars";

}
