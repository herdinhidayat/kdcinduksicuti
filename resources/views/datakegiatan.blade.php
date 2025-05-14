@extends('layout.admin')
@push('css')
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css"
        integrity="sha512-3pIirOrwegjM6erE5gPSwkUzO+3cTjpnV9lexlNZqvupR64iZBnOOTiiLPb9M36zpMScbmUNIcHUqKD47M719g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
@endpush

@section('content')
    <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Data Induksi PT. Kaltim Diamond Coal</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Data Induksi PT. Kaltim Diamond Coal</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
        <div class="container">
            <a href="/tambahpegawai" class="btn btn-success mb-4">Tambah Induksi +</a>
            {{-- {{ Session::get('halaman_url') }} --}}

            <div class="row g-3 align-items-center mb-3">
                <div class="col-auto">
                    <form action="/pegawai" method="GET">
                        <input type="search" id="inputPassword6" name="search" class="form-control"
                            aria-describedby="passwordHelpInline" placeholder="Pencarian">
                    </form>
                </div>

                <div class="col-auto">
                    <a href="/exportpdf" class="btn btn-info">Export PDF</a>
                </div>
                <div class="col-auto">
                    <a href="/exportexcel" class="btn btn-success">Export Excel</a>
                </div>
                <div class="col-auto">
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                        Import Data
                    </button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                    aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal"
                                    aria-label="Close"></button>
                            </div>
                            <form action="/importexcel" method="POST" enctype="multipart/form-data">
                                @csrf

                                <div class="modal-body">
                                    <div class="form-group">
                                        <input type="file" name="file" required>
                                    </div>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                    <button type="submit" class="btn btn-primary">Save changes</button>
                                </div>
                        </div>
                        </form>
                    </div>
                </div>

            </div>
            <div class="row">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success" role="alert">
                        {{ $message }}
                    </div>
                @endif
                <table class="table table-bordered table-sm">
                    <thead>
                        <tr>
                            <th scope="col">No.</th>
                            <th scope="col">Nama Lengkap</th>
                            <th scope="col">Nik Karyawan</th>
                            <th scope="col">No. SID</th>
                            <th scope="col">Usia</th>
                            <th scope="col">Jabatan</th>
                            <th scope="col">Perusahaan</th>
                            <th scope="col">Jenis Kelamin</th>
                            <th scope="col">No. Handphone</th>
                            <th scope="col">Induksi HR</th>
                            <th scope="col">Induksi SHE</th>
                            <th scope="col">Foto</th>
                            <th scope="col">Dibuat</th>
                            <th scope="col">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @php
                            $no = 1;
                        @endphp
                        @foreach ($data as $index => $row)
                            <tr>
                                <th scope="row">{{ $index + $data->firstItem() }}</th>
                                <td>{{ $row->nama }}</td>
                                <td>{{ $row->nikkaryawan }}</td>
                                <td>{{ $row->sid }}</td>
                                <td>{{ $row->usia }}</td>
                                <td>{{ $row->jabatan }}</td>
                                <td>{{ $row->details->perusahaan }}</td>
                                <td>{{ $row->jeniskelamin }}</td>
                                <td>0{{ $row->nohp }}</td>
                                <td>{{ $row->induksihr }}</td>
                                <td>{{ $row->induksishe }}</td>
                                <td>
                                    <img src="{{ asset('fotoinduksi/' . $row->fotodokumen) }}" alt=""
                                        style="width: 40px;">
                                </td>
                                <td>{{ $row->created_at->diffForHumans() }}</td>
                                <td>
                                    <a href="/tampilkandata/{{ $row->id }}" class="btn btn-info">Edit</a>
                                    <a href="#" class="btn btn-danger delete" data-id="{{ $row->id }}"
                                        data-name="{{ $row->nama }}">Hapus</a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $data->links() }}
            </div>
        </div>

    </div>
@endsection

@push('scripts')
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script src="https://code.jquery.com/jquery-3.7.1.min.js"
        integrity="sha256-/JqT3SQfawRcv/BIHPThkBvs0OEvtFFmqPF/lYI/Cxo=" crossorigin="anonymous"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"
        integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
                                                                                                                                    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                                                                                                                                        integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
                                                                                                                                    </script>
                                                                                                                                    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                                                                                                                                        integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
                                                                                                                                    </script>
                                                                                                                                    -->
    {{-- </body> --}}

    <script>
        $('.delete').click(function() {
            var pegawaiid = $(this).attr('data-id');
            var nama = $(this).attr('data-name');


            Swal.fire({
                title: "Yakin?",
                text: "Kamu akan Hapus dengan nama " + nama + " ",
                icon: "warning",
                showCancelButton: true,
                confirmButtonColor: "#3085d6",
                cancelButtonColor: "#d33",
                confirmButtonText: "Oke, Hapus"
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "/delete/" + pegawaiid + " "
                    Swal.fire({
                        title: "Terhapus",
                        text: "Datamu Terhapus.",
                        icon: "success"
                    });
                }
            });
        });
    </script>

    <script>
        @if (Session::has('success'))
            toastr.success("{{ Session::get('success') }}")
        @endif
    </script>
@endpush
