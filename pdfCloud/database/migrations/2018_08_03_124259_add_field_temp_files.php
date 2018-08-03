<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddFieldTempFiles extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('temp_files', function (Blueprint $table) {
            $table->enum('purpose',[1,2,3])->after('file_name')->comment('1-edit,2-convert,3-compress');
            $table->string('purpose_type')->after('purpose')->comment('ex:png_pdf(convert png to pdf)');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('temp_files', function (Blueprint $table) {
            $table->dropColumn('purpose');
            $table->dropColumn('purpose_type');
        });
    }
}
