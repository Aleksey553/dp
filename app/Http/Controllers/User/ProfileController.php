<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Auth\Events\Validated;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.index', ['user' => Auth::user()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
//        return view('user.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
//        dd($request->id);
        $validateData = Validator::make($request->all(),[
            'name' => ['required'],
            'phone' => ['required','min:15'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore(Auth::id())],
            'password' => ['nullable', 'string', 'min:8', 'confirmed'],
        ]);

//        $validateData = $request->validate([
//            'name' => ['required'],
//            'phone' => ['required','min:15'],
//            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
//        ]);

        if ($validateData->fails()) {
            return redirect()->route('profile.index')
                ->withErrors($validateData)
                ->withInput();
        }
         User::where('id',Auth::id())->update([
            'name' => $request->name,
            'phone' => $request->phone,
            'email' => $request->email,
        ]);
//        $user->update($request->all());
//        $user->role = User::ROLE_USER;
//        $user->phone = $request['phone'];
//        $user->name = $request['name'];
//        $user->email = $request['email'];
//        $request['password'] == null? $user->password : $user->password = Hash::make($request['password']);
//        $user->save();
        return redirect()->route('profile.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\User $user
     * @return \Illuminate\Http\Response
     */
}
