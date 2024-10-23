@extends('layouts.navbar')
@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>{{$title}}</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="{{route('dashboard.index')}}">Home</a></li>
          <li class="breadcrumb-item">Surat Masuk</li>
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
              @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Error!</strong> 
                        
                        <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                        </ul>
                    </div>
                    @endif
                    <form class="row g-3" action="{{ route('surat_masuk.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('POST')
                      <div class="col-md-6 mb-2">
                          <label class="form-label" for="">Nomor Surat<abbr title="" style="color: black">*</abbr></label>
                          <input type="text" class="form-control" placeholder="Masukkan Nomor Surat disini...." name="nomor_surat" value="{{ old('nomor_surat') }}">
                      </div>
                      <div class="col-md-6 mb-2">
                          <label class="form-label" for="">Pengirim <abbr title="" style="color: black">*</abbr></label>
                          <input type="text" class="form-control" placeholder="Masukkan Pengirim Surat disini...." name="pengirim" value="{{ old('pengirim') }}">
                      </div>
                      <div class="col-md-6 mb-2">
                          <label class="form-label" for="">Tanggal Surat <abbr title="" style="color: black">*</abbr></label>
                          <input type="date" name="tanggal_surat" class="form-control" required>
                      </div>
                      <div class="col-md-6 mb-2">
                          <label class="form-label" for="">Perihal <abbr title="" style="color: black">*</abbr></label>
                          <input type="text" class="form-control" placeholder="Masukkan Perihal disini...." name="perihal" value="{{ old('perihal') }}">
                      </div>
                      <div class="col-12 mb-4">
                        <label for="">Ringkasan </label>
                        <textarea name="ringkasan" id="editor" cols="30" rows="10">{{ old('ringkasan') }}</textarea>
                      </div>
                      <div class="col-md-12 mb-2">
                          <label class="form-label" for="">File <abbr title="" style="color: black">*</abbr> </label>
                          <input id="inputImg" type="file" accept="file/*" name="file_path" class="form-control">
                      </div>

                      <button class="btn btn-success col-2 m-3" type="submit">Simpan</button>
                      <a class="btn btn-warning col-2 m-3" href="{{route('surat_masuk.index')}}" >Batal</a>
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