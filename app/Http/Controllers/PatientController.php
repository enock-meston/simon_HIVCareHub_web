<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Hash;

class PatientController extends Controller
{
    //
    public function index(){
        $titles = 'patients';
        $Patients = Patient::all();
        return view('admin.patients',compact('titles','Patients'));
    }

    public function store(Request $request){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string','min:10'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        Patient::create([
            'names' => $request->name,
            'phone' => $request->phone,
            'password' => Hash::make($request->password),
        ]);

        return back()->with('Patient is now registred ');
    }

    // edit
    public function edit($id)
    {
        $titles = 'edit patients';
        $editPatient = Patient::findOrFail($id);
        return view('admin.editPatient', compact('titles','editPatient'));
    }


    // update
    public function update(Request $request, $id){
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'phone' => ['required', 'string','min:10'],
            // 'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $Patient = Patient::find($id);
        $Patient->names = $request->name;
        $Patient->phone = $request->phone;
        // $Patient->password = Hash::make($request->password);
        $Patient->save();

        return back()->with('Patient is now updated');
    }

    // login api
    public function login(Request $request){
        // Validate request data
        $request->validate([
            'phone' => 'required',
            'password' => 'required',
        ]);

        $patient = Patient::where('phone', $request->input('phone'))->first();

        // Check patient existence and password
        if (!$patient || !Hash::check($request->input('password'), $patient->password)) {
            return response()->json(['message' => 'Invalid credentials']);
        }
        // Return success response
        return response()->json(['patient' => $patient, 'message' => 'Login successful']);
    }
}
