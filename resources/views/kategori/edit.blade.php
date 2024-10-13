@extends('layout.main')
@section('content')
<div class="nk-content ">
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">
                <div class="nk-block nk-block-lg">
                    <div class="nk-block-head">
                        <div class="nk-block-head-content">
                            <h5 class="card-title">Edit Barang</h5>
                        </div>
                    </div>
                    <div class="row g-gs">
                        <div class="col-lg-6">
                            <div class="card h-100">
                                <div class="card-inner">
                                    <form action="#">
                                        <div class="form-group">
                                            <label class="form-label" for="full-name">Nama Barang</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="telepon"placeholder="Masukkan Nama Barang">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="email-address">Satuan</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="telepon"placeholder="Masukkan Satuan">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="phone-no">Kategori</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="telepon"placeholder="Masukkan Kategori">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="pay-amount">Kelompok Barang</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="telepon"placeholder="Masukkan Kelompok Barang">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="plafon-debit">Harga Beli</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="telepon"placeholder="Masukkan Harga Beli">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="telepon">Perusahaan</label>
                                            <div class="form-control-wrap">
                                                <input type="text" class="form-control" id="telepon"placeholder="Masukkan Nama Perusahaan">
                                                
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <button type="submit" class="btn btn-lg btn-primary">Update</button>
                                            <button type="reset" class="btn btn-lg btn-danger" style="margin-left: 10px;">
                                                <em class="icon ni ni-refresh"></em> Reset
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Komponen lain tetap tidak berubah -->
            </div>
        </div>
    </div>
</div>
@endsection
