<div class="modal fade outPegawai " id="outPegawaiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3>Keluarkan Pegawai</h3>
                </div>
                <form class="needs-validation" action="{{ route('hrd.keluarPegawai') }}" method="POST" id="out-pegawai-form">
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

                    <div class="col-12 mb-3">
                        <label class="col-sm-3 col-form-label" for="alasan">Alasan</label>
                        <div class="col-sm-12">
                            <select class="form-select" id="alasan" name="alasan" required>
                                <option value="">---Pilih Alasan---</option>
                                <option value="PHK">PHK</option>
                                <option value="Backlist">Backlist</option>
                                <option value="Other">Lainnya...</option>
                            </select>
                        </div>
                    </div>
                    <div class="col-12 mb-3">
                        <textarea class="form-control" id="alasan_keluar" name="alasan_keluar" placeholder="Keterangan"></textarea>
                        <span class="text-danger error-text ket_error"></span>
                    </div>
                    <div class="col-12">
                        <div class="card bg-danger text-white mb-3">
                            <div class="card-body">
                                <h4 class="card-title text-white">Perhatian!!!</h4>
                                <p class="card-text">Dengan menekan tombol <strong>Save</strong>, maka pegawai yang bersangkutan akan dikeluarkan.</p>
                            </div>
                        </div>
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