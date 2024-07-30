@extends('layouts.admin.app')
@extends('layouts.admin.dashboardNav')

@section('usersActive')
active
@endsection

@section('admin-content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Pengguna HTClub</h1>
      </div>

      <div class="section-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Daftar Pengguna HTClub</h4>
              </div>
              <div class="card-body">
                @if ($message = Session::get('success'))
                    <div class="alert alert-success">
                        <p>{{ $message }}</p>
                    </div>
                @endif
                <div class="mb-4"><a href="{{ route('users.create') }}" class="btn btn-success">Buat Pengguna Baru</a></div>
                <div class="table-responsive">
                  <table class="table table-bordered table-md">
                    <tr>
                      <th>#</th>
                      <th>Nama Pengguna</th>
                      <th>Alamat Email</th>
                      <th>Tipe Pengguna</th>
                      <th>Action</th>
                    </tr>
                    @foreach ($users as $user)
                    <tr id="data_{{ $user->id }}">
                      <td>{{ ++$i }}</td>
                      <td>{{ $user->name }}</td>
                      <td>{{ $user->email }}</td>
                      <td>{{ $user->type }}</td>
                      <td>
                        <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary">Edit</a>
                        <button class="btn btn-danger btn-delete-user" data-id="{{ $user->id }}">Delete</button>
                      </td>
                    </tr>
                    @endforeach
                  </table>
                  <div class="float-right">
                    <nav>
                        <ul class="pagination">
                            {{ $users->links() }}
                        </ul>
                    </nav>
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
    $('.btn-delete-user').on('click', function () {
      var userId = $(this).data('id');
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
              url: "{{ url('admin/users/delete') }}" + '/' + userId,
              success: function (data) {
                swal('Pengguna berhasil dihapus!', {
                  icon: 'success',
                });
                $("#data_" + userId).remove();
              },
              error: function (data) {
                swal('Error menghapus pengguna.');
                console.log(data);
              }
            });
          } else {
          swal('Pengguna tidak dihapus!');
          }
      });
    });
  });
</script>
@endpush
