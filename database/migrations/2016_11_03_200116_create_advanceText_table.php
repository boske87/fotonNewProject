<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAdvanceTextTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('advanceText', function (Blueprint $table) {
            $table->increments('id');
            $table->text('Text1');
            $table->text('Text2');
            $table->text('Text3');
            $table->text('Text4');
            $table->text('Text5');
            $table->text('Text6');
            $table->text('Text7');
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
        Schema::drop('advanceText');
    }
}
