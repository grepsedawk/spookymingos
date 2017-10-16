<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddMissingFieldsToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->string('nickname')->after('name')->nullable();
            $table->string('3ds_friend_code')->nullable();
            $table->string('switch_friend_code')->nullable();
            $table->string('battle_net_name')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('nickname');
            $table->dropColumn('3ds_friend_code');
            $table->dropColumn('switch_friend_code');
            $table->dropColumn('battle_net_name');
        });
    }
}
