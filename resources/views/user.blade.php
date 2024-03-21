@extends('layouts.temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data User
                        <button type="button" class="btn btn-lightblue bg-gradient-lightblue float-right" data-toggle="modal" data-target="#tambah">
                        <i class="fas fa-plus-circle"></i> Tambah User
                        </button>
                    </div>

                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Email</th>
                                        <th>Level</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->name }}</td>
                                            <td>{{ $value->email }}</td>
                                            <td>{{ $value->level }}</td>
                                            <td>{{ $value->aktif==1 ? 'aktif' : 'nonaktif' }}</td>
                                            <td>
                                                <button type="button" class="btn btn-lightblue bg-gradient-lightblue" data-toggle="modal"
                                                    data-target="#update-{{ $value->id }}">
                                                    Edit
                                                </button>
                                                <a href="{{ route('user-delete', $value->id) }}"
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
                <form action="{{ route('user-tambah') }}" method="post">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Nama user</label>
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
                            <label>Level</label>
                            <select name="level" class="form-control" required>
                                <option selected disabled>Pilih Level</option>
                                <option value="pelanggan">pelanggan</option>
                                <option value="admin">admin</option>
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
                    <form action="{{ route('user-update') }}" method="post">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Update</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama user</label>
                                <input type="text" class="form-control" name="name"
                                    value="{{ $value->name }}" required>
                                <input type="hidden" name="id" value="{{ $value->id }}">
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" class="form-control" name="email" value="{{ $value->email }}"
                                    required>
                            </div>
                            <div class="form-group">
                                <label>Level</label>
                                <select name="level" class="form-control" required>
                                    <option selected disabled>Pilih level</option>
                                    <option value="pelanggan" @if($value->level == "pelanggan") selected @endif>pelanggan</option>
                                    <option value="admin" @if($value->level == "admin") selected @endif>admin</option>
                                    <option value="oprator" @if($value->level == "oprator") selected @endif>oprator</option>
                                    <option value="pemilik" @if($value->level == "pemilik") selected @endif>pemilik</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Status Aktivasi</label>
                                <select name="aktif" class="form-control" required>
                                    <option selected disabled>Pilih status</option>
                                    <option value="0" @if($value->aktif == 0) selected @endif>nonaktif</option>
                                    <option value="1" @if($value->aktif == 1) selected @endif>aktif</option>
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
