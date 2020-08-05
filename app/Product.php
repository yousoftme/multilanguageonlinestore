<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    /**
     * The languages that belong to the product.
     */
    public function languages()
    {
        return $this->belongsToMany('App\Language', 'language_product', 'product_id', 'language_id');
    }
    
    /**
     * The colors that belong to the product.
     */
    public function colors()
    {
        return $this->belongsToMany('App\Color', 'color_product', 'product_id', 'color_id');
    }

    /**
     * The sizes that belong to the product.
     */
    public function sizes()
    {
        return $this->belongsToMany('App\Language', 'product_size', 'product_id', 'size_id');
    }

    /**
     * The memories that belong to the product.
     */
    public function memories()
    {
        return $this->belongsToMany('App\Language', 'memory_product', 'product_id', 'memory_id');
    }
}
