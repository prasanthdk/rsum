<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempConvertFiles extends Model
{
    protected $table = 'temp_convert_files';

    protected $fillable = ['file_id','convert_file_name','convert_file_wm',"status"];
}
