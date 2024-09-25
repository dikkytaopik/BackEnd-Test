<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Tymon\JWTAuth\Facades\JWTAuth;

class ProfileController extends Controller {
    public function store(Request $request) {
        $request->validate([
            'nama_lengkap' => 'required',
            'alamat' => 'required',
            'jenis_kelamin' => 'required',
            'status_pernikahan' => 'required',
        ]);

        $user = JWTAuth::user();
        $profile = Profile::create([
            'user_id' => $user->id,
            'nama_lengkap' => $request->nama_lengkap,
            'alamat' => $request->alamat,
            'jenis_kelamin' => $request->jenis_kelamin,
            'status_pernikahan' => $request->status_pernikahan,
        ]);

        return response()->json($profile, 201);
    }

    public function show() {
        $user = JWTAuth::user();
        return response()->json($user->profile);
    }

    public function update(Request $request) {
        $user = JWTAuth::user();
        $profile = $user->profile;

        $profile->update($request->only(['nama_lengkap', 'alamat', 'jenis_kelamin', 'status_pernikahan']));
        return response()->json($profile);
    }

    public function destroy() {
        $user = JWTAuth::user();
        $profile = $user->profile;

        $profile->delete();
        return response()->json(['message' => 'Profile deleted']);
    }
}

