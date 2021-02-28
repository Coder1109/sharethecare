<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use http\Env\Request;
use Illuminate\Support\Facades\Log;
use jeremykenedy\LaravelRoles\Models\Role;

class ReferrerController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Create a new user instance after a valid registration.
     *
     * @param array $data
     * @return \App\Models\Patient
     */
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function referrerQR()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.referrer.referrerQR')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }

    public function referrerRetrieve()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.referrer.referrerRetrieve')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }

    public function referrerOffice()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.referrer.referrerOffice')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }

    public function referrerTeam()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.referrer.referrerTeam')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }

    public function referrerReview()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.referrer.referrerReview')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }


}
