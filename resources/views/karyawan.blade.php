@extends('layouts.temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Karyawan
                        <button type="button" class="btn btn-lightblue bg-gradient-lightblue float-right" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i> Tambah Karyawan
                        </button>
                    </div>

                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Karyawan</th>
                                        <th>Alamat</th>
                                        <th>No HP</th>
                                        <th>Jabatan</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->nama_karyawan }}</td>
                                            <td>{{ $value->alamat }}</td>
                                            <td>{{ $value->no_hp }}</td>
                                            <td>{{ $value->jabatan }}</td>
                                            <td>
                                                <button type="button" class="btn btn-lightblue bg-gradient-lightblue" data-toggle="modal"
                                                    data-target="#update-{{ $value->id }}">
                                                    Edit
                                                </button>
                                                <a href="{{ route('karyawan-delete', $value->id) }}"
                                                    class="btn btn-navy bg-gradient-navy">Delete</a>
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
                <form action="{{ route('karyawan-tambah') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Karyawan</label>
                            <input type="text" class="form-control" name="name" required>
                        </div>
                        <div class="form-group">
                            <label>Email</label>
                            <input type="text" class="form-control" name="email" required>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="text" class="form-control" name="password" required>
                        </div>
                        <div class="form-group">
                            <label>Alamat</label>
                            <textarea name="alamat" class="form-control" required rows="3"></textarea>
                        </div>
                        <div class="form-group">
                            <label>No telp</label>
                            <input type="text" class="form-control" name="no_hp" required>
                        </div>
                        <div class="form-group">
                            <label>Jabatan</label>
                            <select name="jabatan" class="form-control" required>
                                <option selected disabled>Pilih jabatan</option>
                                <option value="administrasi">admin</option>
                                <option value="oprator">oprator</option>
                                <option value="pemilik">pemilik</option>
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
                    <form action="{{ route('karyawan-update') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Edit</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama Karyawan</label>
                                <input type="text" class="form-control" name="nama_karyawan"
                                    value="{{ $value->nama_karyawan }}" required>
                                <input type="hidden" name="id" value="{{ $value->id }}">
                            </div>
                            <div class="form-group">
                                <label>Alamat</label>
                                <textarea name="alamat" class="form-control" required rows="3">{{ $value->alamat }}</textarea>
                            </div>
                            <div class="form-group">
                                <label>No telp</label>
                                <input type="text" class="form-control" name="no_hp" value="{{ $value->no_hp }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Jabatan</label>
                                <select name="jabatan" class="form-control" required>
                                    <option selected disabled>Pilih jabatan</option>
                                    <option value="administrasi" @if($value->jabatan == "administrasi") selected @endif>admin</option>
                                    <option value="oprator" @if($value->jabatan == "oprator") selected @endif>oprator</option>
                                    <option value="pemilik" @if($value->jabatan == "pemilik") selected @endif>pemilik</option>
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
