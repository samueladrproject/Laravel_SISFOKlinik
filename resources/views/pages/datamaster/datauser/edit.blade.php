@extends('layout.main')

@section('content-wrapper')
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800"><i class="fas fa-user"></i> <b>DATA USER</b></h1>
        </div>

        <div class="row">
            <div class="col-lg">
                <div class="card shadow mb-4">
                    <!-- Card Header - Dropdown -->
                    <div class="card-header py-3 d-flex flex-row align-items-center justify-content-between bg-primary">
                        <h6 class="m-0 font-weight-bold text-white">Edit Data User</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <form action="{{ URL::to('data-user/' . $savedData['id']) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <div class="mb-3 row">
                                <label for="username" class="col-sm-3 col-form-label">Username</label>
                                <div class="col-sm-9">
                                    <input type="text" class="form-control  @error('username') is-invalid @enderror"
                                        id="username" name="username"
                                        value="{{ old('username') ? old('username') : $savedData['username'] }}"
                                        autofocus>
                                    @error('username')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="password" class="col-sm-3 col-form-label">Password</label>
                                <div class="col-sm-9">
                                    <input type="password" class="form-control" id="password" name="password"
                                        value="{{ old('password') ? old('password') : $savedData['password'] }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="namauser" class="col-sm-3 col-form-label">Nama User</label>
                                <div class="col-sm-9">
                                    <input type="text" readonly disabled class="form-control-plaintext" id="namauser"
                                        name="namauser" value="{{ $savedData['name'] }}">
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="email" class="col-sm-3 col-form-label">Email</label>
                                <div class="col-sm-9">
                                    <input type="email" class="form-control  @error('email') is-invalid @enderror"
                                        id="email" name="email"
                                        value="{{ old('email') ? old('email') : $savedData['email'] }}">
                                    @error('email')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="mb-3 row">
                                <label for="role" class="col-sm-3 col-form-label">Role</label>
                                <div class="col-sm-9">
                                    <select class="form-select @error('role') is-invalid @enderror" name="role" id="role">
                                        @if (old('role') != null)
                                            <option disabled>Pilih salah satu...</option>
                                            @foreach ($roleName as $role)
                                                <option value="{{ $role->id_role }}"
                                                    {{ old('role') == $role->id_role ? 'selected' : '' }}>
                                                    {{ $role->nama_role }}</option>
                                            @endforeach
                                        @else
                                            <option disabled>
                                                Pilih salah satu...</option>
                                            @foreach ($roleName as $role)
                                                <option value="{{ $role->id_role }}"
                                                    {{ $savedData['id_role'] == $role->id_role ? 'selected' : '' }}>
                                                    {{ $role->nama_role }}</option>
                                            @endforeach
                                        @endif
                                    </select>
                                    @error('role')
                                        <div class="invalid-feedback">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                            </div>
                            <div class="d-flex justify-content-between">
                                <a href="{{ URL::to('data-user') }}" class="btn btn-primary">
                                    <i class="fa-solid fa-circle-arrow-left"></i>
                                    Kembali Ke Menu Data User
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
