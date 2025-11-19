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
        return response()->json([
            'user' => $request->user()
        ]);
    }

    // Update profil user
    public function updateProfile(Request $request)
    {
        $user = $request->user();

        $request->validate([
            'name'        => 'sometimes|string|max:255',
            'password'    => 'sometimes|string|min:6',
            'province_id' => 'nullable|exists:provinces,id',
            'city_id'     => 'nullable|exists:cities,id',
            'district_id' => $request->district_id,
            'village_id' => $request->village_id,
        ]);

        if ($request->has('name')) {
            $user->name = $request->name;
        }

        if ($request->has('password')) {
            $user->password = Hash::make($request->password);
        }

        if ($request->has('province_id')) {
            $user->province_id = $request->province_id;
        }

        if ($request->has('city_id')) {
            $user->city_id = $request->city_id;
        }
        if ($request->has('district_id')) {
            $user->city_id = $request->city_id;
        }
        if ($request->has('village_id')) {
            $user->city_id = $request->city_id;
        }

        $user->save();

        return response()->json([
            'message' => 'Profil berhasil diperbarui',
            'user' => $user
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
