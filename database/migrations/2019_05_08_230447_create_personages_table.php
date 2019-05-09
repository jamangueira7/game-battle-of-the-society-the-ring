<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePersonagesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('personages', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->string('type',100);
            $table->text('image');
            $table->integer('force');
            $table->integer('dexterity');
            $table->integer('magic');
            $table->boolean('hero');
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
        Schema::dropIfExists('personages');
    }
}
