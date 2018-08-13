<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserConvertedFiles extends Model
{
    protected $table = "user_converted_files";

    protected $fillable = ['user_id','convert_file','convert_file_name','status'];
}
