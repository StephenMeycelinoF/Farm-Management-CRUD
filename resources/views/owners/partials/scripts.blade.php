<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        var table = $('#myTable').DataTable({
            "ajax": {
                "url": "{{ route('owners.getall') }}",
                "type": "GET",
                "dataType": "json",
                "headers": {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                "dataSrc": function (response) {
                    if (response.status === 200) {
                        return response.owners;
                    } else {
                        return [];
                    }
                }
            },
            "columns": [
                { "data": "id" },
                { "data": "name" },
                { "data": "address" },
                { "data": "phone" },
                {
                    "data": null,
                    "render": function (data, type, row) {
                        return '<a href="#" class="btn btn-sm btn-primary edit-btn" data-id="' + data.id + '" data-name="' + data.name + '" data-address="' + data.address + '" data-phone="' + data.phone + '"><i class="bi bi-pencil-fill"></i></a> ' +
                            '<a href="#" class="btn btn-sm btn-danger delete-btn" data-id="' + data.id + '"><i class="bi bi-trash"></i></a>';
                    }
                }
            ]
        });

        // Navigasi input dengan Enter dan validasi ketika disubmit
        $('#owner-form input, #edit-form input').on('keydown', function (e) {
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

        // Validasi dan pengiriman form create
        $('#owner-form').submit(function (e) {
            e.preventDefault();
            var form = $(this)[0];

            if (form.checkValidity()) {
                const ownerdata = new FormData(this);

                $.ajax({
                    url: '{{ route('owners.store') }}',
                    method: 'post',
                    data: ownerdata,
                    cache: false,
                    contentType: false,
                    processData: false,
                    dataType: 'json',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function (response) {
                        if (response.status === 200) {
                            alert("Saved successfully");
                            $('#owner-form')[0].reset();
                            $('#createModal').modal('hide');
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

        // Validasi dan pengiriman form edit
        $('#edit-form').submit(function (e) {
            e.preventDefault();
            var form = $(this)[0];

            if (form.checkValidity()) {
                const ownerdata = new FormData(this);

                $.ajax({
                    url: '{{ route('owners.update') }}',
                    method: 'POST',
                    data: ownerdata,
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

        // Handle edit button click
        $('#myTable tbody').on('click', '.edit-btn', function () {
            var id = $(this).data('id');
            var name = $(this).data('name');
            var address = $(this).data('address');
            var phone = $(this).data('phone');

            $('#edit-id').val(id);
            $('#edit-name').val(name);
            $('#edit-address').val(address);
            $('#edit-phone').val(phone);

            $('#editModal').modal('show');
        });
        // Handle delete button click
        $(document).on('click', '.delete-btn', function () {
            var id = $(this).data('id');
            if (confirm('Kamu yakin ingin menghapus data pemilik ini?')) {
                $.ajax({
                    url: '{{ route('owners.delete') }}',
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