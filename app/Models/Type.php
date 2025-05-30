<?php

namespace App\Models;

use Carbon\Carbon;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Type extends Model
{
    use HasFactory, Sluggable;
    protected $primaryKey = 'property_type_id';
    protected $table = 'property_types';

    protected $fillable = [
        'property_type_name',
        'property_purpose_id',
        'slug',
        'property_type_image',
        'created_at',
        'updated_at',
        'active_flg',
        'deleted_flg'
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'property_type_name'
            ]
        ];
    }
    public function properties()
    {
        $properties = $this->hasMany(Property::class, 'property_type_id', 'property_type_id');
        return $properties;    
    }

    public function rootType()
    {
        return $this->belongsTo(RootType::class, 'property_purpose_id', 'id');
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    
    public function getTypeImageAttribute()
    {
        return json_decode($this->property_type_image, true);
    }
}
