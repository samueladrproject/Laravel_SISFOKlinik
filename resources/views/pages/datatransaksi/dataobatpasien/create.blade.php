@extends('layout.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-file-medical"></i> <b>DATA OBAT PASIEN</b></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Tambah Data Obat Pasien</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ URL::to('data-obat-pasien/create/' . $idData) }}" method="POST">
                            @csrf
                            <input type="hidden" name="idPasien" value="{{ $idData }}">
                            <div class="mb-3 row">
                                <label for="obat" class="col-sm-3 col-form-label">Obat</label>
                                <div class="col-sm-9">
                                    <select class="form-select @error('obat') is-invalid @enderror" id="obat" name="obat">
                                        @if (old('obat') != null)
                                            <option disabled>Pilih salah satu...</option>
                                            @foreach ($dataObat as $obat)
                                                <option value="{{ $obat->kode_obat }}"
                                                    {{ old('obat') == $obat->kode_tindakan ? 'selected' : '' }}>
                                                    {{ $obat->kode_obat . '-' . $obat->nama_obat . '-' . $obat->harga_obat }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option selected disabled>Pilih salah satu...</option>
                                            @foreach ($dataObat as $obat)
                                                <option value="{{ $obat->kode_obat }}">
                                                    {{ $obat->kode_obat . '-' . $obat->nama_obat . '-' . $obat->harga_obat }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('obat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <label for="jumlahobat" class="col-sm-3 col-form-label">Jumlah Obat</label>
                                <div class="input-group col-sm-9">
                                    <input type="text" class="form-control @error('jumlahobat') is-invalid @enderror"
                                        name="jumlahobat" id="jumlahobat" value="{{ old('jumlahobat') }}">
                                    @error('jumlahobat')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ URL::to('data-obat-pasien/' . $idData) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-circle-arrow-left"></i>
                                    Kembali Ke Menu Data Obat Pasien
                                </a>
                                <div>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa-solid fa-floppy-disk"></i>
                                        Simpan Data
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
