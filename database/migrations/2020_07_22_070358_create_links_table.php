<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLinksTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('links', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('web_address');
            $table->integer('hits')->default(0);
            $table->unsignedBigInteger('linktype_id');
            $table->timestamps();
            $table->string('ref')->unique();
            $table->string('alias')->unique();

            $table->foreign('linktype_id')->references('id')->on('linktypes');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('links');
    }
}
