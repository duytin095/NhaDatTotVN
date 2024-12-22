<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Wallet extends Model
{
    use HasFactory;

    protected $table = 'wallet';
    protected $primaryKey = 'id';

    protected $fillable = [
        'user_id',
        'balance',
        'created_at',
        'updated_at'
    ];

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    public function setUserAttribute($value)
    {
        $this->attributes['user_id'] = $value ?: auth()->id();
    }
}
