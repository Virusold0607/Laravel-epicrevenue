<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomepageFeaturedCampaign extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['campaign_id'];


    /**
     * Get the campaign record associated with the current record.
     */
    public function campaign()
    {
        return $this->hasOne(\App\Models\Campaign::class, 'id', 'campaign_id');
    }
}
