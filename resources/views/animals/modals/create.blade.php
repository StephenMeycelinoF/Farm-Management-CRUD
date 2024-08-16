<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel"
    aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Data Hewan</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="animal-form" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg">
                            <label>Nama</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="col-lg">
                            <label>Spesies</label>
                            <input type="text" name="species" id="species" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label>Umur</label>
                            <input type="text" name="age" id="age" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label>Deskripsi</label>
                            <input type="text" name="description" id="description" class="form-control">
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
