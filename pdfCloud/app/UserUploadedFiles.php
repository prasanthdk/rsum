<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserUploadedFiles extends Model
{
    protected $table = "user_uploaded_files";

    protected $fillable = ['user_id','purpose','purpose_type','file','status']; 
}
