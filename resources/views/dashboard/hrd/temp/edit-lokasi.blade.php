<div class="modal fade editLokasi" id="editLokasiModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3>Edit Lokasi</h3>
                    <p>Form edit lokasi.</p>
                </div>
                <form class="needs-validation" action="{{ route('hrd.updateLokasi') }}" method="POST" id="edit-lokasi-form">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="nama_lokasi">Nama Divisi</label>
                        <input type="text" id="nama_lokasi" name="nama_lokasi" class="form-control" placeholder="Nama Lokasi" autofocus required />
                    </div>
                    <div class="col-12 mb-3">
                        <label for="alamat_lokasi" class="form-label">Alamat Lokasi</label>
                        <textarea class="form-control" id="alamat_lokasi" name="alamat_lokasi" rows="3" placeholder="Alamat Lokasi"></textarea>
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="longitude">Longitude</label>
                        <input type="text" id="longitude" name="longitude" class="form-control" placeholder="Longitude" autofocus />
                    </div>
                    <div class="col-12 mb-3">
                        <label class="form-label" for="latitude">Latitude</label>
                        <input type="text" id="latitude" name="latitude" class="form-control" placeholder="Latitude" autofocus />
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