<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\Village;

class LocationController extends Controller
{
    public function provinces()
    {
        return response()->json([
            'provinces' => Province::all()
        ]);
    }

    public function cities($province_id)
    {
        return response()->json([
            'cities' => City::where('province_id', $province_id)->get()
        ]);
    }

    public function districts($city_id)
    {
        return response()->json([
            'districts' => District::where('city_id', $city_id)->get()
        ]);
    }

    public function villages($district_id)
    {
        return response()->json([
            'villages' => Village::where('district_id', $district_id)->get()
        ]);
    }
}
