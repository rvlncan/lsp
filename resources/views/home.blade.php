@extends('layouts.temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">Dashboard</div>

                    <div class="card-body">
                        <h2>Ayo Berwisata!</h2>
                        <p>Selamat datang di halaman dashboard. Berikut adalah beberapa tempat wisata yang mungkin bisa Anda kunjungi:</p>
                        <ul>
                            @forelse ($paket_wisata as $key => $value)
                                <li>{{ $value->nama_paket }}</li>
                            @empty
                                <li>Paket masih kosong</li>
                            @endforelse
                        </ul>
                        
                        <div id="image-slider" class="carousel slide" data-ride="carousel">
                            <!-- Indicators -->
                            <ol class="carousel-indicators">
                                <li data-target="#image-slider" data-slide-to="0" class="active"></li>
                                <li data-target="#image-slider" data-slide-to="1"></li>
                                <li data-target="#image-slider" data-slide-to="2"></li>
                            </ol>
                            
                            <!-- Slides -->
                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="wisata/yello.png" alt="Slide 1" class="d-block mx-auto">
                                </div>
                                <div class="carousel-item">
                                    <img src="wisata/beach.jpg" alt="Slide 2" class="d-block mx-auto">
                                </div>
                                <div class="carousel-item">
                                    <img src="wisata/beach.jpg" alt="Slide 3" class="d-block mx-auto">
                                </div>
                            </div>
                            
                            <!-- Controls -->
                            <a class="carousel-control-prev" href="#image-slider" role="button" data-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="sr-only">Previous</span>
                            </a>
                            <a class="carousel-control-next" href="#image-slider" role="button" data-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="sr-only">Next</span>
                            </a>
                        </div>

                        <!-- Script untuk mengatur autoplay -->
                        <script>
                            $(document).ready(function(){
                                $('.carousel').carousel({
                                    interval: 500, // Waktu ganti slide (dalam milidetik)
                                    pause: false, // Jeda otomatis saat hover
                                    wrap: true // Mengulang slide dari awal setelah mencapai slide terakhir
                                });
                            });
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
