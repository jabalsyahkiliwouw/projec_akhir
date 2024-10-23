@extends('layouts.navbar')
@section('content')
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
                              <td>{{ $suratMasuk->nomor_surat }}</td>
                          </tr>
                          <tr>
                              <th>Pengirim</th>
                              <td>:</td>
                              <td>{{ $suratMasuk->pengirim }}</td>
                          </tr>
                          <tr>
                              <th>Tanggal Surat</th>
                              <td>:</td>
                              <td>{{ Carbon\Carbon::parse($suratMasuk->tanggal_surat)->isoFormat('dddd, D MMMM Y')  }}</td>
                          </tr>
                          <tr>
                              <th>Perihal</th>
                              <td>:</td>
                              <td>{{ $suratMasuk->perihal }}</td>
                          </tr>
                          <tr>
                              <th>Ringkasan</th>
                              <td>:</td>
                              <td>
                                @if ($suratMasuk->ringkasan)
                                    {!! $suratMasuk->ringkasan !!}
                                @else
                                    Tidak Ada
                                @endif
                              </td>
                          </tr>
                          <tr>
                              <th>File Surat</th>
                              <td>:</td>
                              <td><a class="btn btn-ms btn-success" href="{{ asset('file/surat_masuk/'.$suratMasuk->file_path) }}" target="_blank">Lihat File</a></td>
                          </tr>
                        </table>
                        <a class="btn btn-sm btn-warning" href="{{route('surat_masuk.index')}}"><i class="bi bi-arrow-left-short"></i> Kembail</a>
                    </div>

                </div>
            </div>
        </div>
    </section>

  </main><!-- End #main -->

@endsection
@section('script')
<script>
  CKEDITOR.replace( 'editor', {
      filebrowserUploadMethod: 'form'
  });
</script>
@endsection