<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
class PasswordForgotController extends Controller
{

    /**
     * Send Reset Code.
     */

    public function sendResetCode(Request $request)
    {
        // Validate the request data
        $validateUser = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:15', 'exists:users,phone', 'regex:/^[0-9]{10,15}$/'],
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

        // Generate and save the forget password code
        $user->generateForgetPasswordCode();

        // Send the verification code via SMS
        //$this->verifySMS($user->phone, $user->ForgetPasswordCode);  //-------------------------------------------------> uncomment this line to start send SMS verification code
        Log::info('Forget Password Code sent to your phone.' .  $user->ForgetPasswordCode);

        return response()->json(['message' => 'Reset code sent to your phone.'], 200);
    }

    public function verifySMS($phone, $code)
    {
        $basic = new \Vonage\Client\Credentials\Basic('c6203c09', 'sLLL7LM5ht0CysQH');
        $client = new \Vonage\Client($basic);

        $response = $client->sms()->send(
            new \Vonage\SMS\Message\SMS($phone, 'PerfectApp', 'Your verification code is: ' . $code)
        );
    }

    /**
     * Verify Reset Code.
     */


    public function verifyResetCode(Request $request)
    {
        // Validate the request data
        $validateUser = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:15', 'exists:users,phone', 'regex:/^[0-9]{10,15}$/'],
            'ForgetPasswordCode' => ['required', 'string'],
        ]);

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validateUser->errors(),
            ], 422);
        }

        // Find the user by phone number and reset code
        $user = User::where('phone', $request->phone)
            ->where('ForgetPasswordCode', $request->ForgetPasswordCode)
            ->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid reset code.'], 400);
        }

        return response()->json(['message' => 'Reset code verified. You can now reset your password.'], 200);
    }



    /**
     * Reset Password.
     */

    public function resetPassword(Request $request)
    {
        // Validate the request data
        $validateUser = Validator::make($request->all(), [
            'phone' => ['required', 'string', 'max:15', 'exists:users,phone', 'regex:/^[0-9]{10,15}$/'],
            'ForgetPasswordCode' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        if ($validateUser->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $validateUser->errors(),
            ], 422);
        }

        // Find the user by phone number and reset code
        $user = User::where('phone', $request->phone)
            ->where('ForgetPasswordCode', $request->ForgetPasswordCode)
            ->first();

        if (!$user) {
            return response()->json(['message' => 'Invalid reset code.'], 400);
        }

        // Reset the password
        $user->password = Hash::make($request->password);
        $user->ForgetPasswordCode = null; // Clear the reset code
        $user->save();

        return response()->json(['message' => 'Password has been reset successfully.'], 200);
    }


    /**
     * Resend Code .
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
        $user->generateForgetPasswordCode();

        //$this->verifySMS($user->phone, $user->ForgetPasswordCode);  //-------------------------------------------------> uncomment this line to start send SMS verification code
        Log::info('Forget Password Code sent to your phone.' .  $user->ForgetPasswordCode);

        return response()->json([
            'status' => true,
            'message' => 'New verification code sent. Please check your phone.',
        ], 200);
    }
}
