<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('frontend/nowui/img/apple-icon.png') }}">
    <link rel="icon" type="image/png" href="{{ asset('frontend/nowui/img/favicon.png') }}">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>{{ $title }} | {{ config('sximo.cnf_appname') }}</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no' name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="{{ asset('frontend/nowui/css/bootstrap.min.css') }}" rel="stylesheet" />
    <link href="{{ asset('frontend/nowui/css/now-ui-kit.css') }}" rel="stylesheet" />
    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.1/jquery.js"></script>
    
    
    
    
    <!-- CSS Just for demo purpose, don't include it in your project -->
    
    <!-- CUSTOM CSS -->
    <!-- You can change the theme colors from here --><!--Toaster Popup message CSS -->
    <script src="{{ asset('assets/plugins/moment/moment.js')}}"></script>
    <script src="{{ asset('assets/js/sximo.min.js')}}"></script>
    <script src="{{ asset('assets/js/sximo5.js')}}"></script>
    <!-- Chart JS -->
    <!-- CSS Files -->
    <link href="{{ asset('frontend/nowui/css/legacy.css')}}" rel="stylesheet">
    
   
    <!-- CSS Just for demo purpose, don't include it in your project --> 
    
</head>

<body class="template-page">
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-primary fixed-top ">
    @include('layouts.nowui.navigation')
    </nav>
    <!-- End Navbar -->
    <div class="wrapper">
    @include($pages)
        <div class="section">
        </div>
        <footer class="footer ">
            <div class="container">
                <nav>
                    <ul>
                        <li>
                            <a href="{{ url('about-us') }}">
                                About Us
                            </a>
                        </li>
                    </ul>
                </nav>
                <div class="copyright">
                    &copy;
                    <script>
                        document.write(new Date().getFullYear())
                    </script>, Designed and Coded by
                    <strong class="text-primary">codename [.]</strong>. &copy; Copyright <strong class="text-primary">{{ config('sximo.cnf_comname') }}</strong>.
                </div>
            </div>
        </footer>
    </div>
</body>
<!--   Core JS Files   -->
<script src="{{ asset('frontend/nowui/js/core/popper.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/nowui/js/core/bootstrap.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('frontend/nowui/js/plugins/moment.min.js') }}"></script>
<!--  Plugin for Switches, full documentation here: http://www.jque.re/plugins/version3/bootstrap.switch/ -->
<script src="{{ asset('frontend/nowui/js/plugins/bootstrap-switch.js') }}"></script>
<!--	Plugin for Tags, full documentation here: https://github.com/bootstrap-tagsinput/bootstrap-tagsinputs  -->
<script src="{{ asset('frontend/nowui/js/plugins/bootstrap-tagsinput.js') }}"></script>
<!--	Plugin for Select, full documentation here: http://silviomoreto.github.io/bootstrap-select -->
<script src="{{ asset('frontend/nowui/js/plugins/bootstrap-selectpicker.js') }}" type="text/javascript"></script>

<!--	Plugin for Fileupload, full documentation here: http://www.jasny.net/bootstrap/javascript/#fileinput -->
<script src="{{ asset('frontend/nowui/js/plugins/jasny-bootstrap.min.js') }}"></script>
<!--  Plugin for the Sliders, full documentation here: http://refreshless.com/nouislider/ -->
<script src="{{ asset('frontend/nowui/js/plugins/nouislider.min.js') }}" type="text/javascript"></script>
<!--  Plugin for the DatePicker, full documentation here: https://github.com/uxsolutions/bootstrap-datepicker -->
<script src="{{ asset('frontend/nowui/js/plugins/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<!-- Control Center for Now Ui Kit: parallax effects, scripts for the example pages etc -->
<script src="{{ asset('frontend/nowui/js/now-ui-kit.js?v=1.1.0') }}" type="text/javascript"></script>

</html>