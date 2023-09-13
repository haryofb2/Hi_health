@extends('master')
@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Order Laboratory</li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-700">Transaction</li>
        <!--end::Item-->
    </ul>
@endsection
@section('page-title')
    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
        Patient Order Information</h1>
@endsection
@section('content')
    <div class="table-responsive" id="transaction">
        <table class="table nowrap table-row-bordered border rounded gs-7" style="width:100%" id="transaction_table">
        </table>
    </div>
@endsection
@section('script')
    @include('content.order_laboratory.transaction.patient_order_information.home.script')
@endsection
