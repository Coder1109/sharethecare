<?php


namespace App\Services;


use App\Http\Resources\Collections\PatientCollection;
use App\Http\Resources\PatientResource;
use App\Patient;
use http\Cookie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Session;

class PatientService
{
    public function activatePatient(Request $request, $patient_id)
    {
        /*if (\Illuminate\Support\Facades\Cookie::get('share_the_care_qr_session') != null) {

        }*/
        if (Auth::check()) {
            $user = Auth::user();
        }
        $decoded_patient_id = base64_decode($patient_id);
        $patient = Patient::find($decoded_patient_id);
        $isSuperAdmin = false;
        if (!empty($user)) {
            $isSuperAdmin = $user->isSuperAdmin();
        }
        Log::debug("patient id" . $decoded_patient_id);
        if ($isSuperAdmin) {
            if (!empty($patient)) {
                $patient->active = true;
                $patient->save();
                $response = 'Patient activated successfully';

            } else {
                $response = 'Patient Not Found';
            }
        } else {
            if (!empty($patient)) {
                $patient->counter = $patient->counter + 1;
                $patient->save();
                $response = 'Thank You for Scanning';
            } else {
                $response = 'Patient Not Found';
            }
        }
        return $response;
    }

    public function patientInformation(Request $request, $patient_id)
    {
        $patient = Patient::find($patient_id);
        if (!empty($patient)) {
            return new PatientResource($patient);
        } else {
            return response()->json(['msg' => 'Patient not found'], 404);
        }
    }

    public function allPatientData(Request $request)
    {
        $patients = Patient::all();
        if (count($patients) > 0) {
            return new PatientCollection($patients);
        } else {
            return response()->json(['msg' => 'No patient record'], 404);
        }
    }
}
