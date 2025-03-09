@extends('layouts.admin_master')
@section('admin')
    <!-- page content -->
    <div class="right_col" role="main">
        <!-- top tiles -->
        <div class="row" style="display: inline-block;">
                <div class=" top_tiles" style="margin: 20px 0;">
                    @if (Auth::user()->usertype === 'admin')
                    <div class="col-md-5 col-sm-3  tile">
                        <span>Users</span>
                        <h2>{{ $CountUsers }}</h2>
                        <span class="sparkline_one" style="height: 160px;">
                            <canvas width="200" height="60"
                                style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                        </span>
                    </div>


                    @endif
                    {{-- Patient --}}
                    <div class="col-md-5 col-sm-3  tile">
                        <span>Patient</span>
                        <h2>{{ $CountPatient }}</h2>
                        <span class="sparkline_one" style="height: 160px;">
                            <canvas width="200" height="60"
                                style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                        </span>
                    </div>

                    {{-- Appointment --}}

                    <div class="col-md-5 col-sm-3  tile">
                        <span>Appointment</span>
                        <h2>{{ $countAppointments }}</h2>
                        <span class="sparkline_one" style="height: 160px;">
                            <canvas width="200" height="60"
                                style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                        </span>
                    </div>

                    {{-- Messages --}}
                    <div class="col-md-5 col-sm-3  tile">
                        <span>Messages</span>
                        <h2>{{ $countMessages }}</h2>
                        <span class="sparkline_one" style="height: 160px;">
                            <canvas width="200" height="60"
                                style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                        </span>
                    </div>

                    {{-- results --}}

                    <div class="col-md-5 col-sm-3  tile">
                        <span>Results</span>
                        <h2>{{ $countResults }}</h2>
                        <span class="sparkline_one" style="height: 160px;">
                            <canvas width="200" height="60"
                                style="display: inline-block; vertical-align: top; width: 94px; height: 30px;"></canvas>
                        </span>
                    </div>


                </div>
        </div>



    </div>
    <!-- /top tiles -->

    <div class="row">
        <div class="col-md-12 col-sm-12 ">

        </div>

    </div>
    <br />

    <div class="row">


    </div>



    </div>
@endsection
