@extends('admin/admin')

@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Pengumuman</h3>
            </div>
            @foreach($announcements as $announcements)
            <div class="card-body">
              <div class="row">
                <div class="timeline-item">
                  <h3 class="timeline-header" style="color:green"><a href="#">{{ $announcements['title'] }}</a></h3>
                  <p>{{\Carbon\Carbon::parse($announcements->date)->format('j F, Y')}}</p>
                    <div class="timeline-body">
                      {{ Str::limit($announcements['contents'], 200) }}
                    </div>
                    <div class="timeline-footer">
                      <a class="btn btn-success btn-sm">Read more</a>
                    </div>
                </div>
              </div>
            </div>
            @endforeach
        </div>
    </div>
</div>

@endsection