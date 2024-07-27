<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{

    /**
     * Register a new user
     */
    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string',
            'username' => 'required|string|unique:users',
            'phone' => 'required|string|min:10|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'string',
            'birthplace' => 'string',
            'birthday' => 'date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();
        try {

            $user = User::create([
                'name' => $request->fullname,
                'username' => $request->username,
                'password' => bcrypt($request->password),
                'phone' => $request->phone,
            ]);

            $user->profile()->create([
                'fullname' => $request->fullname,
                'address' => $request->address,
                'birthplace' => $request->birthplace,
                'birthday' => $request->birthday,
            ]);

            DB::commit();
            return response()->json([
                'message' => 'User created successfully',
                'user' => $user,
            ], 201);
            
        } catch (\Throwable $th) {

            DB::rollBack();
            return response()->json([
                'message' => 'Failed to create user',
                'errors' => $th->getMessage(),
            ], 500);

        }
    }

    /**
     * Login user
     */
    public function login(Request $request)
    {
        $notFound = $this->checkIsDeleted($request->username);

        if ($notFound)
            return response()->json([
                'message' => 'Invalid login details',
            ], 401);

        if (!auth()->attempt($request->only('username', 'password'))) 
            if (!auth()->attempt([
                'phone' => $request->username,
                'password' => $request->password,
            ]))
                return response()->json([
                    'message' => 'Invalid login detail',
                ], 401);

        $user = User::where('username', $request->username)->first();
        if (!$user)
            $user = User::where('phone', $request->username)->firstOrFail();
        
        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => [
                'id' => $user->id,
                'name' => $user->name,
                'username' => $user->username,
                'phone' => $user->phone,
                'is_admin' => $user->is_admin,
                'profile_id' => $user->profile->id,
                'fullname' => $user->profile->fullname,
            ],
            'token' => $token,
        ], 200);

    }

    /**
     * Logout user
     */
    public function logout(Request $request)
    {
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logout successful',
        ], 200);
    }

    /**
     * Get user profile
     */
    public function profile(Request $request)
    {
        if ($request->user()->delete_at)
            return response()->json([
                'message' => 'User not found',
            ], 404);

        return response()->json([
            'message' => 'User profile',
            'user' => [
                'id' => $request->user()->id,
                'name' => $request->user()->name,
                'username' => $request->user()->username,
                'phone' => $request->user()->phone,
                'is_admin' => $request->user()->is_admin,
                'profile_id' => $request->user()->profile->id,
                'fullname' => $request->user()->profile->fullname,
            ],
        ], 200);
    }

    /**
     * Update user profile
     */
    public function updateProfile(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'fullname' => 'required|string',
            'phone' => 'required|string',
            'address' => 'string',
            'birthplace' => 'string',
            'birthday' => 'date',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'message' => 'Validation error',
                'errors' => $validator->errors(),
            ], 422);
        }

        DB::beginTransaction();
        try {

            $user = $request->user();
            $user->name = $request->fullname;
            $user->phone = $request->phone;
            $user->save();

            $user->profile()->update([
                'fullname' => $request->fullname,
                'address' => $request->address,
                'birthplace' => $request->birthplace,
                'birthday' => $request->birthday,
            ]);

            DB::commit();
            return response()->json([
                'message' => 'User profile updated successfully',
                'user' => $user,
            ], 200);
            
        } catch (\Throwable $th) {

            DB::rollBack();
            return response()->json([
                'message' => 'Failed to update user profile',
                'errors' => $th->getMessage(),
            ], 500);

        }
    }

    private function checkIsDeleted($username)
    {
        $user = User::where('username', $username)->orWhere('phone', $username)->first();
        if (!$user || $user->delete_at)
            return true;
        return false;
    }
}
