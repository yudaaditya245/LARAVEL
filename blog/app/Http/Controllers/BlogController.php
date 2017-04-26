<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BlogController extends Controller
{
    public function index()
    {
        return view('welcome');
    }

    public function blog($id)
    {
        $post = DB::table('tbl_artikel')->where('id', $id)->get();
        return view('blog/blog', ['post' => $post]);
    }

    public function update($id)
    {
        $post = DB::table('tbl_artikel')->where('id', $id)->get();
        return view('blog/update', ['post' => $post]);
    }

    public function edit(Request $request, $id)
    {
        $query = DB::table('tbl_artikel')->where('id', $id)->update([
          'judul' => $request->judul,
          'isi' => $request->isi
        ]);

        if ($query) {
            return redirect('/blog/'.$id);
        }
    }

    public function create()
    {
        return view('blog/create');
    }

    public function post(Request $request)
    {
        $query = DB::table('tbl_artikel')->insert([
          'judul' => $request->judul,
          'isi' => $request->isi
        ]);

        if ($query) {
          return redirect('/blog');
        }
    }

    public function delete($id)
    {
        $query = DB::table('tbl_artikel')->where('id', $id)->delete();
        if ($query) {
          return redirect('/blog');
        }
    }
}
