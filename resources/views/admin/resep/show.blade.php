@extends('layouts.admin')
@section('styles')
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="float-start">
                        {{ __('Resep') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('resep.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <img src="{{ asset('storage/reseps/' . $resep->image) }}" class="w-100 rounded">
                    <hr>
                    <h4>{{ $resep->nama_resep }}</h4>
                    <p class="tmt-3">
                        {!! $resep->deskripsi !!}
                    </p>
                    <p class="tmt-3">
                        {!! $resep->langkah !!}
                    </p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
