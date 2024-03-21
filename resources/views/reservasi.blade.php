@extends('layouts.temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Reservasi
                        <button type="button" class="btn btn-lightblue bg-gradient-lightblue float-right" data-toggle="modal" data-target="#tambah">
                            Tambah Reservasi
                        </button>
                    </div>

                    <div class="card-body ">
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered table-hover">
                                <thead class="thead-inverse">
                                    <tr>
                                        <th>No</th>
                                        <th>Nama Pelanggan</th>
                                        <th>Nama Paket</th>
                                        <th>Tanggal Reservasi</th>
                                        <th>Jumlah Peserta</th>
                                        <th>Harga</th>
                                        <th>Diskon</th>
                                        <th>Nilai Diskon</th>
                                        <th>Total Bayar</th>
                                        <th>Bukti TF</th>
                                        <th>Status</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $key => $value)
                                        <tr>
                                            <td>{{ $key + 1 }}</td>
                                            <td>{{ $value->pelanggan->nama_lengkap }}</td>
                                            <td>{{ $value->daftar_paket->nama_paket }}</td>
                                            <td>{{ $value->tgl_reservasi_wisata }}</td>
                                            <td>{{ $value->jumlah_peserta }}</td>
                                            <td>{{ number_format($value->harga) }}</td>
                                            <td>{{ $value->diskon }} %</td>
                                            <td>{{ number_format($value->nilai_diskon) }}</td>
                                            <td>{{ number_format($value->total_bayar) }}</td>
                                            <td>
                                                @if ($value->status_reservasi_wisata != 'pesan')
                                                    <a href="{{ asset('bukti_tf/' . $value->file_bukti_tf) }}"
                                                        class="btn btn-primary" target="_blank">Lihat Bukti</a>
                                                @else
                                                    Menunggu Pembayaran
                                                @endif
                                            </td>
                                            <td>
                                                {{ $value->status_reservasi_wisata }}
                                            </td>
                                            <td>
                                                @if ($value->status_reservasi_wisata != 'selesai' && Auth::user()->karyawan)
                                                    <button type="button" class="btn btn-navy bg-gradient-navy" data-toggle="modal"
                                                        data-target="#update-{{ $value->id }}">
                                                        edit
                                                    </button>
                                                    <a href="{{ route('reservasi-delete', $value->id) }}"
                                                    class="btn btn-danger">Hapus</a>
                                                @endif
                                                @if (Auth::user()->pelanggan)
                                                    <button type="button" class="btn btn-navy bg-gradient-navy" data-toggle="modal"
                                                        data-target="#update-{{ $value->id }}">
                                                        Bayar
                                                    </button>
                                                @endif

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
                <form action="{{ route('reservasi-tambah') }}" method="post">
                    @csrf

                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Tambah</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        @if (Auth::user()->pelanggan)
                            <input type="hidden" name="id_pelanggan" value="{{ Auth::user()->pelanggan->id }}">
                        @else
                            <div class="form-group">
                                <label>Nama Pelanggan</label>
                                <select name="id_pelanggan" class="form-control" required>
                                    <option selected disabled>Pilih Pelanggan</option>
                                    @foreach ($pelanggan as $k => $v)
                                        <option value="{{ $v->id }}">{{ $v->nama_lengkap }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        @endif
                        <div class="form-group">
                            <label>Nama Daftar Paket</label>
                            <select name="id_daftar_paket" class="form-control" required>
                                <option selected disabled>Pilih Daftar Paket </option>
                                @foreach ($daftar_paket as $k => $v)
                                    <option value="{{ $v->id }}">{{ $v->nama_paket }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Tanggal reservasi</label>
                            <input type="datetime-local" class="form-control" name="tgl_reservasi_wisata" required>
                        </div>
                        <!-- <div class="form-group">
                            <label>Jumlah Peserta</label>
                            <input type="number" class="form-control" name="jumlah_peserta" required>
                        </div> -->
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-navy bg-gradient-navy" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn bbtn-lightblue bg-gradient-lightbluetn-primary">Simpan</button>
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
                    <form action="{{ route('reservasi-update') }}" method="post" enctype="multipart/form-data">
                        @csrf
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Pembayaran</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Jumlah peserta</label>
                                <input type="number" class="form-control" name="jumlah_peserta"
                                    value="{{ $value->jumlah_peserta }}" required>
                                <input type="hidden" name="id" value="{{ $value->id }}">
                            </div>
                            <div class="form-group">
                                <label>Tanggal reservasi</label>
                                <input type="datetime-local" class="form-control" name="tgl_reservasi_wisata"
                                    value="{{ date('Y-m-d', strtotime($value->tgl_reservasi_wisata)) }}" required>
                            </div>
                            <div class="form-group">
                                <label>Bukti TF sejumlah Rp. {{ number_format($value->total_bayar) }}</label>
                                <input type="file" class="form-control" name="file_bukti_tf">
                            </div>
                            <div class="form-group">
                                <label>Status</label>
                                <select name="status_reservasi_wisata" class="form-control" required>
                                    <option value="dibayar" selected>Dibayar</option>
                                    @if (Auth::user()->karyawan)
                                        <option value="selesai">Selesai</option>
                                    @endif
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
