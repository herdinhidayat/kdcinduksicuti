@extends('layout.admin')

@section('content')

    <body>
        <br>
        <br>
        <h1 class="text-center mb-5 mt-5">Tambah Data Kegiatan</h1>

        <div class="container">

            <div class="row justify-content-center">
                <div class="col-8">
                    <div class="card">
                        <div class="card-body">
                            <form action="/insertdata" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Nama Pelatihan</label>
                                    <input type="text" name="namapelatihan" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    {{-- @error('namapelatihan')
                                        <div class="alert alert-danger">{{ $message }}</div>
                                    @enderror --}}
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jadwal Kegiatan</label>
                                    <input type="date" name="jadwalkegiatan" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jam</label>
                                    <input type="text" name="jam" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jenis Kegiatan</label>
                                    <select class="form-select" name="jeniskegiatan" aria-label="Default select example">
                                        <option selected>Pilih Jenis Kegiatan</option>
                                        <option value="Online">Online</option>
                                        <option value="Offline">Offline</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Jenis</label>
                                    <select class="form-select" name="jenis" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <option value="Internal">Internal</option>
                                        <option value="Eksternal">Eksternal</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Link Zoom</label>
                                    <input type="text" name="linkzoom" class="form-control" id="exampleInputEmail1"
                                        aria-describedby="emailHelp">
                                    <p>jika hanya ID Meeting bisa diisi [ID ..... | Pass ....]</p>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Info</label>
                                    <select class="form-select" name="info" aria-label="Default select example">
                                        <option selected>Pilih</option>
                                        <option value="Selesai">Selesai</option>
                                        <option value="Belum">Belum</option>
                                    </select>
                                </div>
                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Masukkan Dokumen Peminjaman
                                        Ruangan/Kegiatan</label>
                                    <input type="file" name="fotodokumen" class="form-control">
                                </div>

                                <div class="mb-3">
                                    <label for="exampleInputEmail1" class="form-label">Instansi</label>
                                    <select class="form-select" name="id_penyelenggaras"
                                        aria-label="Default select example">
                                        <option selected>Pilih Instansi</option>

                                        @foreach ($datapenyelenggara as $data)
                                            <option value={{ $data->id }}>{{ $data->instansi }}</option>
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
