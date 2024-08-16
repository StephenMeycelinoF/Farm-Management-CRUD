<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script>
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

        $('#animal-form').submit(function (e) {
            e.preventDefault();
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
        });

        $('#edit-form').submit(function (e) {
            e.preventDefault();
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