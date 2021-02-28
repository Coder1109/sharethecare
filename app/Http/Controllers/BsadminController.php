<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use jeremykenedy\LaravelRoles\Models\Role;

class BsadminController extends Controller
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

    public function bsAdminSubscribers()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.bsadmin.bsAdminSubscribers')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }

    public function bsAdminAnalyticsTopReferrer()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.bsadmin.analytics.bsAdminAnalyticsTopReferrer')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }


    public function bsAdminAnalyticsTopSubscribers()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.bsadmin.analytics.bsAdminAnalyticsTopSubscribers')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }

    public function bsAdminAnalyticsReview()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.bsadmin.analytics.bsAdminAnalyticsReview')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }

}
