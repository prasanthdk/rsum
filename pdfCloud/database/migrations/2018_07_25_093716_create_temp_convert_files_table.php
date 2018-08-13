<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempConvertFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_convert_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('file_id');
            $table->string('convert_file_name');
            $table->string('convert_file_wm')->nullable();
            $table->enum('status',['1','2']);
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
        Schema::dropIfExists('temp_convert_files');
    }
}
