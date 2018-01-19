<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Procedure extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['recipe_id', 'procedure'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
