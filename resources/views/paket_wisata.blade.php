@extends('layouts.temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Paket Wisata
                        <button type="button" class="btn btn-lightblue bg-gradient-lightblue float-right" data-toggle="modal" data-target="#tambah">
                            <i class="fas fa-plus-circle"></i> Tambah Paket Wisata
                        </button>
                    </div>

                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>Nama Paket</th>
                                        <th>Deskripsi</th>
                                        <th>Fasilitas</th>
                                        <th>itinarary</th>
                                        <th>Diskon</th>
                                        <th>foto1</th>
                                        <th>foto2</th>
                                        <th>foto3</th>
                                        <th>foto4</th>
                                        <th>foto5</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $value->nama_paket }}</td>
                                            <td>{{ $value->deskripsi }}</td>
                                            <td>{{ $value->fasilitas }}</td>
                                            <td>{{ $value->itinerary }}</td>
                                            <td>{{ $value->diskon }} %</td>
                                            <td><img src="{{ asset('wisata/' . $value->foto1) }}" alt=""
                                                    height="50px" width="50px"></td>
                                            <td><img src="{{ asset('wisata/' . $value->foto2) }}" alt=""
                                                    height="50px" width="50px"></td>
                                            <td><img src="{{ asset('wisata/' . $value->foto3) }}" alt=""
                                                    height="50px" width="50px"></td>
                                            <td><img src="{{ asset('wisata/' . $value->foto4) }}" alt=""
                                                    height="50px" width="50px"></td>
                                            <td><img src="{{ asset('wisata/' . $value->foto5) }}" alt=""
                                                    height="50px" width="50px"></td>
                                            <td>
                                                <button type="button" class="btn btn-lightblue bg-gradient-lightblue" data-toggle="modal"
                                                    data-target="#update-{{ $value->id }}">
                                                    Edit
                                                </button>
                                                <a href="{{ route('paket_wisata-delete', $value->id) }}"
                                                    class="btn btn-navy bg-gradient-navy">Hapus</a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="tambah" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
        aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <form action="{{ route('paket_wisata-tambah') }}" method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Paket Wisata</label>
                            <input type="text" class="form-control border-info" name="nama_paket" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="deskripsi" class="form-control border-info " required rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Fasilitas</label>
                            <input type="text" class="form-control border-info border-info " name="fasilitas" required>
                        </div>
                        <div class="form-group">
                            <label>Itinerary</label>
                            <textarea name="itinerary" class="form-control border-info " required rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>Diskon</label>
                            <input type="number" class="form-control border-info " step="0.01"  min="0.00" max="999999.99" name="diskon" required>
                        </div>
                        <div class="form-group">
                            <label>foto1</label>
                            <input type="file" class="form-control border-info " name="foto1" required>
                        </div>
                        <div class="form-group">
                            <label>foto2</label>
                            <input type="file" class="form-control border-info " name="foto2" required>
                        </div>
                        <div class="form-group">
                            <label>foto3</label>
                            <input type="file" class="form-control border-info " name="foto3" required>
                        </div>
                        <div class="form-group">
                            <label>foto4</label>
                            <input type="file" class="form-control border-info " name="foto4" required>
                        </div>
                        <div class="form-group">
                            <label>foto5</label>
                            <input type="file" class="form-control border-info " name="foto5" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-navy bg-gradient-navy" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-lightblue bg-gradient-lightblue">Simpan</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @foreach ($data as $key => $value)
        <div class="modal fade" id="update-{{ $value->id }}" tabindex="-1" role="dialog"
            aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
                <div class="modal-content">
                    <form action="{{ route('paket_wisata-update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Paket Wisata</label>
                                <input type="text" class="form-control border-info" name="nama_paket"
                                    value="{{ $value->nama_paket }}" required>
                                <input type="hidden" name="id" value="{{ $value->id }}">
                            </div>
                            <div class="form-group">
                                <label>Deskripsi</label>
                                <textarea name="deskripsi" class="form-control border-info" required rows="3">{{ $value->deskripsi }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Fasilitas</label>
                                <input type="text" class="form-control border-info" name="fasilitas" value="{{ $value->fasilitas }}" required>
                            </div>
                            <div class="form-group">
                                <label>Itinerary</label>
                                <textarea name="itinerary" class="form-control border-info" required rows="3">{{ $value->itinerary }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Diskon</label>
                                <input type="number" class="form-control border-info" step="0.01" min="0.00" max="999999.99" name="diskon" value="{{ $value->diskon }}" required>
                            </div>
                            <div class="form-group">
                                <label>foto1 (opsional)</label>
                                <input type="file" class="form-control border-info" name="foto1" >
                            </div>
                            <div class="form-group">
                                <label>foto2 (opsional)</label>
                                <input type="file" class="form-control border-info" name="foto2" >
                            </div>
                            <div class="form-group">
                                <label>foto3 (opsional)</label>
                                <input type="file" class="form-control border-info" name="foto3" >
                            </div>
                            <div class="form-group">
                                <label>foto4 (opsional)</label>
                                <input type="file" class="form-control border-info" name="foto4" >
                            </div>
                            <div class="form-group">
                                <label>foto5 (opsional)</label>
                                <input type="file" class="form-control border-info" name="foto5" >
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-navy bg-gradient-navy" data-dismiss="modal">Close</button>
                            <button type="submit" class="btn btn-lightblue bg-gradient-lightblue">Simpan</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
@endsection
