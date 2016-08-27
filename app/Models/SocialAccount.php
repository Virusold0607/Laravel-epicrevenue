<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SocialAccount extends Model
{
    protected $table = 'social_accounts';

    protected $fillable = ['user_id', 'access_token', 'account_id', 'username', 'name', 'profile_picture', 'bio', 'website', 'followed_by', 'follows'];

    protected $hidden = ['access_token'];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'account_id' => 'integer',
        'id' => 'integer',
        'followed_by' => 'integer',
        'follows' => 'integer',
    ];


    public function user(){
        return $this->belongsTo('App\User', 'user_id');
    }

    /**
     * Get the follow details for the instagram account.
     */
    public function follow()
    {
        return $this->hasMany('App\Models\SocialAccountFollower', 'account_id', 'account_id');
    }

    /**
     * Get the follow details for the instagram account.
     */
    public function posts()
    {
        return $this->hasMany('App\Models\SocialAccountPost', 'account_id', 'account_id');
    }

    /**
     * The influencers that belong to the promotion.
     */
    public function promotions()
    {
        return $this->belongsToMany('App\Models\Promotion', 'promotion_influencer', 'instagram_account_id', 'promotion_id');
    }
}
