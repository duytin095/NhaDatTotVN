<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory;
    protected $primaryKey = 'property_type_id';
    protected $table = 'property_types';
    protected $fillable = [
        'property_type_name',
    ];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    public function scopeFilterCreatedAt($query, $value)
    {
        return $query->whereBetween('created_at', [
            Carbon::parse($value['start_date'])->format('Y-m-d H:i:s'),
            Carbon::parse($value['end_date'])->format('Y-m-d H:i:s'),
        ]);
    }
    
}
