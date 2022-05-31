@extends('dashboard.hrd.temp.layout')

@section('title', 'Divisi')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">Data Divisi</h4>

        <p class="mb-4">
            Each category (Basic, Professional, and Business) includes the four predefined roles shown below.
        </p>

        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-divisi table border-top" id="divisi-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nama Divisi</th>
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
        <div class="modal fade" id="divisiModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-simple">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3>Tambah Divisi Baru</h3>
                            <p>Form tambah divisi.</p>
                        </div>
                        <form class="needs-validation" action="{{ route('hrd.addDivisi') }}" method="POST" id="add-divisi-form">
                            @csrf
                            <div class="col-12 mb-3">
                                <label class="form-label" for="nama_divisi">Nama Divisi</label>
                                <input type="text" id="nama_divisi" name="nama_divisi" class="form-control" placeholder="Nama Divisi" autofocus required />
                            </div>
                            <div class="col-12 mb-3">
                                <label for="ket" class="form-label">Keterangan</label>
                                <textarea class="form-control" id="ket" name="ket" rows="3" placeholder="Keterangan Divisi"></textarea>
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
@include('dashboard.hrd.temp.edit-divisi')
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
        // ! ADD DIVISI
        $('#add-divisi-form').submit(function(e) {
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
                    $('#add-divisi-form button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    if (data.code == 0) {
                        toastr.success(data.msg, 'Error!');
                    } else {
                        $(form)[0].reset();
                        // alert(data.msg);
                        $('#divisiModal').modal('hide');
                        $('#divisi-table').DataTable().ajax.reload(null, false);
                        $('#add-divisi-form button[type="submit"]').html('Save');
                        // show toastr with animation
                        toastr.success(data.msg, 'Success!');
                    }
                }
            })
        });

        // ! GET DIVISI
        var table = $('.datatables-divisi')

        if (table.length) {
            dt_divisi = table.DataTable({
                ajax: '{{ route("hrd.getDivisi") }}',
                columns: [
                    // columns according to JSON
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',

                    },
                    {
                        data: 'nama_divisi',
                        name: 'nama_divisi',

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
                    sLengthMenu: '_MENU_',
                    search: 'Search',
                    searchPlaceholder: 'Search..'
                },
                // Buttons with Dropdown
                buttons: [{
                    text: 'Tambah Divisi',
                    className: 'add-new btn btn-primary mb-3 mb-md-0',
                    attr: {
                        'data-bs-toggle': 'modal',
                        'data-bs-target': '#divisiModal'
                    },
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }],
            });
        }

        // ! DETAIL DIVISI
        $(document).on('click', '#editDivisi', function() {
            var divisi_id = $(this).data('id');
            // alert(divisi_id);
            $('.editDivisi').find('form')[0].reset();
            $('.editDivisi').find('span.error-text').text('');
            $.post('<?= route('hrd.detailDivisi') ?>', {
                divisi_id: divisi_id
            }, function(data) {
                // alert(data.details.nama_divisi);
                $('.editDivisi').find('input[name="id"]').val(data.details.id);
                $('.editDivisi').find('input[name="nama_divisi"]').val(data.details
                    .nama_divisi);
                $('.editDivisi').find('textarea[name="ket"]').val(data.details.ket);
                $('.editDivisi').modal('show');
            }, 'json');
        });

        // ! UPDATE DIVISI
        $('#edit-divisi-form').on('submit', function(e) {
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
                    $('#edit-divisi-form button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#divisi-table').DataTable().ajax.reload(null, false);
                        $('#edit-divisi-form button[type="submit"]').html('Save');
                        $('.editDivisi').modal('hide');
                        $('.editDivisi').find('form')[0].reset();
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

        // ! DELETE DIVISI
        $(document).on('click', '#deleteDivisi', function() {
            var divisi_id = $(this).data('id');
            var url = '<?= route("hrd.deleteDivisi") ?>';

            swal.fire({
                title: 'Data akan dihapus?',
                html: 'data divisi akan <b>dihapus</b>',
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
                        divisi_id: divisi_id
                    }, function(data) {
                        if (data.code == 1) {
                            $('#divisi-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg, 'Success!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",

                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true
                            });
                        } else {
                            toastr.error(data.msg, 'Error!', {
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",

                                "showEasing": "swing",
                                "hideEasing": "linear",
                                "showMethod": "fadeIn",
                                "hideMethod": "fadeOut",
                                "progressBar": true
                            });
                        }
                    }, 'json');
                }
            });
        })



    });
</script>
@endsection