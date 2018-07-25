<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;
use function MongoDB\BSON\toJSON;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('welcome');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $getimageName = time().'.'.$request->_uploadFile->getClientOriginalExtension();
        $output_dir = public_path('uploads\\').$getimageName;
        if ($request->_uploadFile->move(public_path('uploads\\'), $getimageName)) {

            $im = new imagick($output_dir);
            $noOfPagesInPDF = $im->getNumberImages();

            if ($noOfPagesInPDF) {

                for ($i = 0; $i < $noOfPagesInPDF; $i++) {

                    $url = $output_dir.'['.$i.']';

                    $image = new Imagick($url);

                    $image->setImageFormat("png");

                    $image->writeImage(public_path("/uploads/".($i+1).'-'.time().'.png'));

                }
            }
            $response = "Success";
        }
        return response($response);

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
    public function edit()
    {
       return view('edit_file');
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
