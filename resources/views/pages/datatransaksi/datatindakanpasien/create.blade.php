@extends('layout.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-file-medical"></i> <b>DATA TINDAKAN PASIEN</b></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Tambah Data Tindakan Pasien</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ URL::to('data-tindakan-pasien/create/' . $idData) }}" method="POST">
                            @csrf
                            <input type="hidden" name="idPasien" value="{{ $idData }}">
                            <div class="mb-5 row">
                                <label for="tindakan" class="col-sm-3 col-form-label">Tindakan</label>
                                <div class="col-sm-9">
                                    <select class="form-select @error('tindakan') is-invalid @enderror" id="tindakan"
                                        name="tindakan">
                                        @if (old('tindakan') != null)
                                            <option disabled>Pilih salah satu...</option>
                                            @foreach ($dataTindakan as $tindak)
                                                <option value="{{ $tindak->kode_tindakan }}"
                                                    {{ old('tindakan') == $tindak->kode_tindakan ? 'selected' : '' }}>
                                                    {{ $tindak->kode_tindakan . '-' . $tindak->nama_tindakan . '-' . $tindak->harga_layanan }}
                                                </option>
                                            @endforeach
                                        @else
                                            <option selected disabled>Pilih salah satu...</option>
                                            @foreach ($dataTindakan as $tindak)
                                                <option value="{{ $tindak->kode_tindakan }}">
                                                    {{ $tindak->kode_tindakan . '-' . $tindak->nama_tindakan . '-' . $tindak->harga_layanan }}
                                                </option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('tindakan')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ URL::to('data-tindakan-pasien/' . $idData) }}" class="btn btn-primary">
                                    <i class="fa-solid fa-circle-arrow-left"></i>
                                    Kembali Ke Menu Data Tindakan Pasien
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
