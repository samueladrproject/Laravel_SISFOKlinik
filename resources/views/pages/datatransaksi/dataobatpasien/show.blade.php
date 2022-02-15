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
                        <svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
                            <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
                            </symbol>
                            <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
                            </symbol>
                            <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
                                <path
                                    d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
                            </symbol>
                        </svg>

                        @if (session()->has('success'))
                            <div class="alert alert-success alert-dismissible d-flex align-items-center fade show"
                                role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                                    <use xlink:href="#check-circle-fill" />
                                </svg>
                                <div>
                                    {{ session('success') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif

                        @if (session()->has('error'))
                            <div class="alert alert-danger alert-dismissible d-flex align-items-center fade show"
                                role="alert">
                                <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                    <use xlink:href="#exclamation-triangle-fill" />
                                </svg>
                                <div>
                                    {{ session('error') }}
                                </div>
                                <button type="button" class="btn-close" data-bs-dismiss="alert"
                                    aria-label="Close"></button>
                            </div>
                        @endif
                        <a href="{{ URL::to('data-obat-pasien/create/' . $dataObatPasien['id_pasien']) }}"
                            class="btn btn-primary mb-3"><i class="fa-solid fa-plus"></i> Tambah Data Obat</a>
                        <style>
                            table.dataTable thead th {
                                border-bottom: 0;
                            }

                            table.dataTable.no-footer {
                                border-bottom: 0;
                            }

                        </style>

                        <table class="table table-bordered text-center mb-3">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="align-middle">No.</th>
                                    <th class="align-middle">Kode Obat</th>
                                    <th class="align-middle">Nama Obat</th>
                                    <th class="align-middle">Harga</th>
                                    <th class="align-middle">Jumlah Obat</th>
                                    <th class="align-middle">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($dataObatPasien['obat'] != null)
                                    @php
                                        $i = 1;
                                        $idx = 0;
                                    @endphp
                                    @foreach (json_decode($dataObatPasien['obat']) as $obatpasien)
                                        <tr>
                                            <td class="align-middle">{{ $i }}</td>
                                            <td class="align-middle">{{ $obatpasien->Kode_Obat }}</td>
                                            <td class="align-middle">{{ $obatpasien->Nama_Obat }}</td>
                                            <td class="align-middle">{{ $obatpasien->Harga }}</td>
                                            <td class="align-middle">{{ $obatpasien->Jumlah_Obat }}</td>
                                            <td>
                                                <form
                                                    action="{{ URL::to('data-obat-pasien/' . $dataObatPasien['id_pasien'] . '/' . $idx) }}"
                                                    method="post" class="d-inline">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger">
                                                        <i class="fa-solid fa-trash-can"></i>
                                                    </button>
                                                </form>
                                            </td>
                                        </tr>
                                        @php
                                            $i++;
                                            $idx++;
                                        @endphp
                                    @endforeach
                                @endif
                            </tbody>
                        </table>

                        <a href="{{ URL::to('data-tindakan-pasien/') }}" class="btn btn-primary">
                            <i class="fa-solid fa-circle-arrow-left"></i>
                            Kembali Ke Menu Data Obat Pasien
                        </a>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
