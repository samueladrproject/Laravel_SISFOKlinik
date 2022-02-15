@extends('layout.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-first-aid"></i> <b>DATA OBAT</b></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Edit Data Obat</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ URL::to('data-obat/' . $specifiedData->id_obat) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="kodeobat" class="col-sm-2 col-form-label">Kode Obat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" id="kodeobat" name="kodeobat"
                                        value="{{ $specifiedData->kode_obat }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namaobat" class="col-sm-2 col-form-label">Nama Obat</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control  @error('namaobat') is-invalid @enderror"
                                        id="namaobat" name="namaobat"
                                        value="{{ old('namaobat') ? old('namaobat') : $specifiedData->nama_obat }}"
                                        autofocus>
                                    @error('namaobat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="hargaobat" class="col-sm-2 col-form-label">Harga</label>
                                <div class="input-group col-sm-10">
                                    <span class="input-group-text" id="hargaobat">Rp.</span>
                                    <input type="text" class="form-control @error('hargaobat') is-invalid @enderror"
                                        aria-label="hargaobat" aria-describedby="hargaobat" name="hargaobat" id="hargaobat"
                                        value="{{ old('hargaobat') ? old('hargaobat') : $specifiedData->harga_obat }}">
                                    @error('hargaobat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="stokobat" class="col-sm-2 col-form-label">Stok</label>
                                <div class="col-sm-10">
                                    <input type="number" class="form-control @error('stokobat') is-invalid @enderror"
                                        id="stokobat" name="stokobat"
                                        value="{{ old('stokobat') ? old('stokobat') : $specifiedData->stok }}">
                                    @error('stokobat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <label for="selectsatuan" class="col-sm-2 col-form-label">Satuan</label>
                                <div class="col-sm-10">
                                    <select class="form-select @error('selectsatuan') is-invalid @enderror"
                                        id="selectsatuan" name="selectsatuan">
                                        @if (old('selectsatuan') != null)
                                            <option disabled>Pilih salah satu...</option>
                                            <option value="Botol" {{ old('selectsatuan') == 'Botol' ? 'selected' : '' }}>
                                                Botol</option>
                                            <option value="Box" {{ old('selectsatuan') == 'Box' ? 'selected' : '' }}>Box
                                            </option>
                                            <option value="Strip" {{ old('selectsatuan') == 'Strip' ? 'selected' : '' }}>
                                                Strip</option>
                                        @else
                                            <option disabled>
                                                Pilih salah satu...</option>
                                            <option value="Botol"
                                                {{ $specifiedData->stok == 'Botol' ? 'selected' : '' }}>
                                                Botol</option>
                                            <option value="Box" {{ $specifiedData->stok == 'Box' ? 'selected' : '' }}>
                                                Box</option>
                                            <option value="Strip"
                                                {{ $specifiedData->stok == 'Strip' ? 'selected' : '' }}>
                                                Strip</option>
                                        @endif
                                    </select>
                                    @error('selectsatuan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ URL::to('data-obat') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-circle-arrow-left"></i>
                                    Kembali Ke Menu Data Obat
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
