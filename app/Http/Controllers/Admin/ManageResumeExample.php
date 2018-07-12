<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageResumeExample extends Controller
{
    public function ResumeExample(){

        return view('admin.manage_resume_example');
    }
}
