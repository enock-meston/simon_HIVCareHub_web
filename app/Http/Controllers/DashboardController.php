<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    //
    public function index(){
        // if (Auth::user()->usertype === 'admin') {
            $titles = 'Dashboard';
            $CountUsers = User::count();
            $CountPatient = Patient::count();
            return view('admin.index', compact('CountUsers','CountPatient','titles'));
        // }
        // return view('helthcare.index');
    }
}
