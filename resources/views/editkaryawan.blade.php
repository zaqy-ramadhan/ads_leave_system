    @extends('layouts.app')
    @section('content')
    <h2>Update Karyawan</h2>

    <!-- Formulir Update Karyawan -->
    <form class="col-md-6" id="updateForm" method="POST" action="{{ url('/api/karyawan/'.$karyawan->id) }}">
        @csrf
        @method('PUT')

        <label class="form-label" for="nama">Nama:</label>
        <input class="form-control" type="text" id="nama" name="nama" value="{{ $karyawan->nama }}" required><br><br>

        <label class="form-label" for="alamat">Alamat:</label>
        <input class="form-control" type="text" id="alamat" name="alamat" value="{{ $karyawan->alamat }}" required><br><br>

        <label class="form-label" for="tgl_lahir">Tanggal Lahir:</label>
        <input class="form-control" type="date" id="tgl_lahir" name="tgl_lahir" value="{{ $karyawan->tgl_lahir }}" required><br><br>

        <label class="form-label" for="tgl_bergabung">Tanggal Bergabung:</label>
        <input class="form-control" type="date" id="tgl_bergabung" name="tgl_bergabung" value="{{ $karyawan->tgl_bergabung }}" required><br><br>

        <!-- Tambahkan tombol submit yang akan memanggil fungsi updateData() -->
        <button class="btn btn-success" type="submit">Update Data</button>
    </form>
    <!-- End Formulir Update Karyawan -->

    <script>
        // Fungsi untuk mengirim data pembaruan menggunakan Ajax
        $('#updateForm').submit(function(event) {
            // Cegah formulir dari pengiriman standar
            event.preventDefault();

            $.ajax({
                url: $('#updateForm').attr('action'),
                type: 'PUT', // Ganti dengan metode POST
                data: $('#updateForm').serialize(),
                success: function(response) {
                    // Tampilkan pesan sukses atau lakukan aksi lain yang diinginkan
                    alert("Data berhasil diupdate!");
                    window.location.href = "/showkaryawan";
                },
                error: function(error) {
                    // Tangani kesalahan jika terjadi
                    console.error('Error:', error);
                    window.location.href = "/showkaryawan";
                }
            });
        });
    </script>
    @endsection
