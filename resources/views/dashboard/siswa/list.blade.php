@extends('layouts.dashboard')

@section('content')
     <div class="mb-2">
        <a href ="{{route('dashboard.siswa.create')}}" class="btn btn-primary">+ Siswa</a>
</div>
@if(session()->has('message'))
<div class="alert alert-success alert-dismissible fade show">
    <strong>{{session()->get('message')}}</strong>
    <button type="button" class="close" data-dismiss="alert">
    </button>
</div>
@endif
<div class="card">
    <div class="card-header">
        <div class="row">
            <div class="col-8 align-self-center">
                <h3>Siswa</h3>
            </div>
            <div class="col-4">
                <form   method="get" action="{{ route('dashboard.siswa') }}">
                    <div class="input-grup">
                        <input type="text" class="form-control form-control-sm" name="q" value="{{ $request['q'] ?? '' }}">
                        <div class="input-grup-append">
                            <button type="submit" class="btn btn-secondary btn-sm">Search</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div class="card-body p-0">
        @if($siswas->total())
            <table class="table table-bordered table-striped table-hoverf">
                <thead>
                    
        <tr>
            <th>no_daftar</th>
            <th>nama</th>
            <th>alamat</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        @foreach ($siswas as $siswa)
        <tr>
            <td>{{$siswa->no_daftar}}</td>
            <td>{{$siswa->nama}}</td>
            <td>{{$siswa->alamat}}</td>
            <td><a href="{{ route('dashboard.siswa.show', $siswa->id) }}" class="btn btn-success btn-sm"><i class="fas fa-eye"></i></a></td>
        </tr>
        @endforeach
    </tbody>
</table>
    {{ $siswas->links() }}
    @else
    <h5 class="text-center p-3">Belum ada data siswa</h5>
    @endif
</div>
</div>
@endsection

