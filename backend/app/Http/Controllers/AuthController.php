<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Database\QueryException;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Nette\Utils\Json;

class AuthController extends Controller
{
    public function register(Request $request)
    {
        try {
            $user = new User();
            $user->fullName = $request->fullName;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make($request->password);
            $result = $user->save();
            echo json_encode($result);
        } catch (QueryException) {
            echo json_encode(false);
        }
    }
    public function Login(Request $request)
    {
        $user = User::where('email', $request->email)->first();
        if ($user) {
            if (Hash::check($request->password, $user->password)) {
                $token = $user->createToken('Laravel Password Grant Client')->accessToken;
                // return json_encode(['token' => $token], 200);
                return response()->json(['id' => $user->id, 'token' => $token]);
            } else {
                return response()->json(['error' => 'Password is incorrect'], 401);
            }
        } else {
            return response()->json(['error' => 'User is not found'], 401);
        }
    }



    // public function logout(Request $request)
    // {
    //     auth()->user()->tokens()->delete;

    //     return [
    //         'message' => 'Logged out'
    //     ];
    // }
}
