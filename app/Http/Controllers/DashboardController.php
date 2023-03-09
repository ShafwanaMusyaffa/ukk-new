<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Lelang;
use App\Models\Asset;


class DashboardController extends Controller
{
    public function index()
    {
        $user = User::all()->count();
        $lelang = Lelang::where('status', 1)->get();
        $asset = Asset::all();
        return view('pages.admin.dashboard', [
            'user' => $user,
            'lelang' => $lelang,
            'asset' => $asset,
        ]);
    }
}
