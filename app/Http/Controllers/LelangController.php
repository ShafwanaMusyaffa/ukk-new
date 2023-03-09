<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asset;
use App\Models\Lelang;
use App\Models\Lelang_log;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LelangController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth:admin');
    // }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $lelang = Lelang::
                        orderBy('harga_sekarang', 'desc')
                        ->get();

        return view('pages.admin.lelang.index', ['lelang' => $lelang]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param  \App\Asset $assset
     * @return \Illuminate\Http\Response
     */
    public function create(Asset $asset)
    {
        // filter id nya
        if ($asset->user->id != Auth::user()->id) {
            redirect()->route('assets.index');
        }

        return view('pages.admin.lelang.create', ['asset' => $asset]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Asset $asset
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Asset $asset)
    {
        $lelang = new Lelang;

        if ($asset->user->id != Auth::user()->id) {
            redirect()->route('assets.index');
        }

        $request->validate([
            'harga_awal' => 'required|integer|min:1',
            'waktu_berakhir' => 'required|date|after:now',
        ]);

        $lelang->user_id = Auth::user()->id;
        $lelang->asset_id = $asset->id;
        $lelang->harga_awal = $request->harga_awal;
        $lelang->harga_sekarang = $request->harga_awal;
        $lelang->waktu_berakhir = date('Y-m-d H:i:s', strtotime(str_replace('/', '-', $request->waktu_berakhir)));
        $lelang->status = 1;

        $lelang->save();

        return redirect()->route('assets.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function show(Lelang $lelang)
    {
        $penawaran = $lelang->orderBy('harga_sekarang', 'desc')->get();
        return view('pages.admin.lelang.show', ['lelang' => $lelang, 'penawaran' => $penawaran]);
    }

    /**
     * Mulai menawar lelang
     *
     * @param  \App\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function tawar(Lelang $lelang)
    {
        return view('pages.admin.lelang.tawar', ['lelang' => $lelang]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Lelang  $lelang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lelang $lelang)
    {
        $request->validate([
            'harga_tawaran' => 'required|integer|min:' . $lelang->harga_sekarang,
        ]);

        $lelang_log = new Lelang_log([
            'user_id' => Auth::user()->id,
            'harga' => $request->harga_tawaran,
        ]);

        $lelang->harga_sekarang = $request->harga_tawaran;
        $lelang->save();
        $lelang->logs()->save($lelang_log);

        return redirect()->route('lelang.show', [$lelang->id]);
    }

    /**
     * Akhiri lelang spesifik.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function akhiri(Lelang $lelang)
    {
        // Set status lelang menjadi false
        $lelang->status = false;
        $lelang->save();

        // Cari harga tertinggi di dalam tabel lelang_logs untuk lelang ini
        $highestBid = Lelang_log::where('lelang_id', $lelang->id)->max('harga');

        if (!is_null($highestBid)) {
            // Cari user dengan harga tertinggi
            $pemenang = Lelang_log::where('lelang_id', $lelang->id)->where('harga', $highestBid)->first()->user;

            // Update pemenang di dalam tabel lelang
            $lelang->pemenang_id = $pemenang->id;
            $lelang->save();

            return redirect()->route('lelang.index')->with('success', 'Lelang telah diakhiri, pemenang telah ditentukan.');
        } else {
            return redirect()->route('lelang.index')->with('error', 'Tidak ada tawaran di dalam lelang ini.');
        }

    }

    // public function determineWinner($id)
    // {
    //     $lelang = Lelang::findOrFail($id);

    //     // Cek apakah status lelang sudah berakhir atau belum
    //     if ($lelang->status) {
    //         return redirect()->back()->with('error', 'Status lelang belum berakhir.');
    //     }

    //     // Cari harga tertinggi di dalam tabel lelang_logs untuk lelang ini
    //     $highestBid = Lelang_log::where('lelang_id', $lelang->id)->max('harga');

    //     if (!is_null($highestBid)) {
    //         // Cari user dengan harga tertinggi
    //         $pemenang = Lelang_log::where('lelang_id', $lelang->id)->where('harga', $highestBid)->first()->user;

    //         // Update pemenang di dalam tabel lelang
    //         $lelang->pemenang_id = $pemenang->id;
    //         $lelang->save();

    //         return redirect()->back()->with('success', 'Pemenang lelang telah ditentukan.');
    //     } else {
    //         return redirect()->back()->with('error', 'Tidak ada tawaran di dalam lelang ini.');
    //     }
    // }


    public function pemenang()
    {
        return view('pages.admin.pemenang');
    }





    public function generateLaporan()
    {
        $users = User::all();
        $lelangs = Lelang::all();

        return view('pages.admin.laporan.laporan', compact('lelangs', 'users'));
    }
}
