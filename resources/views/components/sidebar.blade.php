<div id="sidebar" class="active">
  <div class="sidebar-wrapper active">
    <div class="sidebar-header">
      <div class="d-flex justify-content-between">
        <div class="logo">
          <a href="{{ url('/') }}" class="text-decoration-none">
            <h5 class="mb-0 text-primary">Portal Kinerja</h5>
          </a>
        </div>
        <div class="toggler">
          <a href="#" class="sidebar-hide d-xl-none d-block"><i class="bi bi-x bi-middle"></i></a>
        </div>
      </div>
    </div>
    <div class="sidebar-menu">
      <ul class="menu">
        <li class="sidebar-title ps-0">Menu Utama</li>

        <li class="sidebar-item active">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-grid-fill"></i>
            <span>Dashboard</span>
          </a>
        </li>

        <li class="sidebar-title ps-0">Manajemen Karyawan</li>

        <li class="sidebar-item">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-people-fill"></i>
            <span>Data Karyawan</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-person-badge-fill"></i>
            <span>Jabatan</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-building"></i>
            <span>Departemen</span>
          </a>
        </li>

        <li class="sidebar-title ps-0">Penilaian Kinerja</li>

        <li class="sidebar-item">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-list-check"></i>
            <span>Kriteria Penilaian</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-star-fill"></i>
            <span>Bobot Kriteria</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-file-text-fill"></i>
            <span>Input Nilai</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-calculator-fill"></i>
            <span>Perhitungan TOPSIS</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-trophy-fill"></i>
            <span>Hasil Perankingan</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-file-earmark-bar-graph"></i>
            <span>Laporan Kinerja</span>
          </a>
        </li>

        <li class="sidebar-title ps-0">Pengaturan</li>

        <li class="sidebar-item">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-gear-fill"></i>
            <span>Setting</span>
          </a>
        </li>

        <li class="sidebar-item">
          <a href="{{ url('/dashboard') }}" class='sidebar-link'>
            <i class="bi bi-person-fill"></i>
            <span>Pengguna</span>
          </a>
        </li>

      </ul>
    </div>
    <button class="sidebar-toggler btn x"><i data-feather="x"></i></button>
  </div>
</div>