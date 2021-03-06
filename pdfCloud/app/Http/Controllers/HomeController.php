<?php

namespace App\Http\Controllers;

use App\TempConvertFiles;
use App\TempFiles;
use Illuminate\Http\Request;
use Imagick;
use Intervention\Image\Facades\Image;
use Auth;
use PDF;
//use function MongoDB\BSON\toJSON;
use Symfony\Component\Process\Process;
use Symfony\Component\Process\Exception\ProcessFailedException;

use App\Http\Controllers\FileConversionController;
use pxCore\LibreOfficeConverterBundle\pxCoreLibreOfficeConverterBundle;

use NcJoes\OfficeConverter\OfficeConverter;

use App\UserConvertedFiles;

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

        $file_id = $key = $create_converted_file = $message = '';

        $user_auth = (Auth::check()) ? TRUE : FALSE;

        if ($request->hasFile('_uploadFile')) {//check file posted
        
            $ext = $request->_uploadFile->getClientOriginalExtension();
            $ext_array = array("pdf","png","jpg","txt");
            if($request->input('pdf_cloud_action'))
            {

                //------------------------------------------------conversion
                $post_data = $request->input();
                //--------------------------------
                switch ($post_data['pdf_cloud_Cto']) {

                    case 'edit_pdf':
                    $validate_ext = $this->check_file_extension($ext,$post_data['pdf_cloud_Cto']);
                    if($validate_ext == "true")
                    {
                        $convert_into_image = FileConversionController::convert_into_image($request);
                        if($convert_into_image['status'] && $validate_ext == "true")
                        {
                            $file_id = (Auth::check()) ? $convert_into_image->convert_file : $convert_into_image->file_id;
                            $status = TRUE;
                            
                        }

                    }else{
                        $status = FALSE;
                        $message = "Invalid file format. Please upload a pdf file.";
                    }
                    
                    break;
                    case 'png_pdf'://convert
                    case 'jpg_pdf'://convert
                    
                        $validate_ext = $this->check_file_extension($ext,$post_data['pdf_cloud_Cto']);
                        
                        if($validate_ext == "true")
                        {
                            $convert_into_image = FileConversionController::convert_into_image($request);

                            if($convert_into_image != '' )
                            {
                                 $response =  FileConversionController::convert($post_data,$convert_into_image);

                                   if($response){
                                     $status = TRUE;
                                     $message = "File converted successfully.";
                                    }else{
                                     $status = FALSE;
                                     $message = "Oops! Something went wrong. Please try agin later.";
                                    }
                                
                            }else{
                                $status = FALSE;
                                $message = "Oops! Something went wrong. Please try again later.";
                            }
                           
                        }else{

                            $status = FALSE;
                            $message = ($validate_ext == "false") ? "Invalid file format.  Please upload a png file." : "Oops! Something went wrong. Please try again later.";
                        }

                    break;
                    case 'text_pdf'://convert
                    $validate_ext = $this->check_file_extension($ext,$post_data['pdf_cloud_Cto']);
                    if($validate_ext == "true")
                    {
                        // $convert_into_pdf = FileConversionController::convert_into_html($request);
                        $convert_into_pdf = FileConversionController::txt_convert_into_pdf($request);

                        if($convert_into_pdf['status'] && $validate_ext == "true")
                        {
                        
                            $status = TRUE;
                            $message = "File converted successfully.";
                            
                        }else
                        {
                            $status = FALSE;
                            $message = "Oops! Something went wrong. Please try again later.";
                        }

                    }else{
                        $status = FALSE;
                        $message = "Invalid file format. Please upload a pdf file.";
                    }
                    break;
                    case "word_pdf":
                    $validate_ext = $this->check_file_extension($ext,$post_data['pdf_cloud_Cto']);
                    if($validate_ext == "true"){

                        $convert_into_pdf = FileConversionController::doc_convert_into_pdf($request);

                        if($convert_into_pdf['status'])
                        {
                        
                            $status = TRUE;
                            $message = "File converted successfully.";
                            
                        }else
                        {
                            $status = FALSE;
                            $message = "Oops! Something went wrong. Please try again later.";
                        }

                    }else{
                        $status = FALSE;
                        $message = "Invalid file format. Please upload a pdf file.";
                    }
                            
                    break;

                    
                    case "pdf_word":
                    // $validate_ext = $this->check_file_extension($ext,$post_data['pdf_cloud_Cto']);
                    // if($validate_ext == "true"){

                    //     $convert_into_pdf = FileConversionController::pdf_convert_into_doc($request);

                    //     if($convert_into_pdf['status'])
                    //     {
                        
                    //         $status = TRUE;
                    //         $message = "File converted successfully.";
                            
                    //     }else
                    //     {
                    //         $status = FALSE;
                    //         $message = "Oops! Something went wrong. Please try again later.";
                    //     }

                    // }else{
                    //     $status = FALSE;
                    //     $message = "Invalid file format. Please upload a pdf file.";
                    // }
                            $status = FALSE;
                            $message = "This area of funtionality in progress.";
                    break;
                    case "compress_pdf":
                            $status = FALSE;
                            $message = "This area of funtionality in progress.";
                    break;
                    default:
                        $status = FALSE;
                        $message = "Invalid request received.";
                        break;
                }
                    
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
        return response()->json(['status' => $status, 'file_id' => encrypt($file_id),'message' => $message,'auth' => $user_auth,'action' => $post_data['pdf_cloud_action']]);

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

        if(Auth::check()){

        $temp_files = UserConvertedFiles::where('convert_file','=',decrypt($file_id))
            ->orderBy('created_at','asc')->get();

        }else{
            $temp_files = TempConvertFiles::where('file_id','=',decrypt($file_id))
            ->orderBy('created_at','asc')->get();
        }

       return view('edit_file',compact('temp_files'));

       
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

    public function check_file_extension($ext,$type)
    {
        
        $return = "false";
        if($type == 'edit_pdf' && $ext == 'pdf'){
            $return  = "true";
        }else if($type == 'png_pdf' && $ext == 'png'){
            $return  = "true";
        }else if($type == 'jpg_pdf' && ($ext == 'jpg' || $ext == 'jpeg')){
            $return  = "true";
        }else if($type == 'text_pdf' && $ext == 'txt'){
            $return  = "true";
        }else if($type == 'word_pdf' && $ext == 'docx' || $ext == 'doc'){
            $return  = "true";
        }

        //------------
        return $return;

    }

    public function libreoffice(Request $request)
    {
        
        //----------------------------------------------------------libreoffice

        $converter = new OfficeConverter(storage_path('pdf').'/test.docx');
        $converter->convertTo('output-file.pdf'); //generates pdf file in same directory as test-file.docx
        //--------------------------------------------------------------
        

    }
    public function PageArray(Request $request){

        

        if(Auth::check()){

        $temp_files = UserConvertedFiles::where('convert_file','=',decrypt($request->file_id))
            ->orderBy('created_at','asc')->get();
            
        }else{
           $temp_files = TempConvertFiles::where('file_id','=',decrypt($request->file_id))
            ->orderBy('created_at','asc')
            ->get();
        }

        return response()->json($temp_files);
    }
            //--------------------------------------------
    /**
     * @param Request $request
     */
    public function createWaterMark(Request $request){

        $temp_files = TempConvertFiles::where('file_id','=',decrypt($request->file_id))
            ->orderBy('created_at','asc')
            ->get();
        foreach($temp_files as $key => $temp_files_list){

            $image = Image::make($request->water_dataURL[$key]);
            $image->save(public_path('uploads/convert_file/').'WM_'.$temp_files_list->id.'.png');

            TempConvertFiles::create(['file_id'=>decrypt($request->file_id),'convert_file_name'=>'WM_'.$temp_files_list->id.'.png',
                'convert_file_name'=>'2','status'=>'1']);
        }
        $temp_files_res = TempConvertFiles::where('file_id','=',decrypt($request->file_id))
            ->where('convert_file_type','=','2')
            ->orderBy('created_at','asc')
            ->get();

        return response()->json($temp_files_res);
    }
}
