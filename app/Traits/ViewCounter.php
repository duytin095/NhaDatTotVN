<?php

namespace App\Traits;

trait ViewCounter
{
    public function incrementView($columnName)
    {
        $this->{$columnName}++;
        $this->save();
    }
}
