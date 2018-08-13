<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTempFilesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('temp_files', function (Blueprint $table) {
            $table->increments('id');
            $table->string('file_name');
            $table->enum('purpose',[1,2,3])->comment('1-edit,2-convert,3-compress');
            $table->string('purpose_type')->comment('ex:word to pdf word_pdf');
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
        Schema::dropIfExists('temp_files');
    }
}
