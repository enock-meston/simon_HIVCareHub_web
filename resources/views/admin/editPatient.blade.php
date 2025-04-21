@extends('layouts.admin_master')
@section('admin')
    <!-- page content -->
    <div class="right_col" role="main">
        <div class="">
            <div class="page-title">
                <div class="title_left">
                    <h3>Patients</h3>
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
                            <h2>List of Patients<small></small></h2>
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

                                        <form class="form-horizontal form-label-left" action="{{ route('updatePatient', $editPatient->id) }}" method="POST">
                                            @csrf
                                            @method('PUT')

                                            <div class="form-group row ">
                                                <label class="control-label col-md-3 col-sm-3 ">Names <span class="required">*</span></label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="name" class="form-control" required
                                                           value="{{ old('name', $editPatient->names) }}" placeholder="Enter Patient Names">
                                                </div>
                                            </div>

                                            <div class="form-group row ">
                                                <label class="control-label col-md-3 col-sm-3 ">Phone<span class="required">*</span></label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="text" name="phone" class="form-control" required
                                                           value="{{ old('phone', $editPatient->phone) }}" placeholder="Enter Phone">
                                                </div>
                                            </div>
                                            {{-- <div class="form-group row">
                                                <label
                                                    class="control-label col-md-3 col-sm-3 ">Password<span
                                                        class="required">*</span>
                                                </label>
                                                <div class="col-md-9 col-sm-9 ">
                                                    <input type="password" class="form-control"
                                                        name="password" value="{{ old('phone', $editPatient->password) }}" disabled>
                                                </div>
                                            </div> --}}

                                            <div class="ln_solid"></div>
                                            <div class="form-group">
                                                <div class="col-md-9 col-sm-9 offset-md-3">
                                                    <button type="submit" class="btn btn-success pull-right">Update</button>
                                                </div>
                                            </div>
                                        </form>


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
