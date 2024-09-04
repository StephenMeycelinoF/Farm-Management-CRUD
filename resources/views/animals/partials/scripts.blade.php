<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script>

    document.getElementById('age').addEventListener('input', function (e) {
        var value = this.value;
        if (!/^\d*$/.test(value)) {
            this.value = value.replace(/[^0-9]/g, '');
            document.querySelector('#age').setCustomValidity("Umur harus berupa angka.");
        } else {
            document.querySelector('#age').setCustomValidity("");
        }
    });

    document.getElementById('edit-age').addEventListener('input', function (e) {
        var value = this.value;
        if (!/^\d*$/.test(value)) {
            this.value = value.replace(/[^0-9]/g, '');
            document.querySelector('#edit-age').setCustomValidity("Umur harus berupa angka.");
        } else {
            document.querySelector('#edit-age').setCustomValidity("");
        }
    });

    $(document).ready(function () {
        var table = $('#myTable').DataTable({
            "ajax": {
                "url": "{{ route('animals.getall') }}",
                "type": "GET",
                "dataType": "json",
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "dataSrc": function (response) {
                    if (response.status === 200) {
                        return response.animals;
                    } else {
                        return [];
                    }
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "species" },
                { "data": "age" },
                { "data": "description" },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return '<a href="#" class="btn btn-sm text-primary edit-btn" data-id="' + data.id + '" data-name="' + data.name + '" data-species="' + data.species + '" data-age="' + data.age + '" data-description="' + data.description + '"><i class="bi bi-pencil-fill"></i></a> ' +
                            '<a href="#" class="btn btn-sm text-danger delete-btn" data-id="' + data.id + '"><i class="bi bi-trash"></i></a>';
                    }
                }
            ]
        });

        $('#myTable tbody').on('click', '.edit-btn', function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var species = $(this).data('species');
            var age = $(this).data('age');
            var description = $(this).data('description');

            $('#edit-id').val(id);
            $('#edit-name').val(name);
            $('#edit-species').val(species);
            $('#edit-age').val(age);
            $('#edit-description').val(description);
            $('#editModal').modal('show');
        });

        // Pindah ke input berikutnya saat Enter ditekan
        $('#animal-form input').on('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                let inputs = $(this).closest('form').find(':input:visible');
                let idx = inputs.index(this);

                if (idx === inputs.length - 1) {
                    // Jika di input terakhir, fokus tetap pada tombol Simpan
                    inputs[idx].blur();
                } else {
                    inputs[idx + 1].focus();
                }
            }
        });

        // Validasi dan simpan data
        $('#animal-form').on('submit', function (e) {
            e.preventDefault();
            let form = $(this);

            let ageInput = $('#age');
            if (ageInput.val() < 0) {
                ageInput.addClass('is-invalid');
                ageInput.next('.invalid-feedback').text('Umur tidak boleh kurang dari 0.');
                return;
            } else {
                ageInput.removeClass('is-invalid');
            }

            if (form[0].checkValidity() === false) {
                e.stopPropagation();
            } else {
                const animaldata = new FormData(this);

                $.ajax({
                    url: '{{ route('animals.store') }}',
                    method: 'post',
                    data: animaldata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.status == 200) {
                            alert("Saved successfully");
                            $('#animal-form')[0].reset();
                            $('#createModal').modal('hide');
                            $('#myTable').DataTable().ajax.reload();
                        }
                    }
                });
            }
            form.addClass('was-validated');
        });

        // Navigasi input dengan Enter dan validasi ketika disubmit
        $('#edit-form input').on('keydown', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                var inputs = $(this).closest('form').find(':input:visible');
                var nextInput = inputs.eq(inputs.index(this) + 1);
                if (nextInput.length) {
                    nextInput.focus();
                } else {
                    $(this).closest('form').submit();
                }
            }
        });

        // Validasi dan pengiriman form
        $('#edit-form').submit(function (e) {
            e.preventDefault();
            var form = $(this)[0];

            // Jika form valid, lakukan submit
            if (form.checkValidity()) {
                const animaldata = new FormData(this);

                $.ajax({
                    url: '{{ route('animals.update') }}',
                    method: 'POST',
                    data: animaldata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.status === 200) {
                            alert(response.message);
                            $('#edit-form')[0].reset();
                            $('#editModal').modal('hide');
                            $('#myTable').DataTable().ajax.reload();
                        } else {
                            alert(response.message);
                        }
                    }
                });
            } else {
                e.stopPropagation();
            }

            $(this).addClass('was-validated');
        });

        $(document).on('click', '.delete-btn', function () {
            var id = $(this).data('id');

            if (confirm('Kamu yakin ingin menghapus data hewan ternak ini?')) {
                $.ajax({
                    url: '{{ route('animals.delete') }}',
                    type: 'DELETE',
                    data: { id: id },
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.status === 200) {
                            alert(response.message);
                            $('#myTable').DataTable().ajax.reload();
                        } else {
                            alert(response.message);
                        }
                    },
                    error: function (xhr, status, error) {
                        alert('Error: ' + error);
                    }
                });
            }
        });
    });
</script>