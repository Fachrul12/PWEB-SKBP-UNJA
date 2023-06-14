@extends('mahasiswa.main.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Dashboard</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Dashboard</li>
            </ol>
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </div>
    <!-- /.content-header -->

    <!-- Main content -->
    <div class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-lg-12">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Surat Keterangan Bebas Pustaka</h3>
                </div>
              </div>
              <div class="card-body">
                <div class="d-flex">
                  <p class="d-flex flex-column">
                    <span>Surat Keterangan Bebas Pustaka adalah dokumen yang menyatakan 
                      bahwa seseorang tidak memiliki tunggakan atau keterlambatan pengembalian buku 
                      atau materi pustaka dari perpustakaan. Surat ini sering dibutuhkan untuk 
                      mendaftar di perpustakaan baru, perguruan tinggi, atau saat mengajukan pekerjaan 
                      terkait perpustakaan. Surat tersebut mencakup informasi tentang peminjam dan 
                      menyatakan bahwa tidak ada tunggakan atau keterlambatan pengembalian yang tercatat</span>
                  </p>
                </div>
                <!-- /.d-flex -->
                </div>
              </div>
            </div>
            
          </div>
         
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <!-- /.content -->
  </div>
  /.content-wrapper

 
<!-- ./wrapper -->
@endsection