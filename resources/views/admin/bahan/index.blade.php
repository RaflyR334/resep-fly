@extends('layouts.admin')
@section('styles')
@endsection

@section('content')
<h4 class="py-3 mb-4"><span class="text-muted fw-light">Tables /</span> Bahan</h4>
<div class="card">
    <div class="card-header">
        <div class="float-start">
            <h5>Bahan</h5>
        </div>
        <div class="float-end">
            <a href="{{route('bahan.create')}}" class="btn btn-sm btn-primary">
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
                        <th>Nama Bahan</th>
                    </tr>
                </thead>
                <tbody class="table-border-bottom-0">
                    @php $i=1; @endphp
                    @foreach ($bahan as $data)
                    <tr>
                        <td>{{$i++}}</td>
                        <td>{{$data->nama_bahan}}</td>
                        <td>
                            <form action="{{route('bahan.destroy', $data->id)}}" method="post">
                                @csrf
                                @method('DELETE')
                                <a href="{{route('bahan.edit', $data->id)}}" class="btn btn-sm btn-warning">
                                    Edit
                                </a>
                                <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are You Sure?')">
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
