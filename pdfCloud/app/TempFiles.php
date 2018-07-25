<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TempFiles extends Model
{
    protected $table = 'pdf_temp_files';
    protected $fillable = ['file_name','status'];

}
