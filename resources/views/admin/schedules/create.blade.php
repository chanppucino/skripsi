@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            {{ Form::open(['route'=>'schedules.store', 'files'=>true]) }}
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title">Tambah Data Mahasiswa</h3>
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
                                    {{ Form::label('name', 'Nama') }}
                                    {{ Form::text('name', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Nama Mahasiswa']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('nim', 'NIM') }}
                                    {{ Form::text('nim', '', ['class'=>'form-control', 'placeholder'=>'Masukkan NIM Mahasiswa']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('date', 'Tanggal Konseling') }}
                                    {{ Form::text('date', '', ['class'=>'form-control', 'id'=>'date', 'name'=>'date', 'placeholder'=>'Masukkan Tanggal Konseling']) }}
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('time', 'Waktu Konseling') }}
                                    {{ Form::text('time', '', ['class'=>'form-control', 'id'=>'time', 'name'=>'time', 'placeholder'=>'Masukkan Waktu Konseling']) }}
                                </div>
                            </div>
                        </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    {{ Form::label('file', 'Foto') }}
                                    {{ Form::file('file', ['class'=>'form-control']) }}
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                {{ Form::label('contents', 'Deskripsi') }}
                                {{ Form::textarea('contents', '', ['class'=>'form-control', 'placeholder'=>'Masukkan Deskripsi', 'rows'=>5]) }}
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

    <script>
    $(document).ready(function() {
    $('#date').datepicker({
        format: 'dd-mm-yyyy',
        autoclose: true,
        });
    $('#time').datetimepicker({
        format: 'hh:mm:ss',
    });
    });
    </script>
@endsection
