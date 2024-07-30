@extends('layouts.admin.app')
@extends('layouts.admin.dashboardNav')

@section('userActive')
active
@endsection

@section('admin-content')
<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Ubah Pengguna</h1>
    </div>
    <div class="section-body">
      
      <div class="row">
          <div class="col-12">
            <div class="card">
                <div class="card-body">
                  <form action="{{ route('users.update', $user->id) }}" method="POST">
                  @csrf
                  @method('PUT')
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Pengguna</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="name" value="{{ $user->name }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Password</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="password" name="password" value="{{ $user->password }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Alamat Email</label>
                    <div class="col-sm-12 col-md-7">
                      <input type="text" name="email" value="{{ $user->email }}" class="form-control">
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tipe Pengguna</label>
                    <div class="col-sm-12 col-md-7">
                      <select class="form-control selectric" name="type">
                        <option value="#">Pilih</option>
                        <option value="0">User</option>
                        <option value="1">Admin</option>
                      </select>
                    </div>
                  </div>
                  <div class="form-group row mb-4">
                    <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                    <div class="col-sm-12 col-md-7">
                      <button type="submit" class="btn btn-primary">Ubah Pengguna</button>
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