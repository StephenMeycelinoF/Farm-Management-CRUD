<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
<script src="https://cdn.datatables.net/2.1.2/js/dataTables.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
    integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
    crossorigin="anonymous"></script>

<script>
    $(document).ready(function () {
        $.ajax({
            url: "{{ route('owners.count') }}",
            type: 'GET',
            success: function (response) {
                if (response.status === 200) {
                    $('#total-owners').text(response.totalOwners);
                } else {
                    $('#total-owners').text('Error fetching data');
                }
            },
            error: function () {
                $('#total-owners').text('Error fetching data');
            }
        });
    });

    $(document).ready(function () {
        $.ajax({
            url: "{{ route('animals.count') }}",
            type: 'GET',
            success: function (response) {
                if (response.status === 200) {
                    $('#total-animals').text(response.totalAnimals);
                } else {
                    $('#total-animals').text('Error fetching data');
                }
            },
            error: function () {
                $('#total-animals').text('Error fetching data');
            }
        });
    });

    $(document).ready(function () {
        $.ajax({
            url: "{{ route('breeds.count') }}",
            type: 'GET',
            success: function (response) {
                if (response.status === 200) {
                    $('#total-breeds').text(response.totalBreeds);
                } else {
                    $('#total-breeds').text('Error fetching data');
                }
            },
            error: function () {
                $('#total-breeds').text('Error fetching data');
            }
        });
    });

    $(document).ready(function () {
        $.ajax({
            url: "{{ route('medicalRecords.count') }}",
            type: 'GET',
            success: function (response) {
                if (response.status === 200) {
                    $('#total-medicalRecords').text(response.totalRecords);
                } else {
                    $('#total-medicalRecords').text('Error fetching data');
                }
            },
            error: function () {
                $('#total-medicalRecords').text('Error fetching data');
            }
        });
    });
</script>