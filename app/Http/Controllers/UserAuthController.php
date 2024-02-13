<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;

class UserAuthController extends Controller
{
    // Login
    public function login(Request $request){
        // Validate the request data
        $loginUserData = $request->validate([
            'email' => 'required|string|email',
            'password' => 'required|min:8',
        ]);

        // Find the user by email
        $user = User::where('email', $loginUserData['email'])->first();

        // Check if the user exists and if the password is correct
        if (!$user || !Hash::check($loginUserData['password'], $user->password)) {
            return response()->json(['message' => 'Invalid email or password'], 401);
        }

        // Create token for the user
        $token = $user->createToken($user->name.'-AuthToken')->plainTextToken;

        // Return response with access token and user type
        return response()->json([
            'access_token' => $token,
            'user_type' => $user->user_type, // Assuming there's a 'type' field in the User model
            'message' => 'Login successful', // Optional
        ]);
    }

    // Logout
    public function logout(Request $request) {
        // Get authenticated user
        $user = $request->user();
        // Delete current auth token
        $user->currentAccessToken()->delete();
        // Return response
        return response()->json(['message'=>'Logged out successfully']);
    }

}
