<?php

namespace App\Http\Controllers;
use App\Models\PaketWisata;
use Illuminate\Http\Request;

class DestinationController extends Controller
{
    function index(){
        $paket_wisata = PaketWisata::orderBy('id','desc')->get();
        return view('destination', [
            'paket_wisata' => $paket_wisata]);
    }

    function create(){
        return view('reservasi.create');
    }
}