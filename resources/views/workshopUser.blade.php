@extends('layouts.app')
@extends('layouts.dashboardNav')
@extends('layouts.dashboardItem')

@section('workshopActive')
active
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Bengkel Rekomendasi</h1>
      </div>

      <div class="section-body">
        <div class="row">
            <div class="col-12">
                @foreach ($workshopusers as $workshopuser)
                <div class="card">
                    <div class="card-body">
                        <h4>{{ $workshopuser->name }}</h4>
                        <p>Kategori : {{ $workshopuser->categories->category }}</p>
                        <img src="{{url('images/'.\App\Models\Workshop::select('image')->where('id', $workshopuser->id)->first()->image)}}" width="30%" class="mb-3">
                        <p>{{ $workshopuser->description }}</p>
                        <p>Alamat : {{ $workshopuser->address }}</p>
                    </div> 
                </div>
                @endforeach
                <div class="float-right">
                  <nav>
                      <ul class="pagination">
                          {{ $workshopusers->links() }}
                      </ul>
                  </nav>
                </div>
            </div>
        </div>
      </div>
    </section>
  </div>
@endsection
