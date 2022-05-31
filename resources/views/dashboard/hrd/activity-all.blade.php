@extends('dashboard.hrd.temp.layout')

@section('title', 'Data Aktivitas Pegawai')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">Data Aktivitas Pegawai</h4>


        <div class="card">
            <div class="card-header pb-0">
                <h6 class="mb-0">Filter Data Pegawai</h6>
            </div>
            <div class="card-body">
                <form id="filter">
                    <div class="row">
                        <div class="col-md-4">
                            <div class=" mb-2">
                                <label for="filter-status">Status Pegawai</label>
                                <select name="filter-status" id="filter-status" class="form-control show-tick select2 filter">
                                    <option value="">--Filter berdasarkan pegawai--</option>
                                    <option value="Active">Active</option>
                                    <option value="Inactive">Inactive</option>
                                </select>

                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class=" mb-2">
                                <label for="filter-pegawai">Pegawai</label>
                                <select name="filter-pegawai" id="filter-pegawai" class="form-control show-tick select2 filter">
                                    <option value="">--Filter berdasarkan pegawai--</option>
                                    @foreach( $pegawai as $peg)

                                    <option value="{{ $peg->id }}">{{ $peg->nip}} - {{ $peg->name }} </option>

                                    @endforeach
                                </select>

                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class=" mb-2">
                                <label for="filter-divisi">Divisi</label>
                                <select name="filter-divisi" id="filter-divisi" class="form-control select2 filter">
                                    <option value="">--Filter berdasarkan divisi--</option>
                                    @foreach ($divisi as $div)
                                    <option value="{{ $div->id }}">{{ $div->nama_divisi }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="mt-2">
                            <!-- make reset filter -->
                            <button class="btn btn-danger" type="submit" id="reset-filter">Reset Filter</button>

                        </div>
                    </div>
                </form>
            </div>
            <div class="card-datatable table-responsive">
                <table class="datatables-activity-all table border-top" id="activity-table">
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
        var table = $('.datatables-activity-all')

        if (table.length) {
            dt_divisi = table.DataTable({
                ajax: '{{ route("hrd.getActivityAll") }}',
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

    });
</script>
@endsection