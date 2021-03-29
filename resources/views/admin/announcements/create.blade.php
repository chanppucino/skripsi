@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route'=>'announcements.store', 'files'=>true]) }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Pengumuman</h3>
                    </div>
                    <div class="card-body">
                        @if(!empty($errors->all()))
                        <div class="alert alert-danger">
                            {{ Html::ul($errors->all())}}
                        </div>
                        @endif
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('title', 'Judul Pengumuman') }}
                                    {{ Form::text('title', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Judul Pengumuman']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                            {{ Form::label('subject', 'Perihal Pengumuman') }}
                            {{ Form::text('subject', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Perihal Pengumuman']) }}       
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('image', 'Gambar Pengumuman') }}
                                    {{ Form::file('imageFile', ['class'=>'form-control']) }}        
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                {{ Form::label('contents', 'Pengumuman') }}
                                {{ Form::textarea('contents', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Pengumuman', 'rows'=>5]) }}
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ URL::to('admin/announcements/index') }}" class="btn btn-outline-info">Kembali</a>
                        {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
                    </div>
                </div>
            <!-- </form> -->
            {{ Form::close() }}
        </div>
    </div>

@endsection