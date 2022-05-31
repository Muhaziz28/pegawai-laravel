@extends('dashboard.hrd.temp.layout')

@section('title', 'Data Aktivitas')

@section('content')
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


        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-activity table border-top" id="activity-table">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Tanggal</th>
                            <th>Aktivitas</th>
                            <th>Mulai</th>
                            <th>Selesai</th>
                            <th>Realisasi</th>
                            <th>Target</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
        <!--/ Permission Table -->

        <!-- Modal -->
        <div class="modal fade" id="activityModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-simple modal-xl modal-dialog-scrollable" role="document">
                <div class="modal-content p-3 p-md-5">
                    <div class="modal-body">
                        <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                        <div class="text-center mb-4">
                            <h3>Tambah Jabatan Baru</h3>
                            <p>Form tambah jabatan.</p>
                        </div>
                        <form class="needs-validation" action="{{ route('hrd.addActivity') }}" method="POST" id="add-activity-form">
                            @csrf
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered" id="dynamic_form">
                                    <thead>
                                        <tr>
                                            <th scope="col" rowspan="2" style="vertical-align: middle; text-align: center;">Aktivitas <span class="text-danger">*</span></th>
                                            <th scope="col" colspan="2" style="vertical-align: middle; text-align: center;">Waktu <span class="text-danger">*</span></th>
                                            <th scope="col" style="vertical-align: middle; text-align: center;" rowspan="2">Realisasi <span class="text-danger">*</span></th>
                                            <th scope="col" style="vertical-align: middle; text-align: center;" rowspan="2">Target (jika ada)</th>
                                        </tr>
                                        <tr>
                                            <th scope="col" style="vertical-align: middle; text-align: center;">Mulai</th>
                                            <th scope="col" style="vertical-align: middle; text-align: center;">Selesai</th>
                                        </tr>
                                    </thead>
                                    <tbody class="table-border-bottom-0">
                                        <tr>
                                            <td id="col0">
                                                <div class="form-group">
                                                    <textarea class="form-control" placeholder="Aktivitas Anda" id="isi_aktivitas" name="isi_aktivitas[]" required rows="3" autocomplete="off"></textarea>
                                                </div>
                                            </td>
                                            <td id="col1">
                                                <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                    <input class="form-control" required type="text" name="mulai[]" placeholder="Jam Mulai" autocomplete="off"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                </div>
                                            </td>
                                            <td id="col2">
                                                <div>
                                                    <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                        <input class="form-control" required type="text" name="selesai[]" placeholder="Jam Selesai" autocomplete="off"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                                    </div>
                                                </div>
                                            </td>
                                            <td id="col3">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="realisasi" name="realisasi[]" required placeholder="Realisasi" rows="3" autocomplete="off"></textarea>
                                                </div>
                                            </td>
                                            <td id="col4">
                                                <div class="form-group">
                                                    <textarea class="form-control" id="target" name="target[]" placeholder="Target" rows="3" autocomplete="off"></textarea>
                                                </div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <br>
                            </div>
                            <tr>
                                <td style="width: 100% ">
                                    <div class="form-group d-flex justify-content-between">
                                        <button class="btn btn-outline-success btn-" type="button" onclick="addRows()"> + Tambah Aktivitas Lainnya</button>
                                        <button type="button" class="btn btn-outline-danger " onclick="deleteRows()"> - Hapus Form</button>
                                    </div>
                                </td>

                            </tr>
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
@include('dashboard.hrd.temp.edit-activity')
@endsection

@section('script')
<script>
    var mulai = document.getElementsByName('mulai[]');
    if (mulai) {
        mulai.flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            defaultDate: "00:00",
        });
    }

    var selesai = document.getElementsByName('selesai[]');
    if (selesai) {
        selesai.flatpickr({
            enableTime: true,
            noCalendar: true,
            dateFormat: "H:i",
            time_24hr: true,
            defaultDate: "00:00",

        });
    }


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
        $('#add-activity-form').on('submit', function(e) {
            e.preventDefault();
            // alert('hello form');
            var form = this;
            $.ajax({
                url: $(form).attr('action'),
                method: $(form).attr('method'),
                data: new FormData(form),
                processData: false,
                dataType: 'JSON',
                contentType: false,
                beforeSend: function() {
                    $('#activityModal').find('button[type="submit"]').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    if (data.code == 0) {
                        toastr.success(data.msg, 'Error!');
                    } else {
                        $(form)[0].reset();
                        // alert(data.msg);
                        $('#activityModal').find('button[type="submit"]').html('Save');
                        $('#activityModal').modal('hide');
                        // reset form
                        $('#activity-table').DataTable().ajax.reload(null, false);
                        toastr.success(data.msg);
                    }
                }
            });
        });

        // ! GET PEGAWAI
        var table = $('.datatables-activity')

        if (table.length) {
            dt_divisi = table.DataTable({
                ajax: '{{ route("hrd.getActivity") }}',
                listView: {
                    layout: true,
                    columnFilters: false,
                    checkbox: false,
                    checkboxTemplate: '<input type="checkbox">',
                    grid: true,
                    gridTemplate: 'col-xs-12 col-sm-6 col-md-3 col-lg-2'
                },
                columns: [{
                        data: 'DT_RowIndex',
                        name: 'DT_RowIndex',
                    },
                    {
                        data: 'created_at',
                        name: 'created_at',
                        // change format date
                        render: function(data) {
                            var date = new Date(data);
                            var month = date.getMonth() + 1;
                            var day = date.getDate();
                            var year = date.getFullYear();
                            return day + '/' + month + '/' + year;
                        }
                    },
                    {
                        data: 'isi_aktivitas',
                        name: 'isi_aktivitas',
                    },
                    {
                        data: 'mulai',
                        name: 'mulai',
                        render: function(data) {
                            var time = data.split(':');
                            var jam = time[0];
                            var menit = time[1];

                            if (jam.length == 1) {
                                jam = '0' + jam;
                            }
                            if (menit.length == 1) {
                                menit = '0' + menit;
                            }
                            return jam + ':' + menit;
                        }
                    },
                    {
                        data: 'selesai',
                        name: 'selesai',
                        render: function(data) {
                            var time = data.split(':');
                            var jam = time[0];
                            var menit = time[1];

                            if (jam.length == 1) {
                                jam = '0' + jam;
                            }
                            if (menit.length == 1) {
                                menit = '0' + menit;
                            }
                            return jam + ':' + menit;
                        }

                    },
                    {
                        data: 'realisasi',
                        name: 'realisasi',
                    },
                    {
                        data: 'target',
                        name: 'target',

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
                    text: 'Tambah Aktivitas',
                    className: 'add-new btn btn-primary mb-3 mb-md-0',
                    attr: {
                        'data-bs-toggle': 'modal',
                        'data-bs-target': '#activityModal',
                    },
                    init: function(api, node, config) {
                        $(node).removeClass('btn-secondary');
                    }
                }],
            });
        }

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

        // ! DETAIL AKTIVITAS
        $(document).on('click', '#editAktivitas', function() {
            var activity_id = $(this).data('id');

            $('.editActivity').find('form')[0].reset();
            $('.editActivity').find('span.error-text').text('');
            $.post('<?= route('hrd.detailActivity') ?>', {
                activity_id: activity_id
            }, function(data) {
                $('.editActivity').find('input[name="id"]').val(data.details.id);
                $('.editActivity').find('textarea[name="isi_aktivitas"]').val(data.details.isi_aktivitas);
                var mulai = data.details.mulai.split(':');
                var jam = mulai[0];
                var menit = mulai[1];
                if (jam.length == 1) {
                    jam = '0' + jam;
                }
                if (menit.length == 1) {
                    menit = '0' + menit;
                }
                $('.editActivity').find('input[name="mulai"]').val(jam + ':' + menit);
                var selesai = data.details.selesai.split(':');
                var jam = selesai[0];
                var menit = selesai[1];
                if (jam.length == 1) {
                    jam = '0' + jam;
                }
                if (menit.length == 1) {
                    menit = '0' + menit;
                }
                $('.editActivity').find('input[name="selesai"]').val(jam + ':' + menit);
                $('.editActivity').find('textarea[name="realisasi"]').val(data.details.realisasi);
                $('.editActivity').find('textarea[name="target"]').val(data.details.target);
                $('.editActivity').modal('show');
            })
        })

        // ! UPDATE AKTIVITAS
        $('#update-activity-form').on('submit', function(e) {
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
                    $('.editActivity').find('button[type="submit"]').html('<i class="fas fa-spinner fa-spin"></i>');
                },
                success: function(data) {
                    if (data.code == 0) {
                        toastr.success(data.msg);
                    } else {
                        $('#activity-table').DataTable().ajax.reload(null, false);
                        $('.editActivity').find('button[type="submit"]').html('Save');
                        $('.editActivity').modal('hide');
                        $('.editActivity').find('form')[0].reset();
                        toastr.success(data.msg);
                    }
                }
            })
        })


        // ! DELETE AKTIVITAS
        $(document).on('click', '#deleteAktivitas', function() {
            var activity_id = $(this).data('id');
            // alert(user_id)
            var url = '<?= route('hrd.deleteActivity') ?>';

            swal.fire({
                title: 'Data akan dihapus?',
                html: 'data aktivitas anda akan <b>dihapus</b>',
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
                        activity_id: activity_id
                    }, function(data) {
                        if (data.code == 1) {
                            $('#activity-table').DataTable().ajax.reload(null, false);
                            toastr.success(data.msg);
                        } else {
                            toastr.error(data.msg);
                        }
                    }, 'json');
                }
            });
        })

    });

    function addRows() {
        var table = document.getElementById('dynamic_form');
        var rowCount = table.rows.length;
        var cellCount = table.rows[0].cells.length;
        var row = table.insertRow(rowCount);
        for (var i = 0; i <= cellCount; i++) {
            var cell = 'cell' + i;
            cell = row.insertCell(i);
            var copycel = document.getElementById('col' + i).innerHTML;
            cell.innerHTML = copycel;
            // call flatpickr
            flatpickr(cell.getElementsByTagName('input'), {
                enableTime: true,
                noCalendar: true,
                dateFormat: "H:i",
                time_24hr: true,
                defaultDate: "00:00",
            });
        }
    }

    function deleteRows() {
        var table = document.getElementById('dynamic_form');
        var rowCount = table.rows.length;
        if (rowCount > '3') {
            var row = table.deleteRow(rowCount - 1);
            rowCount--;
            // remove value from input
            $('#dynamic_form input[type="text"]').removeValue();
        } else {
            alert('Oopss..! Baris ini tidak dapat dihapus');
        }
    }
</script>
@endsection