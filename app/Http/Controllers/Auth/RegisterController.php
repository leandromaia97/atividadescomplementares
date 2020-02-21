<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\User;
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
    protected $redirectTo = '/home';

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
        // return Validator::make($data, [
        //     'cpf' => ['required', 'number', 'min:11'],
        //     'nome' => ['required', 'string', 'max:255'],
        //     'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'senha' => ['required', 'string', 'min:6', 'confirmed'],
        //     'confirmar_senha' => ['required', 'min:6'],
        // ]);

        $request->Validate([
            'cpf' => ['required | number | min:11'],
            'nome' => 'required | string',
            'email' => 'required | string | email | max:255 | unique:users',
            'senha' => 'required | string | min:6 | confirmed',
            'confirmar_senha' =>'required | string | min:6',
        ]);

        $request = $data;
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'cpf' => $data['cpf'],
            'name' => $data['nome'],
            'email' => $data['email'],
            'password' => Hash::make($data['senha']),
        ]);
    }
}
