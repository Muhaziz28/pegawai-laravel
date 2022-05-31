<div class="modal fade inPegawai " id="inPegawaiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3>Masukkan Pegawai</h3>
                </div>
                <form class="needs-validation" action="{{ route('hrd.inPegawai') }}" method="POST" id="in-pegawai-form">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="row">
                        <!-- Bordered Table -->
                        <div class="col-md-8">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Identitas Pegawai</th>
                                            <th></th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td>Name</td>
                                            <td>:</td>
                                            <td id="name"></td>
                                        </tr>
                                        <tr>
                                            <td>Divisi</td>
                                            <td>:</td>
                                            <td id="divisi"></td>
                                        </tr>
                                        <tr>
                                            <td>Jabatan</td>
                                            <td>:</td>
                                            <td id="jabatan"></td>
                                        </tr>
                                        <tr>
                                            <td>Alasan Keluar</td>
                                            <td>:</td>
                                            <td id="alasan"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="table-responsive text-nowrap">
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Photo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td id="image"></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <!--/ Bordered Table -->
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