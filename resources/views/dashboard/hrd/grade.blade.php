@extends('dashboard.hrd.temp.layout')

@section('title', 'Grade')

@section('content')
<!-- Content wrapper -->
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">Data Grade</h4>

        <p class="mb-4">
            Each category (Basic, Professional, and Business) includes the four predefined roles shown below.
        </p>

        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-grade table border-top" id="grade-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Title</th>
                            <th>Level</th>
                            <th>Gaji Pokok</th>
                            <th>Tunjangan Kehadiran</th>
                            <th>Tunjangan Operasional</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <!--/ Permission Table -->

        <!-- Modal -->
        <div class="modal fade" id="gradeModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-simple">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3>Tambah Grade Baru</h3>
                            <p>Form tambah grade.</p>
                        </div>
                        <form class="needs-validation" action="{{ route('hrd.addGrade') }}" method="POST" id="add-grade-form">
                            @csrf
                            <div class="col-12 mb-3">
                                <label class="form-label" for="title">Title</label>
                                <input type="text" id="title" name="title" class="form-control" placeholder="Title" autocomplete="off" autofocus required />
                            </div>
                            <div class="col-12 mb-3">
                                <label for="id_level" class="form-label">Level</label>
                                <select id="id_level" name="id_level" class="select2 form-select" data-allow-clear="true" required>
                                    <option value="">--Pilih Level--</option>
                                    @foreach ($level as $item)
                                    <option value="{{ $item->id }}">{{ $item->nama_level }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="gaji_pokok">Gaji Pokok</label>
                                <input type="number" id="gaji_pokok" name="gaji_pokok" class="form-control" placeholder="Gaji Pokok" autocomplete="off" autofocus required />
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="tunjangan_kehadiran">Tunjangan Kehadiran</label>
                                <input type="number" id="tunjangan_kehadiran" name="tunjangan_kehadiran" class="form-control" placeholder="Tunjangan Kehadiran" autocomplete="off" autofocus required />
                            </div>
                            <div class="col-12 mb-3">
                                <label class="form-label" for="tunjangan_operasional">Tunjangan Operasional</label>
                                <input type="number" id="tunjangan_operasional" name="tunjangan_operasional" class="form-control" placeholder="Tunjangan Operasional" autocomplete="off" autofocus required />
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
@include('dashboard.hrd.temp.edit-grade')
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
        // ! ADD GRADE
        $('#add-grade-form').submit(function(e) {
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
                    $('#add-grade-form button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $(form)[0].reset();
                        $('.select2').val(null).trigger('change');
                        $('#gradeModal').modal('hide');
                        $('#grade-table').DataTable().ajax.reload(null, false);
                        $('#add-grade-form button[type="submit"]').html('Save');
                        // show toastr with animation
                        toastr.success(data.msg, 'Success!');
                    }
                }
            })
        });

        // ! GET GRADE
        var table = $('.datatables-grade')

        if (table.length) {
            dt_grade = table.DataTable({
                ajax: '{{ route("hrd.getGrade") }}',
                columns: [
                    // columns according to JSON
                    {
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',

                    },
                    {
                        data: 'title',
                        name: 'title',

                    },
                    {
                        data: 'level.nama_level',
                        name: 'level.nama_level',
                    },
                    {
                        data: 'gaji_pokok',
                        name: 'gaji_pokok',
                        render: $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
                    },
                    {
                        data: 'tunjangan_kehadiran',
                        name: 'tunjangan_kehadiran',
                        render: $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
                    },
                    {
                        data: 'tunjangan_operasional',
                        name: 'tunjangan_operasional',
                        render: $.fn.dataTable.render.number('.', ',', 0, 'Rp ')
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
                    text: 'Tambah Grade',
                    className: 'add-new btn btn-primary mb-3 mb-md-0',
                    attr: {
                        'data-bs-toggle': 'modal',
                        'data-bs-target': '#gradeModal'
                    },
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }],
            });
        }

        // ! DETAIL GRADE
        $(document).on('click', '#editGrade', function() {
            var grade_id = $(this).data('id');
            // alert(divisi_id);
            $('.editGrade').find('form')[0].reset();
            $('.editGrade').find('span.error-text').text('');
            $.post('<?= route('hrd.detailGrade') ?>', {
                grade_id: grade_id
            }, function(data) {
                // alert(data.details.nama_divisi);
                $('.editGrade').find('input[name="id"]').val(data.details.id);
                $('.editGrade').find('input[name="title"]').val(data.details.title);
                $('.editGrade').find('select[name="id_level"]').val(data.details.id_level).trigger('change');
                $('.editGrade').find('input[name="gaji_pokok"]').val(data.details.gaji_pokok);
                $('.editGrade').find('input[name="tunjangan_kehadiran"]').val(data.details.tunjangan_kehadiran);
                $('.editGrade').find('input[name="tunjangan_operasional"]').val(data.details.tunjangan_operasional);
                $('.editGrade').modal('show');
            }, 'json');
        });

        // ! UPDATE GRADE
        $('#edit-grade-form').on('submit', function(e) {
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
                    $('#edit-grade-form button[type="submit"]').html('<i class="fa fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    if (data.code == 0) {
                        $.each(data.error, function(prefix, val) {
                            $(form).find('span.' + prefix + '_error').text(val[0]);
                        });
                    } else {
                        $('#grade-table').DataTable().ajax.reload(null, false);
                        $('#edit-grade-form button[type="submit"]').html('Save');
                        $('.editGrade').modal('hide');
                        $('.editGrade').find('form')[0].reset();
                        toastr.success(data.msg, 'Success!');
                    }
                }
            });
        });

        // Delete Record
        $('.datatables-permissions tbody').on('click', '.delete-record', function() {
            dt_grade.row($(this).parents('tr')).remove().draw();
        });

        // Filter form control to default size
        // ? setTimeout used for multilingual table initialization
        setTimeout(() => {
            $('.dataTables_filter .form-control').removeClass('form-control-sm');
            $('.dataTables_length .form-select').removeClass('form-select-sm');
        }, 300);

        // ! DELETE DIVISI
        $(document).on('click', '#deleteGrade', function() {
            var grade_id = $(this).data('id');
            var url = '<?= route("hrd.deleteGrade") ?>';

            swal.fire({
                title: 'Data akan dihapus?',
                html: 'data grade akan <b>dihapus</b>',
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
                        grade_id: grade_id
                    }, function(data) {
                        if (data.code == 1) {
                            $('#grade-table').DataTable().ajax.reload(null, false);
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