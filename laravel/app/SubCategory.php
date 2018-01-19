<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    /**
     * @var array
     */
    protected $fillable = ['name', 'pic', 'category'];

    /**
     * products in this sub category
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function products()
    {
        return $this->hasMany('App\Product', 'subcategory_id');
    }
}
