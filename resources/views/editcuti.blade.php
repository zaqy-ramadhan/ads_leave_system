    @extends('layouts.app')
    @section('content')
    <h2>Update Cuti</h2>
    {{-- {{ dd($cuti->karyawan->nama) }} --}}
    <!-- Formulir Update cuti -->
    <form class="col-md-6" id="updateForm" method="POST" action="{{ url('/api/cuti/'.$cuti->id) }}">
        @csrf
        @method('PUT')
        <label class="form-label" for="tgl_cuti">Tanggal Cuti:</label>
        <input class="form-control" type="date" id="tgl_cuti" name="tgl_cuti" value="{{ $cuti->tgl_cuti }}" required>
        <br>
        <label class="form-label" for="lama_cuti">Lama Cuti:</label>
        <input class="form-control" type="number" id="lama_cuti" name="lama_cuti" value="{{ $cuti->lama_cuti }}" required>
        <br>
        <label class="form-label" for="keterangan">Keterangan:</label>
        <input class="form-control" type="textarea" id="keterangan" name="keterangan" value="{{ $cuti->keterangan }}" required>
        <br>

        <!-- Tambahkan tombol submit yang akan memanggil fungsi updateData() -->
        <button class="btn btn-success" type="submit">Update Data</button>
    </form>
    <!-- End Formulir Update cuti -->

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
                    window.location.href = "/showcuti";
                },
                error: function(error) {
                    // Tangani kesalahan jika terjadi
                    console.error('Error:', error);
                    window.location.href = "/showcuti";
                }
            });
        });
    </script>
    @endsection
