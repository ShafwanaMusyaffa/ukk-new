<?php

namespace App\Http\Controllers;


use App\Models\Lelang;
use App\Models\Lelang_log;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $lelangs = Lelang::
                        orderBy('harga_sekarang', 'desc')
                        ->get();

        return view('pages.home', ['lelangs' => $lelangs]);
    }
}
