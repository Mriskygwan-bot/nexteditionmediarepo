<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMediatypesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mediatypes', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('instructions')->nullable();
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->boolean('active')->default(true);
            $table->string('ref')->unique();
            $table->string('alias')->unique();
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
        Schema::dropIfExists('mediatypes');
    }
}
