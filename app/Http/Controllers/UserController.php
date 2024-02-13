<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    /**
     * Get all users.
     */
    public function getAllUsers()
    {
        // Find all users
        $users = User::all();
        if($users->isEmpty()){
            // If no users found, return a 404 error.
            return response()->json([
                'message' => 'No users found!'
            ], 404);
        }
        // If users found, return a 200 response with the users.
        return response()->json([
            'message' => 'All users.',
            'data' => $users
        ], 200);
    }

    /**
     * Create and store new user.
     */
    public function createUser(Request $request)
    {
        // Validate request
        $request -> validate ([
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|min:8',
            'user_type' =>'required'
        ]);

        // Check if the email already exists
        if(User::where('email','=',$request->input('email'))->exists()) {
            // If email already exists, return a 409 error.
            return response()->json([
                'message' => 'Email already exists!'
            ], 409);
        }

        // Create user
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password), // Hash the password for security
            'user_type' => $request->user_type
        ]);


        // Return response if user creation successful.
        if($user){
            return response()->json([
                'message' => 'User created successfully.',
                'data' => $user
            ], 201);
        }
        // Return an error response if user creation failed
        return response()->json(['message' => 'User not created!'], 500);
    }

    /**
     * Get a user by ID.
     */
    public function getUserById(string $id)
    {
        // Find user by ID
        $user = User::find($id);
        // Return response if user found.
        if($user){
            return response()->json([
               'message' => 'User found.',
                'data' => $user
            ], 200);
        }
        // Return an error 404 response if user not found.
        return response()->json(['message' => 'User not found!'], 404);
    }

    /**
     * Update a user by ID.
     */
    public function updateUserById(Request $request, string $id)
    {
        // Validate the request
        $request -> validate ([
            'name' =>'required|max:255',
            'email' =>'required|email|max:255',
            'password' =>'required|min:8',
            'user_type' =>'required'
        ]);
        // Find the user by ID.
        $user = User::find($id);
        // If the user is found, update the user's details
        if($user){
            $user -> name = $request->name;
            $user -> email = $request->email;
            $user -> password = $request->password;
            $user -> user_type = $request->user_type;
            $user->save();
            // Return a JSON response indicating that the user was updated successfully
            return response()->json([
               'message' => 'User updated successfully.',
                'data' => $user
            ], 200);
        }
        // Return a 404 response indicating that the user was not found
        return response()->json(['message' => 'User not found!'], 404);
    }

    /**
     * Delete a user by ID
     */
    public function deleteUserById(string $id)
    {
        // Find a user by ID
        $user = User::find($id);
        // Delete the user
        if($user){
            // Return a JSON response indicating that the user deleted successful
            $user->delete();
            return response()->json([
              'message' => 'User deleted successfully.',
                'data' => $user
            ], 200);
        }
        // Return a 404 response indicating that the user was not found
        return response()->json(['message' => 'User not found!'], 404);
    }
}
