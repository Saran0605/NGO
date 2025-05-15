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
    </style>
</head>

<body>
    <div class="container-scroller">
        <nav class="navbar col-lg-12 col-12 p-0 fixed-top d-flex flex-row">
            <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-start">
                <a class="navbar-brand brand-logo me-5" href="{{route('vol')}}"><img src="{{ asset('assets/images/icons/Pradan-logo-title.png')}}" class="me-2"
                        alt="logo" /></a>
                <a class="navbar-brand brand-logo-mini" href="{{route('vol')}}"><img src="{{asset('assets/images/icons/Pradan-logo-icon.png')}}"
                        alt="logo" /></a>
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
                                <li class="nav-item"> <a class="nav-link" href="{{route('form3')}}">Plantation Form</a></li>
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
                    <nav>
                        <ul class="nav nav-tabs rounded-bottom"
                            style="border-radius: 10px 10px 10px 10px; overflow: hidden;">
                            <li class="nav-item">
                                <a class="nav-link active" id="tab1" href="#step1" onclick="showStep(1)">
                                    <i class="fas fa-user"></i> Basic Details <span id="icon1"
                                        class="text-danger">❌</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab2" href="#step2" onclick="showStep(2)">
                                    <i class="fas fa-landmark"></i> Land Ownership <span id="icon2"
                                        class="text-danger">❌</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab3" href="#step3" onclick="showStep(3)">
                                    <i class="fas fa-tractor"></i> Land Development <span id="icon3"
                                        class="text-danger">❌</span>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" id="tab4" href="#step4" onclick="showStep(4)">
                                    <i class="fas fa-university"></i> Bank Details <span id="icon4"
                                        class="text-danger">❌</span>
                                </a>
                            </li>
                        </ul>
                    </nav>
                    <br>

                    <div class="row">

                        <div class="col-md-12 grid-margin stretch-card">
                            <div class="card">
                                <div class="card-body">
                                    <form id="landform">
                                        @csrf
                                        <div id="step1">
                                            <h5 class="card-title">Basic Details</h5>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <input type="text" name="user_id" value="{{ session('user_id') }}"
                                                        hidden>
                                                    <label for="farmerName" class="form-label">Name of Farmer <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="farmerName"
                                                        name="farmerName" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="mobileNumber" class="form-label">Mobile Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="mobileNumber"
                                                        name="mobileNumber" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="age" class="form-label">Age <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="age"
                                                        name="age" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="district" class="form-label">District <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="district"
                                                        name="district" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="taluk" class="form-label">Taluk <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="taluk"
                                                        name="taluk" required>
                                                </div>
                                                <div class="col-sm-6">
                                                    <label for="firca" class="form-label">Firca <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="firca"
                                                        name="firca" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <label for="hamlet" class="form-label">Hamlet <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="hamlet" name="hamlet"
                                                        required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="panchayat" class="form-label">Panchayat <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="panchayat"
                                                        name="panchayat" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <label for="block" class="form-label">Block <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="block" name="block"
                                                        required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Identity Card <span
                                                            class="text-danger">*</span></label>
                                                    <div class="d-flex gap-3">
                                                        <div class="form-check">
                                                            <input type="radio" id="aadhar" name="identityCard"
                                                                value="Aadhar" class="form-check-input ms-2" required>
                                                            <label for="aadhar" class="form-check-label">Aadhar</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" id="epic" name="identityCard"
                                                                value="EPIC" class="form-check-input ms-2" required>
                                                            <label for="epic" class="form-check-label">EPIC</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" id="drivingLicense" name="identityCard"
                                                                value="Driving License" class="form-check-input ms-2"
                                                                required>
                                                            <label for="drivingLicense" class="form-check-label">Driving
                                                                License</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" id="other" name="identityCard"
                                                                value="Other" class="form-check-input ms-2" required>
                                                            <label for="other" class="form-check-label">Other</label>
                                                        </div>
                                                    </div>
                                                    <div id="otherIdentityBox" style="display: none; margin-top: 10px;">
                                                        <input type="text" id="otherIdentityInput" name="otherIdentityInput" placeholder="Enter other identity" class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <label for="idCardNumber" class="form-label">ID Card Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="idCardNumber"
                                                        name="idCardNumber" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Gender <span
                                                            class="text-danger">*</span></label>
                                                    <div class="d-flex gap-3">
                                                        <div class="form-check">
                                                            <input type="radio" id="male" name="gender" value="Male"
                                                                class="form-check-input ms-2" required>
                                                            <label for="male" class="form-check-label">Male</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" id="female" name="gender" value="Female"
                                                                class="form-check-input ms-2" required>
                                                            <label for="female" class="form-check-label">Female</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" id="transgender" name="gender"
                                                                value="Transgender" class="form-check-input ms-2"
                                                                required>
                                                            <label for="transgender"
                                                                class="form-check-label">Transgender</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <label for="fatherSpouse" class="form-label">Father / Spouse <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="fatherSpouse"
                                                        name="fatherSpouse" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Type of Household</label>
                                                    <div class="d-flex gap-3">
                                                        <div class="form-check">
                                                            <input type="radio" name="householdType" value="Nuclear"
                                                                id="nuclear" class="form-check-input ms-2">
                                                            <label class="form-check-label"
                                                                for="nuclear">Nuclear</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="radio" name="householdType" value="Joint"
                                                                id="joint" class="form-check-input ms-2">
                                                            <label class="form-check-label" for="joint">Joint</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">Household Members</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="number" class="form-control" name="hh_members[]"
                                                            placeholder="Adults">
                                                        <input type="number" class="form-control" name="hh_members[]"
                                                            placeholder="Children">
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Occupation of HH Members</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="number" name="hh_occupation[]"
                                                            placeholder="Agriculture" class="form-control">
                                                        <input type="number" name="hh_occupation[]" placeholder="Business"
                                                            class="form-control">
                                                        <input type="number" name="hh_occupation[]" placeholder="Other"
                                                            class="form-control">
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">Special Category</label>
                                                    <div class="d-flex gap-3">
                                                        <div class="form-check">
                                                            <input type="checkbox" name="specialCategory[]"
                                                                value="Disabled" id="disabled"
                                                                class="form-check-input ms-2">
                                                            <label for="disabled"
                                                                class="form-check-label">Disabled</label>
                                                        </div>
                                                        <div class="form-check">
                                                            <input type="checkbox" name="specialCategory[]"
                                                                value="Numbers" id="numbers"
                                                                class="form-check-input ms-2">
                                                            <label for="numbers"
                                                                class="form-check-label">Numbers</label>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Caste</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="radio" name="caste" value="OC"
                                                            class="form-check-input ms-2"> OC
                                                        <input type="radio" name="caste" value="OBC"
                                                            class="form-check-input ms-2"> OBC
                                                        <input type="radio" name="caste" value="SC"
                                                            class="form-check-input ms-2"> SC
                                                        <input type="radio" name="caste" value="ST"
                                                            class="form-check-input ms-2"> ST
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">House Ownership</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="radio" name="houseOwnership" value="Rented"
                                                            class="form-check-input ms-2"> Rented
                                                        <input type="radio" name="houseOwnership" value="Owned"
                                                            class="form-check-input ms-2"> Owned
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Type of House</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="radio" name="houseType" value="Pucca"
                                                            class="form-check-input ms-2"> Pucca
                                                        <input type="radio" name="houseType" value="Kutcha"
                                                            class="form-check-input ms-2"> Kutcha
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">Drinking Water Source</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="checkbox" name="drinkingWater[]" value="Ponds"
                                                            class="form-check-input ms-2"> Ponds
                                                        <input type="checkbox" name="drinkingWater[]"
                                                            value="Well & Borewells" class="form-check-input ms-2"> Well
                                                        & Borewells
                                                        <input type="checkbox" name="drinkingWater[]" value="Trucks"
                                                            class="form-check-input ms-2"> Trucks
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Potability</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="checkbox" name="potability[]" value="Ponds"
                                                            class="form-check-input ms-2"> Ponds
                                                        <input type="checkbox" name="potability[]" value="Tanks"
                                                            class="form-check-input ms-2"> Tanks
                                                        <input type="checkbox" name="potability[]"
                                                            value="Well & Borewells" class="form-check-input ms-2"> Well
                                                        & Borewells
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">Domestic Water Source</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="checkbox" name="domesticWater[]" value="Ponds"
                                                            class="form-check-input ms-2"> Ponds
                                                        <input type="checkbox" name="domesticWater[]" value="Tanks"
                                                            class="form-check-input ms-2"> Tanks
                                                        <input type="checkbox" name="domesticWater[]"
                                                            value="Well & Borewells" class="form-check-input ms-2"> Well
                                                        & Borewells
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Toilet Availability</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="radio" name="toilet" value="Yes"
                                                            class="form-check-input ms-2"> Yes
                                                        <input type="radio" name="toilet" value="No"
                                                            class="form-check-input ms-2"> No
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <label class="form-label">Toilet Condition</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="radio" name="toiletWorking" value="Working"
                                                            class="form-check-input ms-2"> Working
                                                        <input type="radio" name="toiletWorking" value="Not Working"
                                                            class="form-check-input ms-2"> Not Working
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Education of Householder</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="radio" name="education" value="Illiterate"
                                                            class="form-check-input ms-2"> Illiterate
                                                        <input type="radio" name="education" value="Primary"
                                                            class="form-check-input ms-2"> Primary
                                                        <input type="radio" name="education" value="Secondary"
                                                            class="form-check-input ms-2"> Secondary
                                                        <input type="radio" name="education" value="University"
                                                            class="form-check-input ms-2"> University
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="d-flex justify-content-end gap-2">
                                                <button type="button" class="btn btn-primary" onclick="nextStep(1, 2)">
                                                    Next (Step <span id="nextStepNum">2</span>) →
                                                </button>
                                            </div>
                                        </div>



                                        <div id="step2" style="display: none;">
                                            <h5 class="card-title">Land Ownership Details</h5>

                                            <!-- Land Ownership -->
                                            <h6 class="card-description ms-2 mb-3">Land Ownership</h6>
                                            <div class="row mb-4 ms-2">
                                                <div class="col-md-6">
                                                    <input type="radio" name="landOwnership" value="ownerCultivator" id="ownerCultivator"
                                                        class="form-check-input">
                                                    <label for="ownerCultivator" class="form-check-label">Owner
                                                        Cultivator</label>
                                                    <input type="radio" name="landOwnership" value="leaseHolder" id="leaseHolder"
                                                        class="form-check-input ms-3">
                                                    <label for="leaseHolder" class="form-check-label">Lease
                                                        Holder</label>
                                                </div>
                                            </div>

                                            <!-- Well for Irrigation -->
                                            <h6 class="card-description ms-2 mb-3">Well for Irrigation</h6>
                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <input type="radio" name="wellIrrigation" id="wellYes"
                                                        class="form-check-input" value="Yes">
                                                    <label for="wellYes" class="form-check-label">Yes</label>
                                                    <input type="radio" name="wellIrrigation" id="wellNo"
                                                        class="form-check-input ms-3" value="No">
                                                    <label for="wellNo" class="form-check-label">No</label>
                                                </div>
                                                <div class="col-md-6">
                                                    <label class="form-label">Area Irrigated (ha)</label>
                                                    <input type="text" class="form-control" name="areaIrrigated">
                                                </div>
                                            </div>

                                            <!-- Irrigated Lands -->
                                            <h6 class="card-description ms-2 mb-3">Irrigated Lands (ha)</h6>
                                            <div class="row mb-4 ms-2">
                                                <div class="col-md-6">
                                                    <input type="checkbox" name="irrigatedLand" value="rainfed" id="rainfed"
                                                        class="form-check-input">
                                                    <label for="rainfed" class="form-check-label">Rainfed</label>
                                                    <input type="checkbox" name="irrigatedLand" value="tankfed" id="tankfed"
                                                        class="form-check-input ms-3">
                                                    <label for="tankfed" class="form-check-label">Tankfed</label>
                                                    <input type="checkbox" name="irrigatedLand" value="wellIrrigated" id="wellIrrigated"
                                                        class="form-check-input ms-3">
                                                    <label for="wellIrrigated" class="form-check-label">Well
                                                        Irrigated</label>
                                                </div>
                                            </div>

                                            <!-- Patta Number, Total Area, Revenue Village -->
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label class="form-label">Patta Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="pattaNumber" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Total Area (ha) <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="totalArea" required>
                                                </div>
                                                <div class="col-md-4">
                                                    <label class="form-label">Revenue Village <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" name="revenueVillage"
                                                        required>
                                                </div>
                                            </div>

                                            <!-- Crop Season -->
                                            <h6 class="card-description ms-2 mb-3">Crop Season</h6>
                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <input type="checkbox" name="cropSeason" value="kharif" id="kharif"
                                                        class="form-check-input">
                                                    <label for="kharif" class="form-check-label">Kharif</label>
                                                    <input type="checkbox" name="cropSeason" id="rabi" value="rabi"
                                                        class="form-check-input ms-3">
                                                    <label for="rabi" class="form-check-label">Rabi</label>
                                                    <input type="checkbox" name="cropSeason" value="otherSeason" id="otherSeason"
                                                        class="form-check-input ms-3">
                                                    <label for="otherSeason" class="form-check-label">Other</label>
                                                </div>
                                            </div>

                                            <!-- Livestock -->
                                            <h6 class="card-description ms-2 mb-3">Livestock at Home</h6>
                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <input type="checkbox" name="livestock[]" id="ruminants" value="ruminants"
                                                        class="form-check-input">
                                                    <label for="ruminants" class="form-check-label">Ruminants</label>
                                                    <input type="checkbox" name="livestock[]" id="milchAnimals" value="milchAnimals"
                                                        class="form-check-input ms-3">
                                                    <label for="milchAnimals" class="form-check-label">Milch
                                                        Animals</label>
                                                    <input type="checkbox" name="livestock[]" id="cattle" value="cattle"
                                                        class="form-check-input ms-3">
                                                    <label for="cattle" class="form-check-label">Cattle</label>
                                                    <input type="checkbox" name="livestock[]" id="poultry" value="poultry"
                                                        class="form-check-input ms-3">
                                                    <label for="poultry" class="form-check-label">Poultry</label>
                                                </div>
                                            </div>

                                            <div class="row mb-3 ms-2">
                                                <div class="col-md-6">
                                                    <label for="lat" class="form-label">Latitude<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="lat"
                                                        name="lat">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="lon" class="form-label">longitude<span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="lon"
                                                        name="lon">

                                                </div>
                                            </div>

                                            <!-- Navigation Buttons -->
                                            <div class="d-flex justify-content-end gap-2">
                                                <button type="button" class="btn btn-secondary me-2"
                                                    onclick="prevStep(2, 1)">
                                                    ← Previous (Step <span id="prevStepNum">1</span>)
                                                </button>
                                                <button type="button" class="btn btn-primary" onclick="nextStep(2, 3)">
                                                    Next (Step <span id="nextStepNum">3</span>) →
                                                </button>
                                            </div>
                                        </div>


                                        <div id="step3" style="display: none;">
                                            <h5 class="card-title">Land Development Activity</h5>
                                            <div class="container p-3">
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="sf_no" class="form-label">S.F. No. of the land to be
                                                            developed <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="sf_no" name="sf_no"
                                                            required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="land_benefit" class="form-label">Land to benefit
                                                            (ha) <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="land_benefit"
                                                            name="land_benefit" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Soil Type <span
                                                                class="text-danger">*</span></label>
                                                        <div class="d-flex gap-3">
                                                            <input type="radio" name="soil_type" value="Red Soil"> Red
                                                            Soil
                                                            <input type="radio" name="soil_type" value="Black Cotton">
                                                            Black Cotton
                                                            <input type="radio" name="soil_type" value="Sandy Loam">
                                                            Sandy Loam
                                                            <input type="radio" name="soil_type" value="Laterite">
                                                            Laterite
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label class="form-label">Field Inspection done by:</label>
                                                        <div class="d-flex gap-3">
                                                            <input type="radio" name="inspection" value="Volunteer">
                                                            Volunteer
                                                            <input type="radio" name="inspection"
                                                                value="Project Executive"> Project
                                                            Executive
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Site Approved by:</label>
                                                        <div class="d-flex gap-3">
                                                            <input type="radio" name="approved_by"
                                                                value="Project Executive"> Project
                                                            Executive
                                                            <input type="radio" name="approved_by" value="Team Leader">
                                                            Team Leader
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="inspection_date" class="form-label">Date of
                                                            Inspection <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="inspection_date"
                                                            name="inspection_date" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="approval_date" class="form-label">Date of Approval
                                                            <span class="text-danger">*</span></label>
                                                        <input type="date" class="form-control" id="approval_date"
                                                            name="approval_date" required>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="estimateAmount" class="form-label">Total Estimate
                                                            Amount</label>
                                                        <input type="text" class="form-control" id="estimateAmount"
                                                            name="estimateAmount">
                                                    </div>
                                                </div>

                                                <!-- Newly added fields -->
                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label class="form-label">Type of work proposed <span
                                                                class="text-danger">*</span></label>
                                                        <div class="ms-5">
                                                            <div class="form-check">
                                                                <input type="radio" class="form-check-input"
                                                                    id="prosopisRemoval" name="workType[]"
                                                                    value="Prosopis removal">
                                                                <label class="form-check-label"
                                                                    for="prosopisRemoval">Prosopis
                                                                    removal</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" class="form-check-input"
                                                                    id="redevelopment" name="workType[]"
                                                                    value="Redevelopment of eroded lands">
                                                                <label class="form-check-label"
                                                                    for="redevelopment">Redevelopment of eroded
                                                                    lands</label>
                                                            </div>
                                                            <div class="form-check">
                                                                <input type="radio" class="form-check-input"
                                                                    id="siltApplication" name="workType[]"
                                                                    value="Silt application">
                                                                <label class="form-check-label"
                                                                    for="siltApplication">Silt
                                                                    application</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="areaBenefited" class="form-label">Area benefited by
                                                            proposal works
                                                            (ha)</label>
                                                        <input type="text" class="form-control" id="areaBenefited"
                                                            name="areaBenefited">
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="otherWorks" class="form-label">Any other works
                                                            proposed</label>
                                                        <textarea class="form-control" id="otherWorks" name="otherWorks"
                                                            rows="2"></textarea>
                                                    </div>
                                                    <div class="col-md-6">
                                                        <label for="pradanContribution" class="form-label">PRADAN
                                                            Contribution <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="pradanContribution"
                                                            name="pradanContribution" required>
                                                    </div>
                                                </div>

                                                <div class="row mb-3">
                                                    <div class="col-md-6">
                                                        <label for="farmerContribution" class="form-label">Farmer
                                                            Contribution <span class="text-danger">*</span></label>
                                                        <input type="text" class="form-control" id="farmerContribution"
                                                            name="farmerContribution" required>
                                                    </div>
                                                </div>

                                                <div class="d-flex justify-content-end gap-2">
                                                    <button type="button" class="btn btn-secondary me-2"
                                                        onclick="prevStep(3, 2)">
                                                        ← Previous (Step <span id="prevStepNum">2</span>)
                                                    </button>

                                                    <button type="button" class="btn btn-primary"
                                                        onclick="nextStep(3, 4)">
                                                        Next (Step <span id="nextStepNum">4</span>) →
                                                    </button>
                                                </div>
                                            </div>
                                        </div>

                                        <div id="step4" style="display: none;">
                                            <h5 class="card-title">Bank Details</h5>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="account_holder" class="form-label">Name of Account
                                                        Holder <span class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="account_holder"
                                                        name="account_holder" required>
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="account_number" class="form-label">Account Number <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="account_number"
                                                        name="account_number" required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="bank_name" class="form-label">Name of the Bank <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="bank_name"
                                                        name="bank_name">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="branch" class="form-label">Branch <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="branch" name="branch"
                                                        required>
                                                </div>
                                            </div>

                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <label for="ifsc" class="form-label">IFSC Code <span
                                                            class="text-danger">*</span></label>
                                                    <input type="text" class="form-control" id="ifsc" name="ifsc"
                                                        required>
                                                </div>
                                                <div class="col-md-6">
                                                    <br>
                                                    <label class="form-label">Farmer has agreed for the work, and his
                                                        contribution:</label>
                                                    <div class="d-flex gap-3">
                                                        <input type="radio" name="farmer_agreement" value="Yes"> Yes
                                                        <input type="radio" name="farmer_agreement" value="No"> No
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>
                                            <h6 class="mt-4">Upload Documents</h6>
                                            <div class="row mb-3">
                                                <div class="col-md-4">
                                                    <label for="patta" class="form-label">1. Patta</label>
                                                    <input type="file" class="form-control" id="patta" name="patta">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="id_card" class="form-label">2. ID Card</label>
                                                    <input type="file" class="form-control" id="id_card" name="id_card">
                                                </div>
                                                <div class="col-md-4">
                                                    <label for="fmb" class="form-label">3. FMB</label>
                                                    <input type="file" class="form-control" id="fmb" name="fmb">
                                                </div>
                                            </div>

                                            <div class="row mb-4">
                                                <div class="col-md-6">
                                                    <label for="photo_farmer" class="form-label">4. Photo of
                                                        Farmer</label>
                                                    <input type="file" class="form-control" id="photo_farmer"
                                                        name="photo_farmer">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="bank_passbook" class="form-label">5. Bank
                                                        Passbook</label>
                                                    <input type="file" class="form-control" id="bank_passbook"
                                                        name="bank_passbook">
                                                </div>
                                            </div>


                                            <div class="d-flex justify-content-end gap-2">
                                                <button type="button" class="btn btn-secondary me-2"
                                                    onclick="prevStep(4, 3)">
                                                    ← Previous (Step <span id="prevStepNum">3</span>)
                                                </button>
                                                <button type="submit" class="btn btn-success">Submit</button>
                                            </div>
                                        </div>

                                    </form>
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
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Farmer Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Farmer Name : <span id="f_name"></span><br><br>
                    Father/Spouse : <span id="f_spouse"></span>
                    Mobile : <span id="f_mobile"></span><br><br>
                    Gender : <span id="f_gender"></span><br><br>
                    Id_Card : <span id="f_card"></span><br><br>
                    Members : <span id="f_member"></span><br><br>
                    Id_Number : <span id="f_number"></span><br><br>
                    hamlet : <span id="f_hamlet"></span><br><br>
                    Panchayat : <span id="f_panchayat"></span><br><br>
                    Block : <span id="f_block"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Land Detail Modal -->
    <div class="modal fade" id="landdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Land Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Ownership : <span id="l_ownership"></span><br><br>
                    Patta_no : <span id="l_patta"></span><br><br>
                    Total_Area : <span id="l_tarea"> </span><br><br>
                    Revenue_village : <span id="l_revenue"></span><br><br>
                    S.F No : <span id="l_sf"></span><br><br>
                    Soil Type : <span id="l_soil"></span><br><br>
                    Land_to_Benefit : <span id="l_benefit"></span><br><br>
                    Field_inspection : <span id="l_field"></span><br><br>
                    Site_approval : <span id="l_site"></span><br><br>
                    Date_of_Inspection : <span id="l_doi"></span><br><br>
                    Date_of_Approval : <span id="l_doa"></span><br><br>
                    Type_of_Work : <span id="l_type"></span><br><br>
                    Area_Benefites : <span id="l_area"></span><br><br>
                    Other_Works : <span id="l_oth"></span><br><br>
                    Pradan Contribution : <span id="l_pradan"></span><br><br>
                    Farmer Contribution : <span id="l_farmer"></span><br><br>
                    Total_amount : <span id="l_total"></span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Bank Detail Modal -->
    <div class="modal fade" id="bankdet_modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Bank Details</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    Holder_Name : <span id="b_hname"></span><br><br>
                    Account_Number : <span id="b_no"></span><br><br>
                    Bank Name : <span id="b_name"></span><br><br>
                    Branch : <span id="b_branch"></span><br><br>
                    IFSC Code : <span id="b_ifsc"></span><br><br>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <script>
        function showStep(stepNumber) {
            event.preventDefault();

            for (let i = 1; i <= 4; i++) {
                document.getElementById(`step${i}`).style.display = 'none';
                document.getElementById(`tab${i}`).classList.remove('active');
            }

            document.getElementById(`step${stepNumber}`).style.display = 'block';
            document.getElementById(`tab${stepNumber}`).classList.add('active');
        }

        // Add event listeners for identity card radio buttons
        document.addEventListener('DOMContentLoaded', function() {
            const identityRadios = document.querySelectorAll('input[name="identityCard"]');
            const otherIdentityBox = document.getElementById('otherIdentityBox');
            const otherIdentityInput = document.getElementById('otherIdentityInput');

            identityRadios.forEach(radio => {
                radio.addEventListener('change', function() {
                    if (this.value === 'Other') {
                        otherIdentityBox.style.display = 'block';
                        otherIdentityInput.required = true;
                    } else {
                        otherIdentityBox.style.display = 'none';
                        otherIdentityInput.required = false;
                    }
                });
            });

            // Modify form submission to use custom value if "Other" is selected
            document.getElementById('landform').addEventListener('submit', function(e) {
                const otherRadio = document.querySelector('input[name="identityCard"][value="Other"]');
                if (otherRadio.checked) {
                    const customValue = otherIdentityInput.value.trim();
                    if (customValue) {
                        // Create a hidden input to store the custom value
                        const hiddenInput = document.createElement('input');
                        hiddenInput.type = 'hidden';
                        hiddenInput.name = 'identityCard';
                        hiddenInput.value = customValue;
                        this.appendChild(hiddenInput);
                        // Remove the original radio value
                        otherRadio.disabled = true;
                    }
                }
            });
        });

        function nextStep(current, next) {
            document.getElementById(`step${current}`).style.display = 'none';
            document.getElementById(`step${next}`).style.display = 'block';

            document.getElementById(`tab${current}`).classList.remove('active');
            document.getElementById(`tab${next}`).classList.add('active');

            validateStep(current); // Validate current step when moving forward
        }

        function prevStep(current, prev) {
            document.getElementById(`step${current}`).style.display = 'none';
            document.getElementById(`step${prev}`).style.display = 'block';

            document.getElementById(`tab${current}`).classList.remove('active');
            document.getElementById(`tab${prev}`).classList.add('active');
        }

        // Validate required fields in a step and update the tick mark
        function validateStep(step) {
            let currentStep = document.getElementById(`step${step}`);
            let requiredFields = currentStep.querySelectorAll("[required]");
            let allValid = true;

            requiredFields.forEach((field) => {
                if (field.type === "radio" || field.type === "checkbox") {
                    let name = field.name;
                    let checked = document.querySelector(`input[name="${name}"]:checked`);
                    if (!checked) {
                        allValid = false;
                    }
                } else if (field.type === "file") {
                    if (!field.files.length) {
                        allValid = false;
                    }
                } else {
                    if (!field.value.trim()) {
                        allValid = false;
                        field.classList.add("border", "border-danger");
                    } else {
                        field.classList.remove("border", "border-danger");
                    }
                }
            });

            if (allValid) {
                document.getElementById(`icon${step}`).innerHTML = "✅";
                document.getElementById(`icon${step}`).classList.remove('text-danger');
                document.getElementById(`icon${step}`).classList.add('text-success');
            } else {
                document.getElementById(`icon${step}`).innerHTML = "❌";
                document.getElementById(`icon${step}`).classList.remove('text-success');
                document.getElementById(`icon${step}`).classList.add('text-danger');
            }
        }

        // Ensure all fields are filled before submission
        $(document).on("submit", "#landform", function(e) {
            e.preventDefault();

            let allFields = document.querySelectorAll("[required]");
            let allValid = true;

            allFields.forEach((field) => {
                if (field.type === "radio" || field.type === "checkbox") {
                    let name = field.name;
                    let checked = document.querySelector(`input[name="${name}"]:checked`);
                    if (!checked) {
                        allValid = false;
                    }
                } else if (field.type === "file") {
                    if (!field.files.length) {
                        allValid = false;
                    }
                } else {
                    if (!field.value.trim()) {
                        allValid = false;
                        field.classList.add("border", "border-danger");
                    } else {
                        field.classList.remove("border", "border-danger");
                    }
                }
            });

            if (!allValid) {
                alert("Please fill all required fields before submitting.");
                return;
            }

            // If all fields are filled, proceed with form submission
            var form = new FormData(this);
            $.ajax({
                type: "POST",
                url: "/form_land",
                data: form,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response.status == 200) {
                        $('#landform')[0].reset();

                        Swal.fire({
                            title: "Success!",
                            text: "Form Submitted Successfully",
                            icon: "success",
                            confirmButtonText: "OK"
                        });


                        document.getElementById(`icon4`).innerHTML = "✅";
                        document.getElementById(`icon4`).classList.remove('text-danger');
                        document.getElementById(`icon4`).classList.add('text-success');
                    } else {
                        alert("Something went wrong");
                    }
                }
            });
        });

        document.addEventListener("DOMContentLoaded", function() {
            showStep(1);
        });
    </script>


    <script src="{{ asset('assets/vendors/js/vendor.bundle.base.js') }}"></script>

    <script src="{{ asset('assets/vendors/chart.js/chart.umd.js') }}"></script>

    <script src="{{ asset('assets/js/off-canvas.js') }}"></script>
    <script src="{{ asset('assets/js/template.js') }}"></script>
    <script src="{{ asset('assets/js/settings.js') }}"></script>
    <script src="{{ asset('assets/js/todolist.js') }}"></script>

    <!-- <script src="{{ asset('assets/js/jquery.cookie.js') }}" type="text/javascript"></script>
    <script src="{{ asset('assets/js/dashboard.js') }}"></script> -->

</body>

</html>