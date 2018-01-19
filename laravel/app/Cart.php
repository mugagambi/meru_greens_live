<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    protected $fillable = ['user_id', 'product_id', 'quantity', 'added_on'];
    protected $dates = ['added_on'];

    public function product()
    {
        return $this->belongsTo('App\Product');
    }
    public function users()
    {
        return $this->belongsTo('App\User');
    }
}
