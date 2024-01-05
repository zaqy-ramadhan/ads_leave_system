    @extends('layouts.app')
    @section('content')
    <h2>Data Cuti</h2>

   <a class="btn btn-success" style="text-decoration: none" href="/cuti">Add Data</a>


    <div id="resultContainer">
        <!-- Container to display the DataTable -->
    </div>

    <script>
        $(document).ready(function() {
            // Fetch data from the API endpoint
            $.ajax({
                url: '/api/cuti', // Ganti dengan endpoint yang benar
                method: 'GET',
                success: function(response) {
                    // Handle the response and display data using DataTables
                    displayDataTable(response.data);
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                }
            });

            // Function to display data in DataTable
            function displayDataTable(data) {
                var resultContainer = $('#resultContainer');

                // Destroy existing DataTable (if any)
                if ($.fn.DataTable.isDataTable('#dataTable')) {
                    $('#dataTable').DataTable().destroy();
                }

                // Clear existing content
                resultContainer.empty();

                // Create a table and append it to the container
                var table = $('<table>').attr('id', 'dataTable').addClass('display').appendTo(resultContainer);

                // Append thead and tbody
                table.append('<thead><tr><th>Nomor Induk</th><th>Nama</th><th>Tanggal Cuti</th><th>Lama Cuti</th><th>Keterangan</th><th>Action</th></tr></thead>');
                var tbody = $('<tbody>').appendTo(table);

                // Populate tbody with data
                data.forEach(function(cuti) {
                    var row = $('<tr>').appendTo(tbody);
                    row.append('<td>' + cuti.no_induk + '</td>');
                    row.append('<td>' + cuti.nama_karyawan + '</td>');
                    row.append('<td>' + cuti.tgl_cuti + '</td>');
                    row.append('<td>' + cuti.lama_cuti + '</td>');
                    row.append('<td>' + cuti.keterangan + '</td>');

                    // Add edit button
                    var editBtn = $('<button>')
                        .text('Edit')
                        .addClass('btn btn-primary editBtn me-2')
                        .data('id', cuti.id);

                    // Add delete button
                    var deleteBtn = $('<button>')
                        .text('Delete')
                        .addClass('btn btn-danger deleteBtn')
                        .data('id', cuti.id);
                    
                    // Append the delete button to the row
                    row.append($('<td>').append(editBtn).append(deleteBtn));
                    // row.append($('<td>').append(deleteBtn));
                });

                // Initialize DataTable
                table.DataTable();
            }
        });

        $('#resultContainer').on('click', '.deleteBtn', function() {
            var id = $(this).data('id');
            
            // Confirm deletion with user
            if (confirm('Apakah Anda yakin ingin menghapus data ini?')) {
                // Send AJAX request to delete data
                $.ajax({
                    // url: '/api/karyawan/' + id+'/destroy', // Ganti dengan endpoint yang benar
                    url : '/api/cuti/'+id,
                    method: 'DELETE',
                    headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    success: function(response) {
                        // Remove the deleted row from the DataTable
                        var table = $('#dataTable').DataTable();
                        var row = table.row($(this).parents('tr'));
                        row.remove().draw();

                        // Optional: Display success message
                        alert(response.message);
                        window.location.href = "/showcuti";
                    },
                    error: function(xhr, status, error) {
                        alert(response.message);
                    }
                });
            }
        });

        $('#resultContainer').on('click', '.editBtn', function() {
            var id = $(this).data('id');
            // Redirect to the edit page with the selected karyawan ID
            window.location.href = '/editcuti/' + id;
        });
    </script>
    @endsection
