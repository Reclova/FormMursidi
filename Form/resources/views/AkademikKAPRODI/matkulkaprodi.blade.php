
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>SAKURA | Dashboard</title>
  @include('AkademikKAPRODI.header')
  <style>
    /* Mengubah background seluruh halaman */
    body {
      background-color: #D8BFD8; /* Warna ungu pastel */
    }

    /* Mengubah background konten utama */
    .content-wrapper {
      background-color: #D8BFD8; /* Warna ungu pastel untuk konten utama */
    }
  </style>
</head>
<body class="hold-transition layout-top-nav layout-navbar-fixed layout-footer-fixed bg-ungubg">
<div class="wrapper">

  <!-- Navbar -->
@include('DashBKAPRODI.navbar')
  <!-- /.navbar -->
  
  <!-- Main Sidebar Container -->
  

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1 class="m-0">Akademik</h1>
          </div><!-- /.col -->
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="{{ route('kaprodidb') }}">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="container mt-5">
        <h2>Manajemen Mata Kuliah</h2>

        <!-- Tambah Mata Kuliah -->
        <h4 class="mt-4">Tambah Mata Kuliah</h4>
        <form method="POST" action="{{ route('mata_kuliah.store') }}">
            @csrf
            <div class="mb-3">
                <label for="kode_mk" class="form-label">Kode Mata Kuliah</label>
                <input type="text" class="form-control" id="kode_mk" name="kode_mk" required>
            </div>
            <div class="mb-3">
                <label for="nama_mk" class="form-label">Nama Mata Kuliah</label>
                <input type="text" class="form-control" id="nama_mk" name="nama_mk" required>
            </div>
            <div class="mb-3">
                <label for="sks" class="form-label">SKS</label>
                <input type="number" class="form-control" id="sks" name="sks" required>
            </div>
            <div class="mb-3">
                <label for="semester" class="form-label">Semester</label>
                <input type="number" class="form-control" id="semester" name="semester" required>
            </div>
            <div class="mb-3">
                <label for="jenis" class="form-label">Jenis</label>
                <select class="form-select" id="jenis" name="jenis" required>
                    <option value="wajib">Wajib</option>
                    <option value="pilihan">Pilihan</option>
                </select>
            </div>
            <div class="mb-3">
                <label for="program_studi_kode_prodi" class="form-label">Kode Program Studi</label>
                <input type="text" class="form-control" id="program_studi_kode_prodi" name="program_studi_kode_prodi" required>
            </div>
            <div class="mb-3">
                <label for="fakultas_kode_fakultas" class="form-label">Kode Fakultas</label>
                <input type="text" class="form-control" id="fakultas_kode_fakultas" name="fakultas_kode_fakultas" required>
            </div>
            <button type="submit" class="btn btn-primary">Tambah Mata Kuliah</button>
        </form>

        <!-- Daftar Mata Kuliah -->
        <h4 class="mt-5">Daftar Mata Kuliah</h4>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Kode MK</th>
                    <th>Nama MK</th>
                    <th>SKS</th>
                    <th>Semester</th>
                    <th>Jenis</th>
                    <th>Kode Prodi</th>
                    <th>Kode Fakultas</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($mataKuliah as $mk)
                    <tr>
                        <td>{{ $mk->kode_mk }}</td>
                        <td>{{ $mk->nama_mk }}</td>
                        <td>{{ $mk->sks }}</td>
                        <td>{{ $mk->semester }}</td>
                        <td>{{ $mk->jenis }}</td>
                        <td>{{ $mk->program_studi_kode_prodi }}</td>
                        <td>{{ $mk->fakultas_kode_fakultas }}</td>
                        <td>
                            <form action="{{ route('mata_kuliah.destroy', $mk->kode_mk) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menghapus?')">Hapus</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data mata kuliah.</td>
                    </ tr>
                @endforelse
            </tbody>
        </table>

  <!-- Control Sidebar -->
  @include('AkademikKAPRODI.controllersidebar')
  <!-- /.control-sidebar -->

  <!-- Main Footer -->
  <footer class="main-footer bg-ungu">
    <strong>Form Pengisian IRS &copy; 2024 <a href="https://SAKURAIRS.COM">SAKURA</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>SAKURA</b> 1.0
    </div>
  </footer>
</div>
<!-- ./wrapper -->

<!-- REQUIRED SCRIPTS -->
@include('AkademikKAPRODI.scriptdb')
</body>
</html>
