@extends('admin/admin')
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Pengumuman HIMA FTI</h3>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="cart-title">
                                <h1>{{ $announcements['title'] }}</h1>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                                <p>{{\Carbon\Carbon::parse($announcements->date)->format('j F, Y')}}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="card-text">
                                <p>{{ $announcements['contents'] }}</p>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <img src="{{ asset('storage/'.$announcements['image']) }}"/>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection