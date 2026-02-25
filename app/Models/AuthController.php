<?php

namespace App\Http\Controllers\API;

use App\Models\User;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    /* ===================================
       REGISTER (Creates Tenant + Admin)
    ====================================*/
    public function register(Request $request)
    {
        $request->validate([
            'company_name' => 'required|string|max:255',
            'name'         => 'required|string|max:255',
            'email'        => 'required|email|unique:users,email',
            'password'     => 'required|min:6',
        ]);

        return DB::transaction(function () use ($request) {

            $company = Company::create([
                'name' => $request->company_name,
                'slug' => strtolower(str_replace(' ', '-', $request->company_name)),
                'status' => 'active',
            ]);

            $user = User::create([
                'company_id' => $company->id,
                'name'       => $request->name,
                'email'      => $request->email,
                'password'   => Hash::make($request->password),
                'is_active'  => true,
            ]);

            // Create token
            $token = $user->createToken('auth_token')->plainTextToken;

            return response()->json([
                'message' => 'Company & Admin created successfully',
                'company' => $company,
                'user'    => $user,
                'token'   => $token,
            ]);
        });
    }

    /* ===================================
       LOGIN
    ====================================*/
    public function login(Request $request)
    {
        $request->validate([
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'message' => 'Invalid credentials'
            ], 401);
        }

        $user = Auth::user();

        if (!$user->is_active) {
            return response()->json([
                'message' => 'User inactive'
            ], 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'user'  => $user,
            'token' => $token,
        ]);
    }

    /* ===================================
       LOGOUT
    ====================================*/
    public function logout(Request $request)
    {
        $request->user()->tokens()->delete();

        return response()->json([
            'message' => 'Logged out successfully'
        ]);
    }

    /* ===================================
       CURRENT USER
    ====================================*/
    public function me(Request $request)
    {
        return response()->json($request->user());
    }
}