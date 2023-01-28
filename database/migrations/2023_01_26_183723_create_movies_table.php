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
        Schema::create('movies', function (Blueprint $table) {
            $table->id();
            $table->string('title_ua');
            $table->string('title_original')->nullable();
            $table->year('year');
            $table->string('image_path')->nullable();
            $table->string('link_1');
            $table->string('link_2')->nullable();
            $table->text('description');
            $table->timestamps();

            $table->unsignedBigInteger('type_id');

            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movies');
    }
};
