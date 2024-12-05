<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Cviebrock\EloquentSluggable\Sluggable;

class NewsType extends Model
{
    use HasFactory;
    use Sluggable;

    protected $table = 'news_types';

    protected $fillable = [
        'name',
        'slug',
        'created_at',
        'updated_at',
        'active_flg',
        'delete_flg',
    ];
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }
}
