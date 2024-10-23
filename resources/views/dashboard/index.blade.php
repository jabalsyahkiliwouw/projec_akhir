@extends('layouts.navbar')
@section('content')
  <main id="main" class="main">

    <div class="pagetitle">
      <h1>Dashboard</h1>
      <nav>
        <ol class="breadcrumb">
          <li class="breadcrumb-item"><a href="index.php">Home</a></li>
          <li class="breadcrumb-item active">Dashboard</li>
        </ol>
      </nav>
    </div><!-- End Page Title -->

    <section class="section dashboard">
      <div class="row">

        <!-- Left side columns -->
        <div class="col-lg-12">
          <div class="row">

            <div class="col-lg-12 col-sm-12 col-md-3">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <img style="float: right" src="{{asset('assets/img/man-with-laptop-light.png')}}" alt="" height="140">
                  <h5 class="card-title">Selamat Datang </h5>
                  

                  <div class="d-flex align-items-center">
                    
                      <span class="text-success small pt-1 fw-bold">Selamat datang di website pengarsipan surat masuk dan keluar Desa Iha. Website ini dirancang khusus untuk mempermudah proses pengelolaan dan pengarsipan surat-menyurat di Kantor Desa Iha</span>

                  </div>
                </div>

              </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-3">
              <div class="card info-card sales-card">

                <div class="card-body">
                  <h5 class="card-title">Surat | Masuk</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-arrow-down"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$suratMasuk}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>

            <div class="col-lg-6 col-sm-6 col-md-3">
              <div class="card info-card sales-card">


                <div class="card-body">
                  <h5 class="card-title">Surat | Keluar</h5>

                  <div class="d-flex align-items-center">
                    <div class="card-icon rounded-circle d-flex align-items-center justify-content-center">
                      <i class="bi bi-journal-arrow-up"></i>
                    </div>
                    <div class="ps-3">
                      <h6>{{$suratKeluar}}</h6>

                    </div>
                  </div>
                </div>

              </div>
            </div>


          </div>
        </div><!-- End Left side columns -->


      </div>
    </section>

  </main><!-- End #main -->

@endsection
@section('script')
    
@endsection