@extends('layouts.admin')
@section('styles')
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Resep</h4>
<div class="card ">
    <div class="card-header">
        <div class="float-start">
            <h5>Resep</h5>
        </div>
        <div class="float-end">
            <a href="{{route('resep.create')}}" class="btn btn-sm btn-primary">
                Add
            </a>
        </div>
    </div>
    <div class="card-body">
        <div class="table-responsive text-nowrap">
            <table class="table" id="example">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Resep</th>
                        <th>Deskripsi</th>
                        <th>Langkah-langkah</th>
                        <th>Bahan</th>
                        <th>Kategori</th>
                        <th>Image</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php $i=1; @endphp
                    @foreach ($resep as $data)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$data->nama_resep}}</td>
                        <td>{{ $data->deskripsi }}</td>
                        <td>{{ $data->langkah }}</td>
                        <td>{{ $data->bahan->nama_bahan }}</td>
                        <td>{{ $data->kategori->nama_kategori }}</td>
                        <td>
                            <img src="{{ asset('/storage/reseps/' . $data->image) }}" class="rounded"
                                style="width: 150px">
                        </td>
                        <td>
                        <td>
                            <form action="{{route('resep.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{ route('resep.show', $data->id) }}"
                                                class="btn btn-sm btn-outline-dark">Show</a>
                                <a href="{{route('resep.edit', $data->id)}}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <button type="submit" class="btn btn-sm btn-danger"  onclick="return confirm('Are You Sure?')">
                                    Delete
                                </button>
                            </form>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection

@push('scripts')
@endpush
