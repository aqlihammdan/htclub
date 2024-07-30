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
        <h1>Beranda</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Apa permasalahan anda ?</h4>
              </div>
              <div class="card-body">
                @if ($errors->any())
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif
                <form action="{{ route('reports.store') }}" method="POST">
                  @csrf

                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                    <div class="col-sm-12 col-md-7">
                      <select class="form-control selectric" name="category_id">
                        <option value="#" disabled='disabled'>Pilih Kategori</option>
                        @foreach ($categories as $item)
                        <option value="{{ $item->id }}">{{ $item->category }}</option>   
                        @endforeach
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Judul</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="title" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                    <div class="col-sm-12 col-md-7">
                      <textarea class="summernote" name="description"></textarea>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                      <button class="btn btn-success">Buat Diskusi</button>
                    </div>
                  </div>

                </form>
              </div>
            </div>
          </div>
        </div>

        @if ($message = Session::get('success'))
            <div class="alert alert-success">
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Permasalahan lainnya</h4>
              </div>
              {{-- <div class="col-4">
                <select class="form-control selectric" name="" id="">
                  <option value="#">Semua</option>
                  @foreach ($categories as $item)
                    <option value="{{ $item->id }}">{{ $item->category }}</option>   
                  @endforeach
                </select>
              </div> --}}
              <br>
              @foreach ($reports as $report)
              <a href="{{ route('reports.show', $report->id) }}" style="text-decoration: none; color: black">
                <div class="card-body">
                  <h6>{{ $report->title }}</h6>
                  <p>{!! $report->description !!}</p>
                  <p>{{ $report->users->name }} - @ymddate($report->created_at) - {{ $report->categories->category }}</p>
                </div>
              </a>
              @endforeach
              <div class="float-right">
                <nav>
                    <ul class="pagination">
                        {{ $reports->links() }}
                    </ul>
                </nav>
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
