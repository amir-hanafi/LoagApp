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

        // validasi
        $request->validate([
            'name' => 'sometimes|string|max:255',
            'email' => [
                'sometimes',
                'email',
                Rule::unique('users')->ignore($user->id),
            ],
            'password' => 'sometimes|string|min:6',
        ]);

        // update name
        if ($request->filled('name')) {
            $user->name = $request->name;
        }

        // update email
        if ($request->filled('email')) {
            $user->email = $request->email;
        }

        // update password
        if ($request->filled('password')) {
            $user->password = Hash::make($request->password);
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
