<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class NotifikasiController extends Controller
{
    public function index(){
        $title='Notifikasi';

    return view('notifikasi.index',compact('title'));
    }
}
