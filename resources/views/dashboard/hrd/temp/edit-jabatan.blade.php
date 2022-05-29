<div class="modal fade editJabatan" id="editJabatanModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3>Edit Divisi</h3>
                    <p>Form edit divisi.</p>
                </div>
                <form class="needs-validation" action="{{ route('hrd.updateJabatan') }}" method="POST" id="edit-jabatan-form">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="nama_jabatan">Nama Jabatan</label>
                        <input type="text" id="nama_jabatan" name="nama_jabatan" class="form-control" placeholder="Nama Jabatan" autofocus required />
                    </div>
                    <div class="col-12 mb-3">
                        <label for="id_divisi" class="form-label">Divisi</label>
                        <select id="id_divisi" name="id_divisi" class="form-select" data-allow-clear="true" required>
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