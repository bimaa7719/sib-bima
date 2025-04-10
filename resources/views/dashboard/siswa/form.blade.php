@extends('layouts.dashboard')

@section('content')
    <div class="card">
        <div class="card-header">
            <div class="row">
                <div class="col-8 align-self-center">
                    <h3>Siswa</h3>
                </div>
                <div class="col-4 text-right">
                    <button class="btn btn-sm text-secondary" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</button><i class="fas fa-trash"></i></button>

                </div>
            </div>
        </div>

        <div class="card-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <form method="post" action="{{ route($url, $siswa->id ?? '') }}" enctype="multipart/form-data">
                        @csrf
                        @if(isset($siswa))
                            @method('put')
                        @endif
                        <div class="form-group">
                            <label for="no_daftar">no_daftar</label>
                            <input type="text" class="form-control"name="no_daftar" value="{{ $siswa->no_daftar ?? '' }}">
                            @error('no_daftar')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nisn">nisn</label>
                            <input type="text" class="form-control"name="nisn" value="{{ $siswa->nisn ?? '' }}">
                            @error('nisn')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nik">nik</label>
                            <input type="text" class="form-control"name="nik" value="{{ $siswa->nik ?? '' }}">
                            @error('nik')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="nama">nama</label>
                            <input type="text" class="form-control"name="nama" value="{{ $siswa->nama ?? '' }}">
                            @error('nama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="asal">asal</label>
                            <input type="text" class="form-control"name="asal" value="{{ $siswa->asal ?? '' }}">
                            @error('asal')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="agama">agama</label>
                            <input type="text" class="form-control"name="agama" value="{{ $siswa->agama ?? '' }}">
                            @error('agama')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="no_kk">no_kk</label>
                            <input type="text" class="form-control"name="no_kk" value="{{ $siswa->no_kk ?? '' }}">
                            @error('no_kk')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="ttl">ttl</label>
                            <input type="text" class="form-control"name="ttl" value="{{ $siswa->ttl ?? '' }}">
                            @error('ttl')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="alamat">alamat</label>
                            <input type="text" class="form-control"name="alamat" value="{{ $siswa->alamat ?? '' }}">
                            @error('alamat')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="pas_foto">pas_foto</label><div class="text-danger">*pas foto harus diisi</div>
                            <input type="file" class="form-control"name="pas_foto" value="">
                            @error('pas_foto')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div class="form-group mt-3">
                            <button type="button" onclick="window.history.back()" class="btn btn-sm btn-secondary me-2">Cancel</button>
                         <button type="submit" class="btn btn-success btn-sm">{{$button}}</button>
                        </div>
                    </form>
                </div>  
            </div>
        </div>
    </div>

    @if(isset($siswa))
    <div class="modal fade" id="deleteModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <div class="modal-title">
                        <h5>Delete</h5>
                    </div>
                </div>

                <div class="modal-body">
                    <p>Anda yakin ingin menghapus user {{ $siswa->nama }}</p>
                </div>

                <div class="modal-footer">
                    <form action="{{ url( 'dashboard/user/delete/'.$siswa->id) }}" method="post">
                        @csrf
                        @method('delete')
                        <button class="btn btn-sm btn-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endif

@endsection


