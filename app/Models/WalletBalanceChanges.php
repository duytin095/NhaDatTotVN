<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WalletBalanceChanges extends Model
{
    use HasFactory;

    protected $table = 'wallet_balance_changes';

    protected $fillable = [
        'user_id',
        'wallet_id',
        'amount',
        'type',
        'status',
        'expired_at',
        'description',
    ];
}
