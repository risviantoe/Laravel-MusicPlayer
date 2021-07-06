<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TrackController extends Controller
{
    public function index()
    {
        $result = DB::table('track')->get();

        return response([
            'success' => true,
            'message' => 'Data semua track',
            'data' => $result
        ], 200);
    }
}
