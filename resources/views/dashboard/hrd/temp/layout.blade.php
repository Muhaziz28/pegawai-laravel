<!DOCTYPE html>

<html lang="en" class="light-style layout-navbar-fixed layout-menu-fixed" dir="ltr" data-theme="theme-default" data-assets-path="{{ asset('assets/') }}" data-template="vertical-menu-template">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>@yield('title')</title>

    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="{{ asset('img/favicon.png') }}" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com') }}" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,300;0,400;0,500;0,600;0,700;1,300;1,400;1,500;1,600;1,700&display=swap" rel="stylesheet" />

    <link rel="stylesheet" href="{{ asset('sweetalert2/sweetalert2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/toastr/toastr.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/animate-css/animate.css') }}" />
    <!-- Icons -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/boxicons.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/fontawesome.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/fonts/flag-icons.css') }}" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/css/rtl/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ asset('assets/css/demo.css') }}" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/apex-charts/apex-charts.css') }}" />

    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/typeahead-js/typeahead.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/select2/select2.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/formvalidation/dist/css/formValidation.min.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/flatpickr/flatpickr.cs') }}s" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.css') }}" />
    <link rel="stylesheet" href="{{ asset('assets/vendor/libs/pickr/pickr-themes.css') }}" />

    <!-- <link rel="stylesheet" href="{{ asset('css/dataTables.listView.css') }}"> -->
    <!-- Helpers -->
    <script src="{{ asset('assets/vendor/js/template-customizer.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/helpers.js') }}"></script>
    <script src="{{ asset('assets/js/config.js') }}"></script>
</head>

<body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <!-- Menu -->

            <aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
                <div class="app-brand demo">
                    <a href="index.html" class="app-brand-link">
                        <span class="app-brand-logo demo">
                            <img src="{{ asset('img/logo.png') }}" width="80px" alt="">
                        </span>
                    </a>

                    <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
                        <i class="bx bx-chevron-left bx-sm align-middle"></i>
                    </a>
                </div>

                <div class="menu-inner-shadow"></div>

                <ul class="menu-inner py-1">

                    <!-- Home -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Home</span></li>
                    <li class="menu-item {{ request()->is('hrd/dashboard') ? 'active' : '' }}">
                        <a href="{{ route('hrd.dashboard') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-home-circle"></i>
                            <div data-i18n="Tables">Dashboard</div>
                        </a>
                    </li>


                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Main</span></li>
                    <li class="menu-item 
                    {{ request()->is('hrd/pegawaiAktif') || request()->is('hrd/addPegawaiView') || request()->is('hrd/pegawaiOut') ? 'open active' : '' 
                    }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bxs-user-account"></i>
                            <div data-i18n="Datatables">Pegawai</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->is('hrd/pegawaiAktif') || request()->is('hrd/addPegawaiView') ? 'active' : '' }}">
                                <a href="{{ route('hrd.pegawaiAktif') }}" class="menu-link">
                                    <div data-i18n="Basic">Data Pegawai Aktif</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('hrd/pegawaiOut') ? 'active' : '' }}">
                                <a href="{{ route('hrd.pegawaiOut') }}" class="menu-link">
                                    <div data-i18n="Advanced">Data Pegawai Keluar</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('hrd/pegawaiOut') ? 'active' : '' }}">
                                <a href="{{ route('hrd.pegawaiOut') }}" class="menu-link">
                                    <div data-i18n="Advanced">Data Pegawai Keluar</div>
                                </a>
                            </li>
                        </ul>
                    </li>

                    <li class="menu-item {{ request()->is('hrd/aktivitas') || request()->is('hrd/aktivitasPegawai') || request()->is('hrd/rekapAktivitas') ? 'open active' : '' 
                    }}">
                        <a href="javascript:void(0);" class="menu-link menu-toggle">
                            <i class="menu-icon tf-icons bx bx-calendar-edit"></i>
                            <div data-i18n="Datatables">Aktivitas Pegawai</div>
                        </a>
                        <ul class="menu-sub">
                            <li class="menu-item {{ request()->is('hrd/aktivitas') ? 'active' : '' }}">
                                <a href="{{ route('hrd.aktivitas') }}" class="menu-link">
                                    <div data-i18n="Basic">Data Aktivitas</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('hrd/aktivitasPegawai') ? 'active' : '' }}">
                                <a href="{{ route('hrd.aktivitasPegawai') }}" class="menu-link">
                                    <div data-i18n="Advanced">Data Aktivitas Pegawai</div>
                                </a>
                            </li>
                            <li class="menu-item {{ request()->is('hrd/rekapAktivitas') ? 'active' : '' }}">
                                <a href="{{ route('hrd.rekapAktivitas') }}" class="menu-link">
                                    <div data-i18n="Advanced">Rekap Aktivitas Pegawai</div>
                                </a>
                            </li>
                        </ul>
                    </li>


                    <!-- Data -->
                    <li class="menu-header small text-uppercase"><span class="menu-header-text">Data</span></li>
                    <li class="menu-item {{ request()->is('hrd/divisi') ? 'active' : ''}}">
                        <a href="{{ route('hrd.divisi') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-briefcase"></i>
                            <div data-i18n="Tables">Divisi</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('hrd/jabatan') ? 'active' : ''}}">
                        <a href="{{ route('hrd.jabatan') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-user-badge"></i>
                            <div data-i18n="Tables">Jabatan</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('hrd/level') ? 'active' : ''}}">
                        <a href="{{ route('hrd.level') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bxs-layer"></i>
                            <div data-i18n="Tables">Level</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('hrd/grade') ? 'active' : ''}}">
                        <a href="{{ route('hrd.grade') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-trophy"></i>
                            <div data-i18n="Tables">Grade</div>
                        </a>
                    </li>
                    <li class="menu-item {{ request()->is('hrd/lokasi') ? 'active' : ''}}">
                        <a href="{{ route('hrd.lokasi') }}" class="menu-link">
                            <i class="menu-icon tf-icons bx bx-map-pin"></i>
                            <div data-i18n="Tables">Lokasi</div>
                        </a>
                    </li>
                </ul>
            </aside>
            <!-- / Menu -->

            <!-- Layout container -->
            <div class="layout-page">
                <!-- Navbar -->

                <nav class="layout-navbar container-xxl navbar navbar-expand-xl navbar-detached align-items-center bg-navbar-theme" id="layout-navbar">
                    <div class="layout-menu-toggle navbar-nav d-xl-none align-items-xl-center me-3 me-xl-0">
                        <a class="nav-item nav-link px-0 me-xl-4" href="javascript:void(0)">
                            <i class="bx bx-menu bx-sm"></i>
                        </a>
                    </div>

                    <div class="navbar-nav-right d-flex align-items-center" id="navbar-collapse">
                        <ul class="navbar-nav flex-row align-items-center ms-auto">

                            <!-- Style Switcher -->
                            <li class="nav-item me-2 me-xl-0">
                                <a class="nav-link style-switcher-toggle hide-arrow" href="javascript:void(0);">
                                    <i class="bx bx-sm"></i>
                                </a>
                            </li>
                            <!--/ Style Switcher -->

                            <!-- Quick links  -->
                            <li class="nav-item dropdown-shortcuts navbar-dropdown dropdown me-2 me-xl-0">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="bx bx-grid-alt bx-sm"></i>
                                </a>
                                <div class="dropdown-menu dropdown-menu-end py-0">
                                    <div class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h5 class="text-body me-auto mb-0">Shortcuts</h5>
                                            <a href="javascript:void(0)" class="dropdown-shortcuts-add text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Add shortcuts"><i class="bx bx-sm bx-plus-circle"></i></a>
                                        </div>
                                    </div>
                                    <div class="dropdown-shortcuts-list scrollable-container">
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                    <i class="bx bx-calendar fs-4"></i>
                                                </span>
                                                <a href="app-calendar.html" class="stretched-link">Calendar</a>
                                                <small class="text-muted mb-0">Appointments</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                    <i class="bx bx-food-menu fs-4"></i>
                                                </span>
                                                <a href="app-invoice-list.html" class="stretched-link">Invoice App</a>
                                                <small class="text-muted mb-0">Manage Accounts</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                    <i class="bx bx-user fs-4"></i>
                                                </span>
                                                <a href="app-user-list.html" class="stretched-link">User App</a>
                                                <small class="text-muted mb-0">Manage Users</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                    <i class="bx bx-check-shield fs-4"></i>
                                                </span>
                                                <a href="app-access-roles.html" class="stretched-link">Role Management</a>
                                                <small class="text-muted mb-0">Permission</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                    <i class="bx bx-pie-chart-alt-2 fs-4"></i>
                                                </span>
                                                <a href="index.html" class="stretched-link">Dashboard</a>
                                                <small class="text-muted mb-0">User Profile</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                    <i class="bx bx-cog fs-4"></i>
                                                </span>
                                                <a href="pages-account-settings-account.html" class="stretched-link">Setting</a>
                                                <small class="text-muted mb-0">Account Settings</small>
                                            </div>
                                        </div>
                                        <div class="row row-bordered overflow-visible g-0">
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                    <i class="bx bx-help-circle fs-4"></i>
                                                </span>
                                                <a href="pages-help-center-landing.html" class="stretched-link">Help Center</a>
                                                <small class="text-muted mb-0">FAQs & Articles</small>
                                            </div>
                                            <div class="dropdown-shortcuts-item col">
                                                <span class="dropdown-shortcuts-icon bg-label-secondary rounded-circle mb-2">
                                                    <i class="bx bx-window-open fs-4"></i>
                                                </span>
                                                <a href="modal-examples.html" class="stretched-link">Modals</a>
                                                <small class="text-muted mb-0">Useful Popups</small>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <!-- Quick links -->

                            <!-- Notification -->
                            <li class="nav-item dropdown-notifications navbar-dropdown dropdown me-3 me-xl-1">
                                <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown" data-bs-auto-close="outside" aria-expanded="false">
                                    <i class="bx bx-bell bx-sm"></i>
                                    <span class="badge rounded-pill badge-notifications bg-danger">5</span>
                                </a>
                                <ul class="dropdown-menu dropdown-menu-end py-0">
                                    <li class="dropdown-menu-header border-bottom">
                                        <div class="dropdown-header d-flex align-items-center py-3">
                                            <h5 class="text-body me-auto mb-0">Notification</h5>
                                            <a href="javascript:void(0)" class="dropdown-notifications-all text-body" data-bs-toggle="tooltip" data-bs-placement="top" title="Mark all as read"><i class="bx fs-4 bx-envelope-open"></i></a>
                                        </div>
                                    </li>
                                    <li class="dropdown-notifications-list scrollable-container">
                                        <ul class="list-group list-group-flush">
                                            <li class="list-group-item list-group-item-action dropdown-notifications-item">
                                                <div class="d-flex">
                                                    <div class="flex-shrink-0 me-3">
                                                        <div class="avatar">
                                                            <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                                        </div>
                                                    </div>
                                                    <div class="flex-grow-1">
                                                        <h6 class="mb-1">Congratulation Lettie 🎉</h6>
                                                        <p class="mb-0">Won the monthly best seller gold badge</p>
                                                        <small class="text-muted">1h ago</small>
                                                    </div>
                                                    <div class="dropdown-notifications-actions flex-shrink-0">
                                                        <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                        <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                                    </div>
                                                </div>
                                            </li>
                                    </li>
                                    <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar">
                                                    <img src="{{ asset('assets/img/avatars/9.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Application has been approved 🚀</h6>
                                                <p class="mb-0">Your ABC project application has been approved.</p>
                                                <small class="text-muted">2 days ago</small>
                                            </div>
                                            <div class="dropdown-notifications-actions flex-shrink-0">
                                                <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar">
                                                    <span class="avatar-initial bg-label-success rounded-circle"><i class="bx bx-pie-chart-alt"></i></span>
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Monthly report is generated</h6>
                                                <p class="mb-0">July monthly financial report is generated</p>
                                                <small class="text-muted">3 days ago</small>
                                            </div>
                                            <div class="dropdown-notifications-actions flex-shrink-0">
                                                <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                            </div>
                                        </div>
                                    </li>
                                    <li class="list-group-item list-group-item-action dropdown-notifications-item marked-as-read">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar">
                                                    <img src="{{ asset('assets/img/avatars/5.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <h6 class="mb-1">Send connection request</h6>
                                                <p class="mb-0">Peter sent you connection request</p>
                                                <small class="text-muted">4 days ago</small>
                                            </div>
                                            <div class="dropdown-notifications-actions flex-shrink-0">
                                                <a href="javascript:void(0)" class="dropdown-notifications-read"><span class="badge badge-dot"></span></a>
                                                <a href="javascript:void(0)" class="dropdown-notifications-archive"><span class="bx bx-x"></span></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </li>
                            <li class="dropdown-menu-footer border-top">
                                <a href="javascript:void(0);" class="dropdown-item d-flex justify-content-center p-3">
                                    View all notifications
                                </a>
                            </li>
                        </ul>
                        </li>
                        <!--/ Notification -->
                        <!-- User -->
                        <li class="nav-item navbar-dropdown dropdown-user dropdown">
                            <a class="nav-link dropdown-toggle hide-arrow" href="javascript:void(0);" data-bs-toggle="dropdown">
                                <div class="avatar avatar-online">
                                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                </div>
                            </a>
                            <ul class="dropdown-menu dropdown-menu-end">
                                <li>
                                    <a class="dropdown-item" href="pages-account-settings-account.html">
                                        <div class="d-flex">
                                            <div class="flex-shrink-0 me-3">
                                                <div class="avatar avatar-online">
                                                    <img src="{{ asset('assets/img/avatars/1.png') }}" alt class="w-px-40 h-auto rounded-circle" />
                                                </div>
                                            </div>
                                            <div class="flex-grow-1">
                                                <span class="d-block fw-semibold">{{ Auth::user()->name }}</span>
                                                <small class="text-muted">Admin</small>
                                            </div>
                                        </div>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-profile-user.html">
                                        <i class="bx bx-user me-2"></i>
                                        <span class="align-middle">My Profile</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-account-settings-account.html">
                                        <i class="bx bx-cog me-2"></i>
                                        <span class="align-middle">Settings</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-account-settings-billing.html">
                                        <span class="d-flex align-items-center align-middle">
                                            <i class="bx bx-credit-card flex-shrink-0 me-2"></i>
                                            <span class="flex-grow-1 align-middle">Billing</span>
                                            <span class="badge badge-center rounded-pill w-px-20 h-px-20 flex-shrink-0 bg-danger">4</span>
                                        </span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-help-center-landing.html">
                                        <i class="bx bx-support me-2"></i>
                                        <span class="align-middle">Help</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-faq.html">
                                        <i class="bx bx-help-circle me-2"></i>
                                        <span class="align-middle">FAQ</span>
                                    </a>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="pages-pricing.html">
                                        <i class="bx bx-dollar me-2"></i>
                                        <span class="align-middle">Pricing</span>
                                    </a>
                                </li>
                                <li>
                                    <div class="dropdown-divider"></div>
                                </li>
                                <li>
                                    <a class="dropdown-item" href="#" id="logout">
                                        <i class="bx bx-power-off me-2"></i>
                                        <span class="align-middle">Log Out</span>
                                    </a>
                                </li>
                            </ul>
                        </li>
                        <!--/ User -->
                        </ul>
                    </div>

                    <!-- Search Small Screens -->
                    <div class="navbar-search-wrapper search-input-wrapper d-none">
                        <input type="text" class="form-control search-input container-xxl border-0" placeholder="Search..." aria-label="Search..." />
                        <i class="bx bx-x bx-sm search-toggler cursor-pointer"></i>
                    </div>
                </nav>

                <!-- / Navbar -->
                @yield('content')

            </div>
            <!-- / Layout page -->
        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-menu-toggle"></div>

        <!-- Drag Target Area To SlideIn Menu On Small Screens -->
        <div class="drag-target"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <script src="{{ asset('assets/vendor/libs/jquery/jquery.js') }}"></script>

    <script src="{{ asset('sweetalert2/sweetalert2.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/toastr/toastr.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ asset('assets/vendor/js/bootstrap.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/hammer/hammer.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/typeahead-js/typeahead.js') }}"></script>

    <script src="{{ asset('assets/vendor/js/menu.js') }}"></script>
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="{{ asset('assets/vendor/libs/apex-charts/apexcharts.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables/jquery.dataTables.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-responsive/datatables.responsive.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-buttons/datatables-buttons.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/datatables-buttons-bs5/buttons.bootstrap5.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/FormValidation.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/Bootstrap5.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/formvalidation/dist/js/plugins/AutoFocus.min.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/select2/select2.js') }}"></script>

    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/moment/moment.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/flatpickr/flatpickr.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/jquery-timepicker/jquery-timepicker.js') }}"></script>
    <script src="{{ asset('assets/vendor/libs/pickr/pickr.js') }}"></script>
    <!-- Main JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>

    <!-- Page JS -->
    <!-- <script src="{{ asset('assets/js/app-access-permission.js') }}"></script> -->
    <script src="{{ asset('assets/js/modal-add-permission.js') }}"></script>
    <script src="{{ asset('assets/js/modal-edit-permission.js') }}"></script>

    <!-- Page JS -->
    <script src="{{ asset('assets/js/dashboards-analytics.js') }}"></script>
    <script src="{{ asset('assets/js/ui-toasts.js') }}"></script>
    <script src="{{ asset('assets/js/forms-selects.js') }}"></script>
    <script src="{{ asset('assets/js/tables-datatables-advanced.js') }}"></script>

    <!-- list view datatables -->
    <!-- <script src="{{ asset('js/dataTables.listView.js') }}"></script> -->

    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
        @csrf
    </form>

    <!-- if password wrong, show message without toastr from login controlller -->

    @yield('script')


    <script>
        $(function() {
            $(document).on('click', '#logout', function() {
                swal.fire({
                    title: 'Anda ingin logout?',
                    text: "Anda akan keluar dari aplikasi",
                    type: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Yes, logout!'
                }).then((result) => {
                    if (result.value) {
                        $('#logout-form').submit();
                        // 
                    }
                })
            })
        });
    </script>
</body>

</html>