@extends('layouts.admin.app')
@extends('layouts.admin.dashboardNav')

@section('homeActive')
active
@endsection

@section('admin-content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Buat Kategori</h1>
    </div>
    <div class="section-body">
      
      <div class="row">
          <div class="col-12">
            <div class="card">
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
                <form action="{{ route('categories.store') }}" method="POST">
                @csrf
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="category" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                      <button type="submit" class="btn btn-success">Buat</button>
                    </div>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
    </div>
  </section>
</div>
@endsection