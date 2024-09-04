<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Data Hewan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="animal-form" method="post" class="needs-validation" novalidate>
                    @csrf
                    <div class="row">
                        <div class="col-lg">
                            <label for="name">Nama *</label>
                            <input type="text" name="name" id="name" class="form-control"
                                placeholder="Nama Hewan Ternak" required>
                            <div class="invalid-feedback">Nama hewan harus diisi.</div>
                        </div>
                        <div class="col-lg">
                            <label for="species">Spesies *</label>
                            <input type="text" name="species" id="species" class="form-control"
                                placeholder="Spesies Hewan Ternak" required>
                            <div class="invalid-feedback">Spesies harus diisi.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="age">Umur *</label>
                            <input type="text" name="age" id="age" class="form-control"
                                placeholder="Umur Hewan Ternak" required>
                            <div class="invalid-feedback">Umur harus diisi.</div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label for="description">Deskripsi *</label>
                            <input type="text" name="description" id="description" class="form-control"
                                placeholder="Deskripsi" required>
                            <div class="invalid-feedback">Deskripsi harus diisi.</div>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="animal-form">Simpan</button>
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