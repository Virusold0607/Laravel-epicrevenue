<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class PaymentDetail extends Model
{
    protected $fillable = array('method', 'send_to', 'threshold');

    /**
     * Get the user who own this record.
     */
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
