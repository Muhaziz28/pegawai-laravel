@extends('dashboard.hrd.temp.layout')

@section('title', 'Jabatan')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">Data Jabatan</h4>

        <div class="alert alert-warning d-flex mb-4" role="alert">
            <span class="badge badge-center rounded-pill border-label-warning bg-warning p-3 me-2"><i class="bx bx-error fs-6"></i></span>
            <div class="d-flex flex-column ps-1">
                <h6 class="alert-heading d-flex align-items-center fw-bold mb-1">Perhatian!!</h6>
                <span>Menghapus, mengubah atau menambahkan data jabatan, dapat berdampak pada sistem, <strong>hubungi web developer untuk menghapus, mengubah dan menambahkan data!</strong> </span>
            </div>
        </div>

        <div class="row g-4 mb-4">
            <div class="col-xl-4 col-lg-6 col-md-6">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex justify-content-between mb-2">
                            <h6 class="fw-normal">Total Jabatan</h6>

                        </div>
                        <div class="d-flex justify-content-between align-items-end">
                            <div class="role-heading">
                                <h4 class="mb-1">{{ $jabatan }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/ Role cards -->

        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-jabatan table border-top" id="jabatan-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Jabatan</th>
                            <th>Divisi</th>
                            <th>Keterangan</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <!--/ Permission Table -->

        <!-- Modal -->
        <div class="modal fade" id="jabatanModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-simple">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3>Tambah Jabatan Baru</h3>
                            <p>Form tambah jabatan.</p>
                        </div>
                        <form class="needs-validation" action="{{ route('hrd.addJabatan') }}" method="POST" id="add-jabatan-form">
                            @csrf
                            <div class="col-12 mb-3">
                                <label class="form-label" for="nama_jabatan">Nama Jabatan</label>
                                <input type="text" id="nama_jabatan" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" autofocus required />
                            </div>
                            <div class="col-12 mb-3">
                                <label for="id_divisi" class="form-label">Divisi</label>
                                <select id="id_divisi" name="id_divisi" class="select2 form-select" data-allow-clear="true" required>
                                    <option value="">--Pilih Divisi--</option>
                                    @foreach ($divisi as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_divisi }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class=" col-12 mb-3">
                                <label for="ket" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="ket" name="ket" rows="3" placeholder="Keterangan Jabatan"></textarea>
                            </div>
                            <div class="col-12 text-center demo-vertical-spacing">
                                <button type="submit" class="btn btn-primary me-sm-3 me-1">Save</button>
                                <button type="reset" class="btn btn-label-secondary" data-bs-dismiss="modal" aria-label="Close">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>


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
                <a href="https://themeselection.com/license/" class="footer-link me-4" target="_blx`ank">License</a>
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
@include('dashboard.hrd.temp.edit-jabatan')
@endsection

@section('script')
<script>
    toastr.options = {
        "closeButton": true,
        "debug": false,
        "newestOnTop": false,
        "progressBar": true,
        "positionClass": "toast-top-right",
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
        // ! ADD JABATAN
        $('#add-jabatan-form').submit(function(e) {
            e.preventDefault();
            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'JSON',
                contentType: false,
                beforeSend: function() {
                    $('#add-jabatan-form button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $(form)[0].reset();
                        $('.select2').val(null).trigger('change');

                        $('#jabatanModal').modal('hide');
                        $('#jabatan-table').DataTable().ajax.reload(null, false);
                        $('#add-jabatan-form button[type="submit"]').html('Save');
                        toastr.success(data.msg, 'Success!');
                    }
                }
            })
        });

        // ! GET DIVISI
        var table = $('.datatables-jabatan')

        if (table.length) {
            dt_jabatan = table.DataTable({
                ajax: '{{ route("hrd.getJabatan") }}',
                columns: [
                    // columns according to JSON
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'nama_jabatan',
                        name: 'nama_jabatan',
                    },
                    {
                        data: 'divisi.nama_divisi',
                        name: 'divisi.nama_divisi',
                    },
                    {
                        data: 'ket',
                        name: 'ket',
                    },
                    {
                        data: 'actions',
                        name: 'actions',
                    }
                ],

                dom: '<"row mx-1"' +
                    '<"col-sm-12 col-md-3" l>' +
                    '<"col-sm-12 col-md-9"<"dt-action-buttons text-xl-end text-lg-start text-md-end text-start d-flex align-items-center justify-content-md-end justify-content-center flex-wrap me-1"<"me-3"f>B>>' +
                    '>t' +
                    '<"row mx-2"' +
                    '<"col-sm-12 col-md-6"i>' +
                    '<"col-sm-12 col-md-6"p>' +
                    '>',
                language: {
                    processing: '<div class="spinner-border spinner-border-sm text-primary" role="status">' + '<span class="sr-only">Loading...</span>' + '</div>',
                    sLengthMenu: '_MENU_',
                    search: 'Search',
                    searchPlaceholder: 'Search..'
                },
                serverSide: true,
                processing: true,
                // Buttons with Dropdown
                buttons: [{
                    text: 'Tambah Jabatan',
                    className: 'add-new btn btn-primary mb-3 mb-md-0',
                    attr: {
                        'data-bs-toggle': 'modal',
                        'data-bs-target': '#jabatanModal'
                    },
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }, ],
            });
        }

        // ! DETAIL JABATAN
        $(document).on('click', '#editJabatan', function() {
            var jabatan_id = $(this).data('id');
            // alert(jabatan_id);
            $('.editJabatan').find('form')[0].reset();
            $('.editJabatan').find('span.error-text').text('');
            $.post('<?= route('hrd.detailJabatan') ?>', {
                jabatan_id: jabatan_id
            }, function(data) {
                // alert(data.details.nama_divisi);
                $('.editJabatan').find('input[name="id"]').val(data.details.id);
                $('.editJabatan').find('input[name="nama_jabatan"]').val(data.details
                    .nama_jabatan);
                $('.editJabatan').find('select[name="id_divisi"]').val(data.details.id_divisi);
                $('.editJabatan').find('textarea[name="ket"]').val(data.details.ket);
                $('.editJabatan').modal('show');
            }, 'json');
        });

        // ! UPDATE JABATAN
        $('#edit-jabatan-form').on('submit', function(e) {
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
                    $('#edit-jabatan-form button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    if (data.code == 0) {
                        toastr.success(data.msg, 'Error!');
                    } else {
                        $('#jabatan-table').DataTable().ajax.reload(null, false);
                        $('#edit-jabatan-form button[type="submit"]').html('Save');
                        $('.editJabatan').modal('hide');
                        $('.editJabatan').find('form')[0].reset();
                        toastr.success(data.msg, 'Success!');
                    }
                }
            });
        });

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

        // ! DELETE JABATAN
        $(document).on('click', '#deleteJabatan', function() {
            var jabatan_id = $(this).data('id');
            var url = '<?= route("hrd.deleteJabatan") ?>';

            swal.fire({
                title: 'Data akan dihapus?',
                html: 'data jabatan akan <b>dihapus</b>',
                showCancelButton: true,
                showCloseButton: true,
                cancelButtonText: 'Cancel',
                confirmButtonText: 'Delete',
                cancelButtonColor: '#d33',
                confirmButtonColor: '#3085d6',
                // width: '300px',
                allowOutsideClick: false,
                backdrop: false,
            }).then(function(result) {
                if (result.value) {
                    $.post(url, {
                        jabatan_id: jabatan_id
                    }, function(data) {
                        if (data.code == 1) {
                            $('#jabatan-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg, 'Success!');
                        } else {
                            toastr.error(data.msg, 'Error!');
                        }
                    }, 'json');
                }
            });
        })



    });
</script>
@endsection