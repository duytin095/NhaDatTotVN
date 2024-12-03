<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NewsType extends Model
{
    use HasFactory;

    protected $table = 'news_types';

    protected $fillable = [
        'name',
    ];
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }
}
