<?php


namespace App\Http\Controllers;

use App\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Registered;
use Illuminate\Foundation\Auth\RedirectsUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use jeremykenedy\LaravelRoles\Models\Role;

class ReferRegisterController extends Controller
{

    use RedirectsUsers;

    protected $redirectTo = RouteServiceProvider::HOME;

    public function __construct()
    {
        $this->middleware('guest');
    }

    public function showBusinessRegistrationForm()
    {
        return view('auth.referRegister');
    }

    protected function create(Request $request)
    {
        $rules = [
            'name' => 'required|string|min:3|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'clinic' => 'required|string|min:3|max:255',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:users',
            'address' => 'required|string|min:3|max:255',
            'office_id' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {

            $data = $request->input();
            $member_role = Role::where('name', '=', 'Referrer')->get();

            $user = User::create([
                'name' => $data['name'],
                'email' => $data['email'],
                'password' => Hash::make($data['password']),
                'clinic' => $data['clinic'],
                'phone' => $data['phone'],
                'address' => $data['address'],
                'office_id' => $data['office_id'],
            ]);
            $user->roles()->attach($member_role);

            event(new Registered($user));
            $this->guard()->login($user);

            return $this->registered($request, $user)
                ?: redirect($this->redirectPath());
        }
    }

    protected function guard()
    {
        return Auth::guard();
    }

    public function registered(Request $request, $user)
    {
        //
    }

}
