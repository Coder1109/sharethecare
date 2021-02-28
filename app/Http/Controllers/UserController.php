<?php

namespace App\Http\Controllers;

use App\Models\Office;
use App\Models\Patient;
use App\Models\User;
use http\Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Intervention\Image\Facades\Image;
use jeremykenedy\LaravelRoles\Models\Role;
use Carbon\Carbon;

class UserController extends Controller
{
    /**
     * UserController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $offices = Office::all()->sortBy('office_id');
        $patients = DB::table('patients')->paginate(10);
        return view('pages.admin.adminUsers')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,
            'offices' => $offices,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(Request $request)
    {

        User::query()->create([
            'name'=>$request['name'],
            'email'=>$request['email'],
            'password'=>Hash::make($request['password']),
            'office_id' =>$request['office_id']
        ]);
        return redirect()->route('adminUsers.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show($id)
    {
        $user = User::query()->findOrFail($id);
        return view('pages.admin.adminUsersViews')->with([
            'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function edit($id)
    {
        $user = User::query()->findOrFail($id);
        return view('pages.admin.adminUsersEdit')->with([
            'user' => $user
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::query()->findOrFail($id);
        $user->roles()->detach();
        $user->delete();
        return redirect()->route('adminUsers.index');
    }

    public function adminOffice()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.admin.adminOffice')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }

    public function adminOfficeAdd(Request $request)
    {

        $rules = [
            'office_id' => 'required|string',
            'member_since' => 'required|string',
            'office_name' => 'required|string|min:3|max:255|unique:offices',
            'office_address' => 'required|string',
            'office_phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:offices',
            'office_email' => 'required|string|email|max:255|unique:offices',
            'file' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'message' => $validator->messages()
            ]);
        } else {
            $data = $request->input();

            $fileName = time() . '.' . $request->file->extension();
            $request->file->move(public_path('/images/business_logo'), $fileName);

            try {
                $office = new Office;
                $office->office_id = $data['office_id'];
                $office->member_since = $data['member_since'];
                $office->office_name = $data['office_name'];
                $office->office_address = $data['office_address'];
                $office->office_phone = $data['office_phone'];
                $office->office_email = $data['office_email'];
                $office->office_logo = $fileName;
                $office->save();

                return back()
                    ->with('success', 'You have successfully upload file.')
                    ->with('file', $fileName);

            } catch (Exception $e) {

                return response()->json([
                    'success' => false,
                    'message' => $e->messages()
                ]);
            }

        }
    }

    public function adminProfile()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.admin.adminProfile')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,

        ]);
    }

    public function adminAnalyticsReferrer()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.admin.analytics.adminAnalyticsReferrer')->with([
            'users' => $users,
            'roes' => $roles,
            'patients' => $patients,
        ]);
    }

    public function adminAnalyticsTeam()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.admin.analytics.adminAnalyticsTeam')->with([
            'users' => $users,
            'roes' => $roles,
            'patients' => $patients,
        ]);
    }

    public function adminAnalyticsReview()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.admin.analytics.adminAnalyticsReview')->with([
            'users' => $users,
            'roes' => $roles,
            'patients' => $patients,
        ]);
    }

    public function adminAnalyticsOffice()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('pages.admin.analytics.adminAnalyticsOffice')->with([
            'users' => $users,
            'roes' => $roles,
            'patients' => $patients,
        ]);
    }

}
