@extends('admin/admin')
@section('content')
<div class="row">
    <div class="col-12">
        {{ Form::model($announcements,['route'=>['announcements.update',$announcements['id']], 'files'=>true, 'method'=>'GET']) }}
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Ubah Pengumuman</h3>
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
                            {{ Form::text('title', $announcements['title'], ['class'=>'form-control', 'placeholder'=>'Masukkan Judul Pengumuman']) }}
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::label('subject', 'Perihal Pengumuman') }}
                            {{ Form::text('subject', $announcements['subject'], ['class'=>'form-control', 'placeholder'=>'Masukkan Perihal Pengumuman']) }}
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            {{ Form::hidden('imagePath',$announcements['image'])}}
                            {{ Form::label('image', 'Image') }}
                            {{ Form::file('imageFile', ['class'=>'form-control']) }}        
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        {{ Form::label('contents', 'Isi Pengumuman') }}
                        {{ Form::textarea('contents', $announcements['contents'], ['class'=>'form-control', 'placeholder'=>'Masukkan Pengumuman', 'rows'=>5]) }}
                    </div>
                </div>
            </div>
            <div class="card-footer">
                <a href="{{ URL::to('admin/announcements/index') }}" class="btn btn-outline-info">Back</a>
                {{ Form::submit('Proses', ['class' => 'btn btn-primary pull-right']) }}
            </div>
        </div>
        <!-- </form> -->
        {{ Form::close() }}
    </div>
</div>
@endsection