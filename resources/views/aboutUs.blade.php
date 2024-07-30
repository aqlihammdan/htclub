@extends('layouts.app')
@extends('layouts.dashboardNav')
@extends('layouts.dashboardItem')

@section('aboutActive')
active
@endsection

@section('content')
<div class="main-content">
    <section class="section">
      <div class="section-header">
        <h1>Tentang Kami</h1>
      </div>

      <div class="section-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                  <div class="card-body">
                    <div class="text-center">
                      <h4>Hyundai Trajet Club</h4>
                      <img src="photo/logo.png" width="30%">
                    </div>
                    <p>Hyundai Trajet Club adalah merupakan salah satu komunitas Hyundai tertua dan terbesar yang resmi dibentuk sejak 2005 silam.  Awalnya hanya sekitar 4-5 orang yang sering  berbagi info soal mobil, mesin daan akhirnya kopdar di workshop spesialis Trajet. Dari situlah terbentuk wadah pecinta Trajet lantara memiliki visi dan misi yang sama. Hingga saat ini, tercatat sebanyak 1.152  member yang tersebar di seluruh Indonesia. Mulai dari pulau Jawa, Sumatra, Kalimantan, Sulawesi Bali dan Lombok dengan jumlah anggota paling banyak di Jabodetabek. Bahkan ada juga anggotanya yang bermukim di Timur Tengah, Korea dan Malaysia.</p>
                    <p>Karena jumlah anggotanya banyak, sistem kepengurusan terbagi-bagi seperti layaknya pemerintahan provinsi. “ Kami menggunakan sistem desentralisasi. Setiap wilayah memiliki kawil atau ketua wilayah.  Khusus untuk Jabotabek terbagi lagi atas beberapa chapter. Tiap chapter ada koordinator chapter yang harus melaporkan kegiatan mereka ada kawil. Tiap kawil melaporkan  kegiatan pada pengurus pusat,” jelas ketua umum HTC.</p>
                    <div class="text-center">
                      <a href="https://www.facebook.com/TrajetFamilyClubIndonesia/" class="btn btn-danger">Bergabung Dengan HTClub</a>
                    </div>
                  </div>
                </div>
              </div>
        </div>
      </div>
    </section>
  </div>
@endsection
