<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('movie_user_likes', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('movie_id');
            $table->unsignedBigInteger('user_id');

            $table->index('movie_id', 'mul_movie_idx');
            $table->index('user_id', 'mul_user_idx');

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
        Schema::dropIfExists('movie_user_likes');
    }
};
