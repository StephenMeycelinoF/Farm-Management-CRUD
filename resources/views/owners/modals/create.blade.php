<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createModalLabel">Tambah Data Pemilik</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="owner-form" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg">
                            <label>Nama</label>
                            <input type="text" name="name" id="name" class="form-control">
                        </div>
                        <div class="col-lg">
                            <label>Alamat</label>
                            <input type="text" name="address" id="address" class="form-control">
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label>Telepon</label>
                            <input type="text" name="phone" id="phone" class="form-control">
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="owner-form">Simpan</button>
            </div>
        </div>
    </div>
</div>
