@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h3>Detail Siswa</h3>
            <div>
            <div class="col-4 text-right">
                <button  class="btn btn-sm text-secondary" ddata-bs-toggle="modal" data-bs-target="#deletModal"><i class="fas fa-trash"></i></button>
            </div>
                <a href="{{ route('dashboard.siswa.edit', $siswa->id) }}" class="btn btn-primary">Edit</a>
                <form action="{{ route('dashboard.siswa.delete', $siswa->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus siswa ini?');">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Delete</button>
                </form>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-3 d-flex justify-content-center align-items-center flex-colum">
                    <img src="{{asset('storage/siswa/'.$siswa->pas_foto)}}" class="img-fluid" width=500px>
                </div>
                <div class="col-md-8">
                    <table class="table table-bordered">
                        <tr><th>No Daftar</th><td>{{ $siswa->no_daftar }}</td></tr>
                        <tr><th>NISN</th><td>{{ $siswa->nisn }}</td></tr>
                        <tr><th>NIK</th><td>{{ $siswa->nik }}</td></tr>
                        <tr><th>Nama</th><td>{{ $siswa->nama }}</td></tr>
                        <tr><th>Asal Sekolah</th><td>{{ $siswa->asal }}</td></tr>
                        <tr><th>Agama</th><td>{{ $siswa->agama }}</td></tr>
                        <tr><th>No KK</th><td>{{ $siswa->no_kk }}</td></tr>
                        <tr><th>Tempat, Tanggal Lahir</th><td>{{ $siswa->ttl }}</td></tr>
                        <tr><th>Alamat</th><td>{{ $siswa->alamat }}</td></tr>
                    </table>
                </div>
            </div>
        </div>
        <div class="modal fade" id="deleteModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <div class="modal-title">
                            <h5>Delete</h5>
                        </div>
                    </div>

        <div class="card-footer text-right">
            <a href="{{ route('dashboard.siswa') }}" class="btn btn-secondary">Kembali</a>
        </div>
    </div>
    
@endsection
