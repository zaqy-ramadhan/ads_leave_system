    @extends('layouts.app')
    @section('content')
    <h2>Form Tambah Karyawan</h2>

    <!-- Form untuk menambahkan karyawan -->
    <form class="col-md-6" id="formTambahKaryawan" action="{{ url('/api/karyawan') }}" method="post">
        @csrf
        <label class="form-label" for="nama">Nama:</label>
        <input class="form-control" type="text" id="nama" name="nama" required>
        <br>
        <label class="form-label" for="alamat">Alamat:</label>
        <input class="form-control" type="text" id="alamat" name="alamat" required>
        <br>
        <label class="form-label" for="tgl_lahir">Tanggal Lahir:</label>
        <input class="form-control" type="date" id="tgl_lahir" name="tgl_lahir" required>
        <br>
        <label class="form-label" for="tgl_bergabung">Tanggal Bergabung:</label>
        <input class="form-control" type="date" id="tgl_bergabung" name="tgl_bergabung" required>
        <br>
        <button class="btn btn-success" type="submit">Tambah Karyawan</button>
    </form>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>

    <script>
        $('#formTambahKaryawan').submit(function(event) {
            event.preventDefault();

            $.ajax({
                url: $(this).attr('action'),
                method: $(this).attr('method'),
                data: $(this).serialize(),
                success: function(response) {
                    console.log(response);
                    alert("Data berhasil dikirim!");
                    window.location.href = "/showkaryawan";
                },
                error: function(xhr, status, error) {
                    console.log(xhr.responseText);
                }
            });
        });
    </script>
@endsection
