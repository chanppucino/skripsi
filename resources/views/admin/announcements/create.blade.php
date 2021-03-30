@extends('admin/admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Tambah Pengumuman</h3>
            </div>
            <form action="{{ route('announcements.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    @if($errors->any())
                    <div class="alert alert-danger">
                        {{ $error }}
                    </div>
                    @endif
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Judul Pengumuman</label>
                                <input type="text" class="form-control" placeholder="Masukkan Judul Pengumuman">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <label>Perihal Pengumuman</label>
                            <input type="text" class="form-control" placeholder="Masukkan Perihal Pengumuman">
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Gambar Pengumuman</label>
                                <input type="file" class="form-control" placeholder="Masukkan Perihal Pengumuman">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <label>Pengumuman</label>
                            <textarea class="form-control" placeholder="Masukkan Pengumuman" cols="30" rows="5"></textarea>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <a href="{{ URL::to('admin/announcements/index') }}" class="btn btn-outline-info">Kembali</a>
                    <button type="submit" class="btn btn-primary float-right">Proses</button>
                </div>
            </form>
        </div>
    </div>
</div>

@endsection
