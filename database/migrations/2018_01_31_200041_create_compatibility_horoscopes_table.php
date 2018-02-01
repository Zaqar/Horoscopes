<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCompatibilityHoroscopesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compatibility_horoscopes', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('first_id')->unsigned();
            $table->integer('second_id')->unsigned();
            $table->string('percent');
            $table->text('content_1');
            $table->text('content_2');
            $table->text('content_3');
            $table->text('content_4');
            $table->text('content_5');
            $table->text('point_1');
            $table->text('point_2');
            $table->text('point_3');
            $table->text('point_4');
            $table->text('point_5');
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
        Schema::dropIfExists('compatibility_horoscopes');
    }
}
