<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeImage extends Model
{
    protected $fillable = ['image', 'recipe_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function recipe()
    {
        return $this->belongsTo('App\Recipe');
    }
}
