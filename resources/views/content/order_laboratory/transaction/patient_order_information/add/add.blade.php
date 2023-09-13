@extends('master')
@section('breadcrumb')
    <ul class="breadcrumb breadcrumb-separatorless fw-semibold mb-6">
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-700 fw-bold lh-1">Patient Order Information</li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item">
            <i class="ki-duotone ki-right fs-4 text-gray-700 mx-n1"></i>
        </li>
        <!--end::Item-->
        <!--begin::Item-->
        <li class="breadcrumb-item text-gray-700">add</li>
        <!--end::Item-->
    </ul>
@endsection
@section('page-title')
    <h1 class="page-heading d-flex flex-column justify-content-center text-dark fw-bolder fs-1 lh-0">
        Registrasi Pemerikasaan Laboratorium</h1>
@endsection
@section('content')
    <form action="{{ route('patient_order.store') }}" method="post">
        <div class="form-group">
            <input type="hidden" name="_token" value="{{ csrf_token() }}" />
            <input type="hidden" name="_method" value="POST" />
            <input type="hidden" id="count_detail" value="">
            <input type="hidden" name="kd_registrasi" value="">
            <input type="hidden" name="kd_pasien" id="kd_pasien" value="">
        </div>

        <div class="stepper stepper-pills" id="kt_stepper_example_clickable">
            <!--begin::Nav-->
            <div class="stepper-nav flex-center flex-wrap mb-10">
                <!--begin::Step 1-->
                <div class="stepper-item mx-8 my-4 current" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">1</span>
                        </div>
                        <!--end::Icon-->

                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Step 1
                            </h3>

                            <div class="stepper-desc">
                                Data Pasien
                            </div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 1-->

                <!--begin::Step 2-->
                <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">2</span>
                        </div>
                        <!--begin::Icon-->

                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Step 2
                            </h3>

                            <div class="stepper-desc">
                                Referensi
                            </div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 2-->

                <!--begin::Step 3-->
                <div class="stepper-item mx-8 my-4" data-kt-stepper-element="nav" data-kt-stepper-action="step">
                    <!--begin::Wrapper-->
                    <div class="stepper-wrapper d-flex align-items-center">
                        <!--begin::Icon-->
                        <div class="stepper-icon w-40px h-40px">
                            <i class="stepper-check fas fa-check"></i>
                            <span class="stepper-number">3</span>
                        </div>
                        <!--begin::Icon-->

                        <!--begin::Label-->
                        <div class="stepper-label">
                            <h3 class="stepper-title">
                                Step 3
                            </h3>

                            <div class="stepper-desc">
                                Daftar Pemerikasaan
                            </div>
                        </div>
                        <!--end::Label-->
                    </div>
                    <!--end::Wrapper-->

                    <!--begin::Line-->
                    <div class="stepper-line h-40px"></div>
                    <!--end::Line-->
                </div>
                <!--end::Step 3-->

            </div>
            <!--end::Nav-->

            <!--begin::Form-->
            <!--begin::Group-->
            <div class="mb-5">
                <!--begin::Step 1-->
                <div class="flex-column current" data-kt-stepper-element="content">
                    <div class="mb-3">
                        <div class="btn-group w-100" data-kt-buttons="true" data-kt-buttons-target="[data-kt-button]">
                            <label class="btn btn-light-primary btn-color-primary btn-active-primary" data-kt-button="true">
                                <input type="radio" class="btn-check" name="jenis_pasien" id="jenis_pasien_1"
                                    autocomplete="off" value="N">
                                Pasien Baru
                            </label>
                            <label class="btn btn-light-danger btn-color-danger btn-active-danger" data-kt-button="true">
                                <input type="radio" class="btn-check" name="jenis_pasien" id="jenis_pasien_2"
                                    autocomplete="off" value="O">
                                Pasien lama
                            </label>
                        </div>
                    </div>
                    <div class="row row-cols-1 row-cols-md-2 g-4" id="data_pasien">
                        <div class="col">
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control " id="no_pasien" placeholder="..." value="">
                                <label class="text-capitalize"for="floatingPassword">medical record no.</label>
                            </div>
                            <div class="form-floating col-md-3 mb-3">
                                <select name="title_pasien" id="title_pasien" class="form-control form-control-sm">
                                    <option value="Mr.">Mr.</option>
                                    <option value="Mrs.">Mrs.</option>
                                    <option value="Ny.">Ny.</option>
                                    <option value="An.">An.</option>
                                </select>
                                <label class="text-capitalize"for="floatingInput">Title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control " id="nama_pasien" name="nama_pasien"
                                    placeholder="..." value="">
                                <label class="text-capitalize"for="floatingPassword">nama pasien</label>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="date" class="form-control" id="tgl_lahir" placeholder="..."
                                            name="tgl_lahir" value="">
                                        <label class="text-capitalize"for="tgl_lahir">tanggal lahir</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating border rounded mb-3">
                                        <select name="kd_pil_jenis_kelamin" id="kd_pil_jenis_kelamin"
                                            class="form-select form-select-transparent" data-control="select2"
                                            data-hide-search="true"></select>
                                        <label class="text-capitalize"for="floatingInput">jenis kelamin</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control " id="nama_ibu_kandung"
                                    name="nama_ibu_kandung" placeholder="..." value="">
                                <label class="text-capitalize"for="floatingPassword">nama ibu kandung</label>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="no_telp" placeholder="..."
                                            name="no_telp" value="">
                                        <label class="text-capitalize"for="no_telp">no. telp.</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control" id="no_hp" placeholder="..."
                                            name="no_hp" value="">
                                        <label class="text-capitalize"for="no_hp">HP</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="email" class="form-control " id="email" name="email"
                                    placeholder="..." value="">
                                <label class="text-capitalize"for="floatingPassword">email</label>
                            </div>


                        </div>
                        <div class="col">
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="alamat_domisili" name="alamat_domisili"
                                    style="height: 10vh"></textarea>
                                <label class="text-capitalize" for="alamat_domisili">alamat</label>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " id="kelurahan" name="kelurahan"
                                            placeholder="..." value="">
                                        <label class="text-capitalize"for="kelurahan">kelurahan</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " id="kecamatan" name="kecamatan"
                                            placeholder="..." value="">
                                        <label class="text-capitalize"for="kecamatan">kecamatan</label>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-floating border rounded mb-3">
                                        <select name="kd_kota" id="kd_kota" class="form-select form-select-transparent"
                                            data-control="select2" data-hide-search="true"></select>
                                        <label class="text-capitalize"for="floatingInput">kota</label>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-floating mb-3">
                                        <input type="text" class="form-control " id="kodepos" name="kodepos"
                                            placeholder="..." value="">
                                        <label class="text-capitalize"for="kodepos">kode pos</label>
                                    </div>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control " id="no_ktp" name="no_ktp"
                                    placeholder="..." value="">
                                <label class="text-capitalize"for="no_ktp">no. KTP</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" name="alamat_ktp" id="alamat_ktp"
                                    style="height: 10vh"></textarea>
                                <label class="text-capitalize" for="alamat_ktp">alamat KTP</label>
                            </div>
                        </div>
                    </div>
                </div>
                <!--begin::Step 1-->

                <!--begin::Step 2-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <!--begin::Input group-->
                    <div class="row row-cols-1 row-cols-md-2 g-4">
                        <div class="col" id="data_dokter">
                            <div class="mb-3">
                                <div class="btn-group w-100" data-kt-buttons="true"
                                    data-kt-buttons-target="[data-kt-button]" id="jenis_referensi_btn">
                                    <label
                                        class="btn btn-light-primary btn-color-primary btn-active-primary text-capitalize active"
                                        data-kt-button="1">
                                        <input type="radio" class="btn-check" name="jenis_referensi"
                                            id="jenis_referensi_1" autocomplete="off" value="I">
                                        Pasien internal rumah sakit / klinik
                                    </label>
                                    <label class="btn btn-light-danger btn-color-danger btn-active-danger text-capitalize"
                                        data-kt-button="0">
                                        <input type="radio" class="btn-check" name="jenis_referensi"
                                            id="jenis_referensi_2" autocomplete="off" value="R">
                                        Pasien luar
                                    </label>
                                </div>
                            </div>
                            <div class="form-floating mb-3">
                                <select name="kd_poliklinik" id="kd_poliklinik"
                                    class="form-select form-select-transparent" data-control="select2"
                                    data-hide-search="true" id="kd_poliklinik" name="kd_poliklinik"></select>
                                <label class="text-capitalize"for="kd_poliklinik">poliklinik</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_id_dokter" placeholder="...">
                                <input type="text" class="form-control" id="kd_dokter" placeholder="..."
                                    name="kd_dokter" hidden>
                                <label class="text-capitalize"for="nama_id_dokter">ID. dokter</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="title_dokter" name="title_dokter"
                                    placeholder="..." value="">
                                <label class="text-capitalize"for="title_dokter">title</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_dokter" name="nama_dokter"
                                    placeholder="..." value="">
                                <label class="text-capitalize"for="nama_dokter">nama dokter</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="nama_spesialis" name="nama_spesialis"
                                    placeholder="..." value="">
                                <label class="text-capitalize"for="nama_spesialis">spesialis</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control" id="lokasi_praktek" name="lokasi_praktek"
                                    placeholder="..." value="">
                                <label class="text-capitalize"for="lokasi_praktek">lokasi praktek</label>
                            </div>
                            <div class="form-floating mb-3">
                                <input type="text" class="form-control readonly" id="nama_dokter_patologi"
                                    placeholder="...">
                                <input type="text" class="form-control" id="kd_dokter_patologi" placeholder="..."
                                    name="kd_dokter_patologi" hidden>
                                <label class="text-capitalize"for="nama_dokter_patologi">pathologi doctor</label>
                            </div>
                        </div>
                        <div class="col">
                            <div class="mb-3">
                                <div class="btn-group w-100" data-kt-buttons="true"
                                    data-kt-buttons-target="[data-kt-button]">
                                    <label
                                        class="btn btn-light-primary btn-color-primary btn-active-primary text-capitalize active"
                                        data-kt-button="true">
                                        <input type="radio" class="btn-check" name="jenis_pertanggungan"
                                            id="jenis_pertanggungan_1" autocomplete="off" value="P">
                                        personal
                                    </label>
                                    <label
                                        class="btn btn-light-warning btn-color-warning btn-active-warning text-capitalize"
                                        data-kt-button="true">
                                        <input type="radio" class="btn-check" name="jenis_pertanggungan"
                                            id="jenis_pertanggungan_2" autocomplete="off" value="I">
                                        insurance
                                    </label><label
                                        class="btn btn-light-danger btn-color-danger btn-active-danger text-capitalize"
                                        data-kt-button="true">
                                        <input type="radio" class="btn-check" name="jenis_pertanggungan"
                                            id="jenis_pertanggungan_3" autocomplete="off" value="B">
                                        BPJS
                                    </label>
                                </div>
                            </div>
                            <div class="form-floating mb-3" id="asuransi" hidden>
                                <input type="text" class="form-control" id="lnama_asuransi" name="nama_asuransi"
                                    placeholder="..." value="">
                                <label class="text-capitalize"for="nama_asuransi">nama asuransi</label>
                            </div>
                            <div class="form-floating mb-3">
                                <textarea class="form-control" placeholder="Leave a comment here" id="diagnosa" style="height: 10vh"></textarea>
                                <label class="text-capitalize" for="diagnosa">diagnosa</label>
                            </div>
                        </div>
                        <!--end::Input group-->
                    </div>
                    <!--begin::Step 2-->
                </div>

                <!--begin::Step 3-->
                <div class="flex-column" data-kt-stepper-element="content">
                    <!--begin::Input group-->
                    <input type="text" class="form-control" id="count_pemeriksaan" value="1" hidden>

                    <a href="#" class="btn btn-light-primary btn-color-primary btn-hover-primary hover-elevate-up"
                        id="btn_tambah_pemeriksaan">
                        <i class="ki-duotone ki-element-plus fs-2qx">
                            <i class="path1"></i>
                            <i class="path2"></i>
                            <i class="path3"></i>
                            <i class="path4"></i>
                            <i class="path5"></i>
                        </i>
                        Tambah Pemeriksaan
                    </a>
                    <br>
                    <div class="row row-cols-1 row-cols-md-4 g-4" id="list_pemeriksaan">
                        {{-- <div class="col">
                            <div class="card border-1 border-dark-subtle">
                                <div class="card-body pt-6">
                                    <input type="text" class="form-control" id="kd_pemeriksaan"
                                        name="kd_pemeriksaan[]" value="0" hidden>
                                    <div class="d-grid gap-2 mb-3">
                                        <button class="btn btn-sm btn-light-danger" type="button">
                                            <i class="ki-outline ki-trash fs-2"></i>
                                        </button>
                                    </div>
                                    <h1 class="h4 mb-0 text-gray-700" id="nama_pemeriksaan">Purchase Order</h1>
                                    <p id="nama_group_pemeriksaan">elektrolit</p>
                                </div>
                            </div>
                        </div> --}}

                    </div>


                    <!--end::Input group-->
                </div>
                <!--begin::Step 3-->
            </div>
            <!--end::Group-->

            <!--begin::Actions-->
            <div class="d-flex flex-stack">
                <!--begin::Wrapper-->
                <div class="me-2">
                    <button type="button" class="btn btn-light-danger btn-color-danger btn-active-danger"
                        data-kt-stepper-action="previous">
                        Back
                    </button>
                </div>
                <!--end::Wrapper-->

                <!--begin::Wrapper-->
                <div>
                    <button type="submit" class="btn btn-primary" data-kt-stepper-action="submit">
                        <span class="indicator-label">
                            Submit
                        </span>
                        <span class="indicator-progress">
                            Please wait... <span class="spinner-border spinner-border-sm align-middle ms-2"></span>
                        </span>
                    </button>

                    <button type="button" class="btn btn-primary" data-kt-stepper-action="next">
                        Continue
                    </button>
                </div>
                <!--end::Wrapper-->
            </div>
            <!--end::Actions-->
            <!--end::Form-->
        </div>


        {{-- <div class="d-grid gap-2">
            <button class="btn btn-primary" type="submit">Submit</button>
        </div> --}}
        @include('modal.modal_list_pasien')
        @include('modal.modal_list_dokter')
        @include('modal.modal_list_pemeriksaan')
    </form>
@endsection
@section('script')
    @include('content.order_laboratory.transaction.patient_order_information.add.script')
@endsection
