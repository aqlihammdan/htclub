@extends('layouts.admin.app')
@extends('layouts.admin.dashboardNav')

@section('homeActive')
active
@endsection
  
@section('admin-content')
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
                <h4>Daftar Kategori</h4>
              </div>
              <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="mb-4"><a href="{{ route('categories.create') }}" class="btn btn-success">Buat Kategori</a></div>
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>#</th>
                      <th>Kategori</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($categories as $category)
                    <tr id="data_{{ $category->id }}">
                      <td>{{ ++$i }}</td>
                      <td>{{ $category->category }}</td>
                      <td>
                        <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger btn-delete-kategori" data-id="{{ $category->id }}">Delete</button>
                      </td>
                    </tr>
                    @endforeach
                  </table>
                </div>
                <div class="float-right">
                  <nav>
                      <ul class="pagination">
                          {{ $categories->links() }}
                      </ul>
                  </nav>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
  </div>
  
@endsection

@push('admin-js-lib')
<script src="https://cdnjs.cloudflare.com/ajax/libs/sweetalert/2.1.2/sweetalert.min.js"></script>
@endpush

@push('admin-js')

<script>
  $(document).ready(function () {
    $.ajaxSetup({
          headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
          }
      });
    $('.btn-delete-kategori').on('click', function () {
      var categoryId = $(this).data('id');
      swal({
      title: 'Apakah Anda Yakin Menghapus Ini?',
      text: 'Sekali hapus, anda tidak dapat mengembalikannya!',
      icon: 'warning',
      buttons: true,
      dangerMode: true,
      })
        .then((willDelete) => {
          if (willDelete) {
            $.ajax({
              type: "DELETE",
              url: "{{ url('admin/home/delete') }}" + '/' + categoryId,
              success: function (data) {
                swal('Kategori berhasil dihapus!', {
                  icon: 'success',
                });
                $("#data_" + categoryId).remove();
              },
              error: function (data) {
                swal('Error menghapus kategori.');
                console.log(data);
              }
            });
          } else {
          swal('Kategori tidak dihapus!');
          }
      });
    });
  });
</script>
@endpush