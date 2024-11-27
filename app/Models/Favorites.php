<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Favorites extends Model
{
    protected $table = 'favorite_list';
    use HasFactory;
    protected $fillable = [
        'property_id',
        'user_id',
    ];

    public function scopeLatest($query)
    {
        return $query->orderBy('pivot_created_at', 'desc');
    }
}
