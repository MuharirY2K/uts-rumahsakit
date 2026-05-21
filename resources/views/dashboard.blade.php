{{-- resources/views/dashboard.blade.php --}}
@extends('layouts.app')

@section('title', 'Dashboard')
@section('page-title', 'Dashboard')

@section('content')

{{-- Baris Kartu Statistik --}}
<div class="row">

    {{-- Kartu: Total Poliklinik (Sepadan dengan Total Prodi) --}}
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-info shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-info text-uppercase mb-1">
                            Total Poliklinik
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $totalPoliklinik }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-clinic-medical fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Kartu: Total Dokter (Sepadan dengan Total Mahasiswa) --}}
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-primary shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                            Total Data Dokter
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $totalDokter }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-user-md fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- Kartu: Total Jadwal Praktik (Sepadan dengan Total Data Nilai) --}}
    <div class="col-xl-4 col-md-6 mb-4">
        <div class="card border-left-success shadow h-100 py-2">
            <div class="card-body">
                <div class="row no-gutters align-items-center">
                    <div class="col mr-2">
                        <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                            Total Jadwal Praktik
                        </div>
                        <div class="h5 mb-0 font-weight-bold text-gray-800">
                            {{ $totalJadwal }}
                        </div>
                    </div>
                    <div class="col-auto">
                        <i class="fas fa-calendar-alt fa-2x text-gray-300"></i>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

{{-- Tabel Dokter Terbaru (Sepadan dengan Mahasiswa Terbaru) --}}
<div class="card shadow mb-4">
    <div class="card-header py-3 d-flex justify-content-between align-items-center">
        <h6 class="m-0 font-weight-bold text-primary">
            <i class="fas fa-user-md mr-2"></i>Dokter Terbaru
        </h6>
        <a href="" class="btn btn-sm btn-primary">
            Lihat Semua
        </a>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered table-hover">
                <thead class="thead-light">
                    <tr>
                        <th>STR ID</th>
                        <th>Nama Dokter</th>
                        <th>Poliklinik</th>
                        <th>Tahun Bergabung</th>
                        <th>Status</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($dokterTerbaru as $doc)
                    <tr>
                        <td>{{ $doc->str_id }}</td>
                        <td>{{ $doc->nama }}</td>
                        <td>{{ $doc->poliklinik->kode_poli ?? '-' }}</td>
                        <td>{{ $doc->tahun_bergabung }}</td>
                        <td>
                            <span class="badge badge-{{
                                strtolower($doc->status) === 'aktif' ? 'success' :
                                (strtolower($doc->status) === 'cuti' ? 'warning' : 'danger')
                            }}">
                                {{ ucfirst($doc->status) }}
                            </span>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Belum ada data dokter terbaru.
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
</div>

@endsection
