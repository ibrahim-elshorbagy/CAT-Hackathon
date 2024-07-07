<?php

namespace App\Http\Controllers\Auth\SignUpWith;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class GoogleContoller extends Controller
{
    private function configureGoogleDriver($platform)
    {
        $config = config("services.google.$platform");

        config(['services.google' => [
            'client_id' => $config['client_id'],
            'client_secret' => $config['client_secret'],
            'redirect' => $config['redirect'],
        ]]);
    }

    public function redirectToGoogle(Request $request)
    {
        $platform = $request->query('platform', 'web');
        $this->configureGoogleDriver($platform);

        return Socialite::driver('google')->stateless()->redirect();
    }

    public function handleGoogleCallback(Request $request)
    {
        try {
            $platform = $request->query('platform', 'web');
            $this->configureGoogleDriver($platform);

            $user = Socialite::driver('google')->stateless()->user();

            $googleUser = User::where('google_id', $user->id)->first();

            if ($googleUser) {
                Auth::login($googleUser);
                $token = $googleUser->createToken('GoogleAuthToken')->accessToken;
                return response()->json([
                    'status' => true,
                    'message' => 'Login successfully.',
                    'token' => $token
                ], 200);
            } else {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
                    'google_id' => $user->id,
                    'password' => Hash::make('1231@#165E!#!#@$1625essful!@$16my')
                ]);

                Auth::login($newUser);
                $token = $newUser->createToken('GoogleAuthToken')->accessToken;

                return response()->json([
                    'status' => true,
                    'message' => 'Registered successfully.',
                    'token' => $token
                ], 200);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }
}
