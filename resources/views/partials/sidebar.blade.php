{{-- resources/views/partials/sidebar.blade.php --}}
<ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion"
    id="accordionSidebar">

    {{-- Brand --}}
    <a class="sidebar-brand d-flex align-items-center justify-content-center"
       href="{{ route('dashboard') }}">
        <div class="sidebar-brand-icon rotate-n-15">
            {{-- Mengubah ikon topi toga menjadi ikon rumah sakit --}}
            <i class="fas fa-hospital"></i>
        </div>
        {{-- Mengubah nama aplikasi --}}
        <div class="sidebar-brand-text mx-3">SimRS</div>
    </a>

    <hr class="sidebar-divider my-0">

    {{-- Menu: Dashboard
    <li class="nav-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dashboard') }}">
            <i class="fas fa-fw fa-tachometer-alt"></i>
            <span>Dashboard</span>
        </a>
    </li> --}}

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Data Master</div>

    {{-- Menu: Poliklinik
    <li class="nav-item {{ request()->routeIs('poliklinik.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('poliklinik.index') }}">
            <i class="fas fa-fw fa-clinic-medical"></i>
            <span>Poliklinik</span>
        </a>
    </li> --}}

    {{-- Menu: Dokter (Sepadan dengan Mahasiswa)
    <li class="nav-item {{ request()->routeIs('dokter.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('dokter.index') }}">
            <i class="fas fa-fw fa-user-md"></i>
            <span>Data Dokter</span>
        </a>
    </li> --}}

    <hr class="sidebar-divider">
    <div class="sidebar-heading">Pelayanan Medis</div>

    {{-- Menu: Jadwal Praktik (Sepadan dengan Nilai)
    <li class="nav-item {{ request()->routeIs('jadwal.*') ? 'active' : '' }}">
        <a class="nav-link" href="{{ route('jadwal.index') }}">
            <i class="fas fa-fw fa-calendar-alt"></i>
            <span>Jadwal Praktik</span>
        </a>
    </li> --}}

    <hr class="sidebar-divider d-none d-md-block">

    {{-- Sidebar Toggler --}}
    <div class="text-center d-none d-md-inline">
        <button class="rounded-circle border-0" id="sidebarToggle"></button>
    </div>

</ul>
