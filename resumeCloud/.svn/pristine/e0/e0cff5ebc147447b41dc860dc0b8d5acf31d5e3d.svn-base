<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddExtraToUsers extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function(Blueprint $table) {

            $table->integer('phone')->after('status');
            $table->longtext('lastname')->after('phone');
            $table->longtext('address')->after('lastname');
            $table->string('city')->after('address');
            $table->longtext('state')->after('city');
            $table->longtext('zip')->after('state');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
