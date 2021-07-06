<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePlaylistItemTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('playlist_item', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_playlist');
            $table->unsignedBigInteger('id_track');
            $table->foreign('id_playlist')->references('id')->on('playlist');
            $table->foreign('id_track')->references('id')->on('track');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('playlist_item');
    }
}
