<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class InstagramAccount extends Model
{
    protected $table = 'instagram_accounts';

    protected $fillable = ['user_id', 'access_token', 'instagram_id', 'username', 'full_name', 'profile_picture', 'bio', 'website', 'followed_by', 'follows'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'instagram_id' => 'integer',
        'id' => 'integer',
    ];


    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the follow details for the instagram account.
     */
    public function follow()
    {
        return $this->hasMany('App\Models\InstagramAccountFollower', 'instagram_id', 'instagram_id');
    }

    /**
     * Get the follow details for the instagram account.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\InstagramAccountPost', 'instagram_id', 'instagram_id');
    }

    /**
     * The influencers that belong to the promotion.
     */
    public function promotions()
    {
        return $this->belongsToMany('App\Models\Promotion', 'promotion_influencer', 'instagram_account_id', 'promotion_id');
    }
}
