<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PricingPlan extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration', // e.g. 'daily', 'weekly', 'monthly'
        'features', // e.g. ' vip', 'priority_support'

        'daily_fee',
        'weekly_fee',
        'monthly_fee',
        'color',
        'phone_display',
        'auto_approve',
        
        'active_flg',
    ];
    public function users(){
        return $this->hasMany(User::class);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
}
