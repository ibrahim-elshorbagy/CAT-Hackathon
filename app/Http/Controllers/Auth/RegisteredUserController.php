<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserProfileResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Artisan;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */


    public function store(Request $request)
    {
        try {

            // Validate the incoming request data
            $validateUser = Validator::make($request->all(), [
                'name' => ['required', 'string', 'max:255'],
                'phone' => ['required', 'string', 'max:15', 'unique:users', 'regex:/^[0-9]{10,15}$/'],
                'password' => ['required', Rules\Password::defaults(), 'confirmed'],
            ]);

            if ($validateUser->fails()) {
                return response()->json([
                    'status' => false,
                    'message' => 'Validation error',
                    'errors' => $validateUser->errors(),
                ], 422);
            }

            // Create the user
            $user = User::create([
                'name' => $request->name,
                'phone' => $request->phone,
                'password' => Hash::make($request->password),
            ]);

            $user->generateRegisterCode();

            //$this->verifySMS($user->phone, $user->code); //-------------------------------------------------> uncomment this line to start send SMS verification code
            Log::info('Your verification code is.' .  $user->code);

            Auth::login($user);

            return response()->json([
                'status' => true,
                'message' => 'User registered successfully. Please verify your phone number.',
            ], 201);
        } catch (\Throwable $th) {
            return response()->json([
                'status' => false,
                'message' => $th->getMessage(),
            ], 500);
        }
    }




    /**
     * Send SMS verification code to the user.
     */
    public function verifySMS($phone, $code)
    {
        $basic = new \Vonage\Client\Credentials\Basic(env('VONAGE_KEY'), env('VONAGE_SECRET'));

        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($phone, 'PefectApp', 'Your verification code is: ' . $code)
        );

    }





    /**
     * Verify the user's phone number.
     */
    public function verify(Request $request)
    {

    $validateCode = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:15', 'regex:/^[0-9]{10,15}$/'],
        'code' => ['required', 'numeric'],
    ]);

    if ($validateCode->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation error',
            'errors' => $validateCode->errors(),
        ], 422);
    }

    // Verify the code and the phone number
    $user = User::where('phone', $request->phone)
        ->where('code', $request->code)
        ->where('expire_at', '>', now())
        ->first();

    if (!$user) {
        return response()->json([
            'status' => false,
            'message' => 'Invalid or expired verification code.',
        ], 422);
    }

    // Clear the code and expiration time
    $user->code = null;
    $user->expire_at = null;
    $user->save();

    Auth::login($user);

    return response()->json([
        'status' => true,
        'message' => 'Phone number verified successfully.',
        'token' => $user->createToken("API TOKEN")->plainTextToken,
        'user' =>new UserProfileResource($user),
    ], 200);

    }





    /**
     * Verify the Resend Code.
     */

    public function resendCode(Request $request)
    {

        $validateUser = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:15', 'regex:/^[0-9]{10,15}$/'],
        ]);

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validateUser->errors(),
            ], 422);
        }

        // Find the user by phone number
        $user = User::where('phone', $request->phone)->first();

        if (!$user) {
            return response()->json([
                'status' => false,
                'message' => 'User not found.',
            ], 404);
        }

        // Generate a new verification code
        $user->generateRegisterCode();

        //$this->verifySMS($user->phone, $user->code);  //-------------------------------------------------> uncomment this line to start send SMS verification code
        Log::info('Your verification code is.' .  $user->code);

        return response()->json([
            'status' => true,
            'message' => 'New verification code sent. Please check your phone.',
        ], 200);
    }

}
