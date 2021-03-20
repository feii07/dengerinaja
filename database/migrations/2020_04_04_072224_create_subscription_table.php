<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSubscriptionTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscriptions', function (Blueprint $table) {
            $table->integer('id',11);
            $table->string('member')->unsigned;
            $table->string('genre')->unsigned;
            $table->timestamp('updated_at')->nullable();
            $table->timestamp('created_at')->nullable();
        });

        Schema::table('subscriptions',function(Blueprint $table){
            $table->foreign('member')
                ->references('id')
                ->on('members')
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
        Schema::dropIfExists('subscriptions');
    }
}
