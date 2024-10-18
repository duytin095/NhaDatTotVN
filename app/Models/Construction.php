<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Construction extends Model
{
    use HasFactory;
    protected $primaryKey = 'construction_id';
    protected $table = 'constructions';
    protected $fillable = [
        'construction_name',
    ];
}
