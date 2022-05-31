@extends('dashboard.hrd.temp.layout')

@section('title', 'Data Pegawai Keluar')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">Data Pegawai Keluar</h4>

        <div class="row g-4 mb-4">
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h6 class="fw-normal">Total Jabatan</h6>

                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="role-heading">
                                <h4 class="mb-1">2313</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

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
                            <th>Alasan</th>
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
@include('dashboard.hrd.temp.in-pegawai')
@endsection

@section('script')
<script>
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
                ajax: '{{ route("hrd.getPegawaiOut") }}',
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
                        data: 'alasan',
                        name: 'alasan',
                        render: function(data, type, row, meta) {
                            if (data == 'Other') {
                                return row.alasan_keluar;
                            } else {
                                return data;
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

        // ! IN PEGAWAI
        $('#in-pegawai-form').on('submit', function(e) {
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
                        $('.inPegawai').modal('hide');
                        $('.inPegawai').find('form')[0].reset();
                        toastr.success(data.msg);
                    }
                }
            });
        });


        // ! DETAIL IN PEGAWAI
        $(document).on('click', '#inPegawai', function() {
            var pegawai_id = $(this).data('id');

            $('.inPegawai').find('form')[0].reset();
            $('.inPegawai').find('span.error-text').text('');
            $.post('<?= route('hrd.detailPegawai') ?>', {
                pegawai_id: pegawai_id
            }, function(data) {
                $('.inPegawai').find('input[name="id"]').val(data.details.id);
                $('.inPegawai').find('table td[id="name"]').text(data.details.name);
                $('.inPegawai').find('table td[id="divisi"]').text(data.details.divisi.nama_divisi);
                $('.inPegawai').find('table td[id="jabatan"]').text(data.details.jabatan.nama_jabatan);
                if (data.details.image == null) {
                    $('.inPegawai').find('table td[id="image"]').html('<img src="<?= asset("assets/img/avatars/1.png") ?>" alt="Avatar" class="rounded-circle" />');
                } else {
                    $('.inPegawai').find('table td[id="image"]').html('<img src="{{ asset("storage/") }}/' + data.details.image + '" class="img-thumbnail" width="80%">');
                }
                if (data.details.alasan == 'Other') {
                    $('.inPegawai').find('table td[id="alasan"]').text(data.details.alasan_keluar);
                } else {
                    $('.inPegawai').find('table td[id="alasan"]').text(data.details.alasan);
                }
                $('.inPegawai').modal('show');
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


    });
</script>
@endsection