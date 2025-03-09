<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use App\Models\Appointment;
use App\Models\Message;
use App\Models\ResultModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index()
    {
        // if (Auth::user()->usertype === 'admin') {
        $titles = 'Dashboard';
        $CountUsers = User::count();
        $CountPatient = Patient::count();
        $countAppointments = Appointment::count();
        $countMessages = Message::count();
        $countResults = ResultModel::count();


        return view('admin.index', compact('CountUsers', 'CountPatient', 'countAppointments', 'countMessages', 'countResults', 'titles'));
        // }
        // return view('helthcare.index');
    }

    // method to count all data with json response (api)

    public function countAllDataApi()
    {
        $CountUsers = User::count();
        $CountPatient = Patient::count();
        $countAppointments = Appointment::count();
        $countMessages = Message::count();
        $countResults = ResultModel::count();

        return response()->json([
            'CountUsers' => $CountUsers,
            'CountPatient' => $CountPatient,
            'countAppointments' => $countAppointments,
            'countMessages' => $countMessages,
            'countResults' => $countResults,
        ]);
    }

    public function getMyDashboardDataApi($id)
    {
        $countAppointments = Appointment::where('patientId', $id)->count();
        $countAprovedApp = Appointment::where('patientId', $id)
                                ->where('status', '1')
                                ->count();
        $countMessages = Message::where('sender_id', $id)->count();
        $countResults = ResultModel::where('patientId', $id)->count();

        return response()->json([
            'countAppointments' => $countAppointments,
            'countAprovedApp' => $countAprovedApp,
            'countMessages' => $countMessages,
            'countResults' => $countResults,
        ]);
    }
}
