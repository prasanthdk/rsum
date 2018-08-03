<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempFiles extends Model
{
    protected $table = 'temp_files';
    protected $fillable = ['file_name','status','purpose','purpose_type'];

}
