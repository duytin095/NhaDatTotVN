<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PricingPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration', // e.g. 'daily', 'weekly', 'monthly'
        'features', // e.g. ' vip', 'priority_support'
    ];
}
