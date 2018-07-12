<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ManageResumeTemplate extends Controller
{
    public function ResumeTemplate(){

        return view('admin.manage_resume_template');
    }
}
