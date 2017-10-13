<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('ime_prezime')->nullable();
            $table->date('datum_rodjenja')->nullable();
            $table->string('mesto_rodjenja')->nullable();
            $table->string('tel')->nullable();
            $table->text('zavrseno_obrazovanje')->nullable();
            $table->text('trenutno_zaposlenje')->nullable();
            $table->text('zavrsena_skola_fotografije')->nullable();
            $table->text('fotografske_titule_zvanja_diplome')->nullable();
            $table->text('fotografija_lica')->nullable();
            $table->text('umetnicke_aktivnosti')->nullable();
            $table->text('desc')->nullable();
            $table->boolean('status')->default(0);
            $table->integer('type')->default(0);
            $table->integer('zvanje')->nullable();
            $table->integer('paketKategorija')->nullable();
            $table->string('titula');
            $table->string('color');
            $table->rememberToken();
            $table->timestamp('last_login');
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
        Schema::dropIfExists('users');
    }
}
