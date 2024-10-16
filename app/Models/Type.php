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
        'property_purpose_id'
    ];
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    public function getPurposeNameAttribute(){
        return config('constants.property-purpose.property-purpose')[$this->property_purpose_id];
    }
    
}
