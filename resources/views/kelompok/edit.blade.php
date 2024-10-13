@extends('layout.app')

@section('content')
<div class="container-fluid">
    <div class="nk-content-inner">
        <div class="nk-content-body">
            <div class="components-preview wide-md mx-auto">
                <div class="nk-block-head nk-block-head-lg wide-sm">
                    <div class="nk-block-head-content">
                        <div class="nk-block-head-sub">
                            <a class="back-to" href="{{ url('/app/kelompok') }}">
                                <em class="icon ni ni-arrow-left"></em>
                                <span>Back to Kelompok</span>
                            </a>
                        </div>
                        <div class="nk-block-des"></div>
                    </div>
                </div><!-- .nk-block-head -->
                <div class="nk-block nk-block-lg">
                    <div class="card card-bordered">
                        <div class="card-inner">
                            @if (session('error'))
                                <div class="alert text-white bg-primary" role="alert">
                                    <div class="iq-alert-text">{!! session('error') !!}</div>
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <i class="ri-close-line"></i>
                                    </button>
                                </div>
                            @endif
                            <form class="form-validate" id="formUpdateKelompok" action="{{ url('/kelompok-update/' . $kelompok->id) }}" method="POST">
                                @csrf
                                @method('PUT') <!-- Pastikan ini menggunakan PUT -->
                                <div class="row g-gs">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="kode_kategori">Kode Kategori</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="kode_kategori" name="kode_kategori" placeholder="Masukkan Kode Kategori" value="{{ $kelompok->kode_kategori }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label class="form-label" for="kelompok_barang">Kelompok Barang</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="kelompok_barang" name="kelompok_barang" placeholder="Masukkan Kelompok Barang" value="{{ $kelompok->kelompok_barang }}" required>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <button type="button" class="btn btn-primary" id="btnUpdateKelompok">Update</button>
                                            <button type="reset" class="btn btn-danger">Reset</button>
                                            <a href="{{ url('/app/kelompok') }}" class="btn btn-secondary">Kembali</a>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- .nk-block -->
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        $('#btnUpdateKelompok').click(function() {
            Swal.fire({
                title: "Do you want to save the changes?",
                showCancelButton: true,
                confirmButtonText: "Confirm",
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: $("#formUpdateKelompok").attr('action'),
                        type: "POST",
                        data: $("#formUpdateKelompok").serialize(),
                        success: function(response) {
                            Swal.fire({
                                title: 'Success',
                                icon: 'success',
                                text: 'Kelompok berhasil diperbarui!',
                            }).then(() => {
                                window.location.href = '{{ url('/app/kelompok') }}'; // Redirect setelah sukses
                            });
                        },
                        error: function(xhr) {
                            let errorMessage = 'Gagal memperbarui kelompok.';
                            if (xhr.status === 422) {
                                errorMessage = xhr.responseJSON.message || 'Ada kesalahan dalam input data.';
                            }
                            Swal.fire({
                                title: 'Error',
                                text: errorMessage,
                                icon: 'error'
                            });
                        }
                    });
                }
            });
        });
    });
</script>
@endsection
