<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Playlist extends Model
{
    protected $table = "playlist";

    protected $fillable = ['nama_playlist', 'id_user'];
}
