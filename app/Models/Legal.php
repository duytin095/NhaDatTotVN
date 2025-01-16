<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Legal extends Model
{
    use HasFactory;

    protected $table = 'legals';
    
    protected $fillable = [
        'name',
        'active_flg',
    ];
    
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function properties()
    {
        $properties = $this->hasMany(Property::class, 'property_type_id', 'id');
        return $properties;    
    }
}
