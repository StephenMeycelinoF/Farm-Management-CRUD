<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Perbaharui Data Pemilik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="edit-form" method="post" novalidate>
                    @csrf
                    <input type="hidden" id="edit-id" name="id">
                    <div class="row">
                        <div class="col-lg">
                            <label>Nama *</label>
                            <input type="text" id="edit-name" name="name" class="form-control" required>
                            <div class="invalid-feedback">Nama harus diisi.</div>
                        </div>
                        <div class="col-lg">
                            <label>Alamat *</label>
                            <input type="text" id="edit-address" name="address" class="form-control" required>
                            <div class="invalid-feedback">Alamat harus diisi.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label>Telepon *</label>
                            <input type="text" id="edit-phone" name="phone" class="form-control" required>
                            <div class="invalid-feedback">Telepon harus diisi.</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="edit-form">Perbaharui</button>
            </div>
        </div>
    </div>
</div>