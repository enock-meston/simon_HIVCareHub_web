@extends('layouts.admin_master')
@section('admin')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Appointment</h3>
                </div>

                <div class="title_right">
                    <div class="col-md-5 col-sm-5  form-group pull-right top_search">
                        {{-- <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search for...">
                        <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                        </span>
                    </div> --}}
                    </div>
                </div>
            </div>
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-12 col-sm-12 ">
                    <div class="x_panel">
                        <div class="x_title">
                            <h2>List of Appointment<small></small></h2>
                            <ul class="nav navbar-right panel_toolbox">
                                <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
                                </li>

                                <li><a class="close-link"><i class="fa fa-close"></i></a>
                                </li>
                            </ul>
                            <div class="clearfix"></div>
                        </div>
                        <div class="x_content">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="card-box table-responsive">
                                        <p class="text-muted font-13 m-b-30">
                                            List of Appointment
                                        </p>


                                        <table id="datatable-responsive"
                                            class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                            width="100%">
                                            <thead>
                                                <tr>
                                                    <th>#</th>
                                                    <th>Message</th>
                                                    <th>Names</th>
                                                    <th>Phone</th>
                                                    <th>Stutas</th>
                                                    <th>Tratment Date(Empty 1st Time)</th>
                                                    <th>Created At</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($Appointments as $key => $appointment)
                                                    <tr>
                                                        <td>{{ $key + 1 }}</td>
                                                        <td>{{ $appointment->title }}</td>
                                                        <td>{{ $appointment->client->names }}</td>
                                                        <td>{{ $appointment->client->phone }}</td>
                                                        <td>
                                                            @if ($appointment->status === '1')
                                                                Approved
                                                            @endif

                                                            @if ($appointment->status === '0')
                                                                Pending
                                                            @endif

                                                        </td>
                                                        {{-- form --}}
                                                        <form action="{{ route('approve') }}" method="post">
                                                            @csrf
                                                            <td>
                                                                <input type="hidden" value="{{ $appointment->id }}" name="id">
                                                                <input type="datetime-local" name="appointmentDate"
                                                                    value="{{ $appointment->appointmentDate }}"
                                                                    id="">

                                                            </td>
                                                            <td>{{ $appointment->created_at }}</td>
                                                            <td>
                                                                <button type="submit" class="btn btn-primary btn-sm" >approve</button>
                                                                <a href="{{ route('delete', $appointment->id) }}"
                                                                    class="btn btn-danger btn-sm">Reject</a>
                                                            </td>
                                                        </form>
                                                        {{-- end of form  --}}

                                                    </tr>
                                                @endforeach
                                            </tbody>
                                        </table>


                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- /page content -->
@endsection
