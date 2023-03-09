<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

use RealRashid\SweetAlert\Facades\Alert;


class PenggunaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $users = User::all();
        return view('pages.admin.pengguna.index', ['users' => $users]);
    }

    public function destroy($id)
    {
        $user = User::find($id);

        if ($user->delete()) {
            // Alert::success('Berhasil', 'Data petugas berhasil dihapus');
        } else {
            // Alert::error('Gagal', 'Data petugas gagal dihapus');
        }

        return redirect('admin/pengguna');
    }
}
