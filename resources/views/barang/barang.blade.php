@extends('layout.app')

@section('content')

<div class="nk-content">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block-head nk-block-head-sm">
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Daftar Barang</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#relasiModal">
                                    <em class="icon ni ni-plus text-purple"></em> Tambah Barang
                                </button>
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
                                            <th>Nama Barang</th>
                                            <th>Satuan</th>
                                            <th>Kategori</th>
                                            <th>Kelompok</th>
                                            <th>Harga Beli</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($userBarang as $row)
                                            <tr>
                                                <td>{{ $loop->iteration }}</td>
                                                <td><strong>{{ $row->nama_barang }}</strong></td>
                                                <td>{{ $row->satuan }}</td>
                                                <td>{{ $row->kategori->nama ?? 'N/A' }}</td>
                                                <td>{{ $row->kelompok->nama ?? 'N/A' }}</td>
                                                <td>Rp {{ number_format($row->harga_beli, 2) }}</td>
                                                <td>
                                                    <button class="btn btn-primary btn-sm" onclick="window.location.href='{{ url('app/barang/edit/' . $row->id) }}'">
                                                        <em class="icon ni ni-edit"></em>
                                                    </button>
                                                    
                                                    <form action="{{ url('/app/barang/delete/' . $row->id) }}" method="POST" class="delete-form" style="display: inline;">
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
                                {{ $userBarang->links() }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="d-flex justify-content-end">
                    {{ $userBarang->links() }}
                </div>

                @include('barang.create')
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
    $(document).ready(function() {
        $('.delete-button').on('click', function() {
            var form = $(this).closest('form');

            Swal.fire({
                title: 'Konfirmasi',
                text: "Apakah Anda yakin ingin menghapus barang ini?",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: form.attr('action'),
                        type: form.attr('method'),
                        data: form.serialize(),
                        success: function(response) {
                            Swal.fire({
                                title: 'Sukses!',
                                text: "Daftar barang telah dihapus.", // Pesan yang diperbarui
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
                                errorMessage = xhr.responseJSON.error || 'Barang tidak ditemukan.';
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
