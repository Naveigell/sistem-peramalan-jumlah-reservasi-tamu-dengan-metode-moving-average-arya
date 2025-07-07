<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/all.css') }}" rel="stylesheet">
    @stack('styles')
    <style type="text/css">
        .pull-right {
            float: right;
        }
        .number {
            text-align: right;
        }
        .modal-footer {
            display: block;
        }
        #search-item tbody tr {
            cursor: pointer;
        }
        #search-fifo tbody tr {
            cursor: pointer;
        }
        img#preview {
            border: 1px solid #000000;
        }
        .select2-container--default .select2-selection--multiple .select2-selection__choice {
            background-color: #2255a4;
        }
        .modal-lg {
            max-width: 1200px;
        }
        .table td {
            padding: 5px;
        }
        .scroll-sidebar {
            height: 600px;
            overflow-y: auto;
        }
        .sidebar-item:hover {
            background-color: #ffab64;
        }
        .sidebar-item .active {
            background-color: #27a9e3;
        }
        .select2 {
            width: 100% !important;
        }
        .dataTables_wrapper .dataTables_processing {
            width: 100%;
            height: 100%;
            top: 0px;
            z-index: 2;
        }
        #loader {
            border: 16px solid #f3f3f3;
            border-radius: 50%;
            border-top: 16px solid #3498db;
            width: 120px;
            height: 120px;
            -webkit-animation: spin 2s linear infinite;
            animation: spin 2s linear infinite;
            margin-left:45%;
            margin-top:10%;
        }
        @-webkit-keyframes spin {
            0% { -webkit-transform: rotate(0deg); }
            100% { -webkit-transform: rotate(360deg); }
        }

        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
        @media (max-width: 600px) {
            .action-box {
                width: 160px !important;
            }
        }
        @media (min-width: 768px) {
            .navbar-expand-md .navbar-nav .dropdown-menu {
                position: absolute;
                left: -160px;
            }
        }
    </style>
</head>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>

    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar" data-navbarbg="skin5">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <div class="navbar-header" data-logobg="skin5">
                    <!-- This is for the sidebar toggle which is visible on mobile only -->
                    <a class="nav-toggler waves-effect waves-light d-block d-md-none" href="javascript:void(0)"><i class="ti-menu ti-close"></i></a>
                    <!-- ============================================================== -->
                    <!-- Logo -->
                    <!-- ============================================================== -->
                    <a class="navbar-brand" href="{{ route('dashboard') }}" style="background: white; display: flex; align-items: center;">
                        <!-- Logo icon -->
                        <b class="logo-icon text-center">
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="{{ asset('assets/images/logo.jpeg') }}" alt="homepage" class="light-logo" style="width: 50%; scale: 1;"/>
                        </b>
                        <!--End Logo icon -->
                         <!-- Logo text -->
                        <span class="logo-text text-dark">
                             <!-- dark Logo text -->
                             {{-- <img src="{{ asset('assets/images/logo-text.png') }}" alt="homepage" class="light-logo" /> --}}
                            Hotel Vila Shanti
                        </span>
                        <!-- Logo icon -->
                        <!-- <b class="logo-icon"> -->
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <!-- <img src="../../assets/images/logo-text.png" alt="homepage" class="light-logo" /> -->

                        <!-- </b> -->
                        <!--End Logo icon -->
                    </a>
                    <!-- ============================================================== -->
                    <!-- End Logo -->
                    <!-- ============================================================== -->
                    <!-- ============================================================== -->
                    <!-- Toggle which is visible on mobile only -->
                    <!-- ============================================================== -->
                    <a class="topbartoggler d-block d-md-none waves-effect waves-light" href="javascript:void(0)" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><i class="ti-more"></i></a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-left mr-auto">
                        <li class="nav-item d-none d-md-block"><a class="nav-link sidebartoggler waves-effect waves-light" href="javascript:void(0)" data-sidebartype="mini-sidebar"><i class="mdi mdi-menu font-24"></i></a></li>
                        <!-- ============================================================== -->
                        <!-- create new -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Search -->
                        <!-- ============================================================== -->
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-right">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- Messages -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="#" id="dropdownMenuButton" role="button" data-toggle="dropdown" aria-haspopup="true" data-bs-toggle="dropdown" aria-expanded="false">
                                 <i class="mdi mdi-bell font-24"></i> <span class="badge badge-pill badge-primary">0</span>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown" aria-labelledby="dropdownMenuButton">
                                <ul class="list-style-none">
                                    <li>
                                        <div class="">
                                            <!-- Message -->

                                        </div>
                                    </li>
                                </ul>
                            </ul>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Messages -->
                        <!-- ============================================================== -->
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle text-muted waves-effect waves-dark pro-pic" href="" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><img src="{{ asset('assets/images/users/1.jpg') }}" alt="user" class="rounded-circle" width="31"></a>
                            <div class="dropdown-menu dropdown-menu-right user-dd animated">
                                <a class="dropdown-item" href="{{ route('users.edit', ['user' => auth()->user()->id]) }}"><i class="fas fa-user"></i> {{ auth()->user()->name }}</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="#"><i class="ti-settings m-r-5 m-l-5"></i> Ubah Kata Sandi</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                   onclick="event.preventDefault();
                                                 document.getElementById('logout-form').submit();">
                                    <i class="fa fa-power-off m-r-5 m-l-5"></i> Keluar
                                </a>

                                <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                    @csrf
                                </form>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin5">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                @include('layouts.matrix-admin.menu')
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <div class="page-wrapper">
            @yield('content')
        </div>
    </div>
        <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('js/all.js') }}"></script>
    <script src="{{ asset('js/date-eu.js') }}"></script>

    @stack('scripts')
    <script type="text/javascript">
        var pos = -1
        var draft = 0
        function speratorRemove(val) {
            if(typeof val != 'undefined') {
                return parseFloat(val.replace(/[^-?0-9\.]/g,''))
            }
        }
        function speratorInsert(val, decimal = 2) {
            return parseFloat(val).toFixed(decimal).toString().replace(/[^-?0-9\.]/g, "").replace(/\B(?=(\d{3})+(?!\d))/g, ",")
        }
        function actSubmit(text, param) {
            const del = confirm(text)
            if (del) {
                $(param).submit()
            }
            return false
        }
        function delData(param) {
            actSubmit('Are You Sure Delete This Data ?', param)
        }
        function confirmAction(text) {
            const act = confirm(text)
            if (act) {
                return true
            }
            return false
        }
        function poProses(act, param) {
            actSubmit('Are You Sure You Want To ' + act + ' This PO ?', param)
        }
        function hitung(param) {
            const price = speratorRemove($('#price_' + param).val())
            let disc = 0
            let discNominal
            if($('#disc_' + param).length) {
                disc = speratorRemove($('#disc_' + param).val())
                discNominal = disc * price / 100
                if($('#disc_type_' + param).val() == '0') {
                    discNominal = disc
                }
            }
            let tax = 0
            if($('#tax_' + param).length) {
                tax = speratorRemove($('#tax_' + param).val())
            }
            const qty = speratorRemove($('#qty_' + param).val())

            const percentTax = tax * price / 100
            const subtotal = (price - discNominal + percentTax) * qty
            $('#subtotal_' + param).val(speratorInsert(subtotal, 0))
            grandTotalCount()
        }

        function grandTotalCount() {
            // console.log('asd')
            let total = 0;
            $('.subtotal').each(function(){
                total += speratorRemove($(this).val());
            });
            $('#total').val(speratorInsert(total, 0))
            const discount = speratorRemove($('#discount').val())
            const ppn = speratorRemove($('#ppn').val())
            let transport = 0
            if($('#transport').length) {
                transport = speratorRemove($('#transport').val())
            }
            const ppnNom = ((total - discount) * ppn) / 100
            const grand = total - discount + ppnNom + transport
            let payment = 0
            if ($('#payment') != undefined) {
                payment = speratorRemove($('#payment').val())
            }
            if ($('#change') != undefined) {
                const change = payment - grand
                $('#change').val(speratorInsert(change, 0))
            }
            $('#grand-total').val(speratorInsert(grand, 0))
        }
        $( document ).ready(function() {
            $(document).on('keyup', '.number', function(event) {
                // skip for arrow keys
                if(event.which >= 37 && event.which <= 40) return;
                //skip non number
                if ((event.which != 46 || $(this).val().indexOf('.') != -1) && (event.which < 48 || event.which > 57)) {
                  event.preventDefault();
                }
                // format number
                $(this).val(function(index, value) {
                  return value.replace(/[^-?0-9\.]/g,'').replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                });
            });
            $(document).on('keyup', '.change', function (event) {
                countTotal()
            })
            $(document).on('click', '.delete', function () {
                $($(this).closest('tr')).remove()
                return false
            })
            $(document).on('click', '.del-form', function () {
                $($(this).closest('.row')).remove()
                return false
            })
            $(document).on('click', '.multi-delete', function () {
                $('.row_' + $(this).data('row')).each(function () {
                    $(this).remove()
                })
                return false
            })
            $(document).on('keyup', '.count-total', function () {
                grandTotalCount()
            })
            // jgan ubah change ke keyup, ada masalah tidak bisa input decimal pada ir proses.
            $(document).on('change', '.max', function () {
                const qty = speratorRemove($(this).val())
                let nilai = 0
                if(qty > parseFloat($(this).data('max'))) {
                    alert("Exceed the Maximum Price")
                    nilai = $(this).data('max')
                }
                else if(qty < parseFloat($(this).data('min'))) {
                    nilai = $(this).data('min')
                    alert("Exceed the Minimum Price")
                }
                else {
                    nilai = qty
                }
                $(this).val(speratorInsert(nilai, 0))
            })
            $(document).on('change', '.source', function () {
                verifyBtn()
            })

            $(document).on('keyup', '.change-max', function () {
                const pos = $(this).data('pos')
                const max = parseInt($('#max_' + pos).val())
                if (parseInt($(this).val()) > max) {
                    $(this).val(max)
                    hitung(pos)
                }
            })

            $(document).on('focus', 'input:text', function() {
                if ($(this).val() == '0'){
                    $(this).select();
                }
            })

            $('.form-no-enter').on('keyup keypress', function(e) {
                var keyCode = e.keyCode || e.which;
                if (keyCode === 13) {
                    e.preventDefault();
                    return false;
                }
            });

            $('.select-normal').select2()

            $('#summernote').summernote({
                height: 200
            });
        })
        $('.datepicker').datepicker({
            autoclose: true,
            format: "dd-mm-yyyy",
            todayHighlight: true
        })
        $('input[name="dates"]').daterangepicker({
            startDate: moment().subtract(1, 'month'),
            locale: {
                format: 'DD/MM/YYYY'
            },
            ranges: {
               'Today': [moment(), moment()],
               'Yesterday': [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
               'Last 7 Days': [moment().subtract(6, 'days'), moment()],
               'Last 30 Days': [moment().subtract(29, 'days'), moment()],
               'This Month': [moment().startOf('month'), moment().endOf('month')],
               'Last Month': [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
            }
        });
    </script>
</body>
</html>
