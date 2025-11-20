<?php

namespace App\Http\Controllers;

use App\Models\Province;
use App\Models\City;
use App\Models\District;
use App\Models\Village;

class LocationController extends Controller
{
    public function getProvinces()
    {
        return response()->json([
            'provinces' => Province::all()
        ]);
    }

    public function getCities($province_id)
    {
        return response()->json([
            'cities' => City::where('province_id', $province_id)->get()
        ]);
    }

    public function getDistricts($city_id)
    {
        return response()->json([
            'districts' => District::where('city_id', $city_id)->get()
        ]);
    }

    public function getVillages($district_id)
    {
        return response()->json([
            'villages' => Village::where('district_id', $district_id)->get()
        ]);
    }
}
