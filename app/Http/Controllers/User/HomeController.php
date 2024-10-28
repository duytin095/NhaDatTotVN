<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Models\Status;
use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Models\User;

class HomeController extends Controller
{
    public function index()
    {
        $types = Type::withCount('properties')->take(8)->get();
        $statuses = Status::all()->toArray();
        $purposes = config('constants.property-basic-info.property-purpose');
        $labels = config('constants.property-basic-info.property-labels');
        $agents = User::take(4)->get();

        $userCount = User::count();
        $sellCount = Property::leftJoin('property_types', 'properties.property_type_id', '=', 'property_types.property_type_id')
            ->where('property_types.property_purpose_id', FOR_SELL)
            ->count();
        $rentCount = Property::leftJoin('property_types', 'properties.property_type_id', '=', 'property_types.property_type_id')
            ->where('property_types.property_purpose_id', FOR_RENT)
            ->count();
        $investCount = Property::leftJoin('property_types', 'properties.property_type_id', '=', 'property_types.property_type_id')
            ->where('property_types.property_purpose_id', FOR_INVEST)
            ->count();


        $latestProperties = Property::latest()
            ->with(['seller', 'status', 'type'])
            ->take(6)->get();

        // Change property_purpose_id for what you like to show
        $propertiesForInvest = Property::latest()
            ->with(['seller', 'status', 'type'])
            ->take(6)->get();
        // Property::join('property_types', 'properties.property_type_id', '=', 'property_types.property_type_id')
        // ->where('property_types.property_purpose_id', 1)
        // ->with(['seller', 'status', 'type'])
        // ->take(5)->get();

        // Change property_purpose_id for what you like to show
        $propertiesForSale = Property::latest()
            ->with(['seller', 'status', 'type'])
            ->take(6)->get();
        // Property::join('property_types', 'properties.property_type_id', '=', 'property_types.property_type_id')
        // ->where('property_types.property_purpose_id', 1)
        // ->with(['seller', 'status', 'type'])
        // ->take(5)->get();

        return view(
            'user.home',
            compact(
                'latestProperties',
                'propertiesForInvest',
                'propertiesForSale',
                'types',
                'statuses',
                'purposes',
                'agents',
                'userCount',
                'sellCount',
                'rentCount',
                'investCount',
            )
        );
    }
}
