@extends('layouts.admin.app')
@extends('layouts.admin.dashboardNav')

@section('homeActive')
active
@endsection

@section('admin-content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Perbarui Kategori</h1>
    </div>
    <div class="section-body">
      <div class="row">
          <div class="col-12">
            <div class="card">
              <form action="{{ route('categories.update', $category->id) }}" method="POST">
              @csrf
              @method('PUT')
      
              <div class="card-body">
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kategori</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="category" value="{{ $category->category }}" class="form-control" placeholder="Kategori">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                      <button type="submit" class="btn btn-primary">Edit</button>
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