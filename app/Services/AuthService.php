<?php

namespace App\Services;

use App\Models\UserLog;
use Illuminate\Support\Facades\Auth;
 
class AuthService
{
    /**
     * Logging in
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return App\Models\Auth
     * 
     */
    public function login($request)
    {
        if (!$token = Auth::attempt($request->all())) {
            return false;
        }
        
        $user = Auth::user();
        $user_log = new UserLog();
        $user_log->email = $user->email;
        $user_log->user_id = $user->id;
        return $user;
    }

    /**
     * Store auth
     * 
     * @param Illuminate\Http\Request $request
     * 
     * @return App\Models\Auth
     * 
     */
    public function logout()
    {
        Auth::logout();
        return true;
    }

}
