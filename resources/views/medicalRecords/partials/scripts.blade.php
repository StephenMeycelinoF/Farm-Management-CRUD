<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {

        // Menangani perpindahan input dengan tombol Enter
        $('form').on('keydown', 'input, textarea, select', function (e) {
            if (e.key === 'Enter') {
                e.preventDefault();
                var focusableElements = $(this).closest('form').find('input, textarea, select').filter(':visible');
                var index = focusableElements.index(this);
                if (index > -1 && index < focusableElements.length - 1) {
                    focusableElements.eq(index + 1).focus();
                }
            }
        });

        // Mengisi dropdown hewan saat halaman dimuat
        $.ajax({
            url: '{{ route('animals.getall') }}',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 200) {
                    var animalSelect = $('#create-animal_id');
                    animalSelect.empty();
                    $.each(response.animals, function (index, animal) {
                        animalSelect.append($('<option>', {
                            value: animal.id,
                            text: animal.name
                        }));
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching animals:', error);
            }
        });

        var table = $('#myTable').DataTable({
            "ajax": {
                "url": "{{ route('medicalRecords.getall') }}",
                "type": "GET",
                "dataType": "json",
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "dataSrc": function (response) {
                    if (response.status === 200) {
                        return response.medicalRecords;
                    } else {
                        return [];
                    }
                }

            },
            "columns": [
                { "data": "id" },
                { "data": "animal.name" },
                { "data": "date" },
                { "data": "description" },
                { "data": "treatment" },
                { "data": "veterinarian" },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return '<a href="#" class="btn btn-sm text-primary edit-btn" data-id="' + data.id + '" data-animal_id="' + data.animal_id + '" data-date="' + data.date + '" data-description="' + data.description + '" data-treatment="' + data.treatment + '" data-veterinarian="' + data.veterinarian + '"><i class="bi bi-pencil-fill"></i></a> ' +
                            '<a href="#" class="btn btn-sm text-danger delete-btn" data-id="' + data.id + '"><i class="bi bi-trash"></i></a>';
                    }
                }
            ],
        });

        // Mengisi dropdown hewan saat halaman dimuat
        $.ajax({
            url: '{{ route('animals.getall') }}',
            method: 'GET',
            dataType: 'json',
            success: function (response) {
                if (response.status === 200) {
                    var animalSelect = $('#edit-animal_id');
                    animalSelect.empty(); // Kosongkan elemen dropdown
                    $.each(response.animals, function (index, animal) {
                        animalSelect.append($('<option>', {
                            value: animal.id,
                            text: animal.name
                        }));
                    });
                }
            },
            error: function (xhr, status, error) {
                console.error('Error fetching animals:', error);
            }
        });

        $('#myTable tbody').on('click', '.edit-btn', function () {
            var id = $(this).data('id');
            var animal_id = $(this).data('animal_id');
            var date = $(this).data('date');
            var description = $(this).data('description');
            var treatment = $(this).data('treatment');
            var veterinarian = $(this).data('veterinarian');

            $('#edit-id').val(id);
            $('#edit-animal_id').val(animal_id);
            $('#edit-date').val(date);
            $('#edit-description').val(description);
            $('#edit-treatment').val(treatment);
            $('#edit-veterinarian').val(veterinarian);
            $('#editMedicalRecordModal').modal('show');
        });

        $('#medical-record-form').submit(function (e) {
            e.preventDefault();
            const medicalRecordData = new FormData(this);

            $.ajax({
                url: '{{ route('medicalRecords.store') }}',
                method: 'POST',
                data: medicalRecordData,
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
                        $('#medical-record-form')[0].reset();
                        $('#createModal').modal('hide');
                        $('#myTable').DataTable().ajax.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (let field in errors) {
                        errorMessages += errors[field] + '\n';
                    }
                    alert('Validation errors:\n' + errorMessages);
                }
            });
        });

        $('#medical-record-update-form').submit(function (e) {
            e.preventDefault();
            const formData = $(this).serialize();
            const recordId = $('#edit-id').val();

            $.ajax({
                url: `/medicalRecords/update/${recordId}`,
                method: 'PUT',
                data: formData,
                success: function (response) {
                    if (response.status === 200) {
                        alert(response.message);
                        $('#editMedicalRecordModal').modal('hide');
                        $('#myTable').DataTable().ajax.reload();
                    } else {
                        alert(response.message);
                    }
                },
                error: function (xhr) {
                    let errors = xhr.responseJSON.errors;
                    let errorMessages = '';
                    for (let field in errors) {
                        errorMessages += errors[field] + '\n';
                    }
                    alert('Validation errors:\n' + errorMessages);
                }
            });
        });


        $('#myTable tbody').on('click', '.delete-btn', function () {
            var id = $(this).data('id');

            if (confirm('Are you sure you want to delete this record?')) {
                $.ajax({
                    url: '{{ route('medicalRecords.delete') }}',
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