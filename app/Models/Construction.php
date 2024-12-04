<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;
    protected $primaryKey = 'construction_id';
    protected $table = 'constructions';
    protected $fillable = [
        'construction_name',
        'active_flg',
        'delete_flg',
    ];
    public function getCreatedAtAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }
}
