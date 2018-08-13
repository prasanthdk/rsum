<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->string('output_file')->nullable();
            $table->enum('purpose',[1,2,3])->comment('1-edit,2-convert,3-compress')->nullable();
            $table->string('purpose_type')->comment('ex:word to pdf (word_pdf)')->nullable();
            $table->string('converted_file_id')->comment('ex:converted file id(s)')->nullable();
            $table->integer('downloaded_count')->comment('number of times downloaded')->nullable();
            $table->enum('status',[1,2]);
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
        Schema::dropIfExists('user_files');
    }
}
