<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;
    protected $table = 'news';
    protected $primaryKey = 'id';
    protected $fillable = [
        'title',
        'slug',
        'content',
        'image',
        'view',
        'user_id',
        'type',
        'active_flg',
        'delete_flg',
    ];
}
