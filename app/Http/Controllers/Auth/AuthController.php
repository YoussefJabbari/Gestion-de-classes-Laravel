<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Validator;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\ThrottlesLogins;
use Illuminate\Foundation\Auth\AuthenticatesAndRegistersUsers;
use Request;

class AuthController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Registration & Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users, as well as the
    | authentication of existing users. By default, this controller uses
    | a simple trait to add these behaviors. Why don't you explore it?
    |
    */

    use AuthenticatesAndRegistersUsers, ThrottlesLogins;

    /**
     * Where to redirect users after login / registration.
     *
     * @var string
     */


    protected $redirectAfterLogout = '/login';

    /**
     * Create a new authentication controller instance.
     *
     */
    public function __construct()
    {
        $this->middleware($this->guestMiddleware(), ['except' => 'logout']);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'nom' => 'required|string',
            'prenom' => 'required|string',
            'email' => 'required|email|max:255|unique:users',
            'password' => 'required|min:6|confirmed',
            'dateNaissance' => 'date',
            'user' => 'required|string',
            'cne' => 'required_if:user,1',
            'photo' => 'file',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array $data
     * @return User
     */
    protected function create(array $data)
    {
        if ($data['user'] == '0') {
            $id = 'ENS' . rand(1, 99999999);
        } else {
            $id = $data['cne'];
        }

        $file = Request::file('photo');
        $fileName = "x.jpg";

        if (Request::hasFile('photo')) {

            $fileName =  $id . '.' . $file->getClientOriginalExtension();

            $file->move('Telechargements/images',$fileName);
        }

        $user = User::create([
            'id'                =>  $id,
            'nom'               =>  $data['nom'],
            'prenom'            =>  $data['prenom'],
            'email'             =>  $data['email'],
            'password'          =>  bcrypt( $data['password']),
            'date_naissance'    =>  $data['dateNaissance'],
            'date_inscription'  =>  date('Y-m-d'),
            'role'              =>  $data['user'],
            'photo'             =>  $fileName,
        ]);

        if($data['user'] == 0){

            $enseignant = new \App\Models\Enseignant();
            $enseignant->user()->associate($user);
            $enseignant->save();
        } else {
            $enseignant = new \App\Models\Etudiant();
            $enseignant->user()->associate($user);
            $enseignant->save();
        }
        

        return $user;

    }
}
