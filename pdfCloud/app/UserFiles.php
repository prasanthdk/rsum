<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserFiles extends Model
{
    protected $table = "user_files";

    protected $fillable = ['user_id','output_file','purpose','purpose_type','converted_file_id','downloaded_count','status']; 
}
