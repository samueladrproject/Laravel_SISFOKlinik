@extends('layout.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-hand-holding-medical"></i> <b>DATA TINDAKAN</b></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Edit Data Tindakan</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ URL::to('data-tindakan/' . $specifiedData->id_tindakan) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="kodetindakan" class="col-sm-3 col-form-label">Kode Tindakan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('kodetindakan') is-invalid @enderror"
                                        id="kodetindakan" name="kodetindakan" value="{{ $specifiedData->kode_tindakan }}"
                                        readonly>
                                    @error('kodetindakan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namatindakan" class="col-sm-3 col-form-label">Nama Tindakan</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('namatindakan') is-invalid @enderror"
                                        id="namatindakan" name="namatindakan"
                                        value="{{ old('namatindakan') ? old('namatindakan') : $specifiedData->nama_tindakan }}"
                                        autofocus>
                                    @error('namatindakan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hargalayanan" class="col-sm-3 col-form-label">Harga Layanan</label>
                                <div class="input-group col-sm-9">
                                    <span class="input-group-text" id="hargalayanan">Rp.</span>
                                    <input type="text" class="form-control @error('hargalayanan') is-invalid @enderror"
                                        aria-label="hargalayanan" aria-describedby="hargalayanan" name="hargalayanan"
                                        id="hargalayanan"
                                        value="{{ old('hargalayanan') ? old('hargalayanan') : $specifiedData->harga_layanan }}">
                                    @error('hargalayanan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ URL::to('data-tindakan') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-circle-arrow-left"></i>
                                    Kembali Ke Menu Data Tindakan
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
