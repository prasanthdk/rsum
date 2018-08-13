<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserConvertedFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_converted_files', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('user_id');
            $table->unsignedInteger('convert_file_name')->nullable();
            $table->string('converted_file')->comment('converted file')->nullable();
            $table->enum('status',[1,2])->comment('1 -action success , 2 -action failed')->nullable();
            $table->timestamps();
            $table->foreign('uploaded_file')->references('id')->on('user_uploaded_files');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_converted_files');
    }
}
