<div class="alert alert-info">
  <p>Hai <strong>{{ Session()->get('nama') }}</strong>, Selamat datang di Halaman Dashboard Administrator</p>
  
</div>
<hr>
<!-- Info boxes -->
<div class="row">
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box">
      <span class="info-box-icon bg-info elevation-1"><i class="fas fa-newspaper"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Kiriman Dibuat</span>
        <span class="info-box-number">
          <?php 
          $berita = DB::table('pengiriman')->get(); 
          echo $berita->count();
          ?>
          <small>Sudah dibuat</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-book"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">
          Kiriman Selesai
        </span>
        <span class="info-box-number">
        <?php 
          $berita = DB::table('pengiriman')->where('is_selesai','1')->get(); 
          echo $berita->count();
          ?>
          <small>Sudah Selesai</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->

  <!-- fix for small devices only -->
  <div class="clearfix hidden-md-up"></div>

  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-success elevation-1"><i class="fas fa-download"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Kiriman Sedang di Proses</span>
        <span class="info-box-number">
        <?php 
          $download = DB::table('pengiriman')->where('is_selesai','=','null')->get();
          echo $download->count();
          ?>
          <small>Pengiriman</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
  <div class="col-12 col-sm-6 col-md-3">
    <div class="info-box mb-3">
      <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-user"></i></span>

      <div class="info-box-content">
        <span class="info-box-text">Jumlah User</span>
        <span class="info-box-number">
        	<?php 
          $galeri = DB::table('users')->get(); 
          echo $galeri->count();
          ?>
          <small>User</small>
        </span>
      </div>
      <!-- /.info-box-content -->
    </div>
    <!-- /.info-box -->
  </div>
  <!-- /.col -->
</div>
