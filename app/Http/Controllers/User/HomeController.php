<?php

namespace App\Http\Controllers\User;

use App\Models\Type;
use App\Models\User;
use App\Models\Status;
use App\Models\Property;
use App\Http\Controllers\Controller;
use App\Models\News;
use App\Models\RootType;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        try {
            $types = Type::where('active_flg', ACTIVE)->withCount('properties')->take(8)->get();
            $statuses = Status::all()->toArray();
            $root_types = RootType::all()->toArray();
            $labels = config('constants.property-basic-info.property-labels');
            $agents = User::where('active_flg', ACTIVE)->take(4)->get();
            $typesByPurpose = Type::with('properties')->get()->groupBy('property_purpose_id');


            $userCount = User::count();
            $sellCount = Property::leftJoin('property_types', 'properties.property_type_id', '=', 'property_types.property_type_id')
                ->where('property_types.property_purpose_id', FOR_SELL)
                ->where('properties.delete_flg', ACTIVE)
                ->where('properties.active_flg', ACTIVE)
                ->count();
            $rentCount = Property::leftJoin('property_types', 'properties.property_type_id', '=', 'property_types.property_type_id')
                ->where('properties.delete_flg', ACTIVE)
                ->where('properties.active_flg', ACTIVE)

                ->where('property_types.property_purpose_id', FOR_RENT)
                ->count();
            $investCount = Property::leftJoin('property_types', 'properties.property_type_id', '=', 'property_types.property_type_id')
                ->where('properties.delete_flg', ACTIVE)
                ->where('properties.active_flg', ACTIVE)
                ->where('property_types.property_purpose_id', FOR_INVEST)
                ->count();


            $latestProperties = Property::latest()
                ->where('delete_flg', ACTIVE)
                ->where('active_flg', ACTIVE)
                ->with(['favoritedBy' => function ($query) {
                    if (Auth::guard('users')->check()) {
                        $query->where('favorite_list.user_id', Auth::guard('users')->user()->user_id);
                    }
                }])
                ->take(6)->get();

            // Change property_purpose_id for what you like to show
            $propertiesForInvest = Property::latest()
                ->where('delete_flg', ACTIVE)
                ->where('active_flg', ACTIVE)
                ->with(['favoritedBy' => function ($query) {
                    if (Auth::guard('users')->check()) {
                        $query->where('favorite_list.user_id', Auth::guard('users')->user()->user_id);
                    }
                }])
                ->take(6)->get();


            // Change property_purpose_id for what you like to show
            $propertiesForSale = Property::latest()
                ->where('delete_flg', ACTIVE)
                ->where('active_flg', ACTIVE)
                ->with(['favoritedBy' => function ($query) {
                    if (Auth::guard('users')->check()) {
                        $query->where('favorite_list.user_id', Auth::guard('users')->user()->user_id);
                    }
                }])
                ->take(6)->get();


            $news = News::where('active_flg', ACTIVE)
                ->whereHas('type', function ($query) {
                    $query->where('active_flg', ACTIVE);
                })
                ->latest()->take(6)->get();
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
                    'root_types',
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
