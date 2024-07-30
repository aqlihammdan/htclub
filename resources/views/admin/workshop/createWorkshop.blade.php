@extends('layouts.admin.app')
@extends('layouts.admin.dashboardNav')

@section('workshopActive')
active
@endsection

@section('admin-content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Buat Bengkel Rekomendasi</h1>
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
                  <form action="{{ route('workshops.store') }}" method="POST" enctype="multipart/form-data">
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
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Bengkel</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="name" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="address" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Deskripsi</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="description" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Foto</label>
                    <div class="col-sm-12 col-md-7">
                      <div id="image-preview" class="image-preview">
                        <label for="image-upload" id="image-label">Choose File</label>
                        <input type="file" name="image" id="image-upload" />
                      </div>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                      <button type="submit" class="btn btn-success">Buat Post</button>
                    </div>
                  </div>
                </form>
                </div>
            </div>
          </div>
        </div>
    </div>
  </section>
</div>
@endsection