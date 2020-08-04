<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Memory extends Model
{
    //
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['ram', 'hard_drive'];
    /**
     * The products that belong to the Memory.
     */
    public function products()
    {
        return $this->belongsToMany('App\Product', 'memory_product', 'memory_id', 'product_id');
    }
}
