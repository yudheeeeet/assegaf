<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateButcherDetailTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('butcher_detail', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('butcher_id');
            $table->unsignedBigInteger('grade_id');
            $table->integer('price');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

            $table->foreign('butcher_id')->references('id')->on('butcher');
            $table->foreign('grade_id')->references('id')->on('grade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('butcher_detail');
    }
}
