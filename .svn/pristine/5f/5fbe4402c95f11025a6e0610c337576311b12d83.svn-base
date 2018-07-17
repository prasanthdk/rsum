<?php

namespace App\Http\Controllers\Admin;

use App\ResumeTemplate;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
class ManageResumeTemplate extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $resume_template = ResumeTemplate::all();

        return view('admin.manage_resume_template',compact('resume_template'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_edit_resume_template');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'template_name' => 'required|max:255',
            'template_screen' => 'required',
        ]);
        $data = $request->all();
        $resume['template_name'] = $data['template_name'];

        $template_screen = null;
        if (request()->hasFile('template_screen')) {
            $file = request()->file('template_screen');
            $template_screen = md5($file->getClientOriginalName() . time()) . "." . $file->getClientOriginalExtension();
            $file->move('./uploads/template_screen/', $template_screen);
            $resume['template_screen'] = $template_screen;
        }

        ResumeTemplate::create($resume);

        return redirect('admin/manage_resume_template')->with('success');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
