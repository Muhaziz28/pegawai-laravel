@extends('dashboard.hrd.temp.layout')

@section('title', 'Data Pegawai Aktif')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">Data Pegawai Aktif</h4>

        <div class="row g-4 mb-4">
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Total Pegawai Aktif</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title me-2 mb-0">{{ $user }}</h4>
                                </div>
                            </div>
                            <div class="card-icon">
                                <span class="badge bg-label-success rounded p-2">
                                    <i class="bx bx-user bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Divisi HRD</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title me-2 mb-0">{{ $hrd }}</h4>
                                </div>
                            </div>
                            <div class="card-icon">
                                <span class="badge bg-label-primary rounded p-2">
                                    <i class="bx bx-user-voice bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Divisi Finance</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title me-2 mb-0">{{ $finance }}</h4>
                                </div>
                            </div>
                            <div class="card-icon">
                                <span class="badge bg-label-info rounded p-2">
                                    <i class="bx bxs-credit-card bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Divisi Kreatif</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title me-2 mb-0">{{ $kreatif }}</h4>
                                </div>
                            </div>
                            <div class="card-icon">
                                <span class="badge bg-label-primary rounded p-2">
                                    <i class="bx bx-desktop bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Divisi Marketing</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title me-2 mb-0">{{ $marketing }}</h4>
                                </div>
                            </div>
                            <div class="card-icon">
                                <span class="badge bg-label-info rounded p-2">
                                    <i class="bx bx-store bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Divisi Gudang</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title me-2 mb-0">{{ $gudang }}</h4>
                                </div>
                            </div>
                            <div class="card-icon">
                                <span class="badge bg-label-danger rounded p-2">
                                    <i class="bx bx-building-house bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Divisi Produksi</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title me-2 mb-0">{{ $produksi }}</h4>
                                </div>
                            </div>
                            <div class="card-icon">
                                <span class="badge bg-label-success rounded p-2">
                                    <i class="bx bxl-product-hunt bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Divisi Umum</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title me-2 mb-0">{{ $umum }}</h4>
                                </div>
                            </div>
                            <div class="card-icon">
                                <span class="badge bg-label-success rounded p-2">
                                    <i class="bx bx-user-circle bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">HERS</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title me-2 mb-0">{{ $hers }}</h4>
                                </div>
                            </div>
                            <div class="card-icon">
                                <span class="badge bg-label-primary rounded p-2">
                                    <i class="bx bx-health bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-6 col-md-6 col-lg-3">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between">
                            <div class="card-info">
                                <p class="card-text">Rumah</p>
                                <div class="d-flex align-items-end mb-2">
                                    <h4 class="card-title me-2 mb-0">{{ $rumah }}</h4>
                                </div>
                            </div>
                            <div class="card-icon">
                                <span class="badge bg-label-primary rounded p-2">
                                    <i class="bx bx-home bx-sm"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mb-3">
            <a type="button" href="{{ route('hrd.addPegawaiView') }}" class="btn btn-primary">
                <span class="tf-icons bx bxs-user-plus"></span>&nbsp; Tambah Pegawai
            </a>
            <a type="button" href="#" class="btn btn-success">
                <span class="tf-icons bx bxs-user-plus"></span>&nbsp; Export to Excel
            </a>
            <a type="button" href="#" class="btn btn-info">
                <span class="tf-icons bx bxs-user-plus"></span>&nbsp; Generate ID Card
            </a>
            <a type="button" href="#" class="btn btn-secondary">
                <span class="tf-icons bx bxs-user-plus"></span>&nbsp; Select Generate ID Card
            </a>
        </div>
        @if (session('error'))
        <div class="alert alert-danger d-flex" role="alert">
            <span class="badge badge-center rounded-pill border-label-danger bg-danger p-3 me-2"><i class="bx bx-error fs-6"></i></span>
            <div class="d-flex flex-column ps-1">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Error!!</h6>
                <span>{{ (session('error')) }}</span>
            </div>
        </div>
        @elseif (session('success'))
        <div class="alert alert-success d-flex" role="alert">
            <span class="badge badge-center rounded-pill border-label-success bg-success p-3 me-2"><i class="bx bx-check fs-6"></i></span>
            <div class="d-flex flex-column ps-1">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Success!!</h6>
                <span>{{ (session('success')) }}</span>
            </div>
        </div>
        @endif
        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-pegawai table border-top" id="pegawai-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Image</th>
                            <th>NIP</th>
                            <th>Nama</th>
                            <th>Divisi</th>
                            <th>Durasi Kerja</th>
                            <th>Durasi Kontrak</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <!--/ Permission Table -->


    </div>
    <!-- / Content -->

    <!-- Footer -->
    <footer class="content-footer footer bg-footer-theme">
        <div class="container-xxl d-flex flex-wrap justify-content-between py-2 flex-md-row flex-column">
            <div class="mb-2 mb-md-0">
                ©
                <script>
                    document.write(new Date().getFullYear());
                </script>
                , made with ❤️ by
                <a href="https://themeselection.com" target="_blank" class="footer-link fw-bolder">ThemeSelection</a>
            </div>
            <div>
                <a href="https://themeselection.com/" target="_blank" class="footer-link me-4">More Themes</a>

                <a href="https://themeselection.com/demo/sneat-bootstrap-html-admin-template/documentation/" target="_blank" class="footer-link me-4">Documentation</a>

                <a href="https://themeselection.com/support/" target="_blank" class="footer-link d-none d-sm-inline-block">Support</a>
            </div>
        </div>
    </footer>
    <!-- / Footer -->

    <div class="content-backdrop fade"></div>
</div>
<!-- Content wrapper -->
@include('dashboard.hrd.temp.out-pegawai')
@endsection

@section('script')
<script>
    $('#alasan_keluar').hide();
    $('#alasan').change(function() {
        if ($(this).val() == 'Other') {
            $('#alasan_keluar').show('slow');
            $("#alasan_keluar").attr("required", true);
        } else {
            $('#alasan_keluar').hide('slow');
        }
    });
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-bottom-right",
        "preventDuplicates": true,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "3000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
    }

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });

    $(function() {

        // ! GET PEGAWAI
        var table = $('.datatables-pegawai')

        if (table.length) {
            dt_divisi = table.DataTable({
                ajax: '{{ route("hrd.getPegawaiAktif") }}',
                columns: [
                    // columns according to JSON
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'image',
                        name: 'image',
                        render: function(data, type, row, meta) {
                            if (data == null) {
                                return '<div class="avatar avatar-sm me-2"><img src="{{ asset("assets/img/avatars/1.png") }}" alt="Avatar" class="rounded-circle" /></div>';
                            } else {
                                return '<div class="avatar avatar-sm me-2"><img src="{{ asset("storage/") }}/' + data + '" alt="Avatar" class="rounded-circle"></div>';
                            }
                        }
                    },
                    {
                        data: 'nip',
                        name: 'nip',

                    },
                    {
                        data: 'name',
                        name: 'name',
                    },
                    {
                        data: 'divisi.nama_divisi',
                        name: 'divisi.nama_divisi',
                    },
                    {
                        data: 'tgl_masuk',
                        name: 'tgl_masuk',
                        render: function(data, type, row) {
                            var tgl_masuk = new Date(row.tgl_masuk);
                            var tgl_skrg = new Date();
                            var lama_durasi = Math.floor((tgl_skrg - tgl_masuk) / (1000 * 60 * 60 * 24));

                            // ubah lama_durasi menjadi tahun, bulan, hari, 
                            var tahun = Math.floor(lama_durasi / 365);
                            var bulan = Math.floor((lama_durasi % 365) / 30);
                            var hari = Math.floor((lama_durasi % 365) % 30);

                            if (tahun > 0) {
                                return tahun + ' tahun ' + bulan + ' bulan ' + hari + ' hari';
                            } else if (bulan > 0) {
                                return bulan + ' bulan ' + hari + ' hari';
                            } else {
                                return hari + ' hari';
                            }
                        }
                    },
                    {
                        data: 'status_pegawai',
                        name: 'status_pegawai',
                        // hitung durasi kontrak
                        render: function(data, type, row) {
                            var tgl_akhir_kontrak = new Date(row.tgl_akhir_kontrak);
                            var tgl_skrg = new Date();
                            var lama_durasi = Math.floor((tgl_akhir_kontrak - tgl_skrg) / (1000 * 60 * 60 * 24));

                            // ubah lama_durasi menjadi tahun, bulan, hari,
                            var tahun = Math.floor(lama_durasi / 365);
                            var bulan = Math.floor((lama_durasi % 365) / 30);
                            var hari = Math.floor((lama_durasi % 365) % 30);

                            if (data == 'Kontrak') {
                                if (tahun > 0) {
                                    return tahun + ' tahun ' + bulan + ' bulan ' + hari + ' hari';
                                } else if (bulan > 0) {
                                    return bulan + ' bulan ' + hari + ' hari';
                                } else {
                                    return hari + ' hari';
                                }
                            } else {
                                return '<span class="badge bg-primary">' + data + '</span>'
                            }
                        }
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                    }
                ],


            });
        }

        // ! KELUAR PEGAWAI
        $('#out-pegawai-form').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $(form).find('span.error-text').text('');
                },
                success: function(data) {
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#pegawai-table').DataTable().ajax.reload(null, false);
                        $('.outPegawai').modal('hide');
                        $('.outPegawai').find('form')[0].reset();
                        toastr.success(data.msg);
                    }
                }
            });
        });

        // ! KELUARKAN PEGAWAI
        $('#out-pegawai-form').on('submit', function(e) {
            e.preventDefault();
            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'json',
                contentType: false,
                beforeSend: function() {
                    $('#out-pegawai-form button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#pegawai-table').DataTable().ajax.reload(null, false);
                        $('#out-pegawai-form button[type="submit"]').html('Save');
                        $('.outPegawai').modal('hide');
                        $('.outPegawai').find('form')[0].reset();
                        toastr.success(data.msg, 'Success!');
                    }
                }
            });
        });

        // ! DETAIL OUT PEGAWAI
        $(document).on('click', '#outPegawai', function() {
            var pegawai_id = $(this).data('id');

            $('.outPegawai').find('form')[0].reset();
            $('.outPegawai').find('span.error-text').text('');
            $.post('<?= route('hrd.detailPegawai') ?>', {
                pegawai_id: pegawai_id
            }, function(data) {
                $('.outPegawai').find('input[name="id"]').val(data.details.id);
                $('.outPegawai').find('table td[id="name"]').text(data.details.name);
                $('.outPegawai').find('table td[id="divisi"]').text(data.details.divisi.nama_divisi);
                $('.outPegawai').find('table td[id="jabatan"]').text(data.details.jabatan.nama_jabatan);
                if (data.details.image == null) {
                    $('.outPegawai').find('table td[id="image"]').html('<img src="<?= asset("assets/img/avatars/1.png") ?>" alt="Avatar" class="rounded-circle" />');
                } else {
                    $('.outPegawai').find('table td[id="image"]').html('<img src="{{ asset("storage/") }}/' + data.details.image + '" class="img-thumbnail" width="80%">');
                }
                $('.outPegawai').modal('show');
            }, 'json');
        })

        // Delete Record
        $('.datatables-permissions tbody').on('click', '.delete-record', function() {
            dt_divisi.row($(this).parents('tr')).remove().draw();
        });

        // Filter form control to default size
        // ? setTimeout used for multilingual table initialization
        setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);

        // ! DELETE PEGAWAI
        $(document).on('click', '#deletePegawai', function() {
            var user_id = $(this).data('id');
            // alert(user_id)
            var url = '<?= route('hrd.deletePegawai') ?>';

            swal.fire({
                title: 'Data akan dihapus?',
                html: 'data pegawai akan <b>dihapus</b>',
                showCancelButton: true,
                showCloseButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                allowOutsideClick: false,
            }).then(function(result) {
                if (result.value) {
                    $.post(url, {
                        user_id: user_id
                    }, function(data) {
                        if (data.code == 1) {
                            $('#pegawai-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        } else {
                            toastr.error(data.msg);
                        }
                    }, 'json');
                }
            });
        })

    });

    // hide alert after 3 seconds
    window.setTimeout(function() {
        $(".alert").fadeTo(500, 0).slideUp(500, function() {
            $(this).remove();
        });
    }, 3000);
</script>
@endsection