@extends('admin.main.main')
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
              <li class="breadcrumb-item active">Validasi</li>
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
          <div class="col-lg-10">
            <div class="card">
              <div class="card-header border-0">
                <div class="d-flex justify-content-between">
                  <h3 class="card-title">Surat Keterangan Bebas Pustaka</h3>
                </div>
              </div>
              <div class="card-body">
                <form id="myForm" action="{{ route('skbp.status') }}" method="POST">
                    <div class="d-flex">
                        <p class="d-flex flex-column">
                            <label for="name">Nama:</label>
                            <input type="text" id="name" name="name" value="{{ $selectedSkbp ? $selectedSkbp->nama : '' }}" readonly>
            
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" value="{{ $selectedSkbp ? $selectedSkbp->email : '' }}" readonly>
            
                            <label for="nomor">Nomor WA:</label>
                            <input type="text" id="nomor" name="nomor" value="{{ $selectedSkbp ? $selectedSkbp->nomor_wa : '' }}" readonly>

                            <label for="fakultas">Fakultas:</label>
                            <input type="text" id="fakultas" name="fakultas" value="{{ $selectedSkbp ? $selectedSkbp->fakultas : '' }}" readonly>

                            <label for="prodi">Program Studi:</label>
                            <input type="text" id="prodi" name="prodi" value="{{ $selectedSkbp ? $selectedSkbp->prodi : '' }}"  readonly>

                            <label for="ktm">File KTM:</label>
                            @if ($selectedSkbp && $selectedSkbp->ktm)
                                <a href="{{ $selectedSkbp->ktm }}">Unduh File KTM</a>
                            @else
                                <a>File KTM Tidak Ada</a>
                            @endif

                            <label for="spp">File SPP:</label>
                            @if ($selectedSkbp && $selectedSkbp->spp)
                                <a href="{{ $selectedSkbp->spp }}">Unduh File SPP</a>
                            @else
                                <a>File SPP Tidak Ada</a>
                            @endif
                          
                            <label for="file_skbp">File SKBP:</label>
                            <input type="file" name="file_skbp" id="file_skbp" accept=".pdf">


                        </p>
                    </div>
                    <!-- /.d-flex -->
                    <div class="d-flex flex-row justify-content-end">
                      <div class="ml-auto mx-2">
                          <button type="submit" class="btn btn-danger" disabled>Tolak</button>
                      </div>
                      <div class="mr-auto mx-2">
                          <button type="submit" class="btn btn-primary" disabled>Validasi</button>
                      </div>
                  </div>
                  
                  
                </form>
            </div>

          </div>
         
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </div>
    <script>
      document.getElementById('file_skbp').addEventListener('change', function() {
          var fileInput = document.getElementById('file_skbp');
          var tolakButton = document.querySelector('.btn-danger');
          var validasiButton = document.querySelector('.btn-primary');
  
          if (fileInput.files.length > 0) {
              tolakButton.disabled = true;
              validasiButton.disabled = false;
          } else {
              tolakButton.disabled = false;
              validasiButton.disabled = true;
          }
      });
  </script>  
    <!-- /.content -->
  </div>
 
<!-- ./wrapper -->
@endsection