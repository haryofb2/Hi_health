<script>
    $(document).ready(function() {

        var optionFormat = function(item) {
            if (!item.id) {
                return item.text;
            }

            var span = document.createElement('span');
            var template = '';

            template += '<img src="' + item.element.getAttribute('data-kt-select2-image') +
                '" class="rounded-circle h-20px me-2" alt="image"/>';
            template += item.text;

            span.innerHTML = template;

            return $(span);
        }

        $('#kt_docs_select2_floating_labels_1').select2({
            placeholder: "Select coin",
            minimumResultsForSearch: Infinity,
            templateSelection: optionFormat,
            templateResult: optionFormat
        });

    });
</script>

<script>
    // Stepper lement
    var element = document.querySelector("#kt_stepper_example_clickable");

    // Initialize Stepper
    var stepper = new KTStepper(element);

    // Handle navigation click
    stepper.on("kt.stepper.click", function(stepper) {
        stepper.goTo(stepper.getClickedStepIndex()); // go to clicked step
    });

    // Handle next step
    stepper.on("kt.stepper.next", function(stepper) {
        stepper.goNext(); // go next step
    });

    // Handle previous step
    stepper.on("kt.stepper.previous", function(stepper) {
        stepper.goPrevious(); // go previous step
    });
</script>

<script>
    $(document).ready(function() {

        $('input[type="text"]').addClass('readonly');
        $('#data_pasien').find('select').prop('disable', true);
        $('#data_pasien').find('textarea').prop('readonly', true);

        $('#kd_pil_jenis_kelamin').select2();
        $.ajax({
            url: "{{ route('api.m_pilihan.dropdown') }}",
            type: 'POST',
            data: {
                group_pilihan: 'jenis_kelamin'
            },
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#kd_pil_jenis_kelamin').empty();
                $('#kd_pil_jenis_kelamin').append(
                    '<option value="" >-- Pilih Jenis Kelamin---</option>');
                $.each(data, function(key, value) {
                    $('#kd_pil_jenis_kelamin').append('<option value="' +
                        value.kd_pilihan +
                        '" >' + value.pilihan +
                        '</option>');
                });
            }
        });

        $('#kd_kota').select2();
        $.ajax({
            url: "{{ route('api.m_kota.dropdown') }}",
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#kd_kota').empty();
                $('#kd_kota').append('<option value="" >-- Pilih kota ---</option>');
                $.each(data, function(key, value) {
                    $('#kd_kota').append('<option value="' +
                        value.kd_kota +
                        '" >' + value.nama_kota +
                        '</option>');
                });
            }
        });


        $(document).on('click', 'input[name="jenis_pasien"]', function() {
            var jenis_pasien = $(this).val();

            if (jenis_pasien === 'N') {
                // alert(jenis_pasien);
                // $('input[type="text"]').addClass('readonly');
                // $('#data_pasien').find('select').prop('disable', false);
                // $('#data_pasien').find('textarea').prop('readonly', false);
                $('#kd_pasien').val('');
                $('#no_pasien').val('');
                $('#nama_pasien').val('');
                $('#title_pasien').val('');
                $('#tgl_lahir').val('');
                $('#kd_pil_jenis_kelamin').val('').trigger('change');
                $('#nama_ibu_kandung').val('');
                $('#no_telp').val('');
                $('#no_hp').val('');
                $('#email').val('');
                $('#alamat_domisili').val('');
                $('#kelurahan').val('');
                $('#kecamatan').val('');
                $('#kd_kota').val('').trigger('change');
                $('#kodepos').val('');
                $('#no_ktp').val('');
                $('#alamat_ktp').val('');
            }
            if (jenis_pasien === 'O') {
                $('#modal_list_pasien').modal('show');
                $('#modal_list_pasien_table').DataTable().destroy();
                load_pasien();
            }
        });

        function load_pasien() {
            $('#modal_list_pasien_table').DataTable({
                processing: true,
                serverside: true,
                "responsive": true,
                "lengthMenu": [
                    [10, 25, 50, 100, 500, 1000, -1],
                    [10, 25, 50, 100, 500, 1000, "All"]
                ],
                "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
                "fixedHeader": true,
                "dom": "ftip",
                "dom": "<'row'<'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url: "{{ route('api.m_pasien.datatable.all') }}",
                    type: 'POST',
                },
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'no_pasien',
                        name: 'no_pasien'
                    },
                    {
                        data: 'nama_pasien',
                        name: 'nama_pasien',
                    },
                ],
                order: [
                    [1, 'asc']
                ],
            });
        }

        $(document).on('click', '#btn_pasien', function() {
            var kd_pasien = $(this).data('id');
            // console.log(kd_unit);
            $.post("{{ route('api.m_pasien.choose') }}", {
                kd_pasien: kd_pasien
            }, function(data) {
                // console.log(data);
                $('#kd_pasien').val(data.kd_pasien);
                $('#no_pasien').val(data.no_pasien);
                $('#nama_pasien').val(data.nama_pasien);
                $('#title_pasien').val(data.title_pasien);
                $('#tgl_lahir').val(data.tgl_lahir_carbon);
                $('#kd_pil_jenis_kelamin').val(data.kd_pil_jenis_kelamin).trigger('change');
                $('#nama_ibu_kandung').val(data.nama_ibu_kandung);
                $('#no_telp').val(data.no_telp);
                $('#no_hp').val(data.no_hp);
                $('#email').val(data.email);
                $('#alamat_domisili').val(data.alamat_domisili);
                $('#kelurahan').val(data.kelurahan);
                $('#kecamatan').val(data.kecamatan);
                $('#kd_kota').val(data.kd_kota).trigger('change');
                $('#kodepos').val(data.kodepos);
                $('#no_ktp').val(data.no_ktp);
                $('#alamat_ktp').val(data.alamat_ktp);
                $('#modal_list_pasien').modal('hide');
            });
        });

    });

    $(document).ready(function() {


        $('#kd_poliklinik').select2();
        $.ajax({
            url: "{{ route('api.m_poliklinik.dropdown') }}",
            type: 'POST',
            dataType: 'json',
            success: function(data) {
                // console.log(data);
                $('#kd_poliklinik').empty();
                $('#kd_poliklinik').append('<option value="" >-- Pilih Poliklinik ---</option>');
                $.each(data, function(key, value) {
                    $('#kd_poliklinik').append('<option value="' +
                        value.kd_poliklinik +
                        '" >' + value.nama_poliklinik +
                        '</option>');
                });
            }
        });

        $('#data_dokter .form-floating input[type="text"]').prop('readonly', true);


        $(document).on('click', '#nama_id_dokter', function() {
            var kd_poliklinik = $('#kd_poliklinik').val();
            // var jenis_referensi = $('#jenis_referensi_btn').find('.active').data(
            //     'kt-button');
            // console.log(jenis_referensi);
            // if (jenis_referensi == 1) {
            if (kd_poliklinik === '') {
                alert('Pilih poliklinik terlebih dahulu')
            } else {
                $('#modal_list_dokter').modal('show');
                $('#modal_list_dokter_table').DataTable().destroy();
                load_dokter_spesialis(kd_poliklinik);
            }
            // }

        });

        function load_dokter_spesialis(kd_poliklinik = '') {
            console.log(kd_poliklinik);
            $('#modal_list_dokter_table').DataTable({
                processing: true,
                serverside: true,
                "responsive": true,
                "lengthMenu": [
                    [10, 25, 50, 100, 500, 1000, -1],
                    [10, 25, 50, 100, 500, 1000, "All"]
                ],
                "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
                "fixedHeader": true,
                "dom": "ftip",
                "dom": "<'row'<'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url: "{{ route('api.m_dokter.datatable.poliklinik') }}",
                    type: 'POST',
                    data: {
                        kd_poliklinik: kd_poliklinik
                    }
                },
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'no_dokter',
                        name: 'no_dokter'
                    },
                    {
                        data: 'title_dokter',
                        name: 'title_dokter'
                    },
                    {
                        data: 'nama_dokter',
                        name: 'nama_dokter',
                    },
                    {
                        data: 'nama_spesialis',
                        name: 'nama_spesialis',
                    },
                ],
                order: [
                    [1, 'asc']
                ],
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }]
            });
            // $.fn.DataTable.ext.errMode = 'none';

        }

        $(document).on('click', '#btn_dokter_poliklinik', function() {
            var kd_dokter = $(this).data('id');
            // console.log(kd_unit);
            $.post("{{ route('api.m_dokter.choose') }}", {
                kd_dokter: kd_dokter
            }, function(data) {
                // console.log(data);
                $('#kd_dokter').val(data.kd_dokter);
                $('#no_dokter').val(data.no_dokter);
                $('#nama_dokter').val(data.nama_dokter);
                $('#title_dokter').val(data.title_dokter);
                $('#nama_spesialis').val(data.nama_spesialis);
                $('#lokasi_praktek').val('');

                $('#modal_list_dokter').modal('hide');
            });
        });

        $(document).on('click', '#nama_dokter_patologi', function() {
            // console.log(kd_poliklinik);
            $('#modal_list_dokter').modal('show');
            $('#modal_list_dokter_table').DataTable().destroy();
            load_dokter();
        });

        function load_dokter() {
            $('#modal_list_dokter_table').DataTable({
                processing: true,
                serverside: true,
                "responsive": true,
                "lengthMenu": [
                    [10, 25, 50, 100, 500, 1000, -1],
                    [10, 25, 50, 100, 500, 1000, "All"]
                ],
                "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
                "fixedHeader": true,
                "dom": "ftip",
                "dom": "<'row'<'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url: "{{ route('api.m_dokter.datatable.all') }}",
                    type: 'POST',
                },
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'no_dokter',
                        name: 'no_dokter'
                    },
                    {
                        data: 'title_dokter',
                        name: 'title_dokter'
                    },
                    {
                        data: 'nama_dokter',
                        name: 'nama_dokter',
                    },
                    {
                        data: 'nama_spesialis',
                        name: 'nama_spesialis',
                    },
                ],
                order: [
                    [1, 'asc']
                ],
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }]
            });
            // $.fn.DataTable.ext.errMode = 'none';

        }

        $(document).on('click', '#btn_dokter', function() {
            var kd_dokter = $(this).data('id');
            // console.log(kd_unit);
            $.post("{{ route('api.m_dokter.choose') }}", {
                kd_dokter: kd_dokter
            }, function(data) {
                // console.log(data);
                $('#kd_dokter_patologi').val(data.kd_dokter);
                $('#nama_dokter_patologi').val(data.nama_dokter);
                $('#modal_list_dokter').modal('hide');
            });
        });

        $(document).on('click', 'input[name="jenis_referensi"]', function() {
            var jenis_referensi = $(this).val();
            $('#data_dokter .form-floating input[type="text"]').val('');
            $('#kd_poliklinik').val('').trigger('change');

            console.log(jenis_referensi);
            if (jenis_referensi === 'R') {
                $('#nama_id_dokter').prop('disabled', true)
                $('#kd_poliklinik').prop('disabled', true)
                $('#data_dokter .form-floating input[type="text"]').prop('readonly', false);

            } else {
                $('#nama_id_dokter').prop('disabled', false)
                $('#kd_poliklinik').prop('disabled', false)
                $('#data_dokter .form-floating input[type="text"]').prop('readonly', true);

            }
        });

        $(document).on('click', 'input[name="jenis_pertanggungan"]', function() {
            var jenis_pertanggungan = $(this).val();
            $('#kd_poliklinik').val('');

            console.log(jenis_pertanggungan);
            if (jenis_pertanggungan === 'I') {
                $('#asuransi').prop('hidden', false)
            } else {
                $('#asuransi').prop('hidden', true)
            }
        });

    });

    $(document).ready(function() {

        $(document).on('click', '#btn_tambah_pemeriksaan', function() {
            // console.log(kd_poliklinik);
            $('#modal_list_pemeriksaan').modal('show');
            $('#modal_list_pemeriksaan_table').DataTable().destroy();
            load_pemeriksaan();
        });

        function load_pemeriksaan() {
            $('#modal_list_pemeriksaan_table').DataTable({
                processing: true,
                serverside: true,
                "responsive": true,
                "lengthMenu": [
                    [10, 25, 50, 100, 500, 1000, -1],
                    [10, 25, 50, 100, 500, 1000, "All"]
                ],
                "bInfo": false, //Dont display info e.g. "Showing 1 to 4 of 4 entries"
                "fixedHeader": true,
                "dom": "ftip",
                "dom": "<'row'<'col-sm-12 col-md-6'f>>" +
                    "<'row'<'col-sm-12'tr>>" +
                    "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
                ajax: {
                    url: "{{ route('api.m_pemeriksaan.datatable.all') }}",
                    type: 'POST',
                },
                columns: [{
                        data: 'action',
                        name: 'action'
                    },
                    {
                        data: 'nama_pemeriksaan',
                        name: 'nama_pemeriksaan'
                    },
                    {
                        data: 'nama_poliklinik',
                        name: 'nama_poliklinik',
                        className: 'hide_column'
                    },
                    {
                        data: 'nama_pemeriksaan_golongan',
                        name: 'nama_pemeriksaan_golongan',
                        className: 'hide_column'
                    },
                    {
                        data: 'nama_pemeriksaan_lab_01',
                        name: 'nama_pemeriksaan_lab_01',
                        className: 'hide_column'
                    },
                ],
                order: [
                    [3, 'desc'],
                    [4, 'asc'],
                    [2, 'desc']
                ],
                rowGroup: {
                    dataSrc: ['nama_pemeriksaan_golongan', 'nama_pemeriksaan_lab_01']
                },
                columnDefs: [{
                    "defaultContent": "-",
                    "targets": "_all"
                }]
            });
            $.fn.DataTable.ext.errMode = 'none';

        }

        $(document).on('click', '#btn_pemeriksaan', function() {
            var kd_pemeriksaan = $(this).data('id');
            var count_pemeriksaan = parseInt($('#count_pemeriksaan').val());
            // console.log(kd_unit);
            $.post("{{ route('api.m_pemeriksaan.choose') }}", {
                kd_pemeriksaan: kd_pemeriksaan
            }, function(data) {
                // console.log(data);
                var html = "<div class='col' id='pemeriksaan_" + count_pemeriksaan + "'>"
                html += "<div class='card border-1 border-dark-subtle h-100'>"
                html += "<div class='card-body pt-6'>"
                html +=
                    "<input type='text' class='form-control' id='no_urut_" +
                    count_pemeriksaan + "' name='no_urut[]' value='" +
                    count_pemeriksaan + ".' hidden>"
                html +=
                    "<input type='text' class='form-control' id='kd_pemeriksaan_" +
                    count_pemeriksaan + "' name='kd_pemeriksaan[]' value='" +
                    data.kd_pemeriksaan + "' hidden>"
                html +=
                    "<input type='text' class='form-control' id='nama_pemeriksaan_" +
                    count_pemeriksaan + "' name='nama_pemeriksaan[]' value='" +
                    data.nama_pemeriksaan + "' hidden>"
                html += "<div class='d-grid gap-2 mb-3'>"
                html +=
                    "<button class='btn btn-sm btn-light-danger' type='button' id='btn_hapus' data-row='" +
                    count_pemeriksaan + "'>"
                html += "<i class='ki-outline ki-trash fs-2'></i>"
                html += "</button>"
                html += "</div>"
                html +=
                    "<h1 class='h4 mb-0 text-gray-700' id='nama_pemeriksaan_text_" +
                    count_pemeriksaan + "'>" +
                    data.nama_pemeriksaan + "</h1>"
                html += "<p id='nama_pemeriksaan_lab_01_" + count_pemeriksaan + "'>" +
                    data.nama_pemeriksaan_lab_01 + "</p>"
                html += "</div>"
                html += "</div>"
                html += "</div>"





                $('#list_pemeriksaan').append(html)

                new_count = count_pemeriksaan + 1;

                $('#count_pemeriksaan').val(new_count);
                $('#modal_list_pemeriksaan').modal('hide');
            });
        });
        $(document).on('click', '#btn_hapus', function() {
            let hapus = $(this).data('row');
            // console.log(hapus);
            $('#pemeriksaan_' + hapus).remove();
        })

    });
</script>
