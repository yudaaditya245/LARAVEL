<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Blog;
use App\Models\Kategori;
use App\Models\User;

class BlogController extends Controller
{
    public function index()
    {
        $post = Blog::all();
        $kat = Kategori::all();
        $user = User::all();
        return view('/blog/home', ['post' => $post, 'kategori' => $kat, 'user' => $user]);
    }

    public function filter($id)
    {
        $post = Blog::where('kategori', $id)->get();
        $kat = Kategori::all();
        $user = User::all();
        return view('/blog/home', ['post' => $post, 'kategori' => $kat, 'id' => $id, 'user' => $user]);
    }

    public function filterByAuthor($id)
    {
      $post = Blog::where('author', $id)->get();
      $kat = Kategori::all();
      $user = User::all();
      return view('/blog/home', ['post' => $post, 'kategori' => $kat, 'id' => $id, 'user' => $user]);
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

        if (session('level') == 0) {
            $post = Blog::where('author', session('user_id'))->get();
        } else {
            $post = Blog::all();
        }

        $kat = Kategori::all();
        return view('/blog/cpanel', ['post' => $post, 'kategori' => $kat]);
    }

    public function blog($id)
    {
        $post = Blog::find($id);
        $kat = Kategori::all();
        $user = User::all();
        return view('blog/blog', ['post' => $post, 'kategori' => $kat, 'user' => $user]);
    }

    public function create()
    {
        $this->isLogin();

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
            'kategori' => $request->kategori,
            'author' => session('user_id')
        ]);

        return redirect('/blog');
    }

    public function update($id)
    {
        $this->isLogin();

        $postid = Blog::find($id);

        if (session('level') == 0) {
            if ($postid->author != session('user_id')) {
                dd('Anda member tidak dapat mengedit post orang lain');
            }
        }

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

    public function delete($id)
    {
        $this->isLogin();

        $postid = Blog::find($id);

        if (session('level') == 0) {
            if ($postid->author != session('user_id')) {
                dd('Anda member tidak dapat menghapus post orang lain');
            }
        }

        $result = Blog::find($id);
        $result->delete();

        return redirect('/blog');
    }
}
