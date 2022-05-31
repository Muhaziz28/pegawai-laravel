@extends('dashboard.hrd.temp.layout')

@section('title', 'Rekap Aktivitas Pegawai')

@section('content')
<!-- Content wrapper -->
<?php

use Prophecy\Call\Call;

$limit_day = cal_days_in_month(CAL_GREGORIAN, 05, 2022);
?>

<div class="content-wrapper">
    <!-- Content -->

    <div class="container-xxl flex-grow-1 container-p-y">
        <h4 class="fw-bold py-3 mb-2">Rekap Pengisian Aktivitas Harian Pegawai</h4>

        <p class="mb-4">
            Each category (Basic, Professional, and Business) includes the four predefined roles shown below.
        </p>

        <div class="card">
            <div class="card-datatable table-responsive">
                <table class="datatables-divisi table border-top" id="divisi-table">
                    <thead>
                        <tr>
                            <th rowspan="2">No</th>
                            <th rowspan="2">Nama</th>
                            <th colspan="<?= $limit_day ?>" class="text-center">Tanggal</th>
                        </tr>
                        <tr>
                            <?php
                            for ($i = 1; $i <= $limit_day; $i++) {
                                echo '<th>' . $i . '</th>';
                            }
                            ?>
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
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
@endsection

@section('script')
<script>
    $(document).ready(function() {
        $('#divisi-table').DataTable({
            processing: true,
            serverSide: true,
            ajax: {
                url: '{{ route("hrd.getRekapActivity") }}',
                type: 'GET',
            },
            columns: [{
                    data: 'DT_RowIndex',
                    name: 'DT_RowIndex',
                    orderable: false,
                    searchable: false,
                },
                {
                    data: 'name',
                    name: 'name',
                },
                {
                    data: 'status',
                    name: 'status',
                }
            ],
        });
    });
</script>
@endsection