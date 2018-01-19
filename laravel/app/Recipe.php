<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Recipe extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'featured_image', 'description', 'product_id'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function product()
    {
        return $this->belongsTo('App\Product');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function ingredients()
    {
        return $this->hasMany('App\Ingredient');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function procedures()
    {
        return $this->hasMany('App\Procedure');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\RecipeImage');
    }
}
