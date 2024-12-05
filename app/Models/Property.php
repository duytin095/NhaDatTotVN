<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use App\Models\Video\VideoEmbedStrategyFactory;
use App\Traits\ViewCounter;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Property extends Model
{
    use HasFactory;
    use Sluggable;
    use ViewCounter;

    protected $primaryKey = 'property_id';
    protected $table = 'properties';

    public function incrementPropertyView()
    {
        $this->incrementView('property_views');
    }

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'property_name'
            ]
        ];
    }
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

        // AUTO GEN
        'property_seller_id',
        'slug',
        'property_label',
        'created_at',
        'updated_at'
    ];

    public function type()
    {
        return $this->belongsTo(Type::class, 'property_type_id', 'property_type_id');
    }

    public function seller()
    {
        return $this->belongsTo(User::class, 'property_seller_id', 'user_id');
    }
    public function getLabelAttribute()
    {
        return config('constants.property-basic-info.property-labels')[$this->property_label];
    }
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function favoritedBy()
    {
        return $this->belongsToMany(User::class, 'favorite_list', 'property_id', 'user_id')->withTimestamps();
    }

    public function getPropertyImagesAttribute()
    {
        return json_decode($this->property_image, true);
    }

    public function getEmbeddedHtmlAttribute()
    {
        $url = $this->property_video_link;
        $platformId = $this->property_video_type;

        $factory = new VideoEmbedStrategyFactory();
        $strategy = $factory->getStrategy($platformId);

        $embeddedVideo = $strategy->getEmbeddedVideo($url);
        if ($platformId === YOUTUBE) {
            $embeddedVideo = '<iframe width="100%" height="315" src="' . $embeddedVideo . '" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" referrerpolicy="strict-origin-when-cross-origin" allowfullscreen></iframe>';
        }
        return $embeddedVideo;
    }


    public function getShorterFormattedPriceAttribute()
    {
        $unit = [
            'thousand' => 'N',
            'million' => 'Tr',
            'billion' => 'T'
        ];
        if ($this->property_price === 0) {
            return 'Thoản thuận';
        }
        if ($this->property_price < 1000) {
            return $this->property_price . ' ' . $unit["thousand"];
        }
        if ($this->property_price < 1000000) {
            $trieu = floor($this->property_price / 1000);
            $nghin = $this->property_price % 1000;

            if ($nghin === 0) {
                return $trieu . ' ' . $unit["million"];
            }

            return $trieu . ' ' . $unit["million"];
        }
        return 0;
    }

    public function getFormattedPriceAttribute($shortFormat = false)
    {
        $unit = [
            'thousand' => 'Nghìn',
            'million' => 'Triệu',
            'billion' => 'Tỷ'
        ];

        if ($this->property_price === 0) {
            return 'Thoản thuận';
        }

        if ($this->property_price < 1000) {
            return $this->property_price . ' ' . $unit["thousand"];
        }

        if ($this->property_price < 1000000) {
            $trieu = floor($this->property_price / 1000);
            $nghin = $this->property_price % 1000;

            if ($nghin === 0 || $shortFormat) {
                return $trieu . ' ' . $unit["million"];
            }

            return $trieu . ' ' . $unit["million"] . ' ' . $nghin . ' ' . $unit["thousand"];
        }

        $ty = floor($this->property_price / 1000000);
        $remainingValue = $this->property_price % 1000000;

        if ($remainingValue === 0 || $shortFormat) {
            return $ty . ' ' . $unit["billion"];
        }

        $trieu = floor($remainingValue / 1000);
        $nghin = $remainingValue % 1000;

        if ($shortFormat) {
            return $ty . ' ' . $unit["billion"];
        } elseif ($trieu === 0) {
            return $ty . ' ' . $unit["billion"] . ' ' . $nghin . ' ' . $unit["thousand"];
        } elseif ($nghin === 0) {
            return $ty . ' ' . $unit["billion"] . ' ' . $trieu . ' ' . $unit["million"];
        } else {
            return $ty . ' ' . $unit['billion'] . ' ' . $trieu . ' ' . $unit["million"] . ' ' . $nghin . ' ' . $unit["thousand"];
        }

        return $ty . ' ' . $unit['billion'] . ' ' . $trieu . ' ' . $unit["million"] . ' ' . $nghin . ' ' . $unit["thousand"];
    }

    public static function filterOptions()
    {
        return [
            'newest' => 'Mới nhất',
            'oldest' => 'Cũ nhất',
            
        ];
    }
    public function scopeNewest($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopeOldest($query)
    {
        return $query->orderBy('created_at', 'asc');
    }
}
