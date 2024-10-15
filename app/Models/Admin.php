<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable, HasApiTokens;
    
    protected $table = 'admin';
    protected $primaryKey = 'admin_id';
    protected $guarded = [];

    public function getAdminImageAttribute(){
        return json_decode($this->admin_avatar, true);
    }
}
