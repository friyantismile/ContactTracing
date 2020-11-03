<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Services\AuthService;
use App\Traits\HandleResponse;
use App\Http\Resources\User;
use Exception;

/**
 * @group Advertisement
 *
 *
 */

class AuthController extends Controller
{
    use HandleResponse;

    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct(
        AuthService $auth_service
    ) {
        $this->middleware('auth.role:all', ['except' => ['login']]);
        $this->auth_service = $auth_service;
    }

    /**
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(LoginRequest $request)
    {
        $auth = $this->auth_service->login($request);
        if (!$auth) {
            return $this->errorResponse(
                "Error, unable to connect with these credentials.",
                401
            );
        }
        if (!$auth['email_verified_at']) {
            return $this->errorResponse(
                "Error, please verify your email address first.",
                401
            );
            $this->auth_service->logout();
        }

        if ($auth['blocked_at']) {
            return $this->errorResponse(
                "Error, your account has been blocked.",
                401
            );
            $this->auth_service->logout();
        }
        
        return $this->successResponse(
            new User($auth),
            "You've been successfully logged-in",
            config('responses.create_success.code')
        );
    }
}
