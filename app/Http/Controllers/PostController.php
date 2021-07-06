<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Dotenv\Result\Result;
use Illuminate\Support\Facades\DB;
use App\Post;
use Str;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        return view('form');
    }

    public function insertPost(Request $request)
    {
        $validasi = $request->validate([
            'judul' => 'required|min:5|max:100',
            'isi' => 'required',
        ]);

        DB::table('posts')->insert([
            'judul' => request('judul'),
            'isi' => request('isi'),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect('/post');
        // $result = DB::insert("insert into posts(judul, isi, created_at, updated_at) values ('Ini Judul', 'Ini Isi', now(), now())");
        // dump($result);
    }

    public function selectPost()
    {
        $result = DB::select('select * from posts');
        return view('post', ['posts' => $result])->with('i');
    }

    public function editPost($id)
    {
        $result = DB::select("select * from posts where id=$id");
        return view('edit', ['posts' => $result]);
    }

    public function updatePost(Request $request)
    {
        $validasi = $request->validate([
            'judul' => 'required|min:5|max:100',
            'isi' => 'required',
        ]);

        $result = DB::table('posts')->where('id', $request->input('id'))->update([
            'judul' => request('judul'),
            'isi' => request('isi'),
            // 'created_at' => now(),
            'updated_at' => now(),
        ]);
        return redirect('/post');
    }

    public function deletePost($id)
    {
        $result = DB::delete("delete from posts where id=$id");
        return redirect('/post');
    }


    // public function insert_post(){
    //     $result = DB::insert("insert into posts (judul, isi) values ('testing judul', 'testing isi berita')");
    //     dump($result);
    // }

    // public function listpost()
    // {
    //     $result = DB::select('select * from posts');
    //     echo 'Judul Berita : ' . $result[0]->judul . '<br>';
    //     echo 'Isi Berita : ' . $result[0]->isi;
    // }

}
