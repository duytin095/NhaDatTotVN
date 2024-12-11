<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Carbon\Carbon;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Notifications\Notifiable;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable, Sluggable;

    protected $table = 'users';
    protected $primaryKey = 'user_id';
    protected $guarded = [];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'user_name'
            ]
        ];
    }
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'user_name',
        'email',
        'user_phone',
        'user_avatar',
        'password',
        'owner_referral_code',
        'referral_code',

        'active_flg',
        'delete_flg',
        'created_at',
        'updated_at'
    ];

    public function properties()
    {
        return $this->hasMany(Property::class, 'property_seller_id', 'user_id');
    }
    
    public function getUserImageAttribute()
    {
        return json_decode($this->user_avatar, true);
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }

    public function favorites(): BelongsToMany{
        return $this->belongsToMany(Property::class, 'favorite_list', 'user_id', 'property_id')
            ->withTimestamps();
    }

    public function watched_posts(): HasMany
    {
        return $this->hasMany(WatchedPost::class, 'user_id', 'user_id');
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
    ];
}
