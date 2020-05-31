<?php

namespace App\Http\Controllers\Api\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Laravel\Passport\Client;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Route;

class UserController extends Controller
{
    use IssueTokenTrait;
    private $successStatus = 200;
    private $client;
    public function __construct()
    {
        $this->client = Client::find(2);
    }

    public function register(Request $request)
    {
        $this->validate($request, [
            'phone' => ['required', 'string'],
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', ],
            'c_password' => ['required','same:password'],
        ]);
        // if ($validator->fails()) {
        //     return response()->json(['error'=>$validator->errors()], 401);
        // }

    	$user = User::create([
            'name' => request('name'),
            'role' => User::ROLE_USER,
            'phone' => request('phone'),
    		'email' => request('email'),
    		'password' => bcrypt(request('password'))
    	]);
        return $this->issueToken($request, 'password');
    }
    public function login(Request $request){

    	$this->validate($request, [
    		'email' => ['required', 'string', 'email', 'max:255'],
    		'password' => 'required'
    	]);

        return $this->issueToken($request, 'password');

    }
    public function refresh(Request $request){
    	$this->validate($request, [
    		'refresh_token' => 'required'
    	]);

    	return $this->issueToken($request, 'refresh_token');

    }

    public function logout(Request $request){

    	$accessToken = Auth::user()->token();

    	DB::table('oauth_refresh_tokens')
    		->where('access_token_id', $accessToken->id)
    		->update(['revoked' => true]);

    	$accessToken->revoke();

    	return response()->json([], 204);

    }
}
