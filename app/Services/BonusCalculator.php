<?php

namespace App\Services;

use App\Models\BonusTier;

class BonusCalculator
{
    public function calculateBonus($depositAmount)
    {
        $bonusTier = BonusTier::where('min_amount', '<=', $depositAmount)
            ->where('max_amount', '>=', $depositAmount)
            ->first();

        if ($bonusTier) {
            return $depositAmount * ($bonusTier->percentage / 100);
        }

        return 0;
    }
}
