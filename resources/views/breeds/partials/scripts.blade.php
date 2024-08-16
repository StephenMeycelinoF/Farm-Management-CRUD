<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        var table = $('#myTable').DataTable({
            "ajax": {
                "url": "{{ route('breeds.getall') }}",
                "type": "GET",
                "dataType": "json",
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "dataSrc": function (response) {
                    if (response.status === 200) {
                        return response.breeds;
                    } else {
                        return [];
                    }
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return '<a href="#" class="btn btn-sm btn-primary edit-btn" data-id="' + data.id + '" data-name="' + data.name + '"><i class="bi bi-pencil-fill"></i></a> ' +
                            '<a href="#" class="btn btn-sm btn-danger delete-btn" data-id="' + data.id + '"><i class="bi bi-trash"></i></a>';
                    }
                }
            ]
        });

        // Handle edit button click
        $('#myTable tbody').on('click', '.edit-btn', function () {
            var id = $(this).data('id');
            var name = $(this).data('name');

            $('#edit-id').val(id);
            $('#edit-name').val(name);

            $('#editModal').modal('show');
        });

        // Handle add form submission
        $('#breed-form').submit(function (e) {
            e.preventDefault();
            const breedData = new FormData(this);

            $.ajax({
                url: '{{ route('breeds.store') }}',
                method: 'post',
                data: breedData,
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
                        $('#breed-form')[0].reset();
                        $('#createModal').modal('hide');
                        $('#myTable').DataTable().ajax.reload();
                    }
                }
            });
        });

        // Handle edit form submission
        $('#edit-form').submit(function (e) {
            e.preventDefault();
            const breedData = new FormData(this);

            $.ajax({
                url: '{{ route('breeds.update') }}',
                method: 'POST',
                data: breedData,
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

        // Handle delete button click
        $(document).on('click', '.delete-btn', function () {
            var id = $(this).data('id');
            if (confirm('Kamu yakin ingin menghapus data pakan ini?')) {
                $.ajax({
                    url: '{{ route('breeds.delete') }}',
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