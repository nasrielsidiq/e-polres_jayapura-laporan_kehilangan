<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class KontakController extends Controller
{
    public function index(){ return view('kontak.index'); }
    public function send(Request $request){ /* jika ada form kontak, simpan/forward - notifikasi email nonaktif */ }
}
