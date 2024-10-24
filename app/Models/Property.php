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
        // THONG TIN CO BAN
        'property_type_id',
        'property_address',
        'property_address_number',
        'property_ward',
        'property_street',
        'property_district',
        'property_province',

        'construction',
        'property_facade',
        'property_depth',
        'property_acreage',
        'property_direction',
        'property_legal',
        'property_status',
        'property_price',

        // BAN DO
        'property_latitude',
        'property_longitude',

        // THONG TIN MO TA
        'property_name',
        'property_description',
        'property_image',

        // THONG TIN THEM
        'property_bedroom',
        'property_foor',
        'property_bathroom',
        'property_entry',
        'property_video_link',
        'property_video_type',


        'property_seller_id',
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
        return $this->belongsTo(User::class, 'property_seller_id', 'user_id');
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
}
