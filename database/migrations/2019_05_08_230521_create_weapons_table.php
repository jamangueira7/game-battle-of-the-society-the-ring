<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateWeaponsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('weapons', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('name',100);
            $table->text('image');
            $table->integer('force_min');
            $table->integer('force_max');
            $table->integer('dexterity_min');
            $table->integer('dexterity_max');
            $table->integer('magic_min');
            $table->integer('magic_max');
            $table->string('limitation');
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
        Schema::dropIfExists('weapons');
    }
}
