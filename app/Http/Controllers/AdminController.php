<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Admin;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function index()
    {
        $admins = Admin::where('role', 'admin')->get();
        return view('pages.admin.admin.index', ['admins' => $admins]);
    }

    public function destroy($id)
    {
        $admin = Admin::find($id);

        $admin->delete();

        return redirect('admin/admin');
    }

    public function indexkaryawan()
    {
        $karyawans = Admin::where('role', 'karyawan')->get();
        return view('pages.admin.karyawan.index', ['karyawans' => $karyawans]);
    }

    public function destroykaryawan($id)
    {
        $karyawan = Admin::find($id);

        $karyawan->delete();

        return redirect('admin/karyawan');
    }
}
