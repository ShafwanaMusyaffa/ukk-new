<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::where('is_admin', 1)->get();
        return view('pages.admin.admin.index', ['users' => $users]);
    }

    public function create()
    {
        return view('pages.admin.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_lengkap' => 'required|max:255',
            'email' => 'required|email',
            'password' => 'required',
            'no_telp' => 'required|digits_between:1,13',
            'role' => 'required',
        ]);

        $user = new User;

        $user->nama_lengkap = $request->nama_lengkap;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->no_telp = $request->no_telp;
        $user->is_admin = 1;
        $user->role = $request->role;

        $user->save();

        return redirect()->route('admin.admin.index')->with('pesan', 'Berhasil menambah staff baru');
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            // Alert::success('Berhasil', 'Data petugas berhasil dihapus');
        } else {
            // Alert::error('Gagal', 'Data petugas gagal dihapus');
        }

        return redirect('admin/admin');
    }
}
