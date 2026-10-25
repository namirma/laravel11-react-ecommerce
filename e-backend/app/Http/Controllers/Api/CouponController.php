<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Coupon;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CouponController extends Controller
{
    /*
     * Apply Coupon
     * */

    public function applyCoupon(Request $request): JsonResponse
    {
        $coupon =Coupon::whereName($request->name)->first();
        if ($coupon && $coupon->checkifValid()){
            return response()->json([
               'message' => 'Coupon Applied Successfully',
                'coupon' => $coupon
            ]);
        }else{
            return response()->json([
                'error' => 'Coupon Not Applied',
            ]);
        }
    }
}
