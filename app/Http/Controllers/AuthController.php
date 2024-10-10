<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    public function login ()
    {
        return view('auth.login');
    }
    
    public function authenticate(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
        ]);

        if ($this->checkIsDeleted($credentials['username'])){
            return back()->with('error', 'The provided credentials do not match our records.');
        }
        
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            if (!auth()->user()->is_admin){
                Auth::logout();
                $request->session()->invalidate();
                $request->session()->regenerateToken();
                return back()->with('error', 'Only admin can login.');
            }

            return redirect()->intended('dashboard');
        }
        
        return back()->with('error', 'The provided credentials do not match our records.');
    }

    public function logout(Request $request)
    {
        Auth::logout();
        
        $request->session()->invalidate();
        
        $request->session()->regenerateToken();
        
        return redirect('/');
    }

    public function privacyPolicy()
    {
        return view('auth.privacy-policy');
    }

    public function deleteAccount()
    {
        return view('auth.delete-account');
    }

    public function deleteAccountRequest(Request $request)
    {
        $credentials = $request->validate([
            'username' => ['required'],
            'password' => ['required'],
            'delete_reason' => ['required'],
        ]);

        if ($this->checkIsDeleted($credentials['username'])){
            return back()->with('error', 'The provided credentials do not match our recordsss.');
        }
        
        if (Auth::attempt($request->only('username', 'password'))) {
            $request->session()->regenerate();

            $user = User::where('username', $credentials['username'])->first();

            $requested = $user->delete_request;

            $user->update([
                'delete_request' => true,
                'delete_reason' => $credentials['delete_reason'],
                'delete_request_at' => now(),
            ]);

            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();

            if ($requested){
                return back()->with('success', 'Your request has been updated with the new reason.');
            }

            return back()->with('success', 'Your request has been sent.');
        }
        
        return back()->with('error', 'The provided credentials do not match our records. ya');
    }

    private function checkIsDeleted($username)
    {
        $user = User::where('username', $username)->first();
        if (!$user || $user->delete_at)
            return true;
        return false;
    }
}
