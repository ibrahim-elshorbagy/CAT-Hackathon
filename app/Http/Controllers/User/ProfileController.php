<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rules;

class ProfileController extends Controller
{

    public function updatePassword(Request $request)
    {
        $user = Auth::user();
        $data = Validator::make($request->all(), [
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        if ($data->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $data->errors(),
            ], 422);
        }

        $user->update([
            'password' => $request->password,
        ]);

        return response()->json([
            'status' => true,
            'message' => "password was updated successfully",
        ], 200);
    }

    public function ChangeImage(Request $request)
    {
        $user = Auth::user();

        $data = Validator::make($request->all(), [
            'image' => ['required', 'image'],
        ]);

        // Check for validation errors
        if ($data->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $data->errors(),
            ], 422);
        }

        // Delete the old image if it exists
        if ($user->image_path != null) {
            Storage::disk('public')->delete($user->image_path);
        }

        // Store the new image
        $image = $request->file('image');
        if ($image) {
            $path = $image->store('User/' . $user->id . '/image_path', 'public');
            $user->image_path = $path;
            $user->save();
        }

        return response()->json([
            'status' => true,
            'message' => 'Image updated successfully',
            'image_path' => $user->image_path, // Return the new image path
        ], 200);
    }

    public function ChangeName(Request $request)
    {
        $user = Auth::user();
        $data = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
        ]);

        if ($data->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'Validation error',
                'errors' => $data->errors(),
            ], 422);
        }
        $user->update([
            'name' => $request->name,
        ]);

        return response()->json([
            'status' => true,
            'message' => "name was updated successfully",
        ], 200);
    }
}
