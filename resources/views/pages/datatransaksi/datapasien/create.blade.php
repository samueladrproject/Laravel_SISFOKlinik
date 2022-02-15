@extends('layout.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fa-solid fa-book-medical"></i> <b>DATA PASIEN</b></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Tambah Data Pasien</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ URL::to('data-pasien') }}" method="post">
                            @csrf
                            <div class="mb-3 row">
                                <label for="kodepasien" class="col-sm-3 col-form-label">Kode Pasien</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control" id="kodepasien" name="kodepasien"
                                        value="{{ $newkodepasien }}" readonly>
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namapasien" class="col-sm-3 col-form-label">Nama Pasien</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('namapasien') is-invalid @enderror"
                                        id="namapasien" name="namapasien" value="{{ old('namapasien') }}">
                                    @error('namapasien')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="alamatpasien" class="col-sm-3 col-form-label">Alamat Lengkap Pasien</label>
                                <div class="col-sm-9">
                                    <textarea class="form-control @error('alamatpasien') is-invalid @enderror"
                                        id="alamatpasien" name="alamatpasien"
                                        rows="3">{{ old('alamatpasien') }}</textarea>
                                    @error('alamatpasien')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="tanggallahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                <div class="col-sm-9">
                                    <input type="date" class="form-control  @error('tanggallahir') is-invalid @enderror"
                                        id="tanggallahir" name="tanggallahir" value="{{ old('tanggallahir') }}">
                                    @error('tanggallahir')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="jeniskelamin" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                <div class="col-sm-9">
                                    <select class="form-select @error('jeniskelamin') is-invalid @enderror"
                                        id="jeniskelamin" name="jeniskelamin">
                                        @if (old('jeniskelamin') != null)
                                            <option disabled>Pilih salah satu...</option>
                                            <option value="Laki - Laki"
                                                {{ old('jeniskelamin') == 'Laki - Laki' ? 'selected' : '' }}>
                                                Laki - Laki</option>
                                            <option value="Perempuan"
                                                {{ old('jeniskelamin') == 'Perempuan' ? 'selected' : '' }}>
                                                Perempuan
                                            </option>
                                        @else
                                            <option selected disabled>Pilih salah satu...</option>
                                            <option value="Laki - Laki">Laki - Laki</option>
                                            <option value="Perempuan">Perempuan</option>
                                        @endif
                                    </select>
                                    @error('jeniskelamin')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-5 row">
                                <label for="status" class="col-sm-3 col-form-label">Status</label>
                                <div class="col-sm-9">
                                    <select class="form-select @error('status') is-invalid @enderror" id="status"
                                        name="status">
                                        @if (old('status') != null)
                                            <option disabled>Pilih salah satu...</option>
                                            <option value="Single" {{ old('status') == 'Single' ? 'selected' : '' }}>
                                                Single</option>
                                            <option value="Menikah" {{ old('status') == 'Menikah' ? 'selected' : '' }}>
                                                Menikah
                                            </option>
                                            <option value="Duda" {{ old('status') == 'Duda' ? 'selected' : '' }}>
                                                Duda</option>
                                            <option value="Janda" {{ old('status') == 'Janda' ? 'selected' : '' }}>
                                                Janda</option>
                                        @else
                                            <option selected disabled>Pilih salah satu...</option>
                                            <option value="Single">Single</option>
                                            <option value="Menikah">Menikah</option>
                                            <option value="Duda">Duda</option>
                                            <option value="Janda">Janda</option>
                                        @endif
                                    </select>
                                    @error('status')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ URL::to('data-pasien') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-circle-arrow-left"></i>
                                    Kembali Ke Menu Data Pasien
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
