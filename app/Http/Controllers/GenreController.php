<?php

namespace App\Http\Controllers;

use App\Models\Genre;
use Illuminate\Http\Request;

class GenreController extends Controller
{
    public function index()
    {
        $genres = Genre::all();
        return view('pages.admin.genre.index', ['genres' => $genres]);
    }

    public function create()
    {
        return view('pages.admin.genre.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'genre' => 'required',
        ]);

        $genre = new Genre;

        $genre->genre = $request->genre;

        $genre->save();

        return redirect()->route('genre.index')->with('pesan', 'Berhasil membuat genre');
    }

    public function destroy($id)
    {
        $genre = Genre::find($id);

        if ($genre->delete()) {
            // Alert::success('Berhasil', 'Data petugas berhasil dihapus');
        } else {
            // Alert::error('Gagal', 'Data petugas gagal dihapus');
        }

        return redirect('admin/genre');
    }
}
