<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCommentTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('comments', function (Blueprint $table) {
			$table->integer('id',11);
            $table->timestamp('postDate')->useCurrent();
            $table->string('comment');
            $table->string('member_id',20)->unsigned;
            $table->integer('song_id')->unsigned;
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });
		
		Schema::table('comments',function(Blueprint $table){
            $table->foreign('member_id')
                ->references('id')
                ->on('members')
                ->onDelete('cascade');
				
            $table->foreign('song_id')
                ->references('id')
                ->on('songs')
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
        Schema::dropIfExists('comments');
    }
}
