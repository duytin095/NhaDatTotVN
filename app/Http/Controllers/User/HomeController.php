<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Models\User;
use App\Models\Status;
use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $types = Type::withCount('properties')->take(8)->get();
            $statuses = Status::all()->toArray();
            $purposes = config('constants.property-basic-info.property-purposes');
            $labels = config('constants.property-basic-info.property-labels');
            $agents = User::take(4)->get();
            $typesByPurpose = Type::with('properties')->get()->groupBy('property_purpose_id');


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
                ->with(['favoritedBy' => function ($query) {
                    if (Auth::guard('users')->check()) {
                        $query->where('favorite_list.user_id', Auth::guard('users')->user()->user_id);
                    }
                }])
                ->take(6)->get();

            // Change property_purpose_id for what you like to show
            $propertiesForInvest = Property::latest()
                ->with(['favoritedBy' => function ($query) {
                    if (Auth::guard('users')->check()) {
                        $query->where('favorite_list.user_id', Auth::guard('users')->user()->user_id);
                    }
                }])
                ->take(6)->get();
            // Property::join('property_types', 'properties.property_type_id', '=', 'property_types.property_type_id')
            // ->where('property_types.property_purpose_id', 1)
            // ->with(['seller', 'status', 'type'])
            // ->take(5)->get();

            // Change property_purpose_id for what you like to show
            $propertiesForSale = Property::latest()
                ->with(['favoritedBy' => function ($query) {
                    if (Auth::guard('users')->check()) {
                        $query->where('favorite_list.user_id', Auth::guard('users')->user()->user_id);
                    }
                }])
                ->take(6)->get();
            // Property::join('property_types', 'properties.property_type_id', '=', 'property_types.property_type_id')
            // ->where('property_types.property_purpose_id', 1)
            // ->with(['seller', 'status', 'type'])
            // ->take(5)->get();

            $news = News::latest()->take(3)->get();
            // dd($news);

            return view(
                'user.home',
                compact(
                    'latestProperties',
                    'propertiesForInvest',
                    'propertiesForSale',
                    'types',
                    'typesByPurpose',
                    'statuses',
                    'purposes',
                    'agents',
                    'userCount',
                    'sellCount',
                    'rentCount',
                    'investCount',
                    'news'
                )
            );
        } catch (\Throwable $th) {
            if (config('app.debug')) {
                return response()->json([
                    'status' => 500,
                    'message' => $th->getMessage(),
                ]);
            }
            abort(500, $th->getMessage());
        }
    }
}
