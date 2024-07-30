@extends('layouts.app')
@extends('layouts.dashboardNav')

@section('homeActive')
active
@endsection

@push('css')
<link rel="stylesheet" href="{{ url('assets/modules/summernote/summernote-bs4.css') }}">
<link rel="stylesheet" href="{{ url('assets/modules/codemirror/lib/codemirror.css') }}">
<link rel="stylesheet" href="{{ url('assets/modules/codemirror/theme/duotone-dark.css') }}">
<link rel="stylesheet" href="{{ url('assets/modules/selectric/public/selectric.css') }}">
@endpush

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Detail Laporan</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>{{ $report->title }}</h4>
              </div>
              <div class="card-body">
                <p>{!! $report->description !!}</p>
                <p><b>{{ $report->users->name }}</b> - @ymddate($report->created_at) - {{ $report->categories->category }}</p>
              </div>
            </div>
            <div class="card">
              <div class="card-header">
                <h4>Komentar ({{$report->comments->count()}})</h4>
              </div>
              <div class="card-body ml-3">
                <div class="form-group">
                  <form action="{{ route('comments.store') }}" method="POST" >
                    @csrf
                    <div class="row">
                      <div class="col-sm-8">
                        <input type="hidden" name="reports_id" value="{{ $report->id }}">
                        <input type="text" name="comment" class="form-control">
                      </div>
                      <div class="col-sm-4">
                        <button class="btn btn-success">Komen</button>
                      </div>
                    </div>
                  </form>
                </div>
                @foreach ($report->comments as $comment)
                <p><b>{{ $comment->users->name }}</b> {{ $comment->comment }} <a href="/like/{{ $comment->id }}" class="text-danger"><i class="fas fa-heart"> <span>{{ $comment->likes->count() }}</span></i></a></p>
                @endforeach
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
@endsection

@push('js-lib')
<script src="{{ url('assets/modules/summernote/summernote-bs4.js') }}"></script>
<script src="{{ url('assets/modules/codemirror/lib/codemirror.js') }}"></script>
<script src="{{ url('assets/modules/codemirror/mode/javascript/javascript.js') }}"></script>
<script src="{{ url('assets/modules/selectric/public/jquery.selectric.min.js') }}"></script>
@endpush
