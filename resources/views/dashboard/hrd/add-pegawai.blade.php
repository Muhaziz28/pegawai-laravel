@extends('dashboard.hrd.temp.layout')

@section('title', 'Tambah Pegawai')

@section('content')
<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">Form Tambah Pegawai</h4>

        <div class="row">
            <!-- FormValidation -->
            <div class="col-12">
                <div class="card">
                    <h5 class="card-header">FormValidation</h5>
                    <div class="card-body">
                        <form id="formValidationExamples" class="row g-3" action="{{ route('hrd.addPegawai') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- Account Details -->

                            <div class="col-12">
                                <h6 class="fw-semibold">1. Data Diri</h6>
                                <hr class="mt-0" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="name">Nama Lengkap</label>
                                <input type="text" class="form-control" placeholder="Nama Lengkap" id="name" name="name" required autocomplete="off" />
                            </div>
                            <div class="col-md-6">
                                <label class="form-label" for="email">Email</label>
                                <input class="form-control" type="email" name="email" id="email" placeholder="Alamat Email" required autocomplete="off" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                                <input type="text" class="form-control" placeholder="Tempat Lahir" id="tempat_lahir" name="tempat_lahir" required autocomplete="off" />
                            </div>
                            <div class="col-md-6">
                                <label for="tgl_lahir" class="form-label">Tanggal Lahir</label>
                                <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="tgl_lahir" name="tgl_lahir" required />
                            </div>
                            <div class="col-md-6">
                                <label for="nik" class="form-label">NIK</label>
                                <input type="number" class="form-control" placeholder="NIK" id="nik" name="nik" autocomplete="off" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="nohp">No Hp</label>
                                <input type="number" class="form-control" placeholder="No Hp" id="nohp" name="nohp" required autocomplete="off" />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="jenis_kelamin">Jenis Kelamin</label>
                                <select id="jenis_kelamin" name="jenis_kelamin" class="form-select select2" data-allow-clear="true" required>
                                    <option value="">--Pilih Jenis Kelamin--</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="agama">Agama</label>
                                <select id="agama" name="agama" class="form-select select2" data-allow-clear="true" required>
                                    <option value="">--Pilih Agama--</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Protestan">Protestan</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Buddha">Buddha</option>
                                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="status">Status Nikah</label>
                                <select id="status" name="status" class="form-select select2" data-allow-clear="true" required>
                                    <option value="">--Pilih Status--</option>
                                    <option value="Menikah">Menikah</option>
                                    <option value="Belum Menikah">Belum Menikah</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="pendidikan">Pendidikan</label>
                                <select id="pendidikan" name="pendidikan" class="form-select select2" data-allow-clear="true" required>
                                    <option value="">--Pilih Pendidikan--</option>
                                    <option value="SMP">SMP</option>
                                    <option value="SMA/K">SMA/K</option>
                                    <option value="D3">D3</option>
                                    <option value="D4/S1">D4/S1</option>
                                    <option value="S2">S2</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <div>
                                    <label for="alamat" class="form-label">Alamat</label>
                                    <textarea class="form-control" id="alamat" name="alamat" rows="3"></textarea>
                                </div>
                            </div>

                            <!-- Personal Info -->
                            <div class="col-12">
                                <h6 class="fw-semibold mt-2">2. Data Kepegawaian</h6>
                                <hr class="mt-0" />
                            </div>

                            <div class="col-md-6">
                                <label for="tgl_masuk" class="form-label">Tanggal Masuk</label>
                                <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="tgl_masuk" name="tgl_masuk" required />
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="status_pegawai">Status Kepegawaian</label>
                                <select id="status_pegawai" name="status_pegawai" class="form-select select2" data-allow-clear="true" required>
                                    <option value="">--Pilih Status Kepegawaian--</option>
                                    <option value="Kontrak">Kontrak</option>
                                    <option value="Tetap">Tetap</option>
                                </select>
                            </div>

                            <div class="col-12 col-md-12 mb-4" id="durasi">
                                <label for="durasi" class="form-label">Durasi Kerja</label>
                                <div class="input-group">
                                    <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="tgl_mulai_kontrak" name="tgl_mulai_kontrak" />
                                    <span class="input-group-text">sampai</span>
                                    <input type="date" class="form-control" placeholder="YYYY-MM-DD" id="tgl_akhir_kontrak" name="tgl_akhir_kontrak" />
                                </div>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="id_divisi">Divisi</label>
                                <select id="divisi" name="id_divisi" class="form-select select2" data-allow-clear="true" required>
                                    <option value="">--Pilih Divisi--</option>
                                    @foreach ($divisis as $div)
                                    <option value="{{ $div->id }}">{{ $div->nama_divisi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="id_jabatan">Jabatan</label>
                                <select id="jabatan" name="id_jabatan" class="form-select select2" data-allow-clear="true" required>
                                    <option value="">--Pilih Jabatan--</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="id_level">Tingkatan Pegawai</label>
                                <select id="level" name="id_level" class="form-select select2" data-allow-clear="true" required>
                                    <option value="">--Pilih Tingkatan Pegawai--</option>
                                    @foreach ($levels as $lev)
                                    <option value="{{ $lev->id }}">{{ $lev->nama_level }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="id_grade">Grade</label>
                                <select id="grade" name="id_grade" class="form-select select2" data-allow-clear="true" required>
                                    <option value="">--Pilih Grade--</option>
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="id_lokasi">Lokasi Penempatan</label>
                                <select id="id_lokasi" name="id_lokasi" class="form-select select2" data-allow-clear="true" required>
                                    <option value="">--Pilih Lokasi--</option>
                                    @foreach ($lokasis as $lok)
                                    <option value="{{ $lok->id }}">{{ $lok->nama_lokasi }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="col-md-6">
                                <label class="form-label" for="ukuran_baju">Ukuran Baju</label>
                                <select id="ukuran_baju" name="ukuran_baju" class="form-select" data-allow-clear="true" required>
                                    <option value="">--Pilih Ukuran Baju--</option>
                                    <option value="S">S</option>
                                    <option value="M">M</option>
                                    <option value="L">L</option>
                                    <option value="XL">XL</option>
                                    <option value="XXL">XXL</option>
                                </select>
                            </div>

                            <div class="col-md-12">
                                <label for="image" class="form-label">Image</label>
                                <input class="form-control" type="file" id="image" name="image" />
                            </div>

                            <div class="col-12">
                                <h6 class="fw-semibold mt-2">3. Account Information</h6>
                                <hr class="mt-0" />
                            </div>

                            <?php
                            $password_generator = Str::random(8);
                            ?>
                            <div class="col-md-12">
                                <label for="password_view" class="form-label">Password</label>
                                <input type="text" class="form-control" value="{{ $password_generator }}" placeholder="YYYY-MM-DD" id="password_view" name="password_view" readonly style="cursor: not-allowed;" autocomplete="off" />
                            </div>

                            <div class="col-12">
                                <button type="submit" name="submitButton" class="btn btn-primary">Submit</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <!-- /FormValidation -->

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
</div>
@endsection

@section('script')
<script>
    // hide id durasi
    $('#durasi').hide();
    // set default value for tgl_mulai_kontrak null
    $('#tgl_mulai_kontrak').val('');
    // set default value for tgl_akhir_kontrak null
    $('#tgl_akhir_kontrak').val('');
    $('#status_pegawai').change(function() {
        if ($(this).val() == 'Kontrak') {
            $('#durasi').show('slow');
        } else {
            $('#durasi').hide('slow');
        }
    });

    var tgl_lahir = document.getElementById('tgl_lahir');
    if (tgl_lahir) {
        tgl_lahir.flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",

            maxDate: "today",
            monthSelectorType: "static",
            onChange: function(selectedDates, dateStr, instance) {
                console.log(selectedDates);
                console.log(dateStr);
                console.log(instance);
            }
        });
    }

    var tgl_masuk = document.getElementById('tgl_masuk');
    if (tgl_masuk) {
        tgl_masuk.flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            defaultDate: 'today',
            maxDate: "today",
            monthSelectorType: "static",
            onChange: function(selectedDates, dateStr, instance) {
                console.log(selectedDates);
                console.log(dateStr);
                console.log(instance);
            }
        });
    }

    var tgl_mulai_kontrak = document.getElementById('tgl_mulai_kontrak');
    if (tgl_mulai_kontrak) {
        tgl_mulai_kontrak.flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            maxDate: "today",
            monthSelectorType: "static",
            onChange: function(selectedDates, dateStr, instance) {
                console.log(selectedDates);
                console.log(dateStr);
                console.log(instance);
            }
        });
    }

    var tgl_akhir_kontrak = document.getElementById('tgl_akhir_kontrak');
    if (tgl_akhir_kontrak) {
        tgl_akhir_kontrak.flatpickr({
            altInput: true,
            altFormat: "F j, Y",
            dateFormat: "Y-m-d",
            monthSelectorType: "static",
            onChange: function(selectedDates, dateStr, instance) {
                console.log(selectedDates);
                console.log(dateStr);
                console.log(instance);
            }
        });
    }


    jQuery(document).ready(function() {
        jQuery('#divisi').change(function() {
            let id_divisi = jQuery(this).val();
            jQuery('#jabatan').html('<option value="">--Pilih Jabatan---</option>');
            jQuery.ajax({
                url: '{{ route("hrd.pegawaiGetJabatan") }}',
                type: 'POST',
                data: 'id_divisi=' + id_divisi + '&_token={{ csrf_token() }}',
                success: function(response) {
                    jQuery('#jabatan').html(response);
                }
            })
        });

        jQuery('#level').change(function() {
            let id_level = jQuery(this).val();
            jQuery('#grade').html('<option value="">---Pilih Grade---</option>')
            jQuery.ajax({
                url: '{{ route("hrd.pegawaiGetGrade") }}',
                type: 'post',
                data: 'id_level=' + id_level + '&_token={{ csrf_token() }}',
                success: function(response) {
                    jQuery('#grade').html(response);
                }
            })
        });
    })
</script>
@endsection