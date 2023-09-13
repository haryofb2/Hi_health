<script>
    $(document).ready(function() {

        $('#order_laboratory_menu').addClass('show');
        $('#order_laboratory_transaction_menu').addClass('show');
        $('#order_laboratory_transaction_patien_order_menu').addClass('active');

        var title_doc_transaction = 'Good Issued';
        var transaction = $('#transaction_table').DataTable({
            processing: true,
            serverSide: true,
            // autoFill: true,
            responsive: {
                details: {
                    display: $.fn.dataTable.Responsive.display.modal({
                        header: function(row) {
                            var data = row.data();
                            // console.log(data.no_order_pekerjaan_01);
                            return 'Details for ' + data.no_registrasi;
                        }
                    }),
                    renderer: $.fn.dataTable.Responsive.renderer.tableAll({
                        tableClass: 'table'
                    })
                }
            },
            lengthChange: false,
            // dom: 'BRSPQftir',
            "dom": "<'row'<'col-sm-12 col-md-6'B><'col-sm-12 col-md-6'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7'p>>",
            // "pageLength": 10,

            buttons: [{
                    text: '<i class="fa-solid fa-plus"></i> Create',
                    action: function(e, dt, node, config) {
                        window.location.href = './PatOrdIn/add';
                    }
                },
                'copy',
                'excel',
                {
                    extend: 'pdfHtml5',
                    // text: '<i class="fa fa-file-pdf-o"></i> ',
                    title: title_doc_transaction,
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                },
                {
                    extend: 'print',
                    title: title_doc_transaction,
                    exportOptions: {
                        modifier: {
                            page: 'current'
                        }
                    }
                },
                // 'colvis'
            ],

            ajax: '{!! route('api.t_registrasi.all') !!}', // memanggil route yang menampilkan data json
            method: 'GET',
            columns: [{
                    title: 'Registrasi No.',
                    data: 'no_registrasi',
                    name: 'no_registrasi'
                },
                { // mengambil & menampilkan kolom sesuai tabel database
                    title: 'Tanggal Registrasi',
                    data: 'tgl_regis',
                    name: 'tgl_regis',

                },
                {
                    title: 'Medichal Record No.',
                    data: 'no_pasien',
                    name: 'no_pasien',
                },
                {
                    title: 'nama Pasien',
                    data: 'nama_pasien',
                    name: 'nama_pasien',
                },
                {
                    title: 'Tanggal lahir',
                    data: 'tgl_lahir_pasien',
                    name: 'tgl_lahir_pasien',
                },
                {
                    title: 'Jenis Kelamin',
                    data: 'pil_jenis_kelamin',
                    name: 'pil_jenis_kelamin',
                },
                {
                    title: 'Nama Dokter',
                    data: 'nama_dokter',
                    name: 'nama_dokter',
                },
                {
                    title: 'Daftar Pemeriksaan',
                    data: 'keterangan_pemeriksaan',
                    name: 'keterangan_pemeriksaan',
                },

            ],

            deferRender: true,
            scrollCollapse: true,
            order: [
                [0, 'desc'],
                // [11, 'desc']
            ],
            // rowGroup: {
            //     dataSrc: ['nama_cabang', 'nama_gudang']
            // }

        });
        transaction.buttons().container().appendTo('#dataTable_wrapper .col-md-6:eq(0)');




    });
</script>
