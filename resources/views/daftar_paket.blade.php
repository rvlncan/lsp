@extends('layouts.temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data daftar paket
                        <button type="button" class="btn btn-lightblue bg-gradient-lightblue float-right" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i> Tambah Daftar Paket 
                        </button>
                    </div>

                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Paket</th>
                                        <th>Nama Paket Wisata</th>
                                        <th>Jumlah Peserta</th>
                                        <th>Harga Paket</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->nama_paket }}</td>
                                            <td>{{ $value->paket_wisata->nama_paket }}</td>
                                            <td>{{ $value->jumlah_peserta }}</td>
                                            <td>{{ $value->harga_paket }}</td>
                                            <td>
                                                <button type="button" class="btn btn-lightblue bg-gradient-lightblue" data-toggle="modal"
                                                    data-target="#update-{{ $value->id }}">
                                                    Edit
                                                </button>
                                                <a href="{{ route('daftar_paket-delete', $value->id) }}"
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
                <form action="{{ route('daftar_paket-tambah') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Daftar Paket</label>
                            <input type="text" class="form-control border-info" name="nama_paket" required>
                        </div>
                        <div class="form-group">
                            <label>Jumlah peserta</label>
                            <input type="number" class="form-control border-info" name="jumlah_peserta" required>
                        </div>
                        <div class="form-group">
                            <label>Harga paket</label>
                            <input type="number" class="form-control border-info" name="harga_paket" required>
                        </div>
                        <div class="form-group">
                            <label>Nama Paket Wisata</label>
                            <select name="id_paket_wisata" class="form-control border-info" required>
                                <option selected disabled>Pilih Paket Wisata</option>
                                @foreach ($paket_wisata as $k => $v)
                                    <option value="{{ $v->id }}">{{ $v->nama_paket }}</option>
                                @endforeach
                            </select>
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
                    <form action="{{ route('daftar_paket-update') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Daftar Paket</label>
                                <input type="text" class="form-control border-info" name="nama_paket"
                                    value="{{ $value->nama_paket }}" required>
                                <input type="hidden" name="id" value="{{ $value->id }}">
                            </div>
                            <div class="form-group">
                                <label>Jumlah pesetta</label>
                                <input type="number" class="form-control border-info " name="jumlah_peserta" value="{{ $value->jumlah_peserta }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Harga Paket</label>
                                <input type="number" class="form-control border-info" name="harga_paket" value="{{ $value->harga_paket }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Nama Paket Wisata</label>
                                <select name="id_paket_wisata" class="form-control border-info" required>
                                    <option selected disabled>Pilih Paket Wisata</option>
                                    @foreach ($paket_wisata as $k => $v)
                                        <option value="{{ $v->id }}" @if ($value->id_paket_wisata == $v->id) selected @endif>{{ $v->nama_paket }}</option>
                                    @endforeach
                                </select>
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
