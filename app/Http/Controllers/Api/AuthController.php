<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
  /**
   * Register a new user
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function signup(Request $request): JsonResponse
  {
    try {
      // Validate the request
      $validator = Validator::make($request->all(), [
        'name' => 'required|string|max:255',
        'email' => 'required|string|email|max:255|unique:users',
        'password' => 'required|string|min:8|confirmed',
      ]);

      if ($validator->fails()) {
        return response()->json([
          'success' => false,
          'message' => 'Validation failed',
          'errors' => $validator->errors()
        ], 422);
      }

      // Create new user
      $user = User::create([
        'name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password),
      ]);

      // Create token for the user
      $token = $user->createToken('auth_token')->plainTextToken;

      return response()->json([
        'success' => true,
        'message' => 'User registered successfully',
        'data' => [
          'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at,
          ],
          'token' => $token,
          'token_type' => 'Bearer'
        ]
      ], 201);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Registration failed',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Login user
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function login(Request $request): JsonResponse
  {
    try {
      // Validate the request
      $validator = Validator::make($request->all(), [
        'email' => 'required|string|email',
        'password' => 'required|string',
      ]);

      if ($validator->fails()) {
        return response()->json([
          'success' => false,
          'message' => 'Validation failed',
          'errors' => $validator->errors()
        ], 422);
      }

      // Attempt to login
      if (!Auth::attempt($request->only('email', 'password'))) {
        return response()->json([
          'success' => false,
          'message' => 'Invalid credentials'
        ], 401);
      }

      // Get authenticated user
      $user = Auth::user();

      // Create token for the user
      $token = $user->createToken('auth_token')->plainTextToken;

      return response()->json([
        'success' => true,
        'message' => 'Login successful',
        'data' => [
          'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
          ],
          'token' => $token,
          'token_type' => 'Bearer'
        ]
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Login failed',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Logout user
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function logout(Request $request): JsonResponse
  {
    try {
      // Delete current token
      $request->user()->currentAccessToken()->delete();

      return response()->json([
        'success' => true,
        'message' => 'Logout successful'
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Logout failed',
        'error' => $e->getMessage()
      ], 500);
    }
  }

  /**
   * Get user profile
   *
   * @param Request $request
   * @return JsonResponse
   */
  public function profile(Request $request): JsonResponse
  {
    try {
      $user = $request->user();

      return response()->json([
        'success' => true,
        'message' => 'Profile retrieved successfully',
        'data' => [
          'user' => [
            'id' => $user->id,
            'name' => $user->name,
            'email' => $user->email,
            'created_at' => $user->created_at,
            'updated_at' => $user->updated_at,
          ]
        ]
      ], 200);
    } catch (\Exception $e) {
      return response()->json([
        'success' => false,
        'message' => 'Failed to retrieve profile',
        'error' => $e->getMessage()
      ], 500);
    }
  }
}
