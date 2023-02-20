<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <meta charset="utf-8" />


    <!-- Title -->
    <title>@yield('title', 'Dashboard') - {{ config('app.name') }}</title>

    <meta name="description" content="overview &amp; stats" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />



    <!-- fav icon -->
    <link rel="icon" href="{{ asset('assets/images/fav.png') }}" type="image/png">

    <!-- Select2 css -->
    <link href="{{ asset('assets/vendor/select2/css/select2.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Daterangepicker css -->
    <link href="{{ asset('assets/vendor/daterangepicker/daterangepicker.css') }}" rel="stylesheet" type="text/css" />

    <!-- Fullcalendar css -->
    <link href="{{ asset('assets/vendor/fullcalendar/main.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Touchspin css -->
    <link href="{{ asset('assets/vendor/bootstrap-touchspin/jquery.bootstrap-touchspin.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Datepicker css -->
    <link href="{{ asset('assets/vendor/bootstrap-datepicker/css/bootstrap-datepicker.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Bootstrap Timepicker css -->
    <link href="{{ asset('assets/vendor/bootstrap-timepicker/css/bootstrap-timepicker.min.css') }}" rel="stylesheet" type="text/css" />


    <!-- Datatables css -->
    <link href="{{ asset('assets/vendor/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-responsive-bs5/css/responsive.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-fixedcolumns-bs5/css/fixedColumns.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-fixedheader-bs5/css/fixedHeader.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-buttons-bs5/css/buttons.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/datatables.net-select-bs5/css/select.bootstrap5.min.css') }}" rel="stylesheet" type="text/css" />

    <!-- Theme Config Js -->
    <script src="{{ asset('assets/js/hyper-config.js') }}"></script>

    <!-- App css -->
    <link href="{{ asset('assets/css/app-saas.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />

    <!-- Icons css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css"/>

    <!-- Quill css -->
    <link href="{{ asset('assets/vendor/quill/quill.core.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendor/quill/quill.snow.css') }}" rel="stylesheet" type="text/css" />



    <link href="//cdn.jsdelivr.net/npm/@sweetalert2/theme-dark@4/dark.css" rel="stylesheet">

    <!-- page specific plugin styles -->
    @yield('css')

    @stack('style')




    <!-- Global site tag (gtag.js) - Google Analytics -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=UA-110599322-1"></script>
    <script>
        window.dataLayer = window.dataLayer || [];

        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'UA-110599322-1');
    </script>

    <!-- custom and global style -->
    <style type="text/css">
        .fa-business-profile:before {
            content: "\f1cc";
        }

        input[type=number]::-webkit-inner-spin-button,
        input[type=number]::-webkit-outer-spin-button {
            -webkit-appearance: none;
            margin: 0;
        }

        .table>tbody>tr>td {
            vertical-align: middle;
        }

        .logo {
            height: 25px !important;
            width: 269px !important;
        }

        .no-skin .sidebar-shortcuts {
            background-color: #dfe2cd;
            padding-top: 10px;
            padding-bottom: 10px;
            font-size: 14px;
        }

        .ace-nav>li {
            border-left: 1px solid #bfc1ae !important;
        }

        .bg-dark {
            background-color: #ededed !important;
        }

        select.required:invalid {
            height: 0px !important;
            opacity: 0 !important;
            position: absolute !important;
            display: flex !important;
        }

        .btn {
            border-radius: 5px;
        }




        /* Widget Hader Color */
        .widget-header {
            background: #eaf4fa !important;
        }

        .ui-helper-hidden-accessible>div {
            display: none !important;
        }

        /* .widget-main {
            min-height: 500px;
        } */

        .navbar-fixed-top+.main-container {
            padding-top: 46px
        }

    </style>









    @if (strlen(optional(auth()->user())->name) >= 10)
        <style>
            .user-info {
                width: 120px;
                max-width: 250px;
            }

        </style>
    @endif




    <!-- bootstrap4 support css -->
    <link rel="stylesheet" href="{{ asset('assets/custom_css/color-size.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/custom_css/bootstrap4.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/custom_css/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/custom_css/drag-and-drop.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/custom_css/gallery.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/custom_css/jquery.toast.css') }}" />
</head>
