@extends('layout.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-hospital-user"></i> <b>DATA PEGAWAI</b></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Edit Data Pegawai</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ URL::to('data-pegawai/' . $specifiedData->id_data_pegawai) }}" method="post">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="nomorid" class="col-sm-3 col-form-label">Nomor ID</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('nomorid') is-invalid @enderror"
                                        id="nomorid" name="nomorid"
                                        value="{{ old('nomorid') ? old('nomorid') : $specifiedData->nomor_ID }}"
                                        autofocus>
                                    @error('nomorid')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namalengkappegawai" class="col-sm-3 col-form-label">Nama Lengkap Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="text"
                                        class="form-control  @error('namalengkappegawai') is-invalid @enderror"
                                        id="namalengkappegawai" name="namalengkappegawai"
                                        value="{{ old('namalengkappegawai') ? old('namalengkappegawai') : $specifiedData->nama_pegawai }}">
                                    @error('namalengkappegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamatpegawai" class="col-sm-3 col-form-label">Alamat Lengkap Pegawai</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('alamatpegawai') is-invalid @enderror"
                                        id="alamatpegawai" name="alamatpegawai"
                                        rows="3">{{ old('alamatpegawai') ? old('alamatpegawai') : $specifiedData->alamat_pegawai }}</textarea>
                                    @error('alamatpegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="nohppegawai" class="col-sm-3 col-form-label">No.HP Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('nohppegawai') is-invalid @enderror"
                                        id="nohppegawai" name="nohppegawai"
                                        value="{{ old('nohppegawai') ? old('nohppegawai') : $specifiedData->nohp_pegawai }}">
                                    @error('nohppegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jabatanpegawai" class="col-sm-3 col-form-label">Jabatan Pegawai</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('jabatanpegawai') is-invalid @enderror"
                                        id="jabatanpegawai" name="jabatanpegawai"
                                        value="{{ old('jabatanpegawai') ? old('jabatanpegawai') : $specifiedData->jabatan_pegawai }}">
                                    @error('jabatanpegawai')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ URL::to('data-pegawai') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-circle-arrow-left"></i>
                                    Kembali Ke Menu Data Pegawai
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
