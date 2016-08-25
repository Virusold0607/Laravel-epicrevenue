<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Postback extends Model
{
    protected $fillable = ['ch_slot', 'veri_slot', 'name'];
}
