<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BonusTier extends Model
{
    protected $table = 'bonus_tiers';

    protected $fillable = ['min_amount', 'max_amount', 'percentage'];
}
