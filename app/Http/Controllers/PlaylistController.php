<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Playlist;

class PlaylistController extends Controller
{
    public function index()
    {
        $result = DB::table('playlist')->get();

        return response([
            'success' => true,
            'message' => 'Data semua playlist',
            'data' => $result
        ], 200);
    }

    public function createPlaylist(Request $request)
    {
        $request->validate([
            'nama_playlist' => ['required', 'max:20'],
        ]);

        Playlist::create($request->all());
    }

    public function edit($edit){
        $result = DB::table('playlist')->where('id', $edit)->first();
        return response()->json($result);
    }

    public function update(Request $request){
        $request->validate([
            'nama_playlist' => ['required', 'max:20'],
        ]);

        $playlist = Playlist::find($request->id);
        $playlist->update([
            'nama_playlist' => $request->nama_playlist
        ]);
    }

    public function delete($id){

        $playlist = Playlist::find($id);
        $playlist->delete();

        if ($playlist) {
            return response([
                'success' => true,
                'message' => 'Data berhasil di hapus',
                'data' => $playlist
            ], 200);
        } else {
            return response([
                'success' => true,
                'message' => 'Data gagal di hapus',
                'data' => $playlist
            ], 401);
        }
    }
}
