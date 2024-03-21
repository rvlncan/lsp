@extends('layouts.temp')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        Data Reservasi
                    </div>

                    <div class="card-body ">
                        <form method="get" action="{{ route('laporan') }}" class="form-inline">
                            <div class="form-group mb-2">
                                <label for="start" class="">Tanggal Mulai:</label>
                                <input type="date" class="form-control" id="start" name="start"
                                    placeholder="Tanggal Mulai" value="{{ old('start') }}">
                            </div>
                            <div class="form-group mx-sm-3 mb-2">
                                <label for="end" class="">Tanggal Selesai:</label>
                                <input type="date" class="form-control" id="end" name="end"
                                    placeholder="Tanggal Selesai" value="{{ old('end') }}">
                            </div>
                            <div class="form-group mb-2">
                                <label for="status" class="">Status:</label>
                                <select class="form-control" id="status" name="status">
                                    <option value="">-- Pilih Status --</option>
                                    <option value="pesan">Pesan</option>
                                    <option value="dibayar">Dibayar</option>
                                    <option value="selesai">Selesai</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-navy bg-gradient-navy mb-2">Filter</button>
                        </form>

                        <div class="table-responsive">
                            <table id="tlaporan" class="table table-striped table-bordered table-hover">
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
                                        <th>Status</th>
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
                                            <td>Rp. {{ number_format($value->harga) }}</td>
                                            <td>{{ $value->diskon }} %</td>
                                            <td>Rp. {{ number_format($value->nilai_diskon) }}</td>
                                            <td>Rp. {{ number_format($value->total_bayar) }}</td>
                                            <td>
                                                {{ $value->status_reservasi_wisata }}
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="8"></td>
                                        <td>Rp {{ number_format($data->sum('total_bayar')) }}</td>
                                        <td></td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
