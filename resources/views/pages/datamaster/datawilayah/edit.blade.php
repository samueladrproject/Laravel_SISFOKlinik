@extends('layout.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-map-marked-alt"></i> <b>DATA WILAYAH</b></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Edit Data Wilayah</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ URL::to('data-wilayah/' . $specifiedData->id_wilayah) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="namaprovinsi" class="col-sm-3 col-form-label">Nama Provinsi</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('namaprovinsi') is-invalid @enderror"
                                        id="namaprovinsi" name="namaprovinsi"
                                        value="{{ old('namaprovinsi') ? old('namaprovinsi') : $specifiedData->nama_provinsi }}"
                                        autofocus>
                                    @error('namaprovinsi')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namakabupatenkota" class="col-sm-3 col-form-label">Nama Kabupaten/Kota</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control  @error('namakabupatenkota') is-invalid @enderror"
                                        id="namakabupatenkota" name="namakabupatenkota"
                                        value="{{ old('namakabupatenkota') ? old('namakabupatenkota') : $specifiedData->nama_kabupatenkota }}">
                                    @error('namakabupatenkota')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namakecamatan" class="col-sm-3 col-form-label">Nama Kecamatan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('namakecamatan') is-invalid @enderror"
                                        id="namakecamatan" name="namakecamatan"
                                        value="{{ old('namakecamatan') ? old('namakecamatan') : $specifiedData->nama_kecamatan }}">
                                    @error('namakecamatan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namakelurahan" class="col-sm-3 col-form-label">Nama Kelurahan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('namakelurahan') is-invalid @enderror"
                                        id="namakelurahan" name="namakelurahan"
                                        value="{{ old('namakelurahan') ? old('namakelurahan') : $specifiedData->nama_kelurahan }}">
                                    @error('namakelurahan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="kodepos" class="col-sm-3 col-form-label">Kode Pos</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('kodepos') is-invalid @enderror"
                                        id="kodepos" name="kodepos"
                                        value="{{ old('kodepos') ? old('kodepos') : $specifiedData->kode_pos }}">
                                    @error('kodepos')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ URL::to('data-wilayah') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-circle-arrow-left"></i>
                                    Kembali Ke Menu Data Wilayah
                                </a>
                                <div>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                        Edit Data
                                    </button>
                                    <button type="reset" class="btn btn-secondary">
                                        <i class="fa-solid fa-ban"></i>
                                        Reset Data
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
