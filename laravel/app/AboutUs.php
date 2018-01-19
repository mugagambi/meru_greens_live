<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AboutUs extends Model
{
    protected $fillable = ['about_us', 'synopsis', 'mission', 'vision'];
    protected $table = 'about_uses';
}
