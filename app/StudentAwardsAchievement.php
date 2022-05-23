<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class StudentAwardsAchievement extends Model
{
    protected $fillable = [
        'user_id',
        'title',
        'description',
        'issuer',
        'type',
        'venue',
        'date_given',
        'attachment_filename',
    ];

    protected $table = "student_awards_achievements";
    
    
    
}
