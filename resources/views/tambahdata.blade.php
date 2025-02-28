@extends('layout.admin')

@section('content')

    <body>
        <br>
        <br>
        <h1 class="text-center mb-5 mt-5">Tambah Data Induksi</h1>

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertdata" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Lengkap</label>
                                    <input type="text" name="nama" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    @error('nama')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nik</label>
                                    <input type="text" name="nikkaryawan" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No. SID</label>
                                    <input type="text" name="sid" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Usia</label>
                                    <input type="number" name="usia" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jabatan</label>
                                    <input type="text" name="jabatan" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jenis Kelamin</label>
                                    <select class="form-select" name="jeniskelamin" aria-label="Default select example">
                                        <option selected>Pilih Jenis Kelamin</option>
                                        <option value="Laki-laki">Laki-Laki</option>
                                        <option value="Perempuan">Perempuan</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">No. Handphone</label>
                                    <input type="number" name="nohp" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    @error('nohp')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Masukkan Dokumen</label>
                                    <input type="file" name="fotodokumen" class="form-control">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Status Induksi HR</label>
                                    <select class="form-select" name="induksihr" aria-label="Default select example">
                                        <option selected>Pilih Status</option>
                                        <option value="Sudah">Sudah</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Status Induksi SHE</label>
                                    <select class="form-select" name="induksishe" aria-label="Default select example">
                                        <option selected>Pilih Status</option>
                                        <option value="Sudah">Sudah</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Perusahaan</label>
                                    <select class="form-select" name="id_details" aria-label="Default select example">
                                        <option selected>Pilih Status Perusahaan Detail</option>

                                        @foreach ($datadetail as $data)
                                            <option value={{ $data->id }}>{{ $data->perusahaan }}</option>
                                        @endforeach

                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Optional JavaScript; choose one of the two! -->

        <!-- Option 1: Bootstrap Bundle with Popper -->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
            integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
        </script>

        <!-- Option 2: Separate Popper and Bootstrap JS -->
        <!--
                                                                                                                                                                            <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"
                                                                                                                                                                                integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous">
                                                                                                                                                                            </script>
                                                                                                                                                                            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js"
                                                                                                                                                                                integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous">
                                                                                                                                                                            </script>
                                                                                                                                                                            -->
    </body>
@endsection
