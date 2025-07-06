@extends('layouts.matrix-admin.app')

@section('content')
    <div class="page-breadcrumb">
        <div class="row">
            <div class="col-12 d-flex no-block align-items-center">
                <h4 class="page-title">Beranda</h4>
                <div class="ml-auto text-right">
                    <nav aria-label="breadcrumb">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="#">Beranda</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
    </div>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <div class="card">
                    <center>
                        <img src="{{ asset('assets/images/images.png') }}" style="width: 50%">
                    </center>
                    <div class="card-body">
                      <h4 class="card-title">
                        <center><strong>Selamat Datang </strong><br> Di <br> Hotel Vila Shanti</center>
                      </h4>
                      <p class="card-text">
                        Alamat : Jl. Danau Tamblingan No.47, Sanur, Denpasar Selatan, Kota Denpasar, Bali 80001
                        <br>
                        Telepon: (0361) 288060
                      </p>
                    </div>
                  </div>
            </div>
        </div>
    </div>
@endsection
