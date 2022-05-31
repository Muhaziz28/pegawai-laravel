<div class="modal fade editActivity" id="editActivityModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-xl modal-simple">
        <div class="modal-content p-3 p-md-5">
            <div class="modal-body">
                <button type="button" class="btn-close btn-pinned" data-bs-dismiss="modal" aria-label="Close"></button>
                <div class="text-center mb-4">
                    <h3>Edit Lokasi</h3>
                    <p>Form edit lokasi.</p>
                </div>
                <form class="needs-validation" action="{{ route('hrd.updateActivity') }}" method="POST" id="update-activity-form">
                    @csrf
                    <input type="hidden" name="id">
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
                                            <textarea class="form-control" placeholder="Aktivitas Anda" id="isi_aktivitas" name="isi_aktivitas" required rows="3" autocomplete="off"></textarea>
                                        </div>
                                    </td>
                                    <td id="col1">
                                        <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                            <input class="form-control" required type="text" name="mulai" placeholder="Jam Mulai" autocomplete="off"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                        </div>
                                    </td>
                                    <td id="col2">
                                        <div>
                                            <div class="input-group clockpicker pull-center" data-placement="left" data-align="top" data-autoclose="true">
                                                <input class="form-control" required type="text" name="selesai" placeholder="Jam Selesai" autocomplete="off"><span class="input-group-addon"><span class="glyphicon glyphicon-time"></span></span>
                                            </div>
                                        </div>
                                    </td>
                                    <td id="col3">
                                        <div class="form-group">
                                            <textarea class="form-control" id="realisasi" name="realisasi" required placeholder="Realisasi" rows="3" autocomplete="off"></textarea>
                                        </div>
                                    </td>
                                    <td id="col4">
                                        <div class="form-group">
                                            <textarea class="form-control" id="target" name="target" placeholder="Target" rows="3" autocomplete="off"></textarea>
                                        </div>
                                    </td>
                                </tr>
                            </tbody>
                        </table>
                        <br>
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