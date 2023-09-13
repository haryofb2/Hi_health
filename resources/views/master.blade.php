<!DOCTYPE html>
<!--
Author: Keenthemes
Product Name: Saul
Product Version: 1.0.0
Upgrade to Pro: https://keenthemes.com/products/saul-html-pro
Website: http://www.keenthemes.com
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
License: For each use you must have a valid license purchased only from above link in order to legally use the theme for your project.
-->
<html lang="en">
<!--begin::Head-->

<head>
    <base href="" />
    <title>Saul Theme by Keenthemes</title>
    <meta charset="utf-8" />
    <meta name="description" content="Saul HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
    <meta name="keywords"
        content="Saul, bootstrap, bootstrap 5, dmin themes, free admin themes, bootstrap admin, bootstrap dashboard" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:locale" content="en_US" />
    <meta property="og:type" content="article" />
    <meta property="og:title" content="Saul HTML Free - Bootstrap 5 HTML Multipurpose Admin Dashboard Theme" />
    <meta property="og:url" content="https://keenthemes.com/products/saul-html-pro" />
    <meta property="og:site_name" content="Keenthemes | Saul HTML Free" />
    <meta name="csrf-token" id="csrf-token" content="{{ csrf_token() }}">


    <link rel="canonical" href="https://preview.keenthemes.com/saul-html-free" />
    <link rel="shortcut icon" href="{{ asset('../theme/dist/assets/media/logos/favicon.ico') }}" />
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />

    <link href="{{ asset('../css/style.css') }}" rel="stylesheet" />
    <link href="{{ asset('../css/rowgroup.css') }}" rel="stylesheet" />


    <link href="{{ asset('../theme/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.css') }}"
        rel="stylesheet" type="text/css" />
    <link href="{{ asset('../theme/dist/assets/plugins/custom/datatables/datatables.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('../theme/dist/assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet"
        type="text/css" />
    <link href="{{ asset('../theme/dist/assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />



    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.13.1/css/dataTables.bootstrap5.min.css" />
    {{-- <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/rowgroup/1.3.0/css/rowGroup.bootstrap5.min.css" /> --}}
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/buttons/2.3.2/css/buttons.bootstrap5.min.css" />
    <link rel="stylesheet" type="text/css"
        href="https://cdn.datatables.net/scroller/2.0.7/css/scroller.bootstrap5.min.css" />

    {{-- select2 --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    {{-- datepicker --}}

    <link rel="stylesheet"
        href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/css/bootstrap-datepicker.min.css">



    <script>
        // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
    </script>
</head>

<body id="kt_app_body" data-kt-app-header-fixed="true" data-kt-app-header-fixed-mobile="true"
    data-kt-app-sidebar-enabled="true" data-kt-app-sidebar-fixed="true" data-kt-app-sidebar-hoverable="true"
    data-kt-app-sidebar-push-toolbar="true" data-kt-app-sidebar-push-footer="true" data-kt-app-toolbar-enabled="true"
    data-kt-app-aside-enabled="true" data-kt-app-aside-fixed="true" data-kt-app-aside-push-toolbar="true"
    data-kt-app-aside-push-footer="true" class="app-default">
    <script>
        var defaultThemeMode = "light";
        var themeMode;
        if (document.documentElement) {
            if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
                themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
            } else {
                if (localStorage.getItem("data-bs-theme") !== null) {
                    themeMode = localStorage.getItem("data-bs-theme");
                } else {
                    themeMode = defaultThemeMode;
                }
            }
            if (themeMode === "system") {
                themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
            }
            document.documentElement.setAttribute("data-bs-theme", themeMode);
        }
    </script>
    <div class="d-flex flex-column flex-root app-root" id="kt_app_root">
        <div class="app-page flex-column flex-column-fluid" id="kt_app_page">
            @include('default.header')
            <!--begin::Wrapper-->
            <div class="app-wrapper flex-column flex-row-fluid" id="kt_app_wrapper">
                <!--begin::Sidebar-->
                @include('default.sidebar')
                <!--end::Sidebar-->
                <!--begin::Main-->
                <div class="app-main flex-column flex-row-fluid" id="kt_app_main">
                    <!--begin::Content wrapper-->
                    <div class="d-flex flex-column flex-column-fluid">
                        <!--begin::Toolbar-->
                        <div id="kt_app_toolbar" class="app-toolbar pt-5">
                            <!--begin::Toolbar container-->
                            <div id="kt_app_toolbar_container"
                                class="app-container container-fluid d-flex align-items-stretch">
                                <!--begin::Toolbar wrapper-->
                                <div class="app-toolbar-wrapper d-flex flex-stack flex-wrap gap-4 w-100">
                                    <!--begin::Page title-->
                                    <div class="page-title d-flex flex-column gap-1 me-3 mb-2">
                                        <!--begin::Breadcrumb-->
                                        @yield('breadcrumb')
                                        <!--end::Breadcrumb-->

                                        @yield('page-title')

                                    </div>

                                </div>
                                <!--end::Toolbar wrapper-->
                            </div>
                            <!--end::Toolbar container-->
                        </div>
                        <div id="kt_app_content" class="app-content flex-column-fluid">
                            <!--begin::Content container-->
                            <div id="kt_app_content_container" class="app-container container-fluid">
                                @yield('content')

                            </div>
                            <!--end::Content container-->
                        </div>


                    </div>

                    @include('default.footer')
                </div>
                <!--end:::Main-->
                <!--begin::aside-->
                {{-- <div id="kt_app_aside" class="app-aside flex-column" data-kt-drawer="true"
                    data-kt-drawer-name="app-aside" data-kt-drawer-activate="{default: true, lg: false}"
                    data-kt-drawer-overlay="true" data-kt-drawer-width="auto" data-kt-drawer-direction="end"
                    data-kt-drawer-toggle="#kt_app_aside_mobile_toggle">
                    <!--begin::Wrapper-->
                    <div id="kt_app_aside_wrapper"
                        class="d-flex flex-column align-items-center hover-scroll-y py-5 py-lg-0 gap-4"
                        data-kt-scroll="true" data-kt-scroll-activate="{default: false, lg: true}"
                        data-kt-scroll-height="auto" data-kt-scroll-dependencies="#kt_app_header"
                        data-kt-scroll-wrappers="#kt_app_aside_wrapper" data-kt-scroll-offset="5px">
                        <a href="#"
                            class="btn btn-icon btn-color-primary bg-hover-body h-45px w-45px flex-shrink-0 mb-4"
                            data-bs-toggle="tooltip" title="Calendar" data-bs-custom-class="tooltip-inverse">
                            <i class="ki-duotone ki-calendar-add fs-2qx">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                                <span class="path4"></span>
                                <span class="path5"></span>
                                <span class="path6"></span>
                            </i>
                        </a>
                        <a href="../dist/account/overview.html"
                            class="btn btn-icon btn-color-warning bg-hover-body h-45px w-45px flex-shrink-0 mb-4"
                            data-bs-toggle="tooltip" title="Profile" data-bs-custom-class="tooltip-inverse">
                            <i class="ki-duotone ki-message-add fs-2qx">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </a>
                        <a href="../dist/apps/ecommerce/catalog/products.html"
                            class="btn btn-icon btn-color-info bg-hover-body h-45px w-45px flex-shrink-0 mb-4"
                            data-bs-toggle="tooltip" title="Products" data-bs-custom-class="tooltip-inverse">
                            <i class="ki-duotone ki-devices-2 fs-2qx">
                                <span class="path1"></span>
                                <span class="path2"></span>
                                <span class="path3"></span>
                            </i>
                        </a>
                    </div>
                    <!--end::Wrapper-->
                </div> --}}
                <!--end::aside-->
            </div>
            <!--end::Wrapper-->
        </div>
        <!--end::Page-->
    </div>

    <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
        <i class="ki-duotone ki-arrow-up">
            <span class="path1"></span>
            <span class="path2"></span>
        </i>
    </div>
    <!--end::Scrolltop-->
    <script>
        var hostUrl = "../theme/dist/assets/";
    </script>
    <script src="{{ asset('../theme/dist/assets/plugins/global/plugins.bundle.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery-3.7.0.js"></script> --}}

    <script src="{{ asset('../theme/dist/assets/js/scripts.bundle.js') }}"></script>
    <script src="{{ asset('../theme/dist/assets/plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/xy.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/radar.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/map.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/continentsLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/usaLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZonesLow.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/geodata/worldTimeZoneAreasLow.js"></script>
    <script src="{{ asset('../theme/dist/assets/plugins/custom/datatables/datatables.bundle.js') }}"></script>
    <script src="{{ asset('../theme/dist/assets/js/widgets.bundle.js') }}"></script>
    <script src="{{ asset('../theme/dist/assets/js/custom/widgets.js') }}"></script>
    <script src="{{ asset('../theme/dist/assets/js/custom/apps/chat/chat.js') }}"></script>
    <script src="{{ asset('../theme/dist/assets/js/custom/utilities/modals/upgrade-plan.js') }}"></script>
    <script src="{{ asset('../theme/dist/assets/js/custom/utilities/modals/create-account.js') }}"></script>
    <script src="{{ asset('../theme/dist/assets/js/custom/utilities/modals/create-app.js') }}"></script>
    <script src="{{ asset('../theme/dist/assets/js/custom/utilities/modals/users-search.js') }}"></script>
    <script src="{{ asset('../theme/dist/assets/plugins/custom/formrepeater/formrepeater.bundle.js') }}"></script>
    <script src="https://kit.fontawesome.com/6b2c3d16f7.js" crossorigin="anonymous"></script>
    {{-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> --}}

    {{-- datatables --}}
    {{-- <script type="text/javascript" src="https://code.jquery.com/jquery-3.5.1.js"></script> --}}
    {{-- <script type="text/javascript"
        src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/js/bootstrap.bundle.min.js"></script> --}}
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/1.13.1/js/dataTables.bootstrap5.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/rowgroup/1.3.0/js/dataTables.rowGroup.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js">
    </script>
    <script type="text/javascript" src="https://cdn.datatables.net/responsive/2.4.0/js/responsive.bootstrap5.min.js">
    </script>
    {{-- datatable button --}}
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.bootstrap5.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
    <script type="text/javascript" src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.colVis.min.js"></script>

    {{-- datatable scroll --}}
    <script type="text/javascript" src="https://cdn.datatables.net/scroller/2.0.7/js/dataTables.scroller.min.js"></script>

    {{-- select2 --}}
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    {{-- datepicker --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-datepicker/1.9.0/js/bootstrap-datepicker.min.js"></script>

    <script>
        $(".readonly").keydown(function(e) {
            e.preventDefault();
        });
    </script>

    @yield('script')
</body>

</html>
