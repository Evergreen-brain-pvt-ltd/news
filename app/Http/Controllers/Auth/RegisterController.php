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
        // dd($data);
        return Validator::make($data, [
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'company_name'                => 'required',
            'job_title'                   => 'required',
            'industry_sector'             => 'required',
            'job_function'                => 'required',
            'job_level'                   => 'required',
            'phone_number'                => 'required',
            'country'                     => 'required',
            'city'                        => 'required',
            'state'                       => 'required',
            'zip_code'                    => 'required',
    
        ],
        [
            "required" => "Field is required."
        ]
        );
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'name'   =>$data['firstname'].' '.$data['lastname'],
            'firstname' => $data['firstname'],
            'lastname' => $data['lastname'],
            'company_name'=>$data['company_name'],
            'job_title' =>$data['job_title'],
            'industry_sector'=>$data['industry_sector'],
            'job_function'=>$data['job_function'],
            'job_level'=>$data['job_level'],
            'phone_number'=>$data['phone_number'],
            'country' =>$data['country'],
            'email' => $data['email'],
            'city' =>$data['city'],
            'state'=>$data['state'],
            'zip_code'=>$data['zip_code'],
            'password' => Hash::make($data['password']),
            'terms'=> !empty($data['terms']) ? $data['terms'] : 'false' 
        ]);
    }
}
