<div class="modal fade" id="editModal" tabindex="-1" role="dialog" aria-labelledby="editModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="editModalLabel">Perbaharui Data Hewan</h5>
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
                            <label>Spesies *</label>
                            <input type="text" id="edit-species" name="species" class="form-control" required>
                            <div class="invalid-feedback">Spesies harus diisi.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label>Umur *</label>
                            <input type="text" id="edit-age" name="age" class="form-control" required>
                            <div class="invalid-feedback">Umur harus diisi.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label>Deskripsi *</label>
                            <input type="text" id="edit-description" name="description" class="form-control" required>
                            <div class="invalid-feedback">Deskripsi harus diisi.</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="edit-form">Simpan</button>
            </div>
        </div>
    </div>
</div>

<style>
    .form-control:focus {
        border-color: #ff9f00;
        background-color: #a0e1f1;
        box-shadow: 0 0 0 0.2rem rgba(255, 159, 0, 0.25);
        outline: none;
        border-radius: 0;
    }

    .form-control::placeholder {
        color: rgba(51, 51, 51, 0.5);
        opacity: 1;
    }
</style>