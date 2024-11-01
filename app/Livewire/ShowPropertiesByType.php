<?php

namespace App\Livewire;

use App\Models\Type;
use Livewire\Component;
use App\Models\Property;
use App\Services\UserBreadcrumbService;

class ShowPropertiesByType extends Component
{
    public $breadcrumbs;
    public $filterOptions;
    public $selectedFilter;
    public $type;
    public $types;

    public function getProperties()
    {
        return $this->type->properties()->paginate(10);
    }

    public function mount($slug)
    {
        $this->type = Type::where('slug', $slug)->firstOrFail();
        $this->types = Type::where('property_purpose_id', $this->type->property_purpose_id)->withCount('properties')->get();
        $this->filterOptions = Property::filterOptions();
        $this->selectedFilter = 'newest';
    }

    public function render()
    {
        return view('livewire.show-properties-by-type', [
            'properties' => $this->getProperties()
        ]);
    }
}
