<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Kategori;

class BlogController extends Controller
{
    public function index()
    {
        $post = Blog::all();
        $kat = Kategori::all();
        return view('/blog/home', ['post' => $post, 'kategori' => $kat]);
    }

    public function filter($id)
    {
        $post = Blog::where('kategori', $id)->get();
        $kat = Kategori::all();
        return view('/blog/home', ['post' => $post, 'kategori' => $kat, 'id' => $id]);
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

    public function cpanel()
    {
        $this->isLogin();
        $this->isAdmin();

        $post = Blog::all();
        $kat = Kategori::all();
        return view('/blog/cpanel', ['post' => $post, 'kategori' => $kat]);
    }

    public function blog($id)
    {
        $post = Blog::find($id);
        $kat = Kategori::all();
        return view('blog/blog', ['post' => $post, 'kategori' => $kat]);
    }

    public function update($id)
    {
        $this->isLogin();
        $this->isAdmin();

        $post = Blog::find($id);
        $kat = Kategori::all();
        return view('blog/update', ['post' => $post, 'kategori' => $kat]);
    }

    public function edit(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'kategori' => 'required'
        ]);

        Blog::find($id)->update([
            'judul' => $request->judul,
            'isi'   => $request->isi,
            'kategori' => $request->kategori
        ]);

        return redirect('/blog');

    }

    public function create()
    {
        $this->isLogin();
        $this->isAdmin();

        $kat = Kategori::all();
        return view('blog/create', ['kategori' => $kat]);
    }

    public function post(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'isi' => 'required',
            'kategori' => 'required'
        ]);

        Blog::create([
            'judul' => $request->judul,
            'isi'   => $request->isi,
            'kategori' => $request->kategori
        ]);

        return redirect('/blog');
    }

    public function delete($id)
    {
        $this->isLogin();
        $this->isAdmin();

        $result = Blog::find($id);
        $result->delete();

        return redirect('/blog');
    }
}
