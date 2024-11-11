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
                        {{ __('Dashboard') }}
                    </div>
                    <div class="float-end">
                        <a href="{{ route('resep.index') }}" class="btn btn-sm btn-outline-primary">Kembali</a>
                    </div>
                </div>

                <div class="card-body">
                    <form action="{{ route('resep.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="mb-3">
                            <label class="form-label">Nama Resep</label>
                            <input type="text" class="form-control @error('nama_resep') is-invalid @enderror" name="nama_resep"
                                value="{{ old('nama_resep') }}" placeholder="resep Name" required>
                            @error('nama_resep')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Deskripsi</label>
                            <textarea class="form-control" class="form-control @error('deskripsi') is-invalid @enderror"
                                name="deskripsi" value="{{ old('deskripsi') }}" rows="3" placeholder="deskripsi"
                                required></textarea>
                            @error('deskripsi')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Langkah-langkah</label>
                            <textarea class="form-control" class="form-control @error('langkah') is-invalid @enderror"
                                name="langkah" value="{{ old('langkah') }}" rows="3" placeholder="langkah"
                                required></textarea>
                            @error('langkah')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="">Bahan</label>
                            <select name="bahan_id" id="" class="form-control">
                                @foreach ($bahan as $item)
                                    <option value="{{$item->id}}">{{ $item->nama_bahan }}</option>
                                    <option value="{{$item->id}}">{{ $item->deskripsi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="">Kategori</label>
                            <select name="kategori_id" id="" class="form-control">
                                @foreach ($kategori as $item)
                                    <option value="{{$item->id}}">{{ $item->nama_kategori }}</option>
                                    <option value="{{$item->id}}">{{ $item->deskripsi }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Image</label>
                            <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                value="{{ old('image') }}" required></input>
                            @error('image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>

                        <button type="submit" class="btn btn-sm btn-primary">Simpan</button>

                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@push('scripts')

@endpush
