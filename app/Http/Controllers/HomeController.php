<?php

namespace App\Http\Controllers;

use App\Models\Lelang;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $lelang = Lelang::orderBy('created_at', 'desc')->paginate(10);
    
        return view('pages.home', ['lelang' => $lelang]);

    }

}
