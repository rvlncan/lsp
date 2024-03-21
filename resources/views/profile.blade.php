@extends('layouts.temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h2>Akun Anda</h2>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-4">
                                <div class="card">
                                    <div class="card-body text-center">
                                        <img src="{{ asset('pp/' . Auth::user()->pelanggan->foto) }}" alt="Profile Image"
                                            class="rounded-circle mb-3" style="width: 150px;">
                                        <h4>{{ Auth::user()->name }}</h4>
                                        <p class="text-muted">{{ Auth::user()->username }}</p>
                                        <a href="{{ route('profile_hapus_pp') }}" class="btn btn-secondary w-100">
                                            <i class="fas fa-trash"></i> Hapus Foto
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8">
                                <div class="card">
                                    <div class="card-header">
                                        <h5>Edit Profile</h5>
                                    </div>
                                    <div class="card-body">
                                        <form method="POST" action="{{ route('profile') }}" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label for="name" class="form-label">Nama</label>
                                                <input type="text" class="form-control border-info" id="name" name="name"
                                                    value="{{ Auth::user()->pelanggan->nama_lengkap }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">No Hp</label>
                                                <input type="text" class="form-control border-info " id="no_hp" name="no_hp"
                                                    value="{{ Auth::user()->pelanggan->no_hp }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="username" class="form-label">Alamat</label>
                                                <textarea name="alamat" class="form-control border-info" id="" rows="3" required>{{ Auth::user()->pelanggan->alamat }}</textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="email" class="form-label">Email</label>
                                                <input type="email" class="form-control border-info" id="email" name="email"
                                                    value="{{ Auth::user()->email }}" required>
                                            </div>
                                            <div class="mb-3">
                                                <label for="image" class="form-label">Foto Profile (isi jika ingin
                                                    mengganti)</label>
                                                <input type="file" class="form-control border-info" id="image" name="foto">
                                            </div>
                                            <div class="mt-3">
                                                <input type="submit" class="btn btn-lightblue bg-gradient-lightblue w-100" value="Simpan">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
