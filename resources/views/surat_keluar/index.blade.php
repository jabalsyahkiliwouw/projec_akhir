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
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
                <div class="d-flex align-items-center">
                    <h5 class="card-title">{{$title}}</h5>
                    @if(Auth::user()->role == "user")
                    <a class="btn btn-sm btn-primary btn-round ms-auto" href="{{route('surat_keluar.create')}}"><i class="bi bi-plus-circle"></i> Tambah Data</a>
                    @endif
                  </div>  
                @if ($message = Session::get('sukses'))
                <div class="alert alert-success">
                    <p>{{ $message }}</p>
                </div>
                @endif
              <!-- Table with stripped rows -->
              <table class="table datatable">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>No Surat</th>
                    <th>Penerima</th>
                    <th>Tanggal Surat</th>
                    <th>Perihal</th>
                    <th>File</th>
                    <th>Aksi</th>
                  </tr>
                </thead>
                <tbody>
                    @foreach ($suratKeluar as $row)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $row->nomor_surat }}</td>
                        <td>{{ $row->penerima }}</td>
                        <td>{{ Carbon\Carbon::parse($row->tanggal_surat)->isoFormat('dddd')  }}, {{ $row->tanggal_surat }}</td>
                        <td>{{ $row->perihal }}</td>
                        <td><a class="btn btn-sm btn-success" href="{{ asset('file/surat_keluar/'.$row->file_path) }}" target="_blank">Lihat File</a></td>
                        <td>
                            <a href="{{ route('surat_keluar.show', $row->id_surat_keluar) }}" class="btn btn-info btn-sm"><i class="bi bi-eye-fill"></i> Lihat</a>
                            @if(Auth::user()->role == "user")
                            <a href="{{ route('surat_keluar.edit', $row->id_surat_keluar) }}" class="btn btn-primary btn-sm" style="display: inline-block"><i class="bi bi-pencil"></i> Ubah</i></a>
                            <form action="{{ route('surat_keluar.destroy', $row->id_surat_keluar) }}" method="POST" style="display: inline-block">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm btn-flat show_confirm"><i class="bi bi-trash"></i> Hapus</i></button>
                            </form>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
              </table>
              <!-- End Table with stripped rows -->

            </div>
          </div>

        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
