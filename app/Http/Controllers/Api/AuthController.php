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
            'phone' => 'required|string|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'address' => 'required|string',
            'birthplace' => 'required|string',
            'birthday' => 'required|date',
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
        
        if (!auth()->attempt($request->only('username', 'password'))) {
            return response()->json([
                'message' => 'Invalid login details',
            ], 401);
        }

        $user = User::where('username', $request->username)->firstOrFail();

        $token = $user->createToken('token')->plainTextToken;

        return response()->json([
            'message' => 'Login successful',
            'user' => $user,
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
        return response()->json([
            'message' => 'User profile',
            'user' => $request->user(),
        ], 200);
    }
}
