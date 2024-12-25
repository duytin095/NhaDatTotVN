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

    public function deductBalance($amount)
    {
        $this->balance -= $amount;
        $this->save();
    }

    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('d-m-Y');
    }
    public function setUserAttribute($value)
    {
        $this->attributes['user_id'] = $value ?: auth()->id();
    }
    public function balanceChanges()
    {
        return $this->hasMany(WalletBalanceChanges::class, 'wallet_id', 'id')->orderBy('created_at', 'desc');
    }
}
