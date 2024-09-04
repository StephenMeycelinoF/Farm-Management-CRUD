<div class="modal fade" id="createModal" tabindex="-1" role="dialog" aria-labelledby="createMedicalRecordModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="createMedicalRecordModalLabel">Tambah Rekam Medis</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="medical-record-form" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg">
                            <label>Hewan <span class="text-danger">*</span></label>
                            <select name="animal_id" id="create-animal_id" class="form-control" required>
                                <!-- Populate with animals from database -->
                            </select>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label>Tanggal <span class="text-danger">*</span></label>
                            <input type="date" name="date" id="date" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label>Deskripsi <span class="text-danger">*</span></label>
                            <input type="text" name="description" id="description" class="form-control" required>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label>Perawatan <span class="text-danger">*</span></label>
                            <textarea name="treatment" id="treatment" class="form-control" required></textarea>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg">
                            <label>Dokter <span class="text-danger">*</span></label>
                            <input type="text" name="veterinarian" id="veterinarian" class="form-control" required>
                        </div>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Tutup</button>
                <button type="submit" class="btn btn-primary" form="medical-record-form">Simpan</button>
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