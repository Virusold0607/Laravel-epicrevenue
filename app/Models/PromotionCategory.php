<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PromotionCategory extends Model
{
    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
    ];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name'];


    /**
     * The promotions that belong to the promotion category.
     */
    public function promotions()
    {
        return $this->belongsToMany('App\Models\Promotion', 'promotion_category', 'promotion_id', 'category_id');
    }
    
}
