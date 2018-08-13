<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateUserUploadedFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('user_uploaded_files', function (Blueprint $table) {
            $table->increments('id');
            $table->unsignedInteger('user_id');
            $table->enum('purpose',[1,2,3])->comment('1-edit,2-convert,3-compress')->nullable();
            $table->string('purpose_type')->comment('ex:word to pdf (word_pdf)')->nullable();
            $table->string('file')->comment('file_name')->nullable();
            $table->enum('status',[1,2])->nullable();
            $table->timestamps();
            $table->foreign('user_id')->references('id')->on('users');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('user_uploaded_files');
    }
}
