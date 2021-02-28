<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Helpers\QRCodeHelper;
use App\Models\History;
use App\Models\Patient;
use App\Models\User;
use App\Notifications\EmailHistory;
use http\Message;
use Illuminate\Http\Request;
use http\Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use jeremykenedy\LaravelRoles\Models\Role;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Twilio\Rest\Client;
use Yajra\DataTables\Facades\DataTables;


class MemberController extends Controller
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

    public function portalManual()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();
        $sms_histories = History::all();
        return view('pages.member.portalManual')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $patients,
            'sms_histories' => $sms_histories

        ]);
    }

    public function show($id)
    {
        $user = Patient::query()->findOrFail($id);
        return view('pages.admin.adminUsersViews')->with([
            'user' => $user
        ]);
    }

    public function edit($id)
    {
        $user = Patient::query()->findOrFail($id);
        return view('pages.admin.adminUsersEdit')->with([
            'user' => $user
        ]);
    }

    public function destroy($id)
    {
        $user = Patient::query()->findOrFail($id);
//        $user->roles()->detach();
        $user->delete();
//        return redirect()->route('adminUsers.index');
        return redirect()->route('portalPatients');
    }

    public function storePatient(Request $request)
    {

    }

    public function emailSubmit(Request $request)
    {


    }

    public function smsSubmit(Request $request)
    {

    }

    private function manualEntryEmail($message, $recipients, $filename)
    {


    }

    public function portalQR()
    {

    }

    public function generateReviewQR()
    {
        return view('pages.member.generateReviewQR');
    }

    public function generateQR(Request $request)
    {
        $review_url = $request->input('review_url');
        Log::debug("review url###" . $review_url);
        $user = auth()->user();

        if (!empty($review_url)) {
            $redirect_url = env('APP_URL') . '/review/' . base64_encode($review_url);
            if (!empty($user)) {
                $user->qr_url = $this->employeeQrSave($redirect_url . '/' . base64_encode($user->id), $user->id);
                $user->save();
                return response()->json([
                        'success' => true,
                        'qr_link' => env('APP_URL') . '/' . $user->qr_url]
                );
            } else {
                return response()->json([
                        'success' => false,]
                );
            }

        }
    }

    public function employeeQrSave($review_url, $id)
    {
        $qrHelper = new QRCodeHelper();
        $qrCode = $qrHelper->generateForUrl($review_url);
        $filename = 'images/qr_image/employee_' . $id . '.png';
        $qrcode_file = fopen($filename, 'wb');
        fwrite($qrcode_file, $qrCode);
        fclose($qrcode_file);
        return $filename;
    }

    public function portalPatients(Request $request)
    {
        $patients = Patient::all();
        return view('pages.member.portalPatients')->with('patients', $patients);

    }

    public function portalTopReferrer(Request $request)
    {
        if ($request->ajax()) {

            return Datatables::of(Patient::query()->where('counter', '>', 0))
                ->editColumn('name', function ($patient) {
                    if ($patient->counter > 0) {
                        $editTopReferrer = 'portalTopReferrer-edit/' . $patient->id;
                        return '<a href="' . $editTopReferrer . '">' . $patient->name . '</a>';
                    }
                })
                ->editColumn('counter', function ($patient) {
                    if ($patient->counter > 0) {
                        return '<a href="' . "portalTopReferrer" . '/' . $patient->id . '">' . $patient->counter . '</a>';
                    }
                })
                ->addColumn('active', function ($patient) {
                    if ($patient->counter > 0) {
                        if ($patient->active == 1) {
                            $buttons = '<a href="/member/activeTopReferrer/' . $patient->id . '" data-toggle="modal" data-target="#inactiveTopPatient"><i class="fa fa-check text-success"></i></a>';
                            return $buttons;
                        } else {
                            $buttons = '<a href="/member/activeTopReferrer/' . $patient->id . '" data-toggle="modal" data-target="#activeTopPatient"><i class="fa fa-times"></a>';
                            return $buttons;
                        }
                    } else {
                        return '';
                    }

                })
                ->rawColumns(['active', 'name', 'counter', 'phone', 'email', 'assisted_by'])->make(true);
        }

        return view('pages.member.portalTopReferrer');

    }

    public function activeTopReferrer(Request $request, $id)
    {

        $existData = $request->input('active_patient');
        $trimExistData = trim($existData, '"');

        if (strlen($trimExistData) == 0) {

            $patient = Patient::query()->findOrFail($id);
            $patient->active = 0;
            $patient->save();

            return redirect()->route('portalTopReferrer')->with([
                'message' => $patient
            ]);

        } else {
            $rules = [
                'active_patient' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {
                $patient = Patient::query()->findOrFail($id);
                $patientEmail = $patient->email;
                $patientTrimEmail = trim($patientEmail, '"');
                $data = $validator->validated();

                $activeEmail = $data['active_patient'];
                $activeTrimEmail = trim($activeEmail, '"');
                try {
                    if ($patientTrimEmail == $activeTrimEmail) {

                        $patient->active = 1;
                        $patient->save();

                        return redirect()->route('portalTopReferrer')->with([
                            'message' => $activeEmail
                        ]);

                    } else {
                        return redirect()->back()->withErrors([
                            $patient->active
                        ]);
                    }

                } catch (Exception $e) {
                    return redirect()->route('portalTopReferrer')->with([
                        'active' => $patient->active
                    ]);
                }
            }
        }

    }

    public function portalTopReferrerView($id)
    {
        $patient = Patient::query()->findOrFail($id);
        $patientName = $patient->name;
        $patientNumbers = $patient->counter;
        $referrers = Patient::query()->where('assisted_by', $patientName)->take($patientNumbers)->get();
        return view('pages.member.portalTopReferrerView')->with([
            'referrers' => $referrers
        ]);
    }

    public function portalTopReferrerEdit($id)
    {

    }

    public function portalTopReferrerEditProfile(Request $request, $id)
    {

    }

    public function activePatient(Request $request, $id)
    {

        $existData = $request->input('active_patient');
        $trimExistData = trim($existData, '"');

        if (strlen($trimExistData) == 0) {

            $patient = Patient::query()->findOrFail($id);
            $patient->active = 0;
            $patient->save();

            return redirect()->route('portalPatients')->with([
                'message' => $patient
            ]);

        } else {
            $rules = [
                'active_patient' => 'required',
            ];

            $validator = Validator::make($request->all(), $rules);

            if ($validator->fails()) {
                return redirect()->back()->withErrors($validator);
            } else {
                $patient = Patient::query()->findOrFail($id);
                $patientEmail = $patient->email;
                $patientTrimEmail = trim($patientEmail, '"');
                $data = $validator->validated();

                $activeEmail = $data['active_patient'];
                $activeTrimEmail = trim($activeEmail, '"');
                try {
                    if ($patientTrimEmail == $activeTrimEmail) {

                        $patient->active = 1;
                        $patient->save();

                        return redirect()->route('portalPatients')->with([
                            'message' => $activeEmail
                        ]);

                    } else {
                        return redirect()->back()->withErrors([
                            $patient->active
                        ]);
                    }

                } catch (Exception $e) {
                    return redirect()->route('portalPatients')->with([
                        'active' => $patient->active
                    ]);
                }
            }
        }

    }

    public function activation(Request $request)
    {

        $rules = [
            'email' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $patients = Patient::all()->pluck('email');
            $data = $validator->validated();
            $activeEmail = $data['email'];
            $activeTrimEmail = trim($activeEmail, '"');
            foreach ($patients as $patient) {
                try {
                    if ($patient == $activeTrimEmail) {
                        $patientActive = Patient::query()->where('email', '=', $patient)->first();
                        $patientCounter = $patientActive->counter;
                        $patientActive->counter = $patientCounter + 1;
                        $patientActive->save();

                        return redirect()->route('portalTopReferrer')->with([
                            'message' => $activeEmail,
                        ]);
                    }
                } catch (Exception $e) {
                    return redirect()->route('portalTopReferrer')->with([
                        'active' => $patient->active
                    ]);
                }
            }
        }
    }

    public function activeQR(Request $request)
    {

        $rules = [
            'email' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $patients = Patient::all()->pluck('email');
            $data = $validator->validated();
            $activeEmail = $data['email'];
            $activeTrimEmail = trim($activeEmail, '"');
            foreach ($patients as $patient) {
                try {
                    if ($patient == $activeTrimEmail) {
                        $patientActive = Patient::query()->where('email', '=', $patient)->first();
                        $patientCounter = $patientActive->counter;
                        $patientActive->active = 1;
                        $patientActive->save();

                        return redirect()->route('portalPatients')->with([
                            'message' => $activeEmail,
                        ]);
                    }
                } catch (Exception $e) {
                    return redirect()->route('portalPatients')->with([
                        'active' => $patient->active
                    ]);
                }
            }
        }
    }

    public function retrieveQR(Request $request)
    {

        $rules = [
            'email' => 'required',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator);
        } else {
            $patients = Patient::all()->pluck('email');
            $data = $validator->validated();
            $activeEmail = $data['email'];
            $activeTrimEmail = trim($activeEmail, '"');
            foreach ($patients as $patient) {
                if ($patient == $activeTrimEmail) {
                    $findPatient = Patient::query()->where('email', '=', $patient)->first();

                    return view('pages.member.portalFindPatient')->with([
                        'findPatient' => $findPatient,
                    ]);
                }
            }
        }
    }

    public function activeReferrer(Request $request, $id)
    {

    }


}
