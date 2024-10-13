@extends('layout.app')
@section('content')
<!-- content @s -->
<div class="nk-content">    
    <div class="container-fluid">
        <div class="nk-content-inner">
            <div class="nk-content-body">  
                <div class="nk-block-head nk-block-head-sm">     
                    <div class="nk-block-between">
                        <div class="nk-block-head-content">
                            <h3 class="nk-block-title page-title">Daftar Kategori</h3>
                        </div>
                        <div class="nk-block-head-content">
                            <div class="toggle-wrap nk-block-tools-toggle">
                                <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#relasiModal">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>

                @if (session('success'))
                    <div class="alert text-white bg-primary" role="alert">
                        <div class="iq-alert-text">{!! session('success') !!}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <script>
                        setTimeout(function() {
                            var alert = document.querySelector('.alert');
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 1000);
                    </script>
                @endif
                @if (session('error'))
                    <div class="alert text-white bg-primary" role="alert">
                        <div class="iq-alert-text">{!! session('error') !!}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                @endif
                @if (session('delete'))
                    <div class="alert text-white bg-danger" role="alert">
                        <div class="iq-alert-text">{!! session('delete') !!}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <script>
                        setTimeout(function() {
                            var alert = document.querySelector('.alert');
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 1000);
                    </script>
                @endif
                @if (session('update'))
                    <div class="alert text-white bg-info" role="alert">
                        <div class="iq-alert-text">{!! session('update') !!}</div>
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <i class="ri-close-line"></i>
                        </button>
                    </div>
                    <script>
                        setTimeout(function() {
                            var alert = document.querySelector('.alert');
                            if (alert) {
                                alert.style.display = 'none';
                            }
                        }, 1000);
                    </script>
                @endif
                <div class="nk-block">
                    <div class="card card-bordered">
                        <div class="card-inner-group">
                            <div class="card-inner p-0">
                                <table class="table">
                                    <thead class="thead-light">
                                        <tr style="background-color: #d3d3d3; color: #000000;">
                                            <th style="background-color: #d3d3d3; color: #000000;">#</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Kode Kategori</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Kategori Barang</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Stok</th>
                                            <th style="background-color: #d3d3d3; color: #000000;">Aksi</th>
                                            <th style="width: 50px; background-color: #d3d3d3; color: #000000;">
                                                <div class="dropdown" style="display: flex; align-items: center;">
                                                    <button class="btn btn-icon btn-trigger dropdown-toggle" data-toggle="dropdown" style="padding: 0;">
                                                        <em class="icon ni ni-more-v" style="transform: rotate(90deg);"></em>
                                                    </button>
                                                    <div class="dropdown-menu dropdown-menu-right">
                                                        <ul class="link-list-opt no-bdr">
                                                            <li><a href="{{ url('perusahaan/edit') }}"><em class="icon ni ni-edit"></em> Edit</a></li>
                                                            <li><a href="#"><em class="icon ni ni-trash"></em> Delete</a></li>
                                                            <li><a href="#"><em class="icon ni ni-file-text"></em> Print</a></li>
                                                            <li><a href="#"><em class="icon ni ni-download"></em> Download</a></li>
                                                        </ul>
                                                    </div>
                                                </div>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tr>
                                        <th scope="row">1</th>
                                        <td>001</td>
                                        <td>Contoh Barang</td>
                                        <td>3</td>
                                        <td>
                                            <button class="btn btn-primary btn-sm" onclick="window.location.href='{{ url('kategori/edit') }}'">
                                                <em class="icon ni ni-edit"></em>
                                            </button>
                                            <form action="{{ url('/kategori/1') }}" method="POST" style="display: inline;">
                                                @csrf
                                                @method('DELETE')
                                                <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Anda yakin ingin menghapus?')">
                                                    <em class="icon ni ni-trash"></em> 
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>

            <div class="d-flex justify-content-end">
                {{-- {{ $data->links() }} --}}
            </div>
            @include('kategori.create-new')
        </div>
    </div>
</div>
</div>

                <!-- Add jQuery and Bootstrap JS scripts -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        function showHidePlafon() {
            var jenisSelect = document.getElementById("jenis");
            var plafonDebit = document.getElementById("plafonDebit");
            var plafonKredit = document.getElementById("plafonKredit");

            if (jenisSelect.value === "Supplier") {
                plafonDebit.style.display = "block";
                plafonKredit.style.display = "none";
            } else if (jenisSelect.value === "Konsumen") {
                plafonDebit.style.display = "none";
                plafonKredit.style.display = "block";
            } else {
                plafonDebit.style.display = "none";
                plafonKredit.style.display = "none";
            }
        }

        function filterTable() {
            var input, filter, table, tr, td, i, txtValue;
            input = document.getElementById("search");
            filter = input.value.toUpperCase();
            table = document.querySelector(".table");
            tr = table.getElementsByTagName("tr");

            for (i = 0; i < tr.length; i++) {
                tdNamaPerusahaan = tr[i].getElementsByTagName("td")[1];
                tdJenis = tr[i].getElementsByTagName("td")[2];
                tdNamaPimpinan = tr[i].getElementsByTagName("td")[5];

                if (tdNamaPerusahaan && tdJenis && tdNamaPimpinan) {
                    txtValueNamaPerusahaan = tdNamaPerusahaan.textContent || tdNamaPerusahaan.innerText;
                    txtValueJenis = tdJenis.textContent || tdJenis.innerText;
                    txtValueNamaPimpinan = tdNamaPimpinan.textContent || tdNamaPimpinan.innerText;

                    if (
                        txtValueNamaPerusahaan.toUpperCase().indexOf(filter) > -1 ||
                        txtValueJenis.toUpperCase().indexOf(filter) > -1 ||
                        txtValueNamaPimpinan.toUpperCase().indexOf(filter) > -1
                    ) {
                        tr[i].style.display = "";
                    } else {
                        tr[i].style.display = "none";
                    }
                }
            }
        }
    </script>

                
@endsection