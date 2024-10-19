<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;
    protected $primaryKey = 'property_id';
    protected $table = 'properties';
    protected $fillable = [
        'property_name',
        'property_type_id',
        'property_status_id',
        'property_purpose_id',
        'property_price',
        'property_acreage',
        'property_description',
        'property_address',
        'property_street',
        'property_district',
        'property_province',
        'property_image',
        'property_video',
        'property_seller_id',
        'property_latitude',
        'property_longitude',
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'property_type_id', 'property_type_id');
    }

    public function status()
    {
        return $this->belongsTo(Status::class, 'property_status_id', 'property_status_id');
    }
    public function seller(){
        return $this->belongsTo(Admin::class, 'property_seller_id', 'admin_id');
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getPropertyImagesAttribute()
    {
        return json_decode($this->property_image, true);
    }
    public function getPropertyVideosAttribute()
    {
        return json_decode($this->property_video, true);
    }
    public function getPropertyPurposeNameAttribute()
    {
        return config('constants.property-basic-info.property-purpose')[$this->property_purpose_id];
    }
}
