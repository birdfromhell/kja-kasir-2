@extends('layout.app')
@section('content')
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
                                    <button type="button" class="btn btn-outline-primary" data-toggle="modal" data-target="#tipeModal">Tambah</button>
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
                            }, 5000);
                        </script>
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
                            }, 5000);
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
                            }, 5000);
                        </script>
                    @endif

                    <div class="nk-block">
                        <div class="card card-bordered">
                            <div class="card-inner-group">
                                <div class="card-inner p-0">
                                    <div class="nk-tb-list">
                                        <div class="nk-tb-item nk-tb-head">
                                            <div class="nk-tb-col nk-tb-col-check">
                                                <div class="custom-control custom-control-sm custom-checkbox notext">
                                                    <input type="checkbox" class="custom-control-input" id="pid">
                                                    <label class="custom-control-label" for="pid"></label>
                                                </div>
                                            </div>
                                            <div class="nk-tb-col tb-col-sm"><span>Kode Kategori</span></div>
                                            <div class="nk-tb-col"><span>Kategori Barang</span></div>
                                            <div class="nk-tb-col nk-tb-col-tools">
                                                <ul class="nk-tb-actions gx-1 my-n1">
                                                    <li class="mr-n1">
{{--                                                        <div class="dropdown">--}}
{{--                                                            <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>--}}
{{--                                                            <div class="dropdown-menu dropdown-menu-right">--}}
{{--                                                                <ul class="link-list-opt no-bdr">--}}
{{--                                                                    <li><a href="#"><em class="icon ni ni-edit"></em><span>Edit Selected</span></a></li>--}}
{{--                                                                    <li><a href="#"><em class="icon ni ni-trash"></em><span>Remove Selected</span></a></li>--}}
{{--                                                                </ul>--}}
{{--                                                            </div>--}}
{{--                                                        </div>--}}
                                                    </li>
                                                </ul>
                                            </div>
                                        </div><!-- .nk-tb-item -->
                                        @foreach ($data as $row)
                                            <div class="nk-tb-item">
                                                <div class="nk-tb-col nk-tb-col-check">
                                                    <div class="custom-control custom-control-sm custom-checkbox notext">
                                                        <input type="checkbox" class="custom-control-input" id="pid{{ $row->id }}">
                                                        <label class="custom-control-label" for="pid{{ $row->id }}"></label>
                                                    </div>
                                                </div>
                                                <div class="nk-tb-col tb-col-sm">
                                                    <span class="tb-product">
                                                        <span class="title">{{ $row->kode_kategori }}</span>
                                                    </span>
                                                </div>
                                                <div class="nk-tb-col">
                                                    <span class="tb-sub">{{ $row->kategori_barang }}</span>
                                                </div>
                                                <div class="nk-tb-col nk-tb-col-tools">
                                                    <ul class="nk-tb-actions gx-1 my-n1">
                                                        <li class="mr-n1">
                                                            <div class="dropdown">
                                                                <a href="#" class="dropdown-toggle btn btn-icon btn-trigger" data-toggle="dropdown"><em class="icon ni ni-more-h"></em></a>
                                                                <div class="dropdown-menu dropdown-menu-right">
                                                                    <ul class="link-list-opt no-bdr">
                                                                        <li><a href="/kategori-edit/{{ $row->id }}"><em class="icon ni ni-edit"></em><span>Edit</span></a></li>
                                                                        <li><a href="/kategori-delete/{{ $row->id }}"><em class="icon ni ni-trash"></em><span>Delete</span></a></li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </li>
                                                    </ul>
                                                </div>
                                            </div><!-- .nk-tb-item -->
                                        @endforeach
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end">
                        {{ $data->links() }}
                    </div>

                    <div class="form-group row">
                        <div class="modal fade bd-example-modal-l" tabindex="-1" role="dialog" id="tipeModal">
                            <div class="modal-dialog modal-l" role="document">
                                <form action="/kategori-insert" method="POST">
                                    @csrf
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h5 class="modal-title">Tambah Kategori : </h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        </div>
                                        <div class="modal-body" id="akunBaruContainer">
                                            <div class="form-group row">
                                                <label class="control-label col-sm-2 align-self-center mb-0" for="kategori_barang">Kategori:</label>
                                                <div class="col-sm-10">
                                                    <input type="text" class="form-control" id="kategori_barang" name="kategori_barang" placeholder="Masukkan Kategori">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="submit" class="btn btn-primary" id="btnTambahAkun">Tambah</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>

                    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
                    <script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
                    <script>
                        $(document).ready(function() {
                            $(".edit-link").click(function(event) {
                                event.preventDefault();
                                var editUrl = $(this).attr("href");
                                Swal.fire({
                                    title: "Are you sure you want to edit?",
                                    icon: "question",
                                    showCancelButton: true,
                                    confirmButtonText: "Yes"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        window.location.href = editUrl;
                                    }
                                });
                            });

                            $(".delete-link").click(function(event) {
                                event.preventDefault();
                                var deleteUrl = $(this).attr("href");
                                Swal.fire({
                                    title: "Are you sure you want to delete?",
                                    text: "You won't be able to revert this!",
                                    icon: "warning",
                                    showCancelButton: true,
                                    confirmButtonColor: "#d33",
                                    confirmButtonText: "Yes, delete it!"
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        $.ajax({
                                            url: deleteUrl,
                                            type: "GET",
                                            success: function(response) {
                                                Swal.fire({
                                                    title: "Deleted!",
                                                    text: "The category has been deleted.",
                                                    icon: "success"
                                                }).then((value) => {
                                                    location.reload();
                                                });
                                            },
                                            error: function(xhr, status, error) {
                                                Swal.fire({
                                                    title: "Error!",
                                                    text: "Failed to delete the category: " + error,
                                                    icon: "error"
                                                });
                                                console.error(xhr.responseText);
                                            }
                                        });
                                    }
                                });
                            });
                        });
                    </script>

                    <script>
                        function filterTable() {
                            var input, filter, table, tr, td, i, txtValue;
                            input = document.getElementById("search");
                            filter = input.value.toUpperCase();
                            table = document.querySelector(".table");
                            tr = table.getElementsByTagName("tr");

                            for (i = 0; i < tr.length; i++) {
                                tdKodeKategori = tr[i].getElementsByTagName("td")[1];
                                tdKategoriBarang = tr[i].getElementsByTagName("td")[2];

                                if (tdKodeKategori && tdKategoriBarang) {
                                    txtValueKodeKategori = tdKodeKategori.textContent || tdKodeKategori.innerText;
                                    txtValueKategoriBarang = tdKategoriBarang.textContent || tdKategoriBarang.innerText;

                                    if (
                                        txtValueKodeKategori.toUpperCase().indexOf(filter) > -1 ||
                                        txtValueKategoriBarang.toUpperCase().indexOf(filter) > -1
                                    ) {
                                        tr[i].style.display = "";
                                    } else {
                                        tr[i].style.display = "none";
                                    }
                                }
                            }
                        }
                    </script>
                </div>
            </div>
        </div>
    </div>
@endsection
