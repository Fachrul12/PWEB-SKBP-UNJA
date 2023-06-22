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
              <li class="breadcrumb-item active">List Mahasiswa</li>
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
              
              <div class="panel panel-default">
                <div class="panel-head container-fluid" style="margin-top: 10px;">
                <div class="pull-right">
                <p>List Mahasiswa</p>
                </div>
                </div>
                <div class="panel-body">
                <table class="table table-striped">
                <thead>
                <tr>
                <th>No</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Nomor_wa</th>
                <th>Fakultas</th>
                <th>Prodi</th>
                <th>Tanggal Upload</th>
                <th colspan="3" style="text-align:center;">Aksi</th>
                </tr>
                </thead>
                
                <tbody>
                  @foreach ($skbps as $skbp)
                  @unless ($skbp->status == 'accepted' || $skbp->status == 'rejected')
              <tr>
                  <td>{{ $skbp->id }}</td>
                  <td>{{ $skbp->nama }}</td>
                  <td>{{ $skbp->email }}</td>
                  <td>{{ $skbp->nomor_wa }}</td>
                  <td>{{ $skbp->fakultas }}</td>
                  <td>{{ $skbp->prodi }}</td>
                  <td>{{ $skbp->created_at }}</td>
                  <td>
                    
                        <a href="http://localhost:8000/validasiSkbp/{{$skbp->id}}" >Pilih</button>
                    
                </td>
              </tr>
              @endunless
              @endforeach 
              
                  
                </tbody>
              </table>    
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