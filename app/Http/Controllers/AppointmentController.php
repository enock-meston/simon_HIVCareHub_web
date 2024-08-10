<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class AppointmentController extends Controller
{
    //
    // view appointment in web
    // view
    public function index()
    {
        $titles = "Appointment Request";
        $Appointments = Appointment::orderBy('id', 'DESC')->get();
        return view('admin.appointment', compact('titles', 'Appointments'));
    }
    // end of view appointment in web

    // approve request
    public function approve(Request $request){
        $request->validate([
            'appointmentDate' => 'required|date',
            'id'=>'required',
        ]);
        $appointment = Appointment::find($request->input('id'));

        if ($appointment) {
            $appointment->appointmentDate = $request->input('appointmentDate');
            $appointment->status = '1';
            $appointment->save();
            return redirect()->back()->with('success', 'Appointment date updated successfully.');
        } else {
            return redirect()->back()->with('error', 'Appointment not found.');
        }
    }

    public function store(Request $request)
    {
        try {
            $validatedData = $request->validate([
                'patientId' => 'required',
                'title' => 'required',
            ]);

            $makeAppointment = new Appointment();
            $makeAppointment->title = $validatedData['title'];
            $makeAppointment->patientId = $validatedData['patientId'];
            $makeAppointment->save();
            return response()->json([
                'message' => 'successfully',
                'data'    => $makeAppointment
            ], 200);
        } catch (\Throwable $th) {
            //throw $th;
        }
    }

    //delete
    public function delete($id){
        $model = Appointment::find($id);

        if ($model) {
            $model->delete();
            return back()->with('success',"Request was removed successfully.");
        } else {
            // Return an error response if the model is not found
            return back()->with('error',"Something went wrong Here try again!!!");
        }
    }

    // view
    public function view($id)
    {
        $appointment = Appointment::where('patientId', $id)
            ->orderBy('created_at', 'desc')
            ->get();

        if ($appointment->isEmpty()) {
            return response()->json([
                'success' => false,
                'message' => 'No appointments found for this patient.'
            ]);
        }

        return response()->json([
            'success' => true,
            'data' => $appointment
        ]);
    }


}
