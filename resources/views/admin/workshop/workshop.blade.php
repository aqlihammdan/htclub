@extends('layouts.admin.app')
@extends('layouts.admin.dashboardNav')

@section('workshopActive')
active
@endsection

@section('admin-content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Bengkel Rekomendasi</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Daftar Bengkel Rekomendasi</h4>
              </div>
              <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="mb-4"><a href="{{ route('workshops.create') }}" class="btn btn-success">Buat Bengkel Rekomendasi</a></div>
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>#</th>
                      <th>Kategori</th>
                      <th>Image</th>
                      <th>Nama Bengkel</th>
                      <th>Alamat</th>
                      <th>Deskripsi</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($workshops as $workshop)
                    <tr id="data_{{ $workshop->id }}">
                      <td>{{ ++$i }}</td>
                      <td>{{ $workshop->categories->category }}</td>
                      <td><img src="{{url('images/'.\App\Models\Workshop::select('image')->where('id', $workshop->id)->first()->image)}}" width="30%"></td>
                      <td>{{ $workshop->name }}</td>
                      <td>{{ $workshop->address }}</td>
                      <td>{{ $workshop->description }}</td>
                      <td>
                        <a href="{{ route('workshops.edit', $workshop->id) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger btn-delete-workshop" data-id="{{ $workshop->id }}">Delete</button>
                      </td>
                    </tr>
                    @endforeach
                    <div class="float-right">
                      <nav>
                          <ul class="pagination">
                              {{ $workshops->links() }}
                          </ul>
                      </nav>
                    </div>
                  </table>
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
    $('.btn-delete-workshop').on('click', function () {
      var workshopId = $(this).data('id');
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
              url: "{{ url('admin/workshop/delete') }}" + '/' + workshopId,
              success: function (data) {
                swal('Bengkel rekomendasi berhasil dihapus!', {
                  icon: 'success',
                });
                $("#data_" + workshopId).remove();
              },
              error: function (data) {
                swal('Error menghapus bengkel rekomendasi.');
                console.log(data);
              }
            });
          } else {
          swal('Bengkel Rekomendasi tidak dihapus!');
          }
      });
    });
  });
</script>
@endpush
