<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class UserController extends Controller
{
    // Ambil profil user
public function getProfile(Request $request)
{
    $user = $request->user()->load(['province', 'city', 'district', 'village']);

    return response()->json([
        'status' => true,
        'message' => 'Profile retrieved successfully',
        'data' => $user
    ]);
}


public function updateProfile(Request $request)
{
    $user = $request->user();

    $request->validate([
        'name'          => 'nullable|string|max:255',
        'phone'         => 'nullable|string|max:20',
        'province_id'   => 'nullable|exists:provinces,id',
        'city_id'       => 'nullable|exists:cities,id',
        'district_id'   => 'nullable|exists:districts,id',
        'village_id'    => 'nullable|exists:villages,id',
    ]);

    $user->update([
        'name'        => $request->name ?? $user->name,
        'phone'       => $request->phone ?? $user->phone,
        'province_id' => $request->province_id ?? $user->province_id,
        'city_id'     => $request->city_id ?? $user->city_id,
        'district_id' => $request->district_id ?? $user->district_id,
        'village_id'  => $request->village_id ?? $user->village_id,
    ]);

    return response()->json([
        'status' => true,
        'message' => 'Profile updated successfully',
        'data' => $user->fresh()->load(['province', 'city', 'district', 'village'])
    ]);
}




    public function destroy($id)
    {
        $user = User::find($id);

        if (!$user) {
            return response()->json([
                'message' => 'User tidak ditemukan'
            ], 404);
        }

        $user->delete();

        return response()->json([
            'message' => 'Akun berhasil dihapus'
        ], 200);
    }

    public function deleteAccount(Request $request)
    {
        $user = $request->user(); // ✅ otomatis ambil user dari token

        if (!$user) {
            return response()->json(['message' => 'User tidak ditemukan'], 404);
        }

        $user->delete();

        return response()->json(['message' => 'Akun berhasil dihapus'], 200);
    }


}
