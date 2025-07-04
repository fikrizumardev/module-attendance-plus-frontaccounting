<?php
$page_security = 'SA_HR_ATTENDANCE_PLUS';
$path_to_root = "../../..";
include($path_to_root . "/includes/session.inc");

add_access_extensions();

page(_($help_context = "Attendance Entry"));

include_once($path_to_root . "/includes/ui.inc");

?>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<div class="container py-5">

    <!-- Card Import File -->
    <div class="card mb-4">
      <div class="card-header bg-primary text-white">
        <h5 class="mb-0">Import Attendance</h5>
      </div>
      <div class="card-body">
        <form action="/import-absensi" method="POST" enctype="multipart/form-data">
          <div class="mb-3">
            <label for="absensiFile" class="form-label">Select File (.xls, .xlsx, .csv)</label>
            <input class="form-control" type="file" id="absensiFile" name="absensi_file" required>
          </div>
          <button type="submit" class="btn btn-success">Upload</button>
        </form>
      </div>
    </div>

    <!-- Card Rekap Data Absensi -->
    <div class="card">
      <div class="card-header bg-secondary text-white">
        <h5 class="mb-0">Attendance Recap</h5>
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table class="table table-bordered table-hover">
            <thead class="table-dark">
              <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Tanggal</th>
                <th>Jam Masuk</th>
                <th>Jam Pulang</th>
                <th>Status</th>
              </tr>
            </thead>
            <tbody>
              <!-- Contoh data dummy -->
              <tr>
                <td>1</td>
                <td>Ahmad Sulaiman</td>
                <td>2025-07-04</td>
                <td>07:45</td>
                <td>16:10</td>
                <td>Hadir</td>
              </tr>
              <tr>
                <td>2</td>
                <td>Siti Rahmawati</td>
                <td>2025-07-04</td>
                <td>08:10</td>
                <td>16:00</td>
                <td>Terlambat</td>
              </tr>
              <!-- Tambahkan data dari server di sini -->
            </tbody>
          </table>
        </div>
      </div>
    </div>

</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

