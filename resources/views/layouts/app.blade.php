<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>PT Sinar Gemilang Roof</title>

    <meta name="description" content="Genteng Jatiwangi">
    <meta name="author" content="Husni">
    <meta name="robots" content="noindex, nofollow">

    <!-- Open Graph Meta -->
    <meta property="og:title" content="PT Sinar Gemilang Roof">
    <meta property="og:site_name" content="PT Sinar Gemilang Roof">
    <meta property="og:description" content="Genteng Jatiwangi">
    <meta property="og:type" content="website">
    <meta property="og:url" content="">
    <meta property="og:image" content="">

    <!-- Icons -->
    <!-- The following icons can be replaced with your own, they are used by desktop and mobile browsers -->
    <link rel="shortcut icon" href="{{asset('assets/media/favicons/favicon-96x96.png')}}">
    <link rel="icon" type="image/png" sizes="192x192" href="{{asset('assets/media/favicons/favicon-96x96.png')}}">
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('assets/media/favicons/apple-icon-180x180.png')}}">
    <!-- END Icons -->

    <!-- Stylesheets -->
    <!-- Fonts and Dashmix framework -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap">
    <link rel="stylesheet" id="css-main" href="{{asset('assets/css/dashmix.min.css')}}">

    <!-- You can include a specific file from css/themes/ folder to alter the default color theme of the template. eg: -->
    <link rel="stylesheet" id="css-theme" href="{{asset('assets/css/themes/xplay.min.css')}}">
    @livewireStyles
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10">
    </script>
    ...
    <x-livewire-alert::scripts />
    <!-- END Stylesheets -->
</head>
<body>
<!-- Page Container -->
<!--
    Available classes for #page-container:

GENERIC

    'enable-cookies'                            Remembers active color theme between pages (when set through color theme helper Template._uiHandleTheme())

SIDEBAR & SIDE OVERLAY

    'sidebar-r'                                 Right Sidebar and left Side Overlay (default is left Sidebar and right Side Overlay)
    'sidebar-mini'                              Mini hoverable Sidebar (screen width > 991px)
    'sidebar-o'                                 Visible Sidebar by default (screen width > 991px)
    'sidebar-o-xs'                              Visible Sidebar by default (screen width < 992px)
    'sidebar-dark'                              Dark themed sidebar

    'side-overlay-hover'                        Hoverable Side Overlay (screen width > 991px)
    'side-overlay-o'                            Visible Side Overlay by default

    'enable-page-overlay'                       Enables a visible clickable Page Overlay (closes Side Overlay on click) when Side Overlay opens

    'side-scroll'                               Enables custom scrolling on Sidebar and Side Overlay instead of native scrolling (screen width > 991px)

HEADER

    ''                                          Static Header if no class is added
    'page-header-fixed'                         Fixed Header


Footer

    ''                                          Static Footer if no class is added
    'page-footer-fixed'                         Fixed Footer (please have in mind that the footer has a specific height when is fixed)

HEADER STYLE

    ''                                          Classic Header style if no class is added
    'page-header-dark'                          Dark themed Header
    'page-header-glass'                         Light themed Header with transparency by default
                                                (absolute position, perfect for light images underneath - solid light background on scroll if the Header is also set as fixed)
    'page-header-glass page-header-dark'         Dark themed Header with transparency by default
                                                (absolute position, perfect for dark images underneath - solid dark background on scroll if the Header is also set as fixed)

MAIN CONTENT LAYOUT

    ''                                          Full width Main Content if no class is added
    'main-content-boxed'                        Full width Main Content with a specific maximum width (screen width > 1200px)
    'main-content-narrow'                       Full width Main Content with a percentage width (screen width > 1200px)
-->
<div id="page-container" class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">

    <!-- Sidebar -->
    <!--
        Sidebar Mini Mode - Display Helper classes

        Adding 'smini-hide' class to an element will make it invisible (opacity: 0) when the sidebar is in mini mode
        Adding 'smini-show' class to an element will make it visible (opacity: 1) when the sidebar is in mini mode
            If you would like to disable the transition animation, make sure to also add the 'no-transition' class to your element

        Adding 'smini-hidden' to an element will hide it when the sidebar is in mini mode
        Adding 'smini-visible' to an element will show it (display: inline-block) only when the sidebar is in mini mode
        Adding 'smini-visible-block' to an element will show it (display: block) only when the sidebar is in mini mode
    -->
    <nav id="sidebar" aria-label="Main Navigation">
        <!-- Side Header -->
        <div class="bg-header-dark">
            <div class="content-header bg-white-10">
                <!-- Logo -->
                <a class="font-w600 text-white tracking-wide" href="">
                            <span class="smini-visible">
                                D<span class="opacity-75">x</span>
                            </span>
                    <span class="smini-hidden">
                                PT <span class="opacity-75">Sinar Gemilang Roof</span>
                            </span>
                </a>
                <!-- END Logo -->
            </div>
        </div>
        <!-- END Side Header -->

        <!-- Sidebar Scrolling -->
        <div class="js-sidebar-scroll">
            <!-- Side Navigation -->
            <div class="content-side">
                <ul class="nav-main">
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{url('/dashboard')}}">
                            <i class="nav-main-link-icon fa fa-rocket"></i>
                            <span class="nav-main-link-name">Dashboard</span>
                        </a>
                    </li>
                    @role('Pemilik|Pegawai')
                    <li class="nav-main-heading">Pemesanan</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{url('/pemesanan')}}">
                            <i class="nav-main-link-icon fa fa-cart-plus"></i>
                            <span class="nav-main-link-name">Pemesanan Baru</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{url('/pemesanan/lihat')}}">
                            <i class="nav-main-link-icon fa fa-shopping-cart"></i>
                            <span class="nav-main-link-name">Daftar Pemesanan</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Pengiriman</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{url('/pengiriman/buat')}}">
                            <i class="nav-main-link-icon fa fa-rocket"></i>
                            <span class="nav-main-link-name">Buat Invoice dan Rute</span>
                        </a>
                    </li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{url('/pengiriman/invoice')}}">
                            <i class="nav-main-link-icon fa fa-shopping-cart"></i>
                            <span class="nav-main-link-name">Daftar Invoice</span>
                        </a>
                    </li>
                    @endrole
                    @role('Pemilik|Manager')
                    <li class="nav-main-heading">Konsumen</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{url('/pelanggan')}}">
                            <i class="nav-main-link-icon fa fa-user-circle"></i>
                            <span class="nav-main-link-name">Daftar Konsumen</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Produk</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{url('/produk')}}">
                            <i class="nav-main-link-icon fa fa-box"></i>
                            <span class="nav-main-link-name">Daftar Produk</span>
                        </a>
                    </li>
                    <li class="nav-main-heading">Kendaraan</li>
                    <li class="nav-main-item">
                        <a class="nav-main-link" href="{{url('/kendaraan')}}">
                            <i class="nav-main-link-icon fa fa-car"></i>
                            <span class="nav-main-link-name">Daftar Kendaraan</span>
                        </a>
                    </li>
                    @endrole
                </ul>
            </div>
            <!-- END Side Navigation -->
        </div>
        <!-- END Sidebar Scrolling -->
    </nav>
    <!-- END Sidebar -->

    <!-- Header -->
    <header id="page-header">
        <!-- Header Content -->
        <div class="content-header">
            <!-- Left Section -->
            <div>
                <!-- Toggle Sidebar -->
                <!-- Layout API, functionality initialized in Template._uiApiLayout()-->
                <button type="button" class="btn btn-dual mr-1" data-toggle="layout" data-action="sidebar_toggle">
                    <i class="fa fa-fw fa-bars"></i>
                </button>
                <!-- END Toggle Sidebar -->
            </div>
            <!-- END Left Section -->

            <!-- Right Section -->
            <div>
                <!-- User Dropdown -->
                <div class="dropdown d-inline-block">
                    <button type="button" class="btn btn-dual" id="page-header-user-dropdown" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        <i class="fa fa-fw fa-user d-sm-none"></i>
                        <span class="d-none d-sm-inline-block">{{Auth::user()->name}}</span>
                        <i class="fa fa-fw fa-angle-down ml-1 d-none d-sm-inline-block"></i>
                    </button>
                    <div class="dropdown-menu dropdown-menu-right p-0" aria-labelledby="page-header-user-dropdown">
                        <div class="bg-primary rounded-top font-w600 text-white text-center p-3">
                            Pengaturan User
                        </div>
                        <div class="p-2">
                            <div role="separator" class="dropdown-divider"></div>
                            <a class="dropdown-item" href="{{url('/logout')}}">
                                <i class="far fa-fw fa-arrow-alt-circle-left mr-1"></i> Sign Out
                            </a>
                        </div>
                    </div>
                </div>
                <!-- END User Dropdown -->
            </div>
            <!-- END Right Section -->
        </div>
        <!-- END Header Content -->

    </header>
    <!-- END Header -->

    <!-- Main Container -->
    <main id="main-container">
        @yield('content')
        {{$slot ?? ''}}
    </main>
    <!-- END Main Container -->

    <!-- Footer -->
    <footer id="page-footer" class="bg-body-light">
        <div class="content py-0">
            <div class="row font-size-sm">
                <div class="col-sm-6 order-sm-2 mb-1 mb-sm-0 text-center text-sm-right">

                </div>
                <div class="col-sm-6 order-sm-1 text-center text-sm-left">
                    <a class="font-w600" href="https://1.envato.market/r6y" target="_blank">Husni</a> &copy; <span data-toggle="year-copy"></span>
                </div>
            </div>
        </div>
    </footer>
    <!-- END Footer -->
</div>
<!-- END Page Container -->

<!-- Dashmix JS -->
<script src="{{asset('assets/js/dashmix.core.min.js')}}"></script>
<script src="{{asset('assets/js/dashmix.app.min.js')}}"></script>
@yield('scripts')
@livewireScripts
</body>
</html>
