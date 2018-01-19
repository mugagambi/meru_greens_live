<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Couresel extends Model
{
    protected $fillable = ['image', 'title', 'short_synopsis'];
    protected $table = 'couresels';
}
