<?php

namespace App\Http\Controllers;

use App\TempConvertFiles;
use App\TempFiles;
use Illuminate\Http\Request;
use Imagick;
use Intervention\Image\Facades\Image;
//use function MongoDB\BSON\toJSON;

use App\Http\Controllers\FileConversionController;

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

        $file_id = $key = $create_converted_file = '';
        if ($request->hasFile('_uploadFile')) {//check file posted
        
            $ext = $request->_uploadFile->getClientOriginalExtension();
            $ext_array = array("pdf","png","jpg");
            if($request->input('pdf_cloud_action'))
            {
                
                if(in_array($ext,$ext_array))
                {
                    $key = '0000....11112222';
                    $getfileName = time().'.'.$request->_uploadFile->getClientOriginalExtension();
                    $output_dir = public_path('uploads\\original_file\\').$getfileName;

                    if ($request->_uploadFile->move(public_path('uploads\\original_file\\'), $getfileName)) {

                        $im = new imagick($output_dir);
                        $noOfPagesInPDF = $im->getNumberImages();
                        $tempfile = TempFiles::create(['file_name'=>$getfileName,'status'=>'1']);
                        $file_id = $tempfile->id;
                        if ($noOfPagesInPDF) {

                            for ($i = 0; $i < $noOfPagesInPDF; $i++) {

                                $image_name = ($i+1).'-'.time().'.png';

                                $url = $output_dir.'['.$i.']';

                                $image = new Imagick($url);
                               // $image->scaleImage(2550,3300);
                                $image->setResolution(300,300);
                                $image->readImage(public_path("uploads\original_file\\".$getfileName."[".$i."]"));
                                $image->scaleImage(1000,0);
                                //set new format
                                $image->setImageFormat('png');
                                $image->writeImage(public_path("/uploads/convert_file/".$image_name));

                                $create_converted_file = TempConvertFiles::create(['file_id'=>$file_id,'convert_file_name'=>$image_name,'status'=>'1']);
                            }
                        }
                        $status = TRUE;
                    }
                }else{

                    $status = FALSE;
                    $message = "Invalid file format received.";

                    // return response()->json(['status' => $status,'message' => $message]);

                    }
                    //------------------------------------------------conversion
                    $post_data = $request->input();
                    //--------------------------------
                    if($post_data['pdf_cloud_action'] == 'convert' && $create_converted_file != '')
                    {
                           $response =  FileConversionController::convert($post_data,$create_converted_file);

                           if($response){
                             $status = TRUE;
                            }else{
                             $status = FALSE;
                            }
                            $message = "File converted successfully.";

                    }else if($post_data['pdf_cloud_action'] == 'compress'){

                    }else
                    {
                        $status = FALSE;
                        $message = "Invalid request received.";
                    }
                    //------------------------------
            }
            else
            {
                $status = FALSE;
                $message = "Invalid request received.";

            }

        }else{
            $status = FALSE;
            $message = "No file submitted.";
        }
        //--------------------------------------------------------------------------------response
        return response()->json(['status' => $status, 'file_id' => encrypt($file_id,$key),'message' => $message]);

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
    public function edit($file_id)
    {
        $temp_files = TempConvertFiles::where('file_id','=',decrypt($file_id))->orderBy('created_at','asc')->get();

       return view('edit_file',compact('temp_files'));

       //return response()->file(public_path('uploads/original_file/1532522150.pdf'));
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

    /**
     * @param Request $request
     */
    public function save(Request $request){

        $image = Image::make($request->get('imgBase64'));
        $image->save(public_path('/uploads/bar.jpg'));
    }
}
