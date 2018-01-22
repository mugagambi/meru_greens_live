<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public static function boot()
    {
        parent::boot();

        static::saving(function ($model) {
            $string = $model->name . '-' . time();
            $model->slug = str_slug($string);
        });
    }

    /**
     * @var array
     */
    protected $fillable = ['name', 'description', 'category'];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function images()
    {
        return $this->hasMany('App\ProductImage');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function recipes()
    {
        return $this->hasMany('App\Recipe');
    }

    public function carts()
    {
        return $this->hasMany('App\Cart');
    }
}
