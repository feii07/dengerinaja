<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSongTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('songs', function (Blueprint $table) {
            $table->integer('id',11);
            $table->string('title');
            $table->year('releaseYear');
            $table->integer('artist')->unsigned;
            $table->string('genre')->unsigned;
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });

        Schema::table('songs',function(Blueprint $table){
            $table->foreign('artist')
                ->references('id')
                ->on('artists')
                ->onDelete('cascade');

            $table->foreign('genre')
                ->references('id')
                ->on('genres')
                ->onDelete('cascade');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('songs');
    }
}
