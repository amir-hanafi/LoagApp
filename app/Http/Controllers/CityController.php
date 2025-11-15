<?php

namespace App\Http\Controllers;

use App\Models\City;

class CityController extends Controller
{
    public function getByProvince($provinceId)
    {
        return response()->json([
            'cities' => City::where('province_id', $provinceId)->get()
        ]);
    }
}
