<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="csrf-token" content="{{csrf_token()}}">

    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>PRADAN - Professional Assistance for Development Action</title>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">


    <link rel="stylesheet" href="{{ asset('assets/vendors/feather/feather.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/css/vendor.bundle.base.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/font-awesome/css/font-awesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendors/mdi/css/materialdesignicons.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/vendors/ti-icons/css/themify-icons.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">

    <link rel="shortcut icon" href="assets/images/favicon.png" />

    <!-- DataTables CSS -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.12.1/css/jquery.dataTables.min.css">




    <style>
    .step {
        display: none;
    }

    .step.active {
        display: block;
    }

    .step3-container {
        display: flex;
        flex-direction: column;
        gap: 15px;

        /* Added spacing */
    }

    #land_table tbody tr {
        height: 80px;
        /* Adjust as needed */
        vertical-align: middle;
    }

    #land_table td,
    #land_table th {
        padding: 1rem !important;
        font-size: 15px;
    }

    #land_table .btn {
        padding: 10px 20px !important;
        font-size: 16px !important;
        /* border-radius: 0.25rem !important; */
    }

    #pond_table tbody tr {
        height: 80px;
        /* Adjust as needed */
        vertical-align: middle;
    }

    #pond_table td,
    #pond_table th {
        padding: 1rem !important;
        font-size: 15px;
    }

    #pond_table .btn {
        padding: 10px 20px !important;
        font-size: 16px !important;
        /* border-radius: 0.25rem !important; */
    }

    #plant_table tbody tr {
        height: 80px;
        /* Adjust as needed */
        vertical-align: middle;
    }

    #plant_table td,
    #plant_table th {
        padding: 1rem !important;
        font-size: 15px;
    }

    #plant_table .btn {
        padding: 10px 20px !important;
        font-size: 16px !important;
        /* border-radius: 0.25rem !important; */
    }

    .dataTables_wrapper .dataTables_filter input {
        margin-left: 0.5rem;
        padding: 5px 10px;
    }

    /* General Table Styling */
    .dataTables_wrapper .dataTables_filter input {
        border: 1px solid #ccc;
        padding: 8px 12px;
        border-radius: 0.25rem;
        outline: none;
        font-size: 14px;
        transition: all 0.2s;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #4b49ac;
        box-shadow: 0 0 0 0.1rem rgba(75, 73, 172, 0.25);
    }

    /* Pagination Buttons */
    .dataTables_wrapper .dataTables_paginate .paginate_button {
        padding: 6px 12px;
        margin: 0 2px;
        border-radius: 0.25rem;
        background-color: #f8f9fa;
        border: 1px solid #ddd;
        font-size: 14px;
        color: #333;
        transition: all 0.3s ease;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button:hover {
        background-color: #4b49ac;
        color: #fff !important;
        border-color: #4b49ac;
    }

    .dataTables_wrapper .dataTables_paginate .paginate_button.current {
        background-color: #134E13;
        color: white !important;
        border-color: #fff;
    }

    /* Table Info Text */
    .dataTables_wrapper .dataTables_info {
        font-size: 14px;
        margin-top: 10px;
    }

    /* Search Label */
    .dataTables_wrapper .dataTables_filter label {
        font-weight: 600;
        font-size: 14px;
    }

    /* Hide the default 'Search:' label text */
    .dataTables_wrapper .dataTables_filter label {
        display: flex;
        justify-content: flex-end;
        align-items: center;
        gap: 0.5rem;
        font-size: 0;
        /* Hides text but keeps layout */
    }

    /* Search input styling */
    .dataTables_wrapper .dataTables_filter input {
        margin-top: 5px;
        margin-right: 3px;
        margin-bottom: 10px;
        border: 1px solid #ccc;
        padding: 8px 12px 8px 35px;
        /* left space for icon */
        border-radius: 25px;
        outline: none;
        font-size: 14px;
        transition: all 0.2s;
        width: 250px;
        background-color: #fff;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' fill='gray' viewBox='0 0 16 16'%3E%3Cpath d='M11.742 10.344a6.5 6.5 0 1 0-1.397 1.398h-.001l3.85 3.85a1 1 0 0 0 1.415-1.414l-3.85-3.85zm-5.242.656a5 5 0 1 1 0-10 5 5 0 0 1 0 10z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: 10px center;
        background-size: 16px 16px;
    }

    .dataTables_wrapper .dataTables_filter input:focus {
        border-color: #134E13;
        box-shadow: 0 0 0 2px rgba(75, 73, 172, 0.1);
        outline: none;
    }

    /* Responsive Wrapping Fix */
    @media (max-width: 768px) {

        .dataTables_wrapper .dataTables_filter,
        .dataTables_wrapper .dataTables_paginate {
            text-align: center;
            float: none !important;
        }
    }
    </style>
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo me-5" href="{{route('vol')}}"><img
                        src="{{ asset('assets/images/icons/Pradan-logo-title.png')}}" class="me-2" alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('vol')}}"><img
                        src="{{asset('assets/images/icons/Pradan-logo-icon.png')}}" alt="logo" /></a>
            </div>
            <div class="navbar-menu-wrapper d-flex align-items-center justify-content-end">
                <button class="navbar-toggler navbar-toggler align-self-center" type="button" data-toggle="minimize">
                    <span class="icon-menu"></span>
                </button>

                <ul class="navbar-nav navbar-nav-right">

                    <li class="nav-item nav-profile dropdown">
                        <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" id="profileDropdown">
                            <img src="assets/images/faces/face15.jpg" alt="profile" />
                        </a>
                        <div class="dropdown-menu dropdown-menu-right navbar-dropdown"
                            aria-labelledby="profileDropdown">
                            <a class="dropdown-item">
                                <i class="ti-user text-primary"></i> Profile </a>
                            <a class="dropdown-item" href="{{ route('login') }}">
                                <i class="ti-power-off text-primary"></i> Logout </a>
                        </div>
                    </li>
                </ul>
                <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button"
                    data-toggle="offcanvas">
                    <span class="icon-menu"></span>
                </button>
            </div>
        </nav>
        <div class="container-fluid page-body-wrapper">
            <!-- Sidebar -->
            <nav class="sidebar sidebar-offcanvas" id="sidebar">
                <ul class="nav">
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('vol')}}">
                            <i class="icon-grid menu-icon"></i>
                            <span class="menu-title">Dashboard</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" data-bs-toggle="collapse" href="#ui-basic" aria-expanded="false"
                            aria-controls="ui-basic">
                            <i class="icon-layout menu-icon"></i>
                            <span class="menu-title">Forms</span>
                            <i class="menu-arrow"></i>
                        </a>
                        <div class="collapse" id="ui-basic">
                            <ul class="nav flex-column sub-menu">
                                <li class="nav-item"> <a class="nav-link" href="{{route('form1')}}">Land Form</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('form2')}}">Pond Form</a>
                                </li>
                                <li class="nav-item"> <a class="nav-link" href="{{route('form3')}}">Plantation Form</a>
                                </li>
                            </ul>
                        </div>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('application')}}">
                            <i class="icon-columns menu-icon"></i>
                            <span class="menu-title">Applications</span>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('post_appl')}}">
                            <i class="ti-wallet menu-icon"></i>
                            <span class="menu-title">Post Funding</span>
                        </a>
                    </li>
                </ul>
            </nav>
            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    <div class="row">

                        <div class="col-lg-12 grid-margin stretch-card">
                            <div class="card">
                                <ul class="nav nav-tabs mb-3"
                                    style="border-radius: 10px 10px 10px 10px; overflow: hidden;" role="tablist">
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link active" data-bs-toggle="tab" href="#landform" role="tab"
                                            aria-selected="true">
                                            <i class="fas fa-seedling"></i><b>&nbsp;Land Form</b>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#pondform" role="tab"
                                            aria-selected="false">
                                            <i class="fas fa-water"></i><b>&nbsp;Pond Form</b>
                                        </a>
                                    </li>
                                    <li class="nav-item" role="presentation">
                                        <a class="nav-link" data-bs-toggle="tab" href="#plantform" role="tab"
                                            aria-selected="false">
                                            <i class="fas fa-tree"></i><b>&nbsp;Plantation Form</b>
                                        </a>
                                    </li>

                                </ul>
                                <div class="tab-content tabcontent-border">
                                    <div class="tab-pane p-20 active show" id="landform" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Land Form</h4>
                                                <div class="table-responsive">
                                                    <table id="land_table"
                                                        class="table table-bordered table-hover table-striped text-center">
                                                        <thead class="text-center table-dark">
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Application Number</th>
                                                                <th>Farmer Details</th>
                                                                <th>Land Details</th>
                                                                <th>Bank Details</th>
                                                                <th>Documents</th>
                                                                <th>Action</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $s = 1; @endphp

                                                            @foreach($form1 as $f)
                                                            @php
                                                            $account = $f->bankDetail->first();
                                                            @endphp
                                                            <tr>
                                                                <td>{{$s++}}</td>
                                                                <td>#TN0{{$f->id}}</td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="farmer_detail" value="{{$f->id}}"><i
                                                                            class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="land_detail" value="{{$f->id}}"><i
                                                                            class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button id="bank_detail" value="{{ $f->id }}"
                                                                        class="btn btn-link p-0"
                                                                        style="color: black; font-weight: bold; text-decoration: underline;">
                                                                        <b>{{ str_repeat('X', strlen($account->account_number) - 4) . substr($account->account_number, -4) }}</b>
                                                                    </button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="doc_view" value="{{$f->id}}">View</button>
                                                                </td>

                                                                <td>
                                                                    @if($f->status == 6)
                                                                    <button type="button"
                                                                        class="btn btn-primary pf_land"
                                                                        value="{{ $f->id }}">
                                                                        Post Fund
                                                                    </button>
                                                                    @elseif($f->status == 8)
                                                                    <button type="button"
                                                                        class="btn btn-warning edit_pf_land"
                                                                        value="{{ $f->id }}">
                                                                        Edit Post Fund
                                                                    </button>
                                                                    @else
                                                                    <button type="button"
                                                                        class="btn btn-inverse-warning btn-fw showrem"
                                                                        disabled>
                                                                        Waiting for Approval
                                                                    </button>
                                                                    @endif
                                                                </td>



                                                                <td>
                                                                    <button value="{{ $f->id }}"
                                                                        class="btn btn-inverse-warning btn-fw showrem">Waiting
                                                                        for Post Fund Details</button>

                                                                </td>
                                                            </tr>

                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane p-20" id="pondform" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Pond Form</h4>
                                                <div class="table-responsive">
                                                    <table id="pond_table"
                                                        class="table table-bordered table-hover table-striped text-center">
                                                        <thead class="text-center table-dark">
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Application Number</th>
                                                                <th>Farmer Details</th>
                                                                <th>Pond Details</th>
                                                                <th>Bank Details</th>
                                                                <th>Documents</th>
                                                                <th>Action</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $s = 1; @endphp

                                                            @foreach($form2 as $f)
                                                            @php
                                                            $account = $f->bankDetail->first();
                                                            @endphp
                                                            <tr>
                                                                <td>{{$s++}}</td>
                                                                <td>#TN-00{{$f->id}}</td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="farmer_detail" value="{{$f->id}}"><i
                                                                            class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="pond_detail" value="{{$f->id}}"><i
                                                                            class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button id="bank_detail" value="{{ $f->id }}"
                                                                        class="btn btn-link p-0"
                                                                        style="color: black; font-weight: bold; text-decoration: underline;">
                                                                        <b>{{ str_repeat('X', strlen($account->account_number) - 4) . substr($account->account_number, -4) }}</b>
                                                                    </button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="doc_view" value="{{$f->id}}">View</button>
                                                                </td>
                                                                <td>
                                                                    @if($f->status == 6)
                                                                    <button type="button"
                                                                        class="btn btn-primary pf_land"
                                                                        value="{{ $f->id }}">
                                                                        Post Fund
                                                                    </button>
                                                                    @elseif($f->status == 8)
                                                                    <button type="button"
                                                                        class="btn btn-warning edit_pf_land"
                                                                        value="{{ $f->id }}">
                                                                        Edit Post Fund
                                                                    </button>
                                                                    @else
                                                                    <button type="button"
                                                                        class="btn btn-inverse-warning btn-fw showrem"
                                                                        disabled>
                                                                        Waiting for Approval
                                                                    </button>
                                                                    @endif
                                                                </td>
                                                                <td>

                                                                    <button value="{{ $f->id }}"
                                                                        class="btn btn-inverse-warning btn-fw showrem">Waiting
                                                                        for Post Fund Details</button>
                                                                </td>
                                                            </tr>
                                                            @endforeach
                                                        </tbody>
                                                    </table>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="tab-pane p-20" id="plantform" role="tabpanel">
                                        <div class="card">
                                            <div class="card-body">
                                                <h4 class="card-title">Plantation Form</h4>
                                                <div class="table-responsive">
                                                    <table id="plant_table"
                                                        class="table table-bordered table-hover table-striped text-center">
                                                        <thead class="text-center table-dark">
                                                            <tr>
                                                                <th>S.No</th>
                                                                <th>Application Number</th>
                                                                <th>Farmer Details</th>
                                                                <th>Plantation Details</th>
                                                                <th>Bank Details</th>
                                                                <th>Documents</th>
                                                                <th>Action</th>
                                                                <th>Status</th>
                                                            </tr>
                                                        </thead>
                                                        <tbody>
                                                            @php $s = 1; @endphp
                                                            @foreach($form3 as $f)
                                                            @php
                                                            $account = $f->bankDetail->first();
                                                            @endphp
                                                            <tr>
                                                                <td>{{$s++}}</td>
                                                                <td>#TN-00{{$f->id}}</td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="farmer_detail" value="{{$f->id}}"><i
                                                                            class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="land_detail" value="{{$f->id}}"><i
                                                                            class="fas fa-eye"></i>View</button>
                                                                </td>
                                                                <td><button id="bank_detail" value="{{ $f->id }}"
                                                                        class="btn btn-link p-0"
                                                                        style="color: black; font-weight: bold; text-decoration: underline;">
                                                                        <b>{{ str_repeat('X', strlen($account->account_number) - 4) . substr($account->account_number, -4) }}</b>
                                                                    </button>
                                                                </td>
                                                                <td><button type="button" class="btn btn-primary"
                                                                        id="doc_view" value="{{$f->id}}">View</button>
                                                                </td>

                                                                <td>
                                                                    @if($f->status == 6)
                                                                    <button type="button"
                                                                        class="btn btn-primary pf_land"
                                                                        value="{{ $f->id }}">
                                                                        Post Fund
                                                                    </button>
                                                                    @elseif($f->status == 8)
                                                                    <button type="button"
                                                                        class="btn btn-warning edit_pf_land"
                                                                        value="{{ $f->id }}">
                                                                        Edit Post Fund
                                                                    </button>
                                                                    @else
                                                                    <button type="button"
                                                                        class="btn btn-inverse-warning btn-fw showrem"
                                                                        disabled>
                                                                        Waiting for Approval
                                                                    </button>
                                                                    @endif
                                                                </td>
                                                                <td>
                                                                    <button value="{{ $f->id }}"
                                                                        class="btn btn-inverse-warning btn-fw showrem">Waiting
                                                                        for Post Fund Details</button>
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
                <footer class="footer">
                    <div class="d-sm-flex justify-content-center justify-content-sm-between">
                        <span class="text-muted text-center text-sm-left d-block d-sm-inline-block">Copyright © 2025.
                            Developed and Maintained By <b>TIH & Developers Unit</b>.
                            All rights reserved.</span>

                        <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Contact Us <a
                                href="https://www.linkedin.com/company/professional-assistance-for-development-action/"><i
                                    class="ti-linkedin ms-2"></a></i></span>
                    </div>
                </footer>
            </div>
        </div>
    </div>

    <!-- Modalsss -->

    <!--  Farmer Detail Modal -->
    <div class="modal fade" id="farmerdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color:#134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Farmer Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Row 1 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Farmer Name:</strong> <span id="f_name"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Father/Spouse:</strong> <span id="f_spouse"></span>
                        </div>
                    </div>

                    <!-- Row 2 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Mobile:</strong> <span id="f_mobile"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Gender:</strong> <span id="f_gender"></span>
                        </div>
                    </div>

                    <!-- Row 3 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Id_Card:</strong> <span id="f_card"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Members:</strong> <span id="f_member"></span>
                        </div>
                    </div>

                    <!-- Row 4 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Id_Number:</strong> <span id="f_number"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Hamlet:</strong> <span id="f_hamlet"></span>
                        </div>
                    </div>

                    <!-- Row 5 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Panchayat:</strong> <span id="f_panchayat"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Block:</strong> <span id="f_block"></span>
                        </div>
                    </div>

                    <!-- Row 6 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Type of Household:</strong> <span id="f_household_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Special Category:</strong> <span id="f_special_category"></span>
                        </div>
                    </div>

                    <!-- Row 7 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Caste:</strong> <span id="f_caste"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Occupation:</strong> <span id="f_occupation"></span>
                        </div>
                    </div>

                    <!-- Row 8 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Type of House:</strong> <span id="f_house_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Drinking Water Source:</strong> <span id="f_drinking_water"></span>
                        </div>
                    </div>

                    <!-- Row 9 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Potability:</strong> <span id="f_potability"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Domestic Water Source:</strong> <span id="f_domestic_water"></span>
                        </div>
                    </div>

                    <!-- Row 10 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Toilet Availability:</strong> <span id="f_toilet_avail"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Toilet Condition:</strong> <span id="f_toilet_condition"></span>
                        </div>
                    </div>

                    <!-- Row 11 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>House Owner:</strong> <span id="f_house_owner"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Household Education:</strong> <span id="f_household_education"></span>
                        </div>
                    </div>

                    <!-- Row 12 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Latitude:</strong> <span id="f_latitude"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Longitude:</strong> <span id="f_longitude"></span>
                        </div>
                    </div>

                    <!-- Row 13 -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>MCode:</strong> <span id="f_mcode"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Land Detail Modal -->
    <div class="modal fade" id="landdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color: #134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Land Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Rows for Land Details -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Ownership:</strong> <span id="l_ownership"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Well Irrigation:</strong> <span id="l_well_irrigation"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Area Irrigated:</strong> <span id="l_area_irrigated"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Irrigated Lands:</strong> <span id="l_irrigated_lands"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Patta No:</strong> <span id="l_patta"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>total_est Area:</strong> <span id="l_tarea"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Revenue Village:</strong> <span id="l_revenue"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>S.F No:</strong> <span id="l_sf"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Soil Type:</strong> <span id="l_soil"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Land to Benefit:</strong> <span id="l_benefit"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Field Inspection:</strong> <span id="l_field"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Site Approval:</strong> <span id="l_site"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Date of Inspection:</strong> <span id="l_doi"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Date of Approval:</strong> <span id="l_doa"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Type of Work:</strong> <span id="l_type"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Area Benefits:</strong> <span id="l_area"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Other Works:</strong> <span id="l_oth"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Pradan Contribution:</strong> <span id="l_pradan"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Farmer Contribution:</strong> <span id="l_farmer"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>total_est Amount:</strong> <span id="l_total_est"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Pond Detail Modal -->
    <div class="modal fade" id="ponddet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 90%; width: 1000px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                <div class="modal-header" style="border-bottom: 2px solid #dee2e6; background-color: #134E13;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Pond Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <!-- Rows for Pond Details -->
                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Land Owner:</strong> <span id="p_owner"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Patta No:</strong> <span id="p_patta"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>total_est Area:</strong> <span id="p_tarea"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Irrigated Lands:</strong> <span id="p_irrigated_lands"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Revenue:</strong> <span id="p_revenue"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Livestock:</strong> <span id="p_livestock"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Crop Season:</strong> <span id="p_crop_season"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Well Irrigation:</strong> <span id="p_well_irrigation"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>SF No:</strong> <span id="p_sf"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Soil Type:</strong> <span id="p_soil"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Land to Serve:</strong> <span id="p_land"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Field Inspection:</strong> <span id="p_field"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Site Approval:</strong> <span id="p_site"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Type of Work:</strong> <span id="p_type_of_work"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Date of Inspection:</strong> <span id="p_doi"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Date of Approval:</strong> <span id="p_doa"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Length:</strong> <span id="p_len"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Depth:</strong> <span id="p_dep"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Breadth:</strong> <span id="p_breadth"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Volume:</strong> <span id="p_vol"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>Pradan Contribution:</strong> <span id="p_pcont"></span>
                        </div>
                        <div class="col-md-6 mb-3">
                            <strong>Farmer Contribution:</strong> <span id="p_fcont"></span>
                        </div>
                    </div>

                    <div class="row border p-2 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-md-6 mb-3">
                            <strong>total_est:</strong> <span id="total_est"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bank Detail Modal -->
    <div class="modal fade" id="bankdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" style="max-width: 600px;">
            <div class="modal-content" style="border-radius: 8px; box-shadow: 0 6px 18px rgba(0, 0, 0, 0.15);">
                <div class="modal-header" style="background-color: #134E13; border-bottom: 2px solid #dee2e6;">
                    <h5 class="modal-title text-white" id="exampleModalLabel">Bank Details</h5>
                    <button type="button" class="btn-close" style="background-color: #fff;" data-bs-dismiss="modal"
                        aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Holder Name:</strong> <span id="b_hname"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Account Number:</strong> <span id="b_no"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Bank Name:</strong> <span id="b_name"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>Branch:</strong> <span id="b_branch"></span>
                        </div>
                    </div>
                    <div class="row border p-3 mb-3" style="border-radius: 8px; border: 1px solid #ddd; margin:2px;">
                        <div class="col-12">
                            <strong>IFSC Code:</strong> <span id="b_ifsc"></span>
                        </div>
                    </div>
                </div>
                <div class="modal-footer" style="border-top: 2px solid #dee2e6;">
                    <button type="button" class="btn btn-primary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="modal fade" id="view_rem_modal" tabindex="-1" aria-labelledby="remarksLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Remarks from TL/Coordinator</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p id="view_remark_text" class="text-dark"></p>
                </div>
            </div>
        </div>
    </div>



    <!-- Modal -->
    <div class="modal fade" id="documentModal" tabindex="-1" aria-labelledby="documentModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Submitted Documents</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center" id="document-buttons">
                    <!-- Buttons will be added here dynamically -->
                </div>
            </div>
        </div>
    </div>

    <!-- File Viewer Modal -->
    <div class="modal fade" id="fileViewerModal" tabindex="-1" aria-labelledby="fileViewerModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered">
            <div class="modal-content p-4">
                <div class="modal-header">
                    <h5 class="modal-title">Document Preview</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                </div>
                <div class="modal-body text-center">
                    <iframe id="docPreview" src="" width="80%" height="400px" style="border: none;"></iframe>
                    <br>
                    <a id="docDownload" class="btn btn-success mt-3" href="#" download target="_blank">Download</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Post Funding Land -->
    <div class="modal fade" id="pf_land_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="pf_land_form">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Post Funding Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" id="pf_land_id" name="pf_land_id">
                        <div class="mb-3">
                            <label for="area_land" class="form-label">Area Benefiited</label>
                            <input type="number" class="form-control" id="area_land" name="area_land" required>
                        </div>

                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="pf_pond_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="pf_pond_form">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Post Funding Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" id="pf_pond_id" name="pf_pond_id">

                        <div class="mb-3">
                            <label for="length" class="form-label">Length (m)</label>
                            <input type="number" step="any" class="form-control" id="length" name="length" required>
                        </div>

                        <div class="mb-3">
                            <label for="breadth" class="form-label">Breadth (m)</label>
                            <input type="number" step="any" class="form-control" id="breadth" name="breadth" required>
                        </div>

                        <div class="mb-3">
                            <label for="depth" class="form-label">Depth (m)</label>
                            <input type="number" step="any" class="form-control" id="depth" name="depth" required>
                        </div>

                        <div class="mb-3">
                            <label for="volume" class="form-label">Volume (m³)</label>
                            <input type="number" class="form-control" id="volume" name="volume" readonly>
                        </div>

                        <div class="mb-3">
                            <label for="area_benefited" class="form-label">Area Benefited (sq.m)</label>
                            <input type="text" class="form-control" id="area_benefited" name="area_benefited" required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <div class="modal fade" id="pf_plant_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <form id="pf_plant_form">
                @csrf

                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Enter Post Funding Details</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>

                    <div class="modal-body">
                        <input type="text" id="pf_plant_id" name="pf_plant_id">

                        <div class="mb-3">
                            <label for="nos" class="form-label">No. of Plants</label>
                            <input type="number" class="form-control" id="nos" name="nos" required>
                        </div>

                        <div class="mb-3">
                            <label for="price" class="form-label">Price per Plant</label>
                            <input type="number" step="any" class="form-control" id="price" name="price" required>
                        </div>

                        <div class="mb-3">
                            <label for="other_expenses" class="form-label">Other Expenses</label>
                            <input type="number" step="any" class="form-control" id="other_expenses"
                                name="other_expenses" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_est_nos" class="form-label">total_est Plants</label>
                            <input type="number" class="form-control" id="total_est_nos" name="total_est_nos" required>
                        </div>

                        <div class="mb-3">
                            <label for="total_est_price" class="form-label">total_est Price</label>
                            <input type="number" step="any" class="form-control" id="total_est_price" name="total_est_price"
                                required>
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Edit PF Modal -->
<div class="modal fade" id="editPFModal" tabindex="-1" role="dialog">
  <div class="modal-dialog" role="document">
    <form id="editPFForm">
      @csrf
      <input type="hidden" name="form_id" id="edit_form_id">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title">Edit Post Funding - Land</h5>
          <button type="button" class="close" data-dismiss="modal">&times;</button>
        </div>
        <div class="modal-body">
          <div class="form-group">
            <label>Area PF</label>
            <input type="text" class="form-control" id="area_benefited_postfunding" name="area_benefited_postfunding" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal -->
<div class="modal fade" id="editPondPFModal" tabindex="-1" role="dialog" aria-labelledby="pondPFModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form id="editPondPFForm">
      @csrf
      <input type="hidden" name="form_id" id="edit_pond_form_id">
      <div class="modal-content">
        <div class="modal-header bg-warning text-white">
          <h5 class="modal-title" id="pondPFModalLabel">Edit Pond Post Funding</h5>
          <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <div class="form-group">
                <label>Length</label>
                <input type="number" step="0.01" name="len_pf" id="len_pf" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Breadth</label>
                <input type="number" step="0.01" name="bre_pf" id="bre_pf" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Depth</label>
                <input type="number" step="0.01" name="dep_pf" id="dep_pf" class="form-control" required>
            </div>
            <div class="form-group">
                <label>Volume</label>
                <input type="number" step="0.01" name="vol_pf" id="vol_pf" class="form-control" readonly>
            </div>
            <div class="form-group">
                <label>Area Benefited</label>
                <input type="text" name="area_benefited_postfunding" id="area_benefited_postfunding1" class="form-control" required>
            </div>
        </div>
        <div class="modal-footer">
          <button type="submit" class="btn btn-primary">Update</button>
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Edit Post Fund - Plant Form Modal -->
<div class="modal fade" id="editPlantPFModal" tabindex="-1" role="dialog" aria-labelledby="editPlantPFModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <form id="editPlantPFForm">
            @csrf
            <input type="hidden" name="form_id" id="plant_form_id">
            <div class="modal-content">
                <div class="modal-header bg-warning text-white">
                    <h5 class="modal-title">Edit Plant Post Funding</h5>
                    <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                        <span>&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label>No. of Plants</label>
                        <input type="text" class="form-control" name="nos" id="plant_nos" required>
                    </div>
                    <div class="form-group">
                        <label>Price</label>
                        <input type="text" class="form-control" name="price" id="plant_price" required>
                    </div>
                    <div class="form-group">
                        <label>Other Expenses</label>
                        <input type="text" class="form-control" name="other_exp" id="plant_other_exp" required>
                    </div>
                    <div class="form-group">
                        <label>total_est Nos</label>
                        <input type="text" class="form-control" name="total_est_nos" id="plant_total_est_nos" required>
                    </div>
                    <div class="form-group">
                        <label>total_est Price</label>
                        <input type="text" class="form-control" name="total_est_price" id="plant_total_est_price" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success">Update</button>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                </div>
            </div>
        </form>
    </div>
</div>



    <script>
    // Dynamically calculate volume
    document.addEventListener('input', function() {
        const length = parseFloat(document.getElementById('length').value) || 0;
        const breadth = parseFloat(document.getElementById('breadth').value) || 0;
        const depth = parseFloat(document.getElementById('depth').value) || 0;

        const volume = length * breadth * depth;
        document.getElementById('volume').value = volume.toFixed(2);
    });
    </script>






    <script>
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $(document).ready(function() {
        $('#land_table').DataTable({
            lengthChange: false
        });
        $('#pond_table').DataTable({
            lengthChange: false
        });
        $('#plant_table').DataTable({
            lengthChange: false
        });
        $('#land_table_filter input[type="search"]').attr('placeholder', 'Search...');
        $('#pond_table_filter input[type="search"]').attr('placeholder', 'Search...');
        $('#plant_table_filter input[type="search"]').attr('placeholder', 'Search...');

    });

    $(document).ready(function() {
        $('#length, #breadth, #depth').on('input', function() {
            let length = parseFloat($('#length').val()) || 0;
            let breadth = parseFloat($('#breadth').val()) || 0;
            let depth = parseFloat($('#depth').val()) || 0;
            let volume = length * breadth * depth;
            $('#volume').val(volume.toFixed(2));
        });


    });
    </script>

    <script>
    function nextStep(current, next) {
        document.getElementById('step' + current).style.display = 'none';
        document.getElementById('step' + next).style.display = 'block';
    }

    function prevStep(current, prev) {
        document.getElementById('step' + current).style.display = 'none';
        document.getElementById('step' + prev).style.display = 'block';
    }



    function updateIdentityTitle() {
        const selectedIdentity = document.querySelector('input[name="identityCard"]:checked');
        const fileUploadLabel = document.getElementById("fileUploadLabel");
        if (selectedIdentity) {
            fileUploadLabel.textContent = `Upload ${selectedIdentity.value} Proof`;
        }
    }

    function nextStep(current, next) {
        document.getElementById("step" + current).style.display = "none";
        document.getElementById("step" + next).style.display = "block";
    }

    function prevStep(current, previous) {
        document.getElementById("step" + current).style.display = "none";
        document.getElementById("step" + previous).style.display = "block";
    };

    $(document).on("submit", "#landform", function(e) {
        e.preventDefault();
        var form = new FormData(this);
        $.ajax({
            type: "POST",
            url: "/form_land",
            data: form,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 200) {
                    Swal.fire({
                        title: "Success!",
                        text: "Form Submitted Successfully",
                        icon: "success",
                        confirmButtonText: "OK"
                    });
                } else {
                    alert("something went wrong");
                }
            }
        })

    })


    $(document).on("click", "#farmer_detail", function(e) {
        e.preventDefault();
        var form_id = $(this).val();
        $.ajax({
            type: "GET",
            url: `/fetch_farmer_det/${form_id}`,
            success: function(response) {
                if (response.status == 200) {
                    console.log(response.data);
                    $("#f_name").text(response.data.farmer_name);
                    $("#f_spouse").text(response.data.spouse);
                    $("#f_mobile").text(response.data.mobile);
                    $("#f_gender").text(response.data.gender);
                    $("#f_card").text(response.data.id_type);
                    $("#f_member").text(response.data.h_members);
                    $("#f_number").text(response.data.id_number);
                    $("#f_hamlet").text(response.data.hamlet);
                    $("#f_panchayat").text(response.data.panchayat);
                    $("#f_block").text(response.data.block);
                    $("#f_household_type").text(response.data.type_of_households);
                    $("#f_special_category").text(response.data.special_catog);
                    $("#f_caste").text(response.data.caste);
                    $("#f_occupation").text(response.data.hh_occupation);
                    $("#f_house_type").text(response.data.type_of_house);
                    $("#f_drinking_water").text(response.data.drinking_water);
                    $("#f_potability").text(response.data.potability);
                    $("#f_domestic_water").text(response.data.domestic_water);
                    $("#f_toilet_avail").text(response.data.toilet_avail);
                    $("#f_toilet_condition").text(response.data.toilet_cond);
                    $("#f_house_owner").text(response.data.house_owner);
                    $("#f_household_education").text(response.data.household_education);
                    $("#f_latitude").text(response.data.lat);
                    $("#f_longitude").text(response.data.lon);
                    $("#f_mcode").text(response.data.mcode);

                    $("#farmerdet_modal").modal("show");
                }

            }

        })
    });

    $(document).on("click", "#land_detail", function(e) {
        e.preventDefault();
        var form_id = $(this).val();
        $.ajax({
            type: "GET",
            url: `/fetch_land_det/${form_id}`,
            success: function(response) {
                if (response.status == 200) {
                    $("#l_ownership").text(response.data.ownership);
                    $("#l_well_irrigation").text(response.data.well_irrigation); // Newly added
                    $("#l_area_irrigated").text(response.data.area_irrigated); // Newly added
                    $("#l_irrigated_lands").text(response.data.irrigated_lands); // Newly added
                    $("#l_patta").text(response.data.patta);
                    $("#l_tarea").text(response.data.total_est_area);
                    $("#l_revenue").text(response.data.revenue);
                    $("#l_sf").text(response.data.sf_number);
                    $("#l_soil").text(response.data.soil_type);
                    $("#l_benefit").text(response.data.land_to_benefit);
                    $("#l_field").text(response.data.field_insp);
                    $("#l_site").text(response.data.site_app);
                    $("#l_doi").text(response.data.date_of_ins);
                    $("#l_doa").text(response.data.date_of_app);
                    $("#l_type").text(response.data.type_of_work);
                    $("#l_area").text(response.data.area_benefit);
                    $("#l_oth").text(response.data.any_other_works);
                    $("#l_pradan").text(response.data.p_contribution);
                    $("#l_farmer").text(response.data.f_contribution);
                    $("#l_total_est").text(response.data.total_est_est);

                    $("#landdet_modal").modal("show");

                }
            }

        })
    });

    $(document).on("click", "#bank_detail", function(e) {
        e.preventDefault();
        var form_id = $(this).val();
        $.ajax({
            type: "GET",
            url: `/fetch_bank_det/${form_id}`,
            success: function(response) {
                if (response.status == 200) {


                    $("#b_hname").text(response.data.account_holder_name);
                    $("#b_no").text(response.data.account_number);
                    $("#b_name").text(response.data.bank_name);
                    $("#b_branch").text(response.data.branch);
                    $("#b_ifsc").text(response.data.ifsc_code);
                    $("#bankdet_modal").modal("show");


                }
            }

        })


    });

    $(document).on("click", "#pond_detail", function(e) {
        e.preventDefault();
        var form_id = $(this).val();
        console.log("deiiii")
        $.ajax({
            type: "GET",
            url: `/fetch_pond_det/${form_id}`,
            success: function(response) {
                console.log(response);
                if (response.status == 200) {
                    $("#p_owner").text(response.data.ownership);
                    $("#p_patta").text(response.data.patta);
                    $("#p_tarea").text(response.data.total_est_area);
                    $("#p_irrigated_lands").text(response.data.irrigated_lands); // Newly added
                    $("#p_revenue").text(response.data.revenue);
                    $("#p_livestock").text(response.data.livestocks); // Newly added
                    $("#p_crop_season").text(response.data.crop_season); // Newly added
                    $("#p_well_irrigation").text(response.data.well_irrigation); // Newly added
                    $("#p_sf").text(response.data.sf_number);
                    $("#p_soil").text(response.data.soil_type);
                    $("#p_land").text(response.data.land_serve);
                    $("#p_field").text(response.data.field_insp);
                    $("#p_site").text(response.data.site_app);
                    $("#p_type_of_work").text(response.data.type_of_work); // Newly added
                    $("#p_doi").text(response.data.date_of_ins);
                    $("#p_doa").text(response.data.date_of_app);
                    $("#p_len").text(response.data.length);
                    $("#p_dep").text(response.data.depth);
                    $("#p_breadth").text(response.data.breadth); // Newly added
                    $("#p_vol").text(response.data.volume);
                    $("#p_pcont").text(response.data.p_contribution);
                    $("#p_fcont").text(response.data.f_contribution);
                    $("#total_est").text(response.data.total_est);

                    $("#ponddet_modal").modal("show");


                }
            }

        })


    });


    $(document).on("click", "#plant_detail", function(e) {
        e.preventDefault();
        var form_id = $(this).val();
        console.log("deiiii")
        $.ajax({
            type: "GET",
            url: `/fetch_plant_det/${form_id}`,
            success: function(response) {
                console.log(response);
                $("#plant_ownership").text(response.data.ownership);
                $("#plant_well_irrigation").text(response.data.well_irrigation);
                $("#plant_area_irrigated").text(response.data.area_irrigated);
                $("#plant_irrigated_lands").text(response.data.irrigated_lands);
                $("#plant_patta").text(response.data.patta);
                $("#plant_total_est_area").text(response.data.total_est_area);
                $("#plant_revenue").text(response.data.revenue);
                $("#plant_crop_season").text(response.data.crop_season);
                $("#plant_livestock").text(response.data.livestocks);
                $("#plant_type").text(response.data.plantation);
                $("#plant_sf_number").text(response.data.sf_number);
                $("#plant_soil_type").text(response.data.soil_type);
                $("#plant_land_to_benefit").text(response.data.land_to_benefit);
                $("#plant_field_inspection").text(response.data.field_insp);
                $("#plant_site_appoval").text(response.data.site_app);
                $("#plant_date_of_insection").text(response.data.date_of_ins);
                $("#plant_date_of_appoval").text(response.data.date_of_app);
                $("#plant_type_of_work").text(response.data.type_of_work);
                $("#plant_area_benefit").text(response.data.area_benefit);
                $("#plant_any_other_works").text(response.data.any_other_works);
                $("#plant_p_contributionribution").text(response.data.p_contribution);
                $("#plant_f_contributionribution").text(response.data.f_contribution);
                $("#plant_total_est_est").text(response.data.total_est_est);

                $("#plantdet_modal").modal("show");
            }

        })


    });

    $(document).on("click", ".meas", function(e) {
        e.preventDefault();
        var form_id = $(this).val();
        $("#meas_id").val(form_id);
        $("#measure_modal").modal('show');


    });

    $(document).on("submit", "#measurement_form", function(e) {
        e.preventDefault();

        var form = new FormData(this); // collect all form fields including CSRF token if it's inside the form

        $.ajax({
            type: "POST",
            url: "/measure_submit",
            data: form,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 200) {
                    Swal.fire({
                        title: "Success!",
                        text: "Measurement submitted and forwarded to TL",
                        icon: "success",
                        confirmButtonText: "OK"
                    });
                    $('#measure_modal').modal('hide');
                    location.reload();
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "Something went wrong",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            }
        });
    });

    $(document).on("click", ".showrem", function(e) {
        e.preventDefault();

        var formId = $(this).val(); // get form ID from button value

        // Fetch the remarks using AJAX
        $.ajax({
            type: "GET",
            url: "/getfm-remarks/" + formId,
            success: function(response) {
                if (response.success == 200) {
                    $('#view_remark_text').text(response.remarks); // Set the remarks
                    $('#view_rem_modal').modal('show'); // Show modal
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "Remarks not found",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            },
            error: function(xhr) {
                console.log(xhr.responseText);
                Swal.fire({
                    title: "Error!",
                    text: "Server error",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        });
    });


    $(document).on("click", "#doc_view", function(e) {
        e.preventDefault();
        let formId = $(this).val();

        // Clear previous buttons
        $('#document-buttons').html('');

        // List of document labels
        let labels = ['Patta', 'FMB', 'Passbook', 'Identity', 'Photo'];

        labels.forEach(function(label) {
            let button = `
            <button class="btn btn-outline-primary m-2 doc-file-btn" 
                    value="${formId}">
                ${label}
            </button>`;
            $('#document-buttons').append(button);
        });

        // Open the modal
        $('#documentModal').modal('show');
    });

    $(document).on("click", ".doc-file-btn", function() {
        let form_id = $(this).val();
        let type = $(this).text().trim().toLowerCase(); // 'patta', 'identity', etc.

        $.ajax({
            url: "/get-document",
            type: "POST",
            data: {
                _token: '{{ csrf_token() }}',
                form_id: form_id,
                type: type
            },
            success: function(response) {
                if (response.file_url) {
                    $('#docPreview').attr('src', response.file_url);
                    $('#docDownload').attr('href', response.file_url);
                    $('#fileViewerModal').modal('show');
                } else {
                    Swal.fire({
                        title: "Error!",
                        text: "File not found",
                        icon: "error",
                        confirmButtonText: "OK"
                    });
                }
            },
            error: function() {
                Swal.fire({
                    title: "Error!",
                    text: "Something went wrong",
                    icon: "error",
                    confirmButtonText: "OK"
                });
            }
        });
    });

    $(document).on("click", ".pf_land", function(e) {
                alert('Something went wrong.');
            }
        });
    });

    $(document).on("click", ".pf_land", function(e) {
        e.preventDefault();
        var form_id = $(this).val();
        console.log(form_id);
        $("#pf_land_id").val(form_id);
        $("#pf_land_modal").modal('show');

    })
    $(document).on("click", ".pf_pond", function(e) {
        e.preventDefault();
        var form_id = $(this).val();
        console.log(form_id);
        $("#pf_pond_id").val(form_id);
        $("#pf_pond_modal").modal('show');

    })
    $(document).on("click", ".pf_plant", function(e) {
        e.preventDefault();
        var form_id = $(this).val();
        console.log(form_id);
        $("#pf_plant_id").val(form_id);
        $("#pf_plant_modal").modal('show');

    });
    $(document).on("submit", "#pf_land_form", function(e) {
        e.preventDefault();
        var form = new FormData(this);
        console.log(form);
        $.ajax({
            type: "POST",
            url: "/submit/pf_land",
            data: form,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 200) {
                    alert("postfunding submitted");
                }
            }
        })
    });
    $(document).on("submit", "#pf_pond_form", function(e) {
        e.preventDefault();
        var form = new FormData(this);
        console.log(form);
        $.ajax({
            type: "POST",
            url: "/submit/pf_pond",
            data: form,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 200) {
                    alert("postfunding submitted");
                }
            }
        })
    });
    $(document).on("submit", "#pf_plant_form", function(e) {
        e.preventDefault();
        var form = new FormData(this);
        console.log(form);
        $.ajax({
            type: "POST",
            url: "/submit/pf_plant",
            data: form,
            processData: false,
            contentType: false,
            success: function(response) {
                if (response.status == 200) {
                    alert("postfunding submitted");
                }
            }
        })
    });

    $(document).on('click', '.edit_pf_land', function () {
    var formId = $(this).val();
    $.ajax({
        url: '/get-land-pf-details/' + formId,
        type: 'GET',
        success: function (data) {
            $('#edit_form_id').val(formId);
            $('#area_benefited_postfunding').val(data.area_benefited_postfunding);
            $('#editPFModal').modal('show');
        }
    });
});
$('#editPFForm').on('submit', function (e) {
    e.preventDefault();
    $.ajax({
        url: "{{ route('update.land.pf') }}",
        method: 'POST',
        data: $(this).serialize(),
        success: function (response) {
            if (response.success) {
                $('#editPFModal').modal('hide');
                alert('Post Funding details updated successfully');
                location.reload(); // Optional: refresh the table
            }
        }
    });
});

// Show modal and load data
$(document).on('click', '.edit_pf_pond', function () {
    var formId = $(this).val();
    $.get('/edit-pf-pond/' + formId, function (data) {
        $('#edit_pond_form_id').val(data.form_id);
        $('#len_pf').val(data.len_pf);
        $('#bre_pf').val(data.bre_pf);
        $('#dep_pf').val(data.dep_pf);
        $('#vol_pf').val(data.vol_pf);
        $('#area_benefited_postfunding1').val(data.area_benefited_postfunding);
        $('#editPondPFModal').modal('show');
    });
});

// Auto calculate volume
$('#len_pf, #bre_pf, #dep_pf').on('input', function () {
    const len = parseFloat($('#len_pf').val()) || 0;
    const bre = parseFloat($('#bre_pf').val()) || 0;
    const dep = parseFloat($('#dep_pf').val()) || 0;
    $('#vol_pf').val((len * bre * dep).toFixed(2));
});

// Submit form
$('#editPondPFForm').submit(function (e) {
    e.preventDefault();
    $.ajax({
        url: '/update-pf-pond',
        method: 'POST',
        data: $(this).serialize(),
        success: function (response) {
            if (response.success) {
                alert('Post Funding updated successfully!');
                $('#editPondPFModal').modal('hide');
                location.reload(); // Or update the row dynamically
            }
        }
    });
});
$(document).on('click', '.edit_pf_plant', function () {
    var form_id = $(this).val();
    $('#plant_form_id').val(form_id);

    $.ajax({
        url: '/getPlantPostFund/' + form_id,
        type: 'GET',
        success: function (data) {
            $('#plant_nos').val(data.nos);
            $('#plant_price').val(data.price);
            $('#plant_other_exp').val(data.other_exp);
            $('#plant_total_est_nos').val(data.total_est_nos);
            $('#plant_total_est_price').val(data.total_est_price);
            $('#editPlantPFModal').modal('show');
        }
    });
});
$('#editPlantPFForm').submit(function (e) {
    e.preventDefault();

    $.ajax({
        url: '/updatePlantPostFund',
        type: 'POST',
        data: $(this).serialize(),
        success: function (response) {
            if (response.success) {
                $('#editPlantPFModal').modal('hide');
                location.reload();
            }
        }
    });
});


    </script>


    </script>


    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>

    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>



    <!-- DataTables JS -->
    <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>

    <!-- <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script> -->

</body>

</html>