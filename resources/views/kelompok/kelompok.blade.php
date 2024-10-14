@extends('layout.app')
@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Daftar Kelompok</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <a href="{{ route('kelompok.create') }}" class="btn btn-outline-primary">Tambah</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Alert Messages -->
                    @if (session('success'))
                        <script>
                            Swal.fire({
                                title: 'Sukses!',
                                text: "{!! session('success') !!}",
                                icon: 'success',
                                timer: 3000,
                                showConfirmButton: false
                            });
                        </script>
                    @endif

                    @if (session('error'))
                        <script>
                            Swal.fire({
                                title: 'Error!',
                                text: "{!! session('error') !!}",
                                icon: 'error',
                                timer: 3000,
                                showConfirmButton: false
                            });
                        </script>
                    @endif

                    <!-- Tabel Kelompok -->
                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner-group">
                                <div class="card-inner p-0">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr>
                                                <th>#</th>
                                                <th>Kode Kategori</th>
                                                <th>Kelompok Barang</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($kelompokData as $kelompok)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td>{{ $kelompok->kode_kategori }}</td>
                                                    <td>{{ $kelompok->kelompok_barang }}</td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" onclick="window.location.href='{{ url('app/kelompok/edit/' . $kelompok->id) }}'">
                                                            <em class="icon ni ni-edit"></em>
                                                        </button>

                                                        <form action="{{ url('/app/kelompok/delete/' . $kelompok->id) }}" method="POST" style="display: inline;" class="delete-form">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="button" class="btn btn-danger btn-sm delete-button">
                                                                <em class="icon ni ni-trash"></em>
                                                            </button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                    {{ $kelompokData->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Uncomment this if you have a modal for adding items --}}
                     @include('kelompok.create') <!-- Include Modal Here -->

                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        $(document).ready(function() {
            // Cek apakah ada notifikasi
            // Notifikasi akan ditangani di atas menggunakan SweetAlert2
            $('.delete-button').on('click', function() {
                var form = $(this).closest('form'); // Mendapatkan form terdekat

                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Apakah Anda yakin ingin menghapus kelompok ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        form.submit(); // Mengirimkan form untuk dihapus
                    }
                });
            });
        });
    </script>
@endsection
