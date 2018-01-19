<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    protected $fillable = [
        'pic', 'job_title', 'name', 'about', 'facebook', 'twitter'
    ];
}
