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
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    $assets = Asset::latest()->paginate(3);

        return view('pages.admin.asset.index', compact('assets'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $genres = Genre::all();
        return view('pages.admin.asset.create', compact('genres'));
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'identifier' => 'required',
            'deskripsi' => 'required',
            'genre' => 'required',
        ]);

        $asset = new Asset;

        $asset->user_id = Auth::user()->id;
        $asset->game = $request->game;
        $asset->identifier = $request->identifier;
        $asset->deskripsi = $request->deskripsi;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $namaImage = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/image', $namaImage);
            $asset->image = $namaImage;
        }

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
        return view('pages.admin.asset.show', ['asset' => $asset]);
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

        return view('pages.admin.asset.edit', ['asset' => $asset, 'genres' => $genres]);
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
            'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg|max:2048',
            'identifier' => 'required',
            'deskripsi' => 'required',
            'genre' => 'required',
        ]);

        $asset->game = $request->game;
        $asset->identifier = $request->identifier;
        $asset->deskripsi = $request->deskripsi;


        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $namaImage = time().'.'.$image->getClientOriginalExtension();
            $image->storeAs('public/image', $namaImage);
            $asset->image = $namaImage;
        }


        $asset->save();

        // Relasi Asset dan genre
        $asset->genres()->detach();
        foreach ($request->genre as $genre) {
            $asset->genres()->attach($genre);
        }

        return redirect()->route('assets.index', [$asset->id])->with('pesan', 'Asset berhasil di ubah');
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
