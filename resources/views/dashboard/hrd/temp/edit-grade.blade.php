<div class="modal fade editGrade" id="editGradeModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3>Edit Grade</h3>
                    <p>Form edit grade.</p>
                </div>
                <form class="needs-validation" action="{{ route('hrd.updateGrade') }}" method="POST" id="edit-grade-form">
                    @csrf
                    <input type="hidden" name="id">
                    <div class="col-12 mb-3">
                        <label class="form-label" for="title">Title</label>
                        <input type="text" id="title" name="title" class="form-control" placeholder="Title" autocomplete="off" autofocus required />
                    </div>
                    <div class="col-12 mb-3">
                        <label for="id_level" class="form-label">Level</label>
                        <select id="id_level" name="id_level" id="id_level" class="form-select" data-allow-clear="true" required>
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