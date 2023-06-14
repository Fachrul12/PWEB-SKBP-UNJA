@extends('mahasiswa.main.main')
@section('content')
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <div class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-12">
            <h1 class="m-0">Riwayat</h1>
          </div><!-- /.col -->
          <div class="col-sm-12">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Riwayat</li>
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
                  <div class="d-flex">
                    <p class="d-flex flex-column">
                    <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>Periode</th>
                    <th>Tanggal Lapor</th>
                    <th>Tanggal Disetujui</th>
                    <th>Status</th>
                    <th>Dokumen</th>
                  </tr>
                  </thead>
                  @foreach ($skbps as $skbp)
              <tr>
                  <td>{{ $skbp->id }}</td>
                  <td>{{ $skbp->created_at }}</td>
                  <td>@if ($skbp->validasi_at)
                   {{ $skbp->validasi_at }}
                @else
                    Belum divalidasi
                @endif
                  </td>
                  <td>@if ($skbp->status == 'accepted')
                    Accepted
                @elseif ($skbp->status == 'rejected')
                    Rejected
                @else
                    Pending
                @endif
            </td>
            <td>
              @if ($skbp->file_skbp)
                  <a href="{{ $skbp->file_skbp }}">Unduh Dokumen</a>
              @else
                  Tidak ada dokumen
              @endif
          </td>
        </tr>
              @endforeach 
                    </table>     
                  
                     
                  </p>
                </div>
                <!-- /.d-flex -->

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
 
<!-- ./wrapper -->
@endsection