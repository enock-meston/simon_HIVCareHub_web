@extends('layouts.admin_master')
@section('admin')
<!-- page content -->
<div class="right_col" role="main">
    <div class="">
        <div class="page-title">
            <div class="title_left">
                <h3>Users</h3>
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
                        <h2>List of Users<small></small></h2>
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
                                        List of Users
                                        {{-- add button model --}}
                                        <button class="btn btn-primary btn-sm pull-right" type="button"
                                            data-toggle="modal" data-target=".bs-example-modal-sm">Add User</button>
                                    </p>
                                    {{-- add isomo model --}}
                                    <div class="modal fade bs-example-modal-sm" tabindex="-1" role="dialog"
                                        aria-hidden="true">
                                        <div class="modal-dialog modal-lg">
                                            <div class="modal-content">

                                                <div class="modal-header">
                                                    <h4 class="modal-title" id="myModalLabel2">Add User</h4>
                                                    <button type="button" class="close" data-dismiss="modal"
                                                        aria-label="Close"><span aria-hidden="true">×</span>
                                                    </button>
                                                </div>
                                                <div class="modal-body">
                                                    {{-- form --}}
                                                    <div class="x_content">
                                                        <br />
                                                        <form class="form-horizontal form-label-left"
                                                            action="{{ route('storeUser') }}" method="post">
                                                            @csrf
                                                            <div class="form-group row ">
                                                                <label class="control-label col-md-3 col-sm-3 ">
                                                                    Names <span class="required">*</span></label>
                                                                <div class="col-md-9 col-sm-9 ">
                                                                    <input type="text" name="name" class="form-control"
                                                                        required placeholder="Enter User Name">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row ">
                                                                <label class="control-label col-md-3 col-sm-3 ">Email<span class="required">*</span></label>
                                                                <div class="col-md-9 col-sm-9 ">
                                                                    <input type="text" name="email"
                                                                        class="form-control" required
                                                                        placeholder="Enter Email">
                                                                </div>
                                                            </div>
                                                            <div class="form-group row">
                                                                <label class="control-label col-md-3 col-sm-3 ">Password<span class="required">*</span>
                                                                </label>
                                                                <div class="col-md-9 col-sm-9 ">
                                                                    <input type="password" class="form-control"
                                                                        name="password"
                                                                        placeholder="Enter Password">
                                                                </div>
                                                            </div>

                                                            <div class="form-group row">
                                                                <label class="control-label col-md-3 col-sm-3 ">Confirm-Password<span class="required">*</span>
                                                                </label>
                                                                <div class="col-md-9 col-sm-9 ">
                                                                    <input type="password" class="form-control"
                                                                        name="password_confirmation"
                                                                        placeholder="Enter Confirm-Password">
                                                                </div>
                                                            </div>
                                                            <div class="ln_solid"></div>
                                                            <div class="form-group">
                                                                <div class="col-md-9 col-sm-9  offset-md-3">
                                                                    <button type="submit"
                                                                        class="btn btn-success  pull-right">Submit</button>
                                                                </div>
                                                            </div>

                                                        </form>
                                                    </div>
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary"
                                                        data-dismiss="modal">Close</button>
                                                    {{-- <button type="button" class="btn btn-primary">Save
                                                        changes</button> --}}
                                                </div>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- /modals -->

                                    <table id="datatable-responsive"
                                        class="table table-striped table-bordered dt-responsive nowrap" cellspacing="0"
                                        width="100%">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Names</th>
                                                <th>Email</th>
                                                <th>User Type</th>
                                                <th>Created At</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($Users as $key => $user)
                                            <tr>
                                                <td>{{ $key + 1 }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->email }}</td>
                                                <td>
                                                    @if ($user->usertype === 'user')
                                                    healthcare provider
                                                    @else
                                                    admin
                                                    @endif

                                                </td>
                                                <td>{{ $user->created_at }}</td>
                                                <td>
                                                    <a href="{{ route('delete',$user->id) }}" class="btn btn-danger btn-sm">delete</a>
                                                </td>
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
