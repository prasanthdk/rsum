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

        $file_id = $key = $create_converted_file = $message = '';
        $key = '0000....11112222';

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
                            $file_id = $convert_into_image->file_id;
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
                        $convert_into_pdf = FileConversionController::convert_into_html($request);

                        if($convert_into_pdf['status'] && $validate_ext == "true")
                        {
                        
                            $status = TRUE;
                            $message = "File converted successfully.";
                            
                        }

                    }else{
                        $status = FALSE;
                        $message = "Invalid file format. Please upload a pdf file.";
                    }
                    break;
                    case "word_pdf":
                    case "pdf_word":
                    case "compress_pdf":
                    $status = FALSE;
                            $message = "This area of funtionality in progress";
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
        return response()->json(['status' => $status, 'file_id' => encrypt($file_id,$key),'message' => $message,'auth' => $user_auth,'action' => $post_data['pdf_cloud_action']]);

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
        }else if($type == 'word_pdf' && ($ext == 'doc' || $ext == 'docx')){
            $return  = "true";
        }

        //------------
        return $return;

    }

    public function libreoffice(Request $request)
    {

        //convert text to pdf - successfull out put
        // $phpWord = new \PhpOffice\PhpWord\PhpWord();
        // $content = file_get_contents('test.txt');
        // $section = $phpWord->addSection();
        // $section->addText(nl2br($section));
        // $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        // $objWriter->save(base_path().'\resources\views\word_html\doc.blade.php');
        
       
        // $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(base_path().'\resources\views\word_html\test.docx');

        // $pdf = PDF::loadView('word_html.doc');
        // $pdf->save(storage_path('pdf').'/invoiceasdf.pdf');
        //------------------------------------ end
        //--------------------------------------------convert a word file into html file
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        // $domPdfPath = base_path(). '\vendor\dompdf';
        // \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        // \PhpOffice\PhpWord\Settings::setPdfRendererName('DOMPDF');
        // // die('aa');

        $aaa = file_get_contents('test.txt');
        // file_put_contents(base_path().'\resources\views\word_html\doc.blade.php', $aaa);
        //----------------------------------------------
        // $phpWord = \PhpOffice\PhpWord\IOFactory::load(base_path().'\resources\views\word_html\test.txt');
        $section = $phpWord->addSection();
        $section->addText(nl2br($aaa));
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $objWriter->save(base_path().'\resources\views\word_html\doc.blade.php');
        // // // //----------------------------------------create pdf with converted html file
       
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(base_path().'\resources\views\word_html\test.docx');

        $pdf = PDF::loadView('word_html.doc');
        $pdf->save(storage_path('pdf').'/invoiceasdf.pdf');
        //---------------------------------------------------convert word to pdf
        // $domPdfPath = base_path(). '\vendor\dompdf\dompdf';
        // \PhpOffice\PhpWord\Settings::setPdfRendererPath($domPdfPath);
        // \PhpOffice\PhpWord\Settings::setPdfRendererName('DomPDF');

        // $phpWord = \PhpOffice\PhpWord\IOFactory::load(storage_path('pdf').'/test.txt');
        // $pdfWriter = \PhpOffice\PhpWord\IOFactory::createWriter( $phpWord, 'PDF' );
        // $pdfWriter->save(storage_path('pdf').'/invoiceasdf.pdf',true);

        //------convert pdf to word

    }
}
