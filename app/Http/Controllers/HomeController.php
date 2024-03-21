<?php

namespace App\Http\Controllers;

use App\Models\DaftarPaket;
use App\Models\Karyawan;
use App\Models\PaketWisata;
use App\Models\Pelanggan;
use App\Models\Reservasi;
use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home', [
            'paket_wisata' => PaketWisata::get()
        ]);
    }
    public function karyawan()
    {
        return view('karyawan', [
            'data' => Karyawan::get()
        ]);
    }
    public function karyawan_tambah(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        if ($request->jabatan == 'administrasi') {
            $level = 'admin';
        } else {
            $level = $request->jabatan;
        }
        $u = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $level,
            'aktif' => 1
        ]);
        Karyawan::create([
            'nama_karyawan' => $request->name,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
            'id_user' => $u->id
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }
    public function karyawan_update(Request $request)
    {
        Karyawan::find($request->id)->update([
            'nama_karyawan' => $request->nama_karyawan,
            'alamat' => $request->alamat,
            'no_hp' => $request->no_hp,
            'jabatan' => $request->jabatan,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }
    public function karyawan_delete($id)
    {
        Karyawan::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }

    public function user()
    {
        return view('user', [
            'data' => User::get()
        ]);
    }

    public function user_tambah(Request $request)
    {
        $request->validate([
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
        ]);
        $u = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'level' => $request->level,
            'aktif' => 1
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }
    public function user_update(Request $request)
    {
        $u = User::find($request->id)->update([
            'name' => $request->name,
            'email' => $request->email,
            'level' => $request->level,
            'aktif' => $request->aktif
        ]);
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }
    public function user_delete($id)
    {
        User::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
    public function daftar_paket()
    {
        return view('daftar_paket', [
            'data' => DaftarPaket::get(),
            'paket_wisata' => PaketWisata::get(),
        ]);
    }

    public function daftar_paket_tambah(Request $request)
    {
        DaftarPaket::create([
            'nama_paket' => $request->nama_paket,
            'id_paket_wisata' => $request->id_paket_wisata,
            'jumlah_peserta' => $request->jumlah_peserta,
            'harga_paket' => $request->harga_paket,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }
    public function daftar_paket_update(Request $request)
    {
        DaftarPaket::find($request->id)->update([
            'nama_paket' => $request->nama_paket,
            'id_paket_wisata' => $request->id_paket_wisata,
            'jumlah_peserta' => $request->jumlah_peserta,
            'harga_paket' => $request->harga_paket,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }
    public function daftar_paket_delete($id)
    {
        DaftarPaket::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }
    public function paket_wisata()
    {
        return view('paket_wisata', [
            'data' => PaketWisata::get()
        ]);
    }

    public function paket_wisata_tambah(Request $request)
    {
        $request->validate([
            'foto1' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'foto2' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'foto3' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'foto4' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
            'foto5' => ['required', 'file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
        if ($image1 = $request->file('foto1')) {
            $destinationPath = 'wisata/';
            $foto1 = "foto-1" . date('YmdHis') . "." . $image1->getClientOriginalExtension();
            $image1->move($destinationPath, $foto1);
        }
        if ($image2 = $request->file('foto2')) {
            $destinationPath = 'wisata/';
            $foto2 = "foto-2" . date('YmdHis') . "." . $image2->getClientOriginalExtension();
            $image2->move($destinationPath, $foto2);
        }
        if ($image3 = $request->file('foto3')) {
            $destinationPath = 'wisata/';
            $foto3 = "foto-3" . date('YmdHis') . "." . $image3->getClientOriginalExtension();
            $image3->move($destinationPath, $foto3);
        }
        if ($image4 = $request->file('foto4')) {
            $destinationPath = 'wisata/';
            $foto4 = "foto-4" . date('YmdHis') . "." . $image4->getClientOriginalExtension();
            $image4->move($destinationPath, $foto4);
        }
        if ($image5 = $request->file('foto5')) {
            $destinationPath = 'wisata/';
            $foto5 = "foto-5" . date('YmdHis') . "." . $image5->getClientOriginalExtension();
            $image5->move($destinationPath, $foto5);
        }
        PaketWisata::create([
            'nama_paket' => $request->nama_paket,
            'deskripsi' => $request->deskripsi,
            'fasilitas' => $request->fasilitas,
            'itinerary' => $request->itinerary,
            'diskon' => $request->diskon,
            'foto1' => $foto1,
            'foto2' => $foto2,
            'foto3' => $foto3,
            'foto4' => $foto4,
            'foto5' => $foto5,
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }
    public function paket_wisata_update(Request $request)
    {
        if ($image1 = $request->file('foto1')) {
            $destinationPath = 'wisata/';
            $foto1 = "foto-1" . date('YmdHis') . "." . $image1->getClientOriginalExtension();
            $image1->move($destinationPath, $foto1);
            PaketWisata::find($request->id)->update([
                'foto1' => $foto1,
            ]);
        }
        if ($image2 = $request->file('foto2')) {
            $destinationPath = 'wisata/';
            $foto2 = "foto-2" . date('YmdHis') . "." . $image2->getClientOriginalExtension();
            $image2->move($destinationPath, $foto2);
            PaketWisata::find($request->id)->update([
                'foto2' => $foto2,
            ]);
        }
        if ($image3 = $request->file('foto3')) {
            $destinationPath = 'wisata/';
            $foto3 = "foto-3" . date('YmdHis') . "." . $image3->getClientOriginalExtension();
            $image3->move($destinationPath, $foto3);
            PaketWisata::find($request->id)->update([
                'foto3' => $foto3,
            ]);
        }
        if ($image4 = $request->file('foto4')) {
            $destinationPath = 'wisata/';
            $foto4 = "foto-4" . date('YmdHis') . "." . $image4->getClientOriginalExtension();
            $image4->move($destinationPath, $foto4);
            PaketWisata::find($request->id)->update([
                'foto4' => $foto4,
            ]);
        }
        if ($image5 = $request->file('foto5')) {
            $destinationPath = 'wisata/';
            $foto5 = "foto-5" . date('YmdHis') . "." . $image5->getClientOriginalExtension();
            $image5->move($destinationPath, $foto5);
            PaketWisata::find($request->id)->update([
                'foto5' => $foto5,
            ]);
        }
        PaketWisata::find($request->id)->update([
            'nama_paket' => $request->nama_paket,
            'deskripsi' => $request->deskripsi,
            'fasilitas' => $request->fasilitas,
            'itinerary' => $request->itinerary,
            'diskon' => $request->diskon,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }
    public function paket_wisata_delete($id)
    {
        PaketWisata::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }


    public function reservasi()
    {
        if (Auth::user()->pelanggan) {
            $data = Reservasi::where('id_pelanggan', Auth::user()->pelanggan->id)->get();
        } else {
            $data = Reservasi::get();
        }
        return view('reservasi', [
            'data' => $data,
            'daftar_paket' => DaftarPaket::get(),
            'pelanggan' => Pelanggan::get()
        ]);
    }

    public function reservasi_tambah(Request $request)
    {
        $paket = DaftarPaket::find($request->id_daftar_paket);
        Reservasi::create([
            'id_pelanggan' => $request->id_pelanggan,
            'id_daftar_paket' => $request->id_daftar_paket,
            'tgl_reservasi_wisata' => $request->tgl_reservasi_wisata,
            'harga' => $paket->harga_paket,
            'jumlah_peserta' => $paket->jumlah_peserta,
            'diskon' => $paket->paket_wisata->diskon,
            'nilai_diskon' => ($paket->harga_paket * $paket->paket_wisata->diskon) / 100,
            'total_bayar' => $paket->harga_paket - (($paket->harga_paket * $paket->paket_wisata->diskon) / 100),
            'file_bukti_tf' => "null.png",
            'status_reservasi_wisata' => 'pesan',
        ]);
        return redirect()->back()->with('success', 'Data berhasil ditambahkan!');
    }
    public function reservasi_update(Request $request)
    {
        $request->validate([
            'file_bukti_tf' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
        if ($image = $request->file('file_bukti_tf')) {
            $destinationPath = 'bukti_tf/';
            $foto =  date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $foto);
            Reservasi::find($request->id)->update([
                'file_bukti_tf' => $foto,
            ]);
        }
        Reservasi::find($request->id)->update([
            'tgl_reservasi_wisata' => $request->tgl_reservasi_wisata,
            'status_reservasi_wisata' => $request->status_reservasi_wisata,
        ]);
        return redirect()->back()->with('success', 'Data berhasil diupdate!');
    }
    public function reservasi_delete($id)
    {
        Reservasi::find($id)->delete();
        return redirect()->back()->with('success', 'Data berhasil dihapus!');
    }


    public function profile()
    {
        return view('profile');
    }
    public function profile_hapus_pp()
    {
        Pelanggan::find(Auth::user()->pelanggan->id)->update([
            'foto' => 'f.png'
        ]);
        return redirect()->back()->with('success', 'Foto Berhasil dihapus');
    }
    public function profile_update(Request $request)
    {
        $request->validate([
            'foto' => ['file', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ]);
        User::find(Auth::user()->id)->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);
        Pelanggan::find(Auth::user()->pelanggan->id)->update([
            'nama_lengkap' => $request->name,
            'no_hp' => $request->no_hp,
            'alamat' => $request->alamat,
        ]);
        if ($image = $request->file('foto')) {
            $destinationPath = 'pp/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            Pelanggan::find(Auth::user()->pelanggan->id)->update([
                'foto' => $profileImage
            ]);
        }
        return redirect()->back()->with('success', 'Data Berhasil diupdate');
    }
    public function laporan(Request $request)
    {
        if ($request->start && $request->end && $request->status) {
            $data = Reservasi::whereBetween('tgl_reservasi_wisata', [$request->start, $request->end])
                ->where('status_reservasi_wisata', $request->status)
                ->get();
        } elseif ($request->start && $request->end) {
            $data = Reservasi::whereBetween('tgl_reservasi_wisata', [$request->start, $request->end])->get();
        } elseif ($request->status) {
            $data = Reservasi::where('status_reservasi_wisata', $request->status)->get();
        } else {
            $data = Reservasi::get();
        }
        return view('laporan', [
            'data' => $data,
        ]);
    }
}
