<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('media', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('alias');
            $table->unsignedBigInteger('mediatype_id');
            $table->string('description')->nullable();
            $table->string('src')->nullable();
            $table->string('ref');
            $table->boolean('active');
            $table->unsignedBigInteger('user_id');
            $table->timestamps();

            $table->foreign('mediatype_id')->references('id')->on('mediatypes');
            $table->foreign('user_id')->references('id')->on('users');
        });

        Schema::create('media_page', function (Blueprint $table){
            $table->id();
            $table->unsignedBigInteger('page_id');
            $table->unsignedBigInteger('media_id');
            $table->unsignedBigInteger('user_id');
            $table->boolean('active');
            $table->timestamps();

            $table->foreign('page_id')->references('id')->on('pages');
            $table->foreign('media_id')->references('id')->on('media');
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('media_page');
        Schema::dropIfExists('media');
    }
}
