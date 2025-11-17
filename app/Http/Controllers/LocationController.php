<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\UserLocation;

class LocationController extends Controller
{
    public function update(Request $request)
    {
        $data = UserLocation::updateOrCreate(
            ['user_id' => $request->user_id],
            ['lat' => $request->lat, 'lng' => $request->lng]
        );

        return response()->json($data);
    }

public function getAllLocations()
{
    return response()->json(UserLocation::all());
}



}
