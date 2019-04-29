<?php

namespace App\Modules\Auth\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use App\Modules\Auth\Http\Requests\Api\LoginRequest;
use Carbon\Carbon;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    /**
     * Login user and create token
     *
     * @param  String email
     * @param  String password
     * @param  Boolean remember_me
     * @return String token_type
     * @return String access_token
     * @return String expires_at
     */
    public function login(LoginRequest $request)
    {
        $credentials = request(['email', 'password']);
        if(!\Auth::attempt($credentials)) {
            return abort(401);
        }
        $user = $request->user();
        $tokenResult = $user->createToken(request('email'));
        $token = $tokenResult->token;
        if ($request->remember_me)
            $token->expires_at = Carbon::now()->addWeeks(1);
        $token->save();
        $data = [
            'token_type' => 'Bearer',
            'access_token' => $tokenResult->accessToken,
            'expires_at' => Carbon::parse(
                $tokenResult->token->expires_at
            )->toDateTimeString()
        ];
        return response()->api($data);
    }

    /**
     * Logout user (Revoke the token)
     *
     * @return String message
     */
    public function logout(Request $request)
    {
        $request->user()->token()->revoke();
        return response()->json([
            'message' => 'Successfully logged out'
        ]);
    }
}
