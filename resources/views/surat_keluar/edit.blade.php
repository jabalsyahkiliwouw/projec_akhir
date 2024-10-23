@extends('layouts.navbar')
@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{$title}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.html">Home</a></li>
          <li class="breadcrumb-item">Surat Keluar</li>
          <li class="breadcrumb-item active">{{$title}}</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section">
      <div class="row">
        <div class="col-lg-12">

          <div class="card">
            <div class="card-body">
              <h5 class="card-title">{{$title}}</h5>

              <!-- General Form Elements -->
              <form class="row g-3" action="{{ route('surat_keluar.update', $suratKeluar->id_surat_keluar) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
              <div class="col-md-6 mb-2">
                  <label class="form-label" for="">Nomor Surat<abbr title="" style="color: black">*</abbr></label>
                  <input type="text" class="form-control" placeholder="Masukkan Nomor Surat disini...." name="nomor_surat" value="{{ $suratKeluar->nomor_surat}}">
              </div>
              <div class="col-md-6 mb-2">
                  <label class="form-label" for="">Penerima <abbr title="" style="color: black">*</abbr></label>
                  <input type="text" class="form-control" placeholder="Masukkan Penerima Surat disini...." name="penerima" value="{{ $suratKeluar->penerima}}">
              </div>
              <div class="col-md-6 mb-2">
                <label class="form-label" for="">Tanggal Surat <abbr title="" style="color: black">*</abbr></label>
                <input type="date" name="tanggal_surat" class="form-control" value="{{ $suratKeluar->tanggal_surat }}" required>
              </div>
              <div class="col-md-6 mb-2">
                  <label class="form-label" for="">Perihal <abbr title="" style="color: black">*</abbr></label>
                  <input type="text" class="form-control" placeholder="Masukkan Perihal disini...." name="perihal" value="{{ $suratKeluar->perihal}}">
              </div>
              <div class="col-12 mb-4">
                <label for="">Ringkasan </label>
                <textarea name="ringkasan" id="editor" cols="30" rows="10">{{ $suratKeluar->ringkasan }}</textarea>
              </div>
              <div class="col-md-12 mb-2">
                <label class="form-label" for="">File <abbr title="" style="color: black">*</abbr> </label>
                <input id="inputImg" type="file" accept="file/*" name="file_path" class="form-control">
              <button class="btn btn-success col-2 m-3" type="submit">Simpan</button>
              <a class="btn btn-warning col-2 m-3" href="{{route('surat_keluar.index')}}" >Batal</a>
            </form>

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