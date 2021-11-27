<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\VehicleType;
use App\Traits\GoogleMapApiTrait;
use App\Traits\TaxiTrait;
use Illuminate\Http\Request;

class VehicleTypeController extends Controller
{

    use GoogleMapApiTrait, TaxiTrait;
    public function index()
    {
        return VehicleType::active()->get();
    }


    //using this to 
    public function calculateFee(Request $request)
    {
        //
        $vehicleTypes = VehicleType::active()->get();
        //
        $vehicleTypes = $vehicleTypes->map(function ($vehicleType, $key) use ($request) {
            $vehicleType->total = $this->getTaxiOrderTotalPrice($vehicleType,$request->pickup, $request->dropoff );
            return $vehicleType;
        });
        return $vehicleTypes;
    }
}
