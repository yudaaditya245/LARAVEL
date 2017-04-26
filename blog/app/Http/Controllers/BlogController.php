<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Blog;

class BlogController extends Controller
{
    public function index()
    {
        $post = Blog::all();

        return view('/blog/home', ['post' => $post]);
    }

    public function blog($id)
    {
        $post = Blog::find($id);
        return view('blog/blog', ['post' => $post]);
    }

    public function update($id)
    {
        $post = Blog::find($id);
        return view('blog/update', ['post' => $post]);
    }

    public function edit(Request $request, $id)
    {
        Blog::find($id)->update([
            'judul' => $request->judul,
            'isi'   => $request->isi
        ]);

        return redirect('/blog/'.$id);

    }

    public function create()
    {
        return view('blog/create');
    }

    public function post(Request $request)
    {
        Blog::create([
            'judul' => $request->judul,
            'isi'   => $request->isi
        ]);

        return redirect('/blog');
    }

    public function delete($id)
    {
        $result = Blog::find($id);
        $result->delete();

        return redirect('/blog');
    }
}
