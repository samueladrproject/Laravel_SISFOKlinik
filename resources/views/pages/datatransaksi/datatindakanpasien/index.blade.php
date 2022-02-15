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
                        <h6 class="m-0 font-weight-bold text-white">Kelola Data Tindakan Pasien</h6>
                    </div>
                    <!-- Card Body -->
                    <div class="card-body">
                        <style>
                            table.dataTable thead th {
                                border-bottom: 0;
                            }

                            table.dataTable.no-footer {
                                border-bottom: 0;
                            }

                        </style>

                        <table class="table table-bordered text-center">
                            <thead class="bg-primary text-white">
                                <tr>
                                    <th class="align-middle">No.</th>
                                    <th class="align-middle">Kode Pasien</th>
                                    <th class="align-middle">Nama Pasien</th>
                                    <th class="align-middle">Tindakan Pasien</th>
                                    <th class="align-middle">Tindakan</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $i = 1;
                                @endphp
                                @foreach ($dataPasien as $pasien)
                                    <tr>
                                        <td class="align-middle">{{ $i }}</td>
                                        <td class="align-middle">{{ $pasien->kode_pasien }}</td>
                                        <td class="align-middle">{{ $pasien->nama_pasien }}</td>
                                        <td class="align-middle">
                                            @if ($pasien->tindakan == '')
                                                {{ 'Data Masih Kosong' }}
                                            @else
                                                @php
                                                    $i = 1;
                                                @endphp
                                                @foreach (json_decode($pasien->tindakan) as $tindakanpasien)
                                                    <p class="m-0 p-0">
                                                        {{ $i . '. ' . $tindakanpasien->Kode_Tindakan . '-' . $tindakanpasien->Nama_Tindakan }}
                                                    </p>
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endforeach
                                            @endif
                                        </td>
                                        <td class="align-middle">
                                            </a><a href="{{ URL::to('data-tindakan-pasien/' . $pasien->id_pasien) }}"
                                                class="btn btn-primary"><i class="fa-solid fa-eye"></i>
                                            </a>
                                        </td>
                                    </tr>
                                    @php
                                        $i++;
                                    @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
