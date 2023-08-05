<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Requests\API\AuthRequest;
use App\Http\Resources\UserResource;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function authenticate(AuthRequest $request) {
        $creds = $request->only('email','password');

        if(Auth::attempt($creds)) {
            $user = Auth::user();

            /** @var \App\Models\User $user */

            $user['access_token'] = $user->createToken('user-token')->plainTextToken;

            $data = [
                'message' => 'Successfuly authenticate',
                'user' => $user,
            ];

            return response()->json($data);

        }else{
            return response()->json(['message' => 'invalid authorized']);
        }

    }

    public function logout(Request $request) {
        $request->user()->currentAccessToken()->delete();

        return response()->json(['message' => 'You are logged out']);
    }

    public function logout_all(Request $request) {
        $request->user()->tokens()->delete();

        return response()->json(['message' => 'You are logged out from all devices']);
    }

    public function user(Request $request) {
        $user = $request->user();


        return response()->json(new UserResource($user));
    }
}
