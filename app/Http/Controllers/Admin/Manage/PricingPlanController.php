<?php

namespace App\Http\Controllers\Admin\Manage;

use App\Helpers\ApiResponse;
use App\Models\PricingPlan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;

class PricingPlanController extends Controller
{
    public function index()
    {
        $active_flg = ACTIVE;
        return view('admin.manage.pricing-plan.index', compact('active_flg'));
    }

    public function create()
    {
        return view('admin.manage.pricing-plan.create');
    }

    public function get()
    {
        try {
            $pricing_plans = PricingPlan::orderBy('created_at', 'desc')
                ->where('delete_flg', INACTIVE)
                ->get()->toArray();
            return response()->json([
                'status' => 200,
                'data' => $pricing_plans,
            ]);
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    public function store(Request $request)
    {
        try {
            $request->validate([
                'name' => 'required',
                'daily_fee' => 'required',
                'weekly_fee' => 'required',
                'monthly_fee' => 'required',
                'color' => 'required',
                'font_type' => 'required',
                'phone_display' => 'required',
                'auto_approve' => 'required',
            ], [
                'name.required' => 'Tên gói không được để trống',
                'daily_fee.required' => 'Phí ngày không được để trống',
                'weekly_fee.required' => 'Phí tuần không được để trống',
                'monthly_fee.required' => 'Phí tháng không được seksi trONGL',
                'color.required' => 'Chọn màu',
                'font_type.required' => 'Chọn kiểu chữ',
                'phone_display.required' => 'Chọn có hiển thị số điện thoại hay không',
                'auto_approve.required' => 'Chọn có tự động duyệt hay không',
            ]);

            DB::beginTransaction();
            $pricingPlan = new PricingPlan();
            $pricingPlan->name = $request->input('name');
            $pricingPlan->daily_fee = floatval($request->input('daily_fee'));
            $pricingPlan->weekly_fee = floatval($request->input('weekly_fee'));
            $pricingPlan->monthly_fee = floatval($request->input('monthly_fee'));
            $pricingPlan->color = $request->input('color');
            $pricingPlan->font_type = $request->input('font_type');
            $pricingPlan->phone_display = $request->input('phone_display');
            $pricingPlan->auto_approve = $request->input('auto_approve');
            $pricingPlan->save();
            
            DB::commit();
            return ApiResponse::createSuccessResponse('/admin/pricing-plans');
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    public function toggleActive(string $id)
    {
        try {
            DB::beginTransaction();
            $plan = PricingPlan::where('id', $id)->firstOrFail();
            $plan->update([
                'active_flg' => $plan->active_flg == ACTIVE ? INACTIVE : ACTIVE
            ]);
            DB::commit();
            return ApiResponse::updateSuccessResponse();
        }catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }


    public function show(string $id)
    {
        //
    }

    public function edit(string $id)
    {
        try {
            $pricingPlan = PricingPlan::findOrFail($id);
            return view('admin.manage.pricing-plan.edit', compact('pricingPlan'));
        } catch (\Throwable $th) {
            return ApiResponse::errorResponse($th);
        }
    }

    public function update(Request $request, string $id)
    {
        try {
            $request->validate([
                'name' => 'required',
                'daily_fee' => 'required',
                'weekly_fee' => 'required',
                'monthly_fee' => 'required',
                'color' => 'required',
                'font_type' => 'required',
                'phone_display' => 'required',
                'auto_approve' => 'required',
            ], [
                'name.required' => 'Tên gói không được để trống',
                'daily_fee.required' => 'Phí ngày không được để trống',
                'weekly_fee.required' => 'Phí tuần không được để trống',
                'monthly_fee.required' => 'Phí tháng không được để trống',
                'color.required' => 'Chọn màu',
                'font_type.required' => 'Chọn kiểu chữ',
                'phone_display.required' => 'Chọn có hiển thị số điện thoại hay không',
                'auto_approve.required' => 'Chọn có tự động duyệt hay không',
            ]);
            DB::beginTransaction();
            $pricingPlan = PricingPlan::findOrFail($id);
            $pricingPlan->name = $request->input('name');
            $pricingPlan->daily_fee = floatval($request->input('daily_fee'));
            $pricingPlan->weekly_fee = floatval($request->input('weekly_fee'));
            $pricingPlan->monthly_fee = floatval($request->input('monthly_fee'));
            $pricingPlan->color = $request->input('color');
            $pricingPlan->font_type = $request->input('font_type');
            $pricingPlan->phone_display = $request->input('phone_display');
            $pricingPlan->auto_approve = $request->input('auto_approve');
            $pricingPlan->save();
            DB::commit();
    
            return ApiResponse::updateSuccessResponse();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }

    public function delete(string $id)
    {
        try {
            DB::beginTransaction();
            $pricingPlan = PricingPlan::findOrFail($id);
            $pricingPlan->delete_flg = ACTIVE;
            $pricingPlan->save();
            DB::commit();
            return ApiResponse::deleteSuccessResponse();
        } catch (\Throwable $th) {
            DB::rollBack();
            return ApiResponse::errorResponse($th);
        }
    }
}
