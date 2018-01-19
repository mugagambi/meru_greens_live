<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Career extends Model
{
    protected $fillable = ['name', 'image', 'short_description', 'description', 'application_email', 'open'];
    protected $casts = [
        'open' => 'boolean'
    ];
}
