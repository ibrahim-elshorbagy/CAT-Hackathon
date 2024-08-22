<?php

namespace App\Http\Controllers;

use App\Http\Resources\UserCRUDResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class UserCRUDController extends Controller
{
    public function getUsers()
    {
        $users = User::role('user')->get();

        return response()->json([
            'users'=> UserCRUDResource::collection($users)
        ]);

    }

    public function getAdmins()
    {
        $admins = User::role('admin')->get();

        return response()->json([
            'admins'=> UserCRUDResource::collection($admins)
        ]);
    }

public function createUser(Request $request)
{
    $validateCode = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'nullable|email|unique:users,email',
        'phone' => 'required|string|max:15|unique:users,phone',
        'password' => 'required|string|min:8',
        'role' => 'required|string|in:user,admin',
    ]);

    if ($validateCode->fails()) {
        return response()->json([
            'status' => false,
            'message' => 'Validation error',
            'errors' => $validateCode->errors(),
        ], 422);
    }

    $user = User::create([
        'name' => $request->name,
        'email' => $request->email ?? null,
        'phone' => $request->phone,
        'password' => bcrypt($request->password),
    ]);

    $user->assignRole($request->role);

    return response()->json([
        'status' => true,
        'message' => 'User created successfully',
        'data' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email ?? null,
            'phone' => $user->phone,
        ],
    ], 201);
}

    public function destroy( $id)
    {

        $user = User::find($id);

        $user->delete();

        return response()->json([
            'message' => 'User deleted successfully',
        ], 200);
    }

}
