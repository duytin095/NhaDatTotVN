<?php

namespace App\Services;

class UserBreadcrumbService
{
    private $breadcrumbs = [];

    public function addCrumb($label, $url = null)
    {
        $this->breadcrumbs[] = [
            'label' => $label,
            'url' => $url,
        ];
    }

    public function getBreadcrumbs()
    {
        return $this->breadcrumbs;
    }
}
