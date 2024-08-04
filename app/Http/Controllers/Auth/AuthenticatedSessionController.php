<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Resources\UserProfileResource;
use Illuminate\Auth\AuthenticationException;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Http;

class AuthenticatedSessionController extends Controller
{


    public function store(LoginRequest $request)
    {


            // Attempt to authenticate using the LoginRequest
            $request->authenticate();

            // If authentication passes, proceed to token creation
            $user = $request->user();
            $user->tokens()->delete(); // Delete existing tokens if any

            // Create a new token
            $remember = $request->boolean('remember');

            // Create a new token
            $tokenResult = $user->createToken('API TOKEN');
            $plainTextToken = $tokenResult->plainTextToken;

            // Set expiration time for the token
            if ($remember) {
                $tokenResult->accessToken->expires_at = now()->addWeeks(1); // Set a longer expiration time
            } else {
                $tokenResult->accessToken->expires_at = now()->addHours(1); // Standard expiration time
            }

            return response()->json([
                'user' => new UserProfileResource($user),
                'access_token' => $plainTextToken,
                'token_type' => 'Bearer',
            ]);
        try {
        } catch (AuthenticationException $e) {
            return response()->json([
                'status' => false,
                'message' => 'Invalid credentials.',
            ], 401);

        } catch (\Throwable $th) {
            // Handle other unexpected errors
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }


    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request)
    {
        // Ensure user is authenticated
        if (!Auth::check()) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        // Revoke all tokens issued to the current user
        $request->user()->currentAccessToken()->delete();

        return response()->json([
            'message' => 'Logged out successfully.'
        ]);
    }
}
