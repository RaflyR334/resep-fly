@extends('layouts.admin')
@section('content')
<div class="row">
        <div class="col-12 col-xl-12">
            <div class="card m-3">
                <div class="card-body p-4">
                    <div class="d-flex flex-row justify-content-center">
                        <h1 class="card-title mb-1">Selamat Datang, {{ Auth::user()->name }}</h1>
                    </div>
                    <center>
                        <div class="d-flex flex-row justify-content-center">
                            <div class="col-12">
                                <h4 class="card-title mt-5">Selamat datang</h4>
                                <h4 class="card-title mt-2">Ini adalah halaman dashboard</h4>
                            </div>
                        </div>
                    </center>
                </div>
            </div>
        </div>
    </div>

    <center>
    <div class="row">
        <div class="col-sm-4 grid-margin">
            <div class="card m-3">
                <div class="card-body">
                    <h5>Jumlah Data Pengguna</h5>
                    <div class="row">
                        <div class="col-8 col-sm-12 col-xl-8 my-auto">
                            <div class="d-flex d-sm-block d-md-flex align-items-center">
                                <h2 class="mb-0">{{ $user }} Pengguna</h2>
                            </div>
                            <a href="{{ route('user.index') }}" class="btn btn-primary btn-sm mt-2">Lihat</a>
                        </div>
                        <div class="col-4 col-sm-12 col-xl-4 text-center text-xl-right">
                            <div class="icon icon-box-primary">
                                <span class="mdi mdi-bank icon-item"></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </center>




@endsection
