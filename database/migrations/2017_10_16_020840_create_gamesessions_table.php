<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateGamesessionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gamesessions', function (Blueprint $table) {
            $table->increments('id');
            $table->integer("game");
            $table->string("invited_users");
            $table->string("declined_users")->nullable();
            $table->string("accepted_users")->nullable();
            $table->float("session_length", 6, 1)->default(1)->comment('Length in hours');
            $table->dateTime('session_time_utc');
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
        Schema::dropIfExists('gamesessions');
    }
}
