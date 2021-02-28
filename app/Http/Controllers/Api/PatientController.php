<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Patient;
use App\Services\PatientService;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    protected $patientService;

    public function __construct(PatientService $patientService)
    {
       // $this->middleware('auth');
        $this->patientService = $patientService;
    }

    public function activatePatient(Request $request, $id)
    {

        return $this->patientService->activatePatient($request, $id);
    }

    public function patientInformation(Request $request, $patient_id)
    {
        return $this->patientService->patientInformation($request, $patient_id);
    }

    public function allPatientData(Request $request)
    {
        return $this->patientService->allPatientData($request);

    }

    public function patientInfo(Request $request, $id)
    {
        $decoded_patient_id = base64_decode($id);
        $patient = Patient::find($decoded_patient_id);
        if (!empty($patient)) {
            return view('patient')->with('patient', $patient);
        }
    }
}
