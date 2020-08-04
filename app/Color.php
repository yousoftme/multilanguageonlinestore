<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Color extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'code'];
    /**
     * The products that belong to the Color.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'color_product', 'color_id', 'product_id');
    }
}
