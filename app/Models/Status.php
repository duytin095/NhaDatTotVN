<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Status extends Model
{
    use HasFactory;
    protected $primaryKey = 'property_status_id';
    protected $table = 'property_statuses';
    protected $fillable = [
        'property_status_name',
    ];
}
