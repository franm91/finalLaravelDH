<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;

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
    protected $redirectTo = '/posts';

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
        $rules = [
            'name' => ['required', 'string', 'max:20'],
            'last_name' => ['required', 'string', 'max:30'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'avatar' => ['required', 'image'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ];

        $messages = [
            'name.required' => 'El nombre es obligatorio',
            'name.string' => 'El nombre solo pueden ser letras',
            'name.max' => 'Maximo 20 caracteres',
            'last_name.required' => 'EL apellido es obligatorio',
            'last_name.string' => 'El apellido solo pueden ser letras',
            'last_name.max' => 'Maximo 30 caracteres',
            'email' => 'Ingrese un email valido',
            'avatar. required' => 'La foto de perfil es obligatoria',
            'avatar.image' => 'La imagen debe ser (jpeg, png, bmp, gif, or svg)'
        ];

        

        return Validator::make($data, $rules, $messages);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        $ext = $data['avatar']->extension();
        $imgNombre = $data['email'] . "." . $ext;
        $data['avatar']->storeAs('public/avatars/', $imgNombre);


        return User::create([
            'name' => $data['name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'avatar' => $imgNombre,
            'password' => Hash::make($data['password']),
        ]);
    }
}
