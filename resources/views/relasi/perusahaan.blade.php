@extends('layout.app')

@section('content')
    <div class="nk-content">
        <div class="container-fluid">
            <div class="nk-content-inner">
                <div class="nk-content-body">
                    <div class="nk-block-head nk-block-head-sm">
                        <div class="nk-block-between">
                            <div class="nk-block-head-content">
                                <h3 class="nk-block-title page-title">Daftar Perusahaan</h3>
                            </div>
                            <div class="nk-block-head-content">
                                <div class="toggle-wrap nk-block-tools-toggle">
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#relasiModal">Tambah</button>
                                </div>
                            </div>
                        </div>
                    </div>

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

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner-group">
                                <div class="card-inner p-0">
                                    <table class="table">
                                        <thead class="thead-light">
                                            <tr style="background-color: #d3d3d3; color: #000000;">
                                                <th>#</th>
                                                <th>Nama Perusahaan</th>
                                                <th>Jenis</th>
                                                <th>Alamat Kantor</th>
                                                <th>Alamat Gudang</th>
                                                <th>Nama Pimpinan</th>
                                                <th>No. Telepon</th>
                                                <th>Plafon Kredit/Debit</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($data as $row)
                                                <tr>
                                                    <td>{{ $loop->iteration }}</td>
                                                    <td><strong>{{ $row->nama_perusahaan }}</strong></td>
                                                    <td>{{ $row->jenis }}</td>
                                                    <td>{{ $row->alamat_kantor }}</td>
                                                    <td>{{ $row->alamat_gudang }}</td>
                                                    <td>{{ $row->nama_pimpinan }}</td>
                                                    <td>{{ $row->no_telepon }}</td>
                                                    <td>
                                                        @if ($row->jenis == 'Supplier')
                                                            Rp {{ $row->plafon_debit }} (Debit)
                                                        @elseif ($row->jenis == 'Konsumen')
                                                            Rp {{ $row->plafon_kredit }} (Kredit)
                                                        @else
                                                            -
                                                        @endif
                                                    </td>
                                                    <td>
                                                        <button class="btn btn-primary btn-sm" onclick="window.location.href='{{ url('app/relasi/edit/' . $row->id) }}'">
                                                            <em class="icon ni ni-edit"></em>
                                                        </button>
                                                        <form action="{{ url('/app/relasi/delete/' . $row->id) }}" method="POST" style="display: inline;" class="delete-form">
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
                                    {{ $data->links() }}
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{ $data->links() }}
                    </div>
                    @include('relasi.create-new')
                </div>
            </div>
        </div>
    </div>

    <!-- SweetAlert and jQuery -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            $('.delete-button').on('click', function() {
                var form = $(this).closest('form'); // Mendapatkan form terdekat

                Swal.fire({
                    title: 'Konfirmasi',
                    text: "Apakah Anda yakin ingin menghapus perusahaan ini?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonText: 'Ya, hapus!',
                    cancelButtonText: 'Batal'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: form.attr('action'),
                            type: 'POST', // Menggunakan POST untuk mengirim data
                            data: form.serialize(), // Menyertakan data dari form
                            success: function(response) {
                                Swal.fire({
                                    title: 'Sukses!',
                                    text: 'Perusahaan berhasil dihapus.',
                                    icon: 'success',
                                    timer: 3000,
                                    showConfirmButton: false
                                }).then(() => {
                                    location.reload(); // Reload halaman setelah sukses
                                });
                            },
                            error: function(xhr) {
                                let errorMessage = 'Terjadi kesalahan.';
                                if (xhr.status === 404) {
                                    errorMessage = 'Perusahaan tidak ditemukan.';
                                }
                                Swal.fire({
                                    title: 'Error!',
                                    text: errorMessage,
                                    icon: 'error',
                                    timer: 3000,
                                    showConfirmButton: false
                                });
                            }
                        });
                    }
                });
            });
        });
    </script>
@endsection
