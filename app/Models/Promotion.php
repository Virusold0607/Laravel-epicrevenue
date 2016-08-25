<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Promotion extends Model
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
    protected $fillable = ['status','name', 'description','url', 'ages', 'featured_img'];


	/**
	 * The influencers that belong to the promotion.
	 */
	public function influencers()
	{
		return $this->belongsToMany('App\Models\InstagramAccount', 'promotion_influencer', 'promotion_id', 'instagram_account_id')->withTimestamps();
	}

	/**
	 * The categories that belong to the promotion.
	 */
	public function categories()
	{
		return $this->belongsToMany('App\Models\PromotionCategory', 'promotion_category', 'promotion_id', 'category_id')->withTimestamps();
	}
}
