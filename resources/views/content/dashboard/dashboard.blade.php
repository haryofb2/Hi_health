@extends('master')
@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">
            <a href="../dist/index.html" class="text-gray-500">
                <i class="ki-duotone ki-home fs-3 text-gray-400 me-n1"></i>
            </a>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Dashboards</li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-700">Default</li>
        <!--end::Item-->
    </ul>
@endsection
@section('page-title')
    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
        Dashboard</h1>
@endsection
@section('content')
    <div class="row row-cols-1 row-cols-md-2 g-4">
        <div class="col">
            <div class="card border-2 border-danger border-hover-primary">
                <div class="card-body pt-6">
                    <h1>
                        coba
                    </h1>
                </div>
            </div>
        </div>
        <div class="col">
            <div class="card border-2 border-danger border-hover-primary">
                <div class="card-body pt-6">
                    <h1>
                        coba
                    </h1>
                </div>
            </div>
        </div>
    </div>
@endsection
