<?php

namespace App\Traits;

trait ViewCounter
{
    // public function incrementViews()
    // {
    //     $this->property_views++;
    //     $this->save();
    // }

    public function incrementView($columnName)
    {
        $this->{$columnName}++;
        $this->save();
    }
}
