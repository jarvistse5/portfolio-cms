<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class AuthController extends Controller
{
    public function loginIndex(Request $request)
    {
        return view('backend.auth.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $validator->after(function ($validator) use ($request) {
            $user = User::where('email', $request->input('email'))->first();
            if (!$user) {
                $validator->errors()->add('email', 'Email not exist.');
            } else {
                if (!Hash::check($request->input('password'), $user->password)) {
                    $validator->errors()->add('password', 'Password incorrect.');
                }
            }
        });

        if ($validator->fails()) {
            return response()->json([
                'status' => false,
                'message' => 'validation error',
                'errors' => $validator->errors()
            ], 401);
        }

        return 'success';
    }

    public function signupIndex(Request $request)
    {
        return view('backend.auth.signup');
    }

    public function signup(Request $request)
    {
        $formData = $request->validate([
            'name' => 'required|string',
            'email' => 'required|email',
            'password' => 'required'
        ]);

        $hashedPassword = Hash::make($request->input('password'));
        data_set($formData, 'password', $hashedPassword);

        $user = User::create($formData);

        return $user;
    }
}
