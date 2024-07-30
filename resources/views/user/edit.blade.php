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
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Title</label>
                  <div class="col-sm-12 col-md-7">
                    <input type="text" class="form-control">
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Category</label>
                  <div class="col-sm-12 col-md-7">
                    <select class="form-control selectric">
                      <option>Tech</option>
                      <option>News</option>
                      <option>Political</option>
                    </select>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Content</label>
                  <div class="col-sm-12 col-md-7">
                    <textarea class="summernote"></textarea>
                  </div>
                </div>
                <div class="form-group row mb-4">
                  <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                  <div class="col-sm-12 col-md-7">
                    <button class="btn btn-primary">Publish</button>
                  </div>
                </div>
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
