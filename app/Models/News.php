<?php

namespace App\Models;

use Carbon\Carbon;
use App\Traits\ViewCounter;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\App;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class News extends Model
{
    use HasFactory;
    use Sluggable;
    use ViewCounter;

    protected $table = 'news';
    protected $primaryKey = 'id';

    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
    protected $fillable = [
        'title',
        'slug',
        'content',
        'view',
        'user_id',
        'type',
        'active_flg',
        'delete_flg',
    ];
    public function getCreatedAtAttribute($value)
    {
        $carbon = Carbon::parse($value);
        $carbon->setLocale('vi');
        return $carbon->format('F j, Y');
    }
    public function getTypeAttribute($value)
    {
        return DB::table('news_types')->where('id', $value)->select('name')->first()->name;
    }
}
