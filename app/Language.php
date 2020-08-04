<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    //

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];
    
    /**
     * The products that belong to the Language.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'language_product', 'language_id', 'product_id');
    }
}
