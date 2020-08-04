<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Size extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['inches'];
    /**
     * The products that belong to the Size.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'product_size', 'size_id', 'product_id');
    }
}
