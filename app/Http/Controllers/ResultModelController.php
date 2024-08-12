<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\ResultModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ResultModelController extends Controller
{
    //
    public function index(){
        $titles = 'Result';
        $Results = ResultModel::all();
        $patients = Patient::all();
        return view('admin.result',compact('titles','Results','patients'));
    }

    public function store(Request $request)
    {
        // Validate the incoming request
        $validated = $request->validate([
            'patientId' => 'required|exists:patients,id',
            'result' => 'required|in:Normal,Unfavorable',
            'referenceRange' => 'required|string',
            'comments' => 'nullable|string',
        ]);

        // Get the ID of the currently authenticated user
        $addedBy = Auth::id();

        // Create a new MedicalResult
        $medicalResult = ResultModel::create([
            'patientId' => $validated['patientId'],
            'addedBy' => $addedBy,
            'result' => $validated['result'],
            'referenceRange' => $validated['referenceRange'],
            'comments' => $validated['comments'],
        ]);

        // Return a success response or redirect with a message
        return redirect()->back()->with('message', 'Medical result added successfully.');
    }

    //select result by patient
    public function viewResult($id){
         // Retrieve medical results along with patient names
    $medicalResults = ResultModel::with('patient') // Assuming 'patient' is the relationship name
    ->where('patientId', $id)
    ->get();

// Map the results to include patient names
$resultsWithPatientNames = $medicalResults->map(function($result) {
    return [
        'id' => $result->id,
        'patientId' => $result->patientId,
        'addedBy' => $result->addedBy,
        'result' => $result->result,
        'referenceRange' => $result->referenceRange,
        'comments' => $result->comments,
        'created_at' => $result->created_at,
        'updated_at' => $result->updated_at,
        'patientName' => $result->patient->names,
    ];
});

return response()->json([
    'message' => 'successfully',
    'data' => $resultsWithPatientNames
]);
    }
}
