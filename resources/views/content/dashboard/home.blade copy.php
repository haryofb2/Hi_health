@extends('master')
@section('content')
    {{-- <div class="container"> --}}
    {{-- <div class="row">
        <div class="col-sm-12 my-auto"> --}}
    <h1 style="text-align: center">Dashboard sedang main tenis</h1>

    <div class="center-screen">
        <img src="{{ asset('../template/img/main_tenis.webp') }}" class="img-fluid"
            style="border-radius: 5px;max-height: 30rem">

    </div>
    {{-- </div>
    </div> --}}
    {{-- </div> --}}
    {{-- <div class="row align-items-center">
        <div class="col-sm-12 my-auto">
            <div class="card card-block w-50">
                <div class="card-body">
                    <img src="{{ asset('../template/img/main_tenis.webp') }}" class="img-fluid" style="border-radius: 5px">
                    <h1 style="text-align: center">lagi main tenis</h1>
                </div>
            </div>
        </div>
    </div> --}}
@endsection

@section('script')
    {{-- <script src="src/index.js"></script> --}}
@endsection
