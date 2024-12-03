<?php

namespace App\Models;

use DOMDocument;
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

    public function incrementNewsViews()
    {
        $this->incrementView('view');
    }

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

    public function getThumbnailAttribute()
    {
        libxml_use_internal_errors(true);
        $dom = new DOMDocument();
        $dom->loadHTML($this->content);
        libxml_clear_errors();

        $images = $dom->getElementsByTagName('img');
        if ($images->length > 0) {
            return $images->item(0)->getAttribute('src');
        }
        return null;
    }
    public function getAuthorAttribute()
    {
        return DB::table('admin')->where('admin_id', $this->user_id)->select('admin_name')->first()->admin_name;
    }
    public function getAuthorAvatarAttribute()
    {
        $avatar = DB::table('admin')->where('admin_id', $this->user_id)->select('admin_avatar')->first();
        return $avatar->admin_avatar;
    }
}
