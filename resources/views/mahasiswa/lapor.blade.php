@extends('mahasiswa.main.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Lapor SKBP</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Lapor SKBP</li>
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
                <form id="myForm" action="{{ route('skbp.upload') }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  <div class="d-flex">
                    <p class="d-flex flex-column">     

                      <label for="nama">Nama:</label>
                      <input type="text" id="nama" name="nama" required>

                      <label for="email">Email:</label>
                      <input type="email" id="email" name="email" required>

                      <label for="nomor_wa">Nomor WA:</label>
                      <input type="text" id="nomor_wa" name="nomor_wa" required>

                      <label for="fakultas">Fakultas:</label>
                      <input type="text" id="fakultas" name="fakultas" required>

                      <label for="prodi">Prodi:</label>
                      <input type="text" id="prodi" name="prodi" required>

                      <label for="ktm">KTM:</label>
                      <input type="file" id="ktm" name="ktm" accept=".pdf" required>

                      <label for="spp">SPP:</label>
                      <input type="file" id="spp" name="spp" accept=".pdf" required>

                  </p>
                </div>
                <!-- /.d-flex -->
                <div class="d-flex flex-row justify-content-end">
                <button type="submit" class="btn btn-primary">Submit</button>
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
      function validateForm() {
        var name = document.getElementById("name").value;
        var nim = document.getElementById("nim").value;
        var email = document.getElementById("email").value;
        var nomor = document.getElementById("nomor").value;
        var fakultas = document.getElementById("fakultas").value;
        var prodi = document.getElementById("prodi").value;
        var spp = document.getElementById("spp").value;
        var ktm = document.getElementById("ktm").value;

        if (name === "" || nim === "" || email === "" || nomor === "" || fakultas === "" || prodi === "" || spp === "" || ktm === "") {
        alert("Mohon lengkapi semua data sebelum mengirimkan formulir.");
        return false;
        }
      }
    </script>
    <!-- /.content -->
  </div>
 
<!-- ./wrapper -->
@endsection