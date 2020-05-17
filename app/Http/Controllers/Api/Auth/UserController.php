<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    private $successStatus = 200;

    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', ],
            'c_password' => ['required','same:password'],
        ]);
        if ($validator->fails()) {
            return response()->json(['error'=>$validator->errors()], 401);
        }
        $input = $request->all();
        $user = User::create([
            'role' => User::ROLE_USER,
            'name' => $input['name'],
            'email' => $input['email'],
            'password' => bcrypt($input['password']),
        ]);
        $success['token'] =  $user->createToken('MyApp')-> accessToken;
        $success['name'] =  $user->name;
        return response()->json(['success'=>$success], $this->successStatus);
    }
    public function login(){
        if(Auth::attempt(['email' => request('email'), 'password' => request('password')])){
            $user = Auth::user();
            $success['token'] =  $user->createToken('MyApp')-> accessToken;
            return response()->json(['success' => $success], $this-> successStatus);
        }
        else{
            return response()->json(['error'=>'Unauthorised'], 401);
        }
    }

    public function logout(Request $request)
    {
        // $token = Auth->user()->token;

        // DB::table('oauth_refresh_tokens')
        // ->where('access_token_id', $token->id)
        // ->update(['revoked' => true]);

        // $token->revoke();
        // return response()->json([], 204);
    }

    public function details()
    {
        $user = Auth::user();
        return response()->json(['success' => $user], $this->successStatus);
    }
}
