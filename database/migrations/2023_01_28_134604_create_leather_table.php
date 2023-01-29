<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateLeatherTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('leather', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('butcher_id');
            $table->integer('sheet');
            $table->integer('kilos');
            $table->integer('total_price');
            $table->timestamps();
            $table->dateTime('deleted_at')->nullable();

            $table->foreign('butcher_id')->references('id')->on('butcher');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('leather');
    }
}
