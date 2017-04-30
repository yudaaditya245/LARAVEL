<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Kategori;

class KatController extends Controller
{
    public function index()
    {
        $this->isLogin();
        $this->isAdmin();
        
        $kat = Kategori::all();
        return view('kategori/kategori', ['kategori' => $kat]);
    }

    public function isLogin()
    {
        if (session('is_login') == null) {
            dd('Anda belum login');
        }
    }

    public function isAdmin()
    {
        if (session('level') != 1) {
            dd('Anda bukan admin');
        }
    }

    public function tambah()
    {
        $this->isLogin();
        $this->isAdmin();

        return view('kategori/tambah');
    }

    public function tambahval(Request $request)
    {
        $this->validate($request, [
          'kategori' => 'required'
        ]);

        Kategori::create([
          'kategori' => $request->kategori
        ]);

        return redirect('/kategori');
    }

    public function ubah($id)
    {
        $this->isLogin();
        $this->isAdmin();

        $kat = Kategori::find($id);
        return view('/kategori/ubah', ['kat' => $kat]);
    }

    public function ubahval(Request $request, $id)
    {
        $this->validate($request, [
            'kategori' => 'required'
        ]);

        Kategori::where('id', $id)->update([
            'kategori' => $request->kategori
        ]);

        return redirect('/kategori');
    }

    public function hapus($id)
    {
        $this->isLogin();
        $this->isAdmin();

        Kategori::find($id)->delete();

        return redirect('/kategori');
    }
}
