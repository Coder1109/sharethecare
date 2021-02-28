<?php

namespace App\Http\Controllers;

use App\Employee;
use App\Helpers\QRCodeHelper;
use App\Models\Patient;
use App\Models\User;

use App\Notifications\Reviews;
use http\Exception;
use Illuminate\Support\Facades\Log;
use Image;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;
use jeremykenedy\LaravelRoles\Models\Role;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use Notification;
use App\Notifications\Emailto;
use Twilio\Rest\Client;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
//        $this->middleware('auth');
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

    public function index()
    {
        $users = User::all();
        $roles = Role::all()->sortBy('level');
        $patients = Patient::all();

        return view('home')->with([
            'users' => $users,
            'roles' => $roles,
            'patients' => $users,

        ]);
    }

    public function store(Request $request)
    {
        Log::debug("request data ### " . json_encode($request->all()));
        $rules = [
            'name' => 'required|string|min:3|max:255|unique:patients',
            'email' => 'required|string|email|max:255|unique:patients',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:patients',
            'assisted_by' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'message' => $validator->messages()
            ]);
        } else {
            $data = $request->input();
            $emailqr = $data['email'];
            $jsonData = json_encode($emailqr);

            $assistedPatientInfo = $data['assisted_by'];
            $assistedPatient = Patient::query()->where('name', '=', $assistedPatientInfo)->first();
            if (!empty($assistedPatient)) {
                $assistedPatient->counter = $assistedPatient->counter + 1;
                $assistedPatient->save();
            }
            Log::debug("json data###" . $jsonData);
            $qrCodHelper = new QRCodeHelper();


            try {
                $patient = new Patient;
                $patient->name = $data['name'];
                $patient->email = $data['email'];
                $patient->phone = $data['phone'];
                $patient->assisted_by = $data['assisted_by'];
                $patient->notes = $data['notes'];
                $patient->active = '0';
                $patient->counter = 0;
                $patient->save();

                $qrcode = $qrCodHelper->generateForUrl(env('APP_URL') . '/patient/' . base64_encode($patient->id));

                $filename = 'images/qr_image/' . $patient->id . '.png';
                $qrcode_file = fopen($filename, 'wb');
                fwrite($qrcode_file, $qrcode);
                fclose($qrcode_file);

                $patient->qr_link = $filename;
                $patient->save();

                return response()->json([
                    'success' => true,
                    'patient' => $patient,
                    'qr_code' => $qrcode,
                    'qr_link' => $filename
                ]);

            } catch (Exception $e) {

                return response()->json([
                    'success' => false,
                    'message' => $e->messages()
                ]);
            }
        }
    }

    public function emailqr(Request $request)
    {

    }

    public function sendCustomMessage(Request $request)
    {

    }

    public function sendSMS(Request $request)
    {
        Log::debug("request data###" . json_encode($request->all()));

        $is_sms = $request->input('sms');
        if ($is_sms == "true") {
            Log::debug("is sms ");
            try {
                return $this->SendMessage($request);
            } catch (\Twilio\Exceptions\RestException $e) {
                return response()->json(['error', $e]);
            }
        } else {
            Log::debug("is mms ");
            try {
                return $this->SendMMS($request);
            } catch (\Twilio\Exceptions\RestException $e) {
                return response()->json(['error', $e]);
            }
        }


    }

    private function SendMMS($request)
    {
        //  $testing_image="https://homepages.cae.wisc.edu/~ece533/images/airplane.png";
        $qr_link = $request->input('qr_link');
        $phone = $request->input('phone');
        if (!str_contains($qr_link, env('APP_URL'))) {
            $qr_link = env('APP_URL') . "/" . $qr_link;
        }

        if (!empty($qr_link)) {
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");
            $client = new Client($account_sid, $auth_token);
            $message = $client->messages->create($phone, ['from' => $twilio_number, 'body' => "mms from share the care", "mediaUrl" => $qr_link]);

            return response()->json(['success' => 1, 'msg' => $message]);
        } else {
            return response()->json(['msg' => 'not found'], 404);
        }

    }

    private function SendMessage($request)
    {
        $qr_link = $request->input('qr_link');
        $phone = $request->input('phone');
        if (!str_contains($qr_link, env('APP_URL'))) {
            $qr_link = env('APP_URL') . "/" . $qr_link;
        }

        if (!empty($qr_link)) {
            $account_sid = getenv("TWILIO_SID");
            $auth_token = getenv("TWILIO_AUTH_TOKEN");
            $twilio_number = getenv("TWILIO_NUMBER");
            $client = new Client($account_sid, $auth_token);
            $message = $client->messages->create($phone, ['from' => $twilio_number, 'body' => $qr_link]);
            return response()->json(['success' => 1, 'msg' => $message]);
        } else {
            return response()->json(['msg' => 'not found'], 404);
        }

    }

    public function reviewSms(Request $request)
    {

    }

    private function reviewSmsMessage($message, $recipients)
    {

        $account_sid = env("TWILIO_SID", "AC57e1532b91b4ab80dec9017d57bbad77");
        $auth_token = env("TWILIO_AUTH_TOKEN", "80d7a0b3ec061a6da33a30ef6d47a40c");
        $twilio_number = env("TWILIO_NUMBER", "+17137151754");
        $client = new Client($account_sid, $auth_token);
        $client->messages->create($recipients,
            [
                'from' => $twilio_number,
                'body' => $message,
            ]
        );
    }

    public function reviewEamil(Request $request)
    {

    }

    public function did()
    {
        $calls = DB::table('cc_call')
            ->Join('cc_card', 'cc_card.id', '=', 'cc_call.card_id')
            ->select('starttime', 'stoptime', 'src', 'sessionbill', 'card_id', 'credit')
            ->get();
//            ->paginate(20);
        return view('pages.did_number')->with([
            'calls' => $calls
        ]);
    }

    public function qrGenerate(Request $request)
    {
        Log::debug("request data ### " . json_encode($request->all()));
        $rules = [
            'name' => 'required|string|min:3|max:255|unique:patients',
            'email' => 'required|string|email|max:255|unique:patients',
            'phone' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10|unique:patients',
            'assisted_by' => 'required|string|max:255',
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return response()->json([
                'success' => 0,
                'message' => $validator->messages()
            ]);
        } else {
            $data = $request->input();
            $emailqr = $data['email'];
            $jsonData = json_encode($emailqr);

            $assistedPatientInfo = $data['assisted_by'];
            $assistedPatient = Patient::query()->where('name', '=', $assistedPatientInfo)->first();
            if (!empty($assistedPatient)) {
                $assistedPatient->counter = $assistedPatient->counter + 1;
                $assistedPatient->save();
            }
            Log::debug("json data###" . $jsonData);
            $qrCodHelper = new QRCodeHelper();


            try {
                $patient = new Patient;
                $patient->name = $data['name'];
                $patient->email = $data['email'];
                $patient->phone = $data['phone'];
                $patient->assisted_by = $data['assisted_by'];
                $patient->notes = $data['notes'];
                $patient->active = '0';
                $patient->counter = 0;
                $patient->save();

                $qrcode = $qrCodHelper->generateForUrl(env('APP_URL') . '/patient/info/' . base64_encode($patient->id));

                $filename = 'images/qr_image/' . $patient->id . '.png';
                $qrcode_file = fopen($filename, 'wb');
                fwrite($qrcode_file, $qrcode);
                fclose($qrcode_file);

                $patient->qr_link = $filename;
                $patient->save();

                return response()->json([
                    'success' => true,
                    'patient' => $patient,
                    'qr_code' => $qrcode,
                    'qr_link' => $filename
                ]);

            } catch (Exception $e) {

                return response()->json([
                    'success' => false,
                    'message' => $e->messages()
                ]);
            }
        }
    }

    public function reviewEmployee($destination = null, $user_id = null)
    {
        if ($destination == null) {
            return redirect('/home');
        } else if ($user_id == null) {
            return redirect('/home');
        } else {
            $decode_id = base64_decode($user_id);
            $user = User::find($decode_id);
            if (!empty($user)) {
                $review_url = base64_decode($destination);
                $user->ref_count = $user->ref_count + 1;
                $user->save();
                if (str_contains($review_url, 'https')) {
                    return redirect()->away($review_url);
                } else {
                    return redirect()->away('https://' . $review_url);
                }

            } else {
                return 'User Not Found';
            }
        }
    }
}

