<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="icon" href="{{ asset('assets/images/logo.png') }}" type="image/ico" />

    <title>{{ $titles }}</title>

    <!-- Bootstrap -->
    <link href="{{ asset('assets/vendors/bootstrap/dist/css/bootstrap.min.css') }} " rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }} " rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ asset('assets/vendors/nprogress/nprogress.css') }} " rel="stylesheet">
    <!-- iCheck -->
    <link href="{{ asset('assets/vendors/iCheck/skins/flat/green.css') }} " rel="stylesheet">

    <!-- bootstrap-progressbar -->
    <link href="{{ asset('assets/vendors/bootstrap-progressbar/css/bootstrap-progressbar-3.3.4.min.css') }} "
        rel="stylesheet">
    <!-- JQVMap -->
    <link href="{{ asset('assets/vendors/jqvmap/dist/jqvmap.min.css') }} " rel="stylesheet" />
    <!-- bootstrap-daterangepicker -->
    <link href="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.css') }} " rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ asset('assets/build/css/custom.min.css') }} " rel="stylesheet">
    <!-- Bootstrap -->
    <link href="cdn.datatables.net/1.10.20/css/jquery.dataTables.min.css">
    <!-- Datatables -->

    <link href="{{ asset('assets/vendors/datatables.net-bs/css/dataTables.bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-buttons-bs/css/buttons.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-fixedheader-bs/css/fixedHeader.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-responsive-bs/css/responsive.bootstrap.min.css') }}"
        rel="stylesheet">
    <link href="{{ asset('assets/vendors/datatables.net-scroller-bs/css/scroller.bootstrap.min.css') }}"
        rel="stylesheet">
    <!-- PNotify -->
    <link href="{{ asset('assets/vendors/pnotify/dist/pnotify.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/pnotify/dist/pnotify.buttons.css') }}" rel="stylesheet">
    <link href="{{ asset('assets/vendors/pnotify/dist/pnotify.nonblock.css') }}" rel="stylesheet">
    <style>
        .hidden {
            display: none;
        }
    </style>
</head>

<body class="nav-md">
    <div class="container body">
        <div class="main_container">
            <div class="col-md-3 left_col">
                <div class="left_col scroll-view">
                    <div class="navbar nav_title" style="border: 0;">
                        <a href="{{ route('dashboard') }}" class="site_title">
                            <i class="fa fa-car"></i> <span>
                                HIVCARE-HUB
                            </span></a>
                    </div>

                    <div class="clearfix"></div>

                    <!-- menu profile quick info -->
                    <div class="profile clearfix">
                        <div class="profile_pic">
                            <img src="{{ asset('assets/images/logo.png') }}" alt="..."
                                class="img-circle profile_img">
                        </div>
                        <div class="profile_info">
                            <span>Welcome,</span>
                            <h2>{{ Auth::user()->name }}</h2>
                            <h2>{{ Auth::user()->email }}</h2>
                        </div>
                    </div>
                    <!-- /menu profile quick info -->

                    <br />

                    <!-- sidebar menu -->
                    @include('layouts.body.sidebar')
                </div>

                @include('layouts.body.header')
                <!-- /top navigation -->

                @yield('admin')
                <!-- /page content -->

                <!-- footer content -->
                @include('layouts.body.footer')
                <!-- /footer content -->
            </div>
        </div>

        <!-- jQuery -->
        <script src="{{ asset('assets/vendors/jquery/dist/jquery.min.js') }}"></script>
        <!-- Bootstrap -->
        <script src="{{ asset('assets/vendors/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
        <!-- FastClick -->
        <script src="{{ asset('assets/vendors/fastclick/lib/fastclick.js') }}"></script>
        <!-- NProgress -->
        <script src="{{ asset('assets/vendors/nprogress/nprogress.js') }}"></script>
        <script src="{{ asset('assets/vendors/gauge.js/dist/gauge.min.js') }}"></script>
        <!-- bootstrap-progressbar -->
        <script src="{{ asset('assets/vendors/bootstrap-progressbar/bootstrap-progressbar.min.js') }}"></script>
        <!-- iCheck -->
        <script src="{{ asset('assets/vendors/iCheck/icheck.min.js') }}"></script>
        <!-- Skycons -->
        <script src="{{ asset('assets/vendors/skycons/skycons.js') }}"></script>
        <!-- Flot -->
        <script src="{{ asset('assets/vendors/Flot/jquery.flot.js') }}"></script>
        <script src="{{ asset('assets/vendors/Flot/jquery.flot.pie.js') }}"></script>
        <script src="{{ asset('assets/vendors/Flot/jquery.flot.time.js') }}"></script>
        <script src="{{ asset('assets/vendors/Flot/jquery.flot.stack.js') }}"></script>
        <script src="{{ asset('assets/vendors/Flot/jquery.flot.resize.js') }}"></script>
        <!-- Flot plugins -->
        <script src="{{ asset('assets/vendors/flot.orderbars/js/jquery.flot.orderBars.js') }}"></script>
        <script src="{{ asset('assets/vendors/flot-spline/js/jquery.flot.spline.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/flot.curvedlines/curvedLines.js') }}"></script>
        <!-- DateJS -->
        <script src="{{ asset('assets/vendors/DateJS/build/date.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('assets/vendors/jqvmap/dist/jquery.vmap.js') }}"></script>
        <script src="{{ asset('assets/vendors/jqvmap/dist/maps/jquery.vmap.world.js') }}"></script>
        <script src="{{ asset('assets/vendors/jqvmap/examples/js/jquery.vmap.sampledata.js') }}"></script>
        <!-- bootstrap-daterangepicker -->
        <script src="{{ asset('assets/vendors/moment/min/moment.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/bootstrap-daterangepicker/daterangepicker.js') }}"></script>
        <!-- Datatables -->
        <script src="{{ asset('assets/vendors/datatables.net/js/jquery.dataTables.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-bs/js/dataTables.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-buttons-bs/js/buttons.bootstrap.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.flash.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-fixedheader/js/dataTables.fixedHeader.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-keytable/js/dataTables.keyTable.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-responsive/js/dataTables.responsive.min.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-responsive-bs/js/responsive.bootstrap.js') }}"></script>
        <script src="{{ asset('assets/vendors/datatables.net-scroller/js/dataTables.scroller.min.js') }}"></script>
        <!-- PNotify -->
        <script src="{{ asset('assets/vendors/pnotify/dist/pnotify.js') }}"></script>
        <script src="{{ asset('assets/vendors/pnotify/dist/pnotify.buttons.js') }}"></script>
        <script src="{{ asset('assets/vendors/pnotify/dist/pnotify.nonblock.js') }}"></script>
        <!-- Custom Theme Scripts -->
        <script src="{{ asset('assets/build/js/custom.min.js') }}"></script>


        {{-- 2nd --}}

        <script>
            function handleButtonClick() {

                // Get the select element
                var selectElement = document.getElementById('heard');

                // Add event listener for change event
                selectElement.addEventListener('change', function() {
                    // Get the selected value
                    var selectedValue = selectElement.value;
                    console.log(selectedValue); // You can use this value as needed
                });
            }
        </script>

        <script>
            $(document).ready(function() {

                $(document).on('click', '.add', function() {
                    var html = '';
                    var number_of_rows = $('#item_table tr').length + 1;

                    html +=
                        `<tr><td><div class="row mb-3">
                        <div class="col-1"><input type="checkbox" value="${number_of_rows}" name="answer[${number_of_rows}]" class="form-check-input" style="width: 31px; height: 31px;"></div>
                        <div class="col-10"><input name="options[${number_of_rows}]" type="text" required class="form-control" placeholder="Choice ${number_of_rows}"></div>
                        <div class="col-1"> <button class="btn btn-danger remove"><i class="ti ti-minus"></i>-</button></div></div></td></tr>`;
                    $('#item_table').append(html);
                });

                $(document).on('click', '.remove', function() {
                    $(this).closest('tr').remove();
                });

            });
        </script>
        {{-- check to upload image --}}
        <script>
            document.getElementById("checkbox").addEventListener("change", function() {
                var fileInputContainer = document.getElementById("fileInputContainer");
                if (this.checked) {
                    fileInputContainer.classList.remove("hidden");
                } else {
                    fileInputContainer.classList.add("hidden");
                }
            });
        </script>

        @if (session()->has('success'))
            <script>
                // $(document).ready(function() {
                new PNotify({
                    title: 'Message',
                    text: '{{ session()->get('success') }}',
                    type: 'success',
                    hide: false,
                    styling: 'bootstrap3'
                });
                // });
            </script>
        @endif
        @if (session()->has('warning'))
            <script>
                // $(document).ready(function() {
                new PNotify({
                    title: 'Message',
                    text: '{{ session()->get('warning') }}',
                    hide: false,
                    styling: 'bootstrap3'
                });
                // });
            </script>
        @endif
        @if (session()->has('error'))
            <script>
                // $(document).ready(function() {
                new PNotify({
                    title: 'Error',
                    text: '{{ session()->get('error') }}',
                    type: 'error',
                    hide: false,
                    styling: 'bootstrap3'
                });
                // });
            </script>
        @endif

        @if ($errors->any())
            @foreach ($errors->all() as $error)
            @endforeach
            @php
                $data = 'Error Accurs';
            @endphp
            <script>
                // $(document).ready(function() {
                new PNotify({
                    title: 'Error',
                    text: '{{ $error }}',
                    type: 'error',
                    hide: false,
                    styling: 'bootstrap3'
                });
                // });
            </script>
        @endif

</body>

</html>
