<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $query = Profile::query()->with(['user']);
        if (!auth()->user()->is_admin)
            $query->where('id', auth()->user()->profile->id);

        $profiles = $query->get()->map(function ($profile) {
            return [
                'id' => $profile->id,
                'fullname' => $profile->fullname,
                'address' => $profile->address,
                'birthplace' => $profile->birthplace,
                'birthday' => $profile->birthday,
                'riwayat_kesehatan_dahulu' => $profile->riwayat_kesehatan_dahulu,
                'riwayat_kesehatan_keluarga' => $profile->riwayat_kesehatan_keluarga,
                'phone' => $profile->user->phone,
                'username' => $profile->user->username,
                'is_admin' => $profile->user->is_admin,
            ];
        });

        return response()->json([
            'status' => 'success',
            'data' => $profiles,
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show($profile_id)
    {
        if (!auth()->user()->is_admin && auth()->user()->profile->id != $profile_id)
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);
            
        $profile = Profile::query()->with(['user'])->findOrFail($profile_id);

        return response()->json([
            'status' => 'success',
            'data' => [
                'id' => $profile->id,
                'fullname' => $profile->fullname,
                'address' => $profile->address,
                'birthplace' => $profile->birthplace,
                'birthday' => $profile->birthday,
                'phone' => $profile->user->phone,
                'riwayat_kesehatan_dahulu' => $profile->riwayat_kesehatan_dahulu,
                'riwayat_kesehatan_keluarga' => $profile->riwayat_kesehatan_keluarga,
                'username' => $profile->user->username,
                'is_admin' => $profile->user->is_admin,
            ],
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $profile_id)
    {
        if (!auth()->user()->is_admin && auth()->user()->profile->id != $profile_id)
            return response()->json([
                'status' => 'error',
                'message' => 'Unauthorized',
            ], 401);

        $validation = $request->validate([
            'fullname' => 'required|string',
            'address' => 'required|string',
            'birthplace' => 'required|string',
            'birthday' => 'required|date',
            'riwayat_kesehatan_dahulu' => 'string',
            'riwayat_kesehatan_keluarga' => 'string',
        ]);

        $profile = Profile::query()->findOrFail($profile_id);
        $profile->update($validation);

        // $user = $profile->user;
        // $user->update([
        //     'phone' => $request->phone,
        //     'username' => $request->username,
        // ]);

        return response()->json([
            'status' => 'success',
            'message' => 'Profile updated',
            'data' => [
                'id' => $profile->id,
                'fullname' => $profile->fullname,
                'address' => $profile->address,
                'birthplace' => $profile->birthplace,
                'birthday' => $profile->birthday,
                'riwayat_kesehatan_dahulu' => $profile->riwayat_kesehatan_dahulu,
                'riwayat_kesehatan_keluarga' => $profile->riwayat_kesehatan_keluarga,
                'phone' => $profile->user->phone,
                'username' => $profile->user->username,
                'is_admin' => $profile->user->is_admin,
            ],
        ]);
    }

}
