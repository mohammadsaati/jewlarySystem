<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginAuthApiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Login(LoginAuthApiRequest $request)
    {
        if (!Auth::attempt($request))
        {
            return response([
                'message' => 'Invalid password or email address' , 
                'code' => '407'
            ]);
        }

        $accessToken = Auth::user();
    }
}
