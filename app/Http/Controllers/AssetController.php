<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Asset;
use App\Models\Genre;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AssetController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $assets = User::find(Auth::user()->id)->assets;

        $assets->map(function ($asset){
            if ($asset->lelang) {
                $a = $asset->lelang->waktu_berakhir->diffInMinutes(now());
                $b = $asset->lelang->waktu_berakhir->diffInMinutes($asset->lelang->created_at);
                $asset->siswa_waktu_persen = ceil($a * 100 / $b);
                $asset->siswa_waktu = $asset->lelang->waktu_berakhir->diffAsCarbonInterval(now());
                return $asset;
            } else {
                return $asset->siswa_waktu = null;
            }
        });

        return view('asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('asset.create', compact('genres'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'game' => 'required',
            'identifier' => 'required',
            'deskripsi' => 'required',
            'genre' => 'required',
        ]);

        $asset = new Asset;

        $asset->user_id = Auth::user()->id;
        $asset->game = $request->game;
        $asset->identifier = $request->identifier;
        $asset->deskripsi = $request->deskripsi;

        $asset->save();

        // Relasi Asset dan genre
        foreach ($request->genre as $genre) {
            $asset->genres()->attach($genre);
        }

        return redirect()->route('assets.index')->with('pesan', 'Berhasil membuat asset');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        return view('asset.show', ['asset' => $asset]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        $genres = Genre::all();

        return view('asset.edit', ['asset' => $asset, 'genres' => $genres]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        $request->validate([
            'game' => 'required',
            'identifier' => 'required',
            'deskripsi' => 'required',
            'genre' => 'required',
        ]);

        $asset->game = $request->game;
        $asset->identifier = $request->identifier;
        $asset->deskripsi = $request->deskripsi;

        $asset->save();

        // Relasi Asset dan genre
        $asset->genres()->detach();
        foreach ($request->genre as $genre) {
            $asset->genres()->attach($genre);
        }

        return redirect()->route('assets.show', [$asset->id])->with('pesan', 'Asset berhasil di ubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        $asset->genres()->detach();
        $asset->delete();

        return redirect()->route('assets.index')->with('pesan', 'Berhasil menghapus asset');
    }
}
