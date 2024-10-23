@extends('layouts.navbar')
@section('content')
{{-- <div class="container" style="margin-top: 70px;">
    <div class="page-inner">
        <div class="page-header">
            <h3 class="fw-bold mb-3">{{$title}}</h3>
            <ul class="breadcrumbs mb-3">
                <li class="nav-home">
                    <a href="#">
                    <i class="icon-home"></i>
                    </a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="{{route('surat_keluar.index')}}">Surat Keluar</a>
                </li>
                <li class="separator">
                    <i class="icon-arrow-right"></i>
                </li>
                <li class="nav-item">
                    <a href="#">{{$title}}</a>
                </li>
            </ul>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                <div class="card-body">
                    
                    <div class="card-body table table-responsive">
                        <table class="table table bordered">
                          <tr>
                              <th>Nomor Surat</th>
                              <td>:</td>
                              <td>{{ $suratKeluar->nomor_surat }}</td>
                          </tr>
                          <tr>
                              <th>Penerima</th>
                              <td>:</td>
                              <td>{{ $suratKeluar->penerima }}</td>
                          </tr>
                          <tr>
                              <th>Tanggal Surat</th>
                              <td>:</td>
                              <td>{{ $suratKeluar->tanggal_surat }}, {{ Carbon\Carbon::parse($suratKeluar->tanggal_surat)->isoFormat('dddd, D MMMM Y')  }}</td>
                          </tr>
                          <tr>
                              <th>Perihal</th>
                              <td>:</td>
                              <td>{{ $suratKeluar->perihal }}</td>
                          </tr>
                          <tr>
                              <th>Ringkasan</th>
                              <td>:</td>
                              <td>
                                @if ($suratKeluar->ringkasan)
                                    {!! $suratKeluar->ringkasan !!}
                                @else
                                    Tidak Ada
                                @endif
                              </td>
                          </tr>
                          <tr>
                              <th>File Surat</th>
                              <td>:</td>
                              <td><a class="btn btn-ms btn-success" href="{{ asset('file/surat_keluar/'.$suratKeluar->file_path) }}" target="_blank">Lihat File</a></td>
                          </tr>
                        </table>
                        <a class="btn btn-sm btn-warning" href="{{route('surat_keluar.index')}}"><i class="fas fa-arrow-left"></i> Kembail</a>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div> --}}

<main id="main" class="main">

    <div class="pagetitle">
      <h1>{{$title}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
          <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">{{ $title }}</h3>
                    </div>
                <div class="card-body">
                    
                    <div class="card-body table table-responsive">
                        <table class="table table bordered">
                          <tr>
                              <th>Nomor Surat</th>
                              <td>:</td>
                              <td>{{ $suratKeluar->nomor_surat }}</td>
                          </tr>
                          <tr>
                              <th>Penerima</th>
                              <td>:</td>
                              <td>{{ $suratKeluar->penerima }}</td>
                          </tr>
                          <tr>
                              <th>Tanggal Surat</th>
                              <td>:</td>
                              <td>{{ Carbon\Carbon::parse($suratKeluar->tanggal_surat)->isoFormat('dddd, D MMMM Y')  }}</td>
                          </tr>
                          <tr>
                              <th>Perihal</th>
                              <td>:</td>
                              <td>{{ $suratKeluar->perihal }}</td>
                          </tr>
                          <tr>
                              <th>Ringkasan</th>
                              <td>:</td>
                              <td>
                                @if ($suratKeluar->ringkasan)
                                    {!! $suratKeluar->ringkasan !!}
                                @else
                                    Tidak Ada
                                @endif
                              </td>
                          </tr>
                          <tr>
                              <th>File Surat</th>
                              <td>:</td>
                              <td><a class="btn btn-ms btn-success" href="{{ asset('file/surat_keluar/'.$suratKeluar->file_path) }}" target="_blank">Lihat File</a></td>
                          </tr>
                        </table>
                        <a class="btn btn-sm btn-warning" href="{{route('surat_keluar.index')}}"><i class="bi bi-arrow-left-short"></i> Kembail</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

@endsection
@section('script')
<script>
  document.getElementById('inputImg').addEventListener('change', function() {
      // Get the file input value and create a URL for the selected image
      var input = this;
      if (input.files && input.files[0]) {
          var reader = new FileReader();
          reader.onload = function(e) {
              document.getElementById('previewImg').setAttribute('src', e.target.result);
              document.getElementById('previewImg').classList.add("d-block");
          };
          reader.readAsDataURL(input.files[0]);
      }
  });
</script>
<script>
  CKEDITOR.replace( 'editor', {
      filebrowserUploadMethod: 'form'
  });
</script>
@endsection