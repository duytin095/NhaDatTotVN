<?php

namespace App\Http\Controllers\User;

use App\Helpers\SePay;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Wallet;
use App\Services\UserBreadcrumbService;

class WalletController extends Controller
{
    private $breadcrumbService;
    public function __construct(UserBreadcrumbService $breadcrumbService)
    {
        $this->breadcrumbService = $breadcrumbService;
    }
    
    public function index()
    {
        $this->breadcrumbService->addCrumb('Trang chủ', '/user/home');
        $this->breadcrumbService->addCrumb('Ví tiền');
        $wallet = Wallet::firstOrCreate(
            ['user_id' => auth()->id()],
            ['balance' => 0]
        );
        return view('user.wallet.index')
            ->with('wallet', $wallet)
            ->with('breadcrumbs', $this->breadcrumbService->getBreadcrumbs());
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    public function recharge(Request $request){
        try {
            
            return response()->json([
                'status' => 200,
                'message' => 'success',
                'data' => $request->all()
            ]);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
