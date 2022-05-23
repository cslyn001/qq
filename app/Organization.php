<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Organization extends Model
{
    protected $fillable = [
        'org_name',
        'org_code',
        'org_associated_with',
    ];
}
