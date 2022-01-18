<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|max:32',
            'username' => 'required|min:3|max:32|unique:users,username',
            'email' => 'required|email|max:32|unique:users,email',
            'password' => 'required|min:7|max:16',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {   
        request()->validate([
            'name' => 'required|max:32',
            'username' => 'required|min:3|max:32|unique:users,username',
            'email' => 'required|email|max:128|unique:users,email',
            'password' => 'required|min:7|max:16'
        ]);
        $userr = User::create([
            'name' => $data['name'],
            'username'=> $data['username'],
            'email' => $data['email'],
            'password' => $data['password'],
        ]);

        auth()->login($userr);

        return redirect('/')->with('success', 'Your account has been created.');
    }
}
