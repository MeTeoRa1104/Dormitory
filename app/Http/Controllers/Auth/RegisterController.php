<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Student;
use Illuminate\Support\Facades\DB;
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
    protected $redirectTo = '/';

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
            'student_first_name' => ['required', 'string', 'max:50'],
            'name' => ['required', 'string', 'max:50'],
            'student_last_name' => ['string', 'max:50'],
            'student_gender' => ['required', 'string', 'max:1'],
            'student_year_of_birth' => ['required', 'string', 'max:20'],
            'student_priviliege' => ['required', 'string', 'max:40'],
            'student_address' => ['required', 'string', 'max:50'],
            'student_region' => ['required', 'string', 'max:30'],
            'student_pin' => ['required', 'string', 'max:50'],
            'student_phone' => ['required', 'string', 'max:16'],
            'student_group' => ['required', 'string', 'max:10'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        
        Student::create([
            'student_first_name'=>$data['student_first_name'],
            'student_second_name'=>$data['name'],
            'student_last_name'=>$data['student_last_name'],
            'student_gender'=>$data['student_gender'],
            'student_year_of_birth'=>$data['student_year_of_birth'],
            'student_priviliege'=>$data['student_priviliege'],
            'student_address'=>$data['student_address'],
            'student_region'=>$data['student_region'],
            'student_pin'=>$data['student_pin'],
            'student_faculty'=>$data['student_faculty'],
            'student_group'=>$data['student_group'],
            'studeent_phone'=>$data['student_phone'],
            'student_email'=>$data['email'],
        ]);
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }
}
