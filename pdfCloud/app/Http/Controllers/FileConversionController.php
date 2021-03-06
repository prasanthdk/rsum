<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Imagick;

use Illuminate\Support\Facades\Storage;

use App\TempFiles;

use App\TempConvertFiles;

use PDF;

use Auth;

use App\UserUploadedFiles;

use App\UserConvertedFiles;

use App\UserFiles;

use NcJoes\OfficeConverter\OfficeConverter;

class FileConversionController extends Controller
{
    //

    public function png_to_pdf(Request $request)
    {
        // $content = Storage::disk('pdf')->get('test.jpg');
        // echo $url = Storage::url('test.jpg');
        // echo storage_path('pdf').'\test.pdf';
        // Storage::disk('pdf')->delete('test.jpg');
        // echo asset('storage/file.txt');
        // print_r($content);
        die;
        //--tested-working
        // echo public_path();die;
        // $img = new Imagick(storage_path('1-1533131335.png'));
        // $img->setImageFormat('pdf');
        // echo $success = $img->writeImage(storage_path('test.pdf'));die;
        //---

        // $imageBytes = storage_path('test.jpg');
        // $img = new Imagick();
        // $img->readImageBlob($imageBytes);
        // $img->setImageFormat('pdf');
        // echo $success = $img->writeImage('path/to/image.pdf');die;

    }



    public static function convert_into_image($request)
    {
                    $purpose_type = '';
                    $purpose = '1';
                    $getfileName = time().'.'.$request->_uploadFile->getClientOriginalExtension();
                    $output_dir = public_path('uploads\\original_file\\').$getfileName;

                    if ($request->_uploadFile->move(public_path('uploads\\original_file\\'), $getfileName)) {

                        $im = new imagick($output_dir);
                        $noOfPagesInPDF = $im->getNumberImages();

                        if($request->input('pdf_cloud_action') == 'edit'){
                            $purpose = '1';
                            $purpose_type = 'pdf';
                        }else if($request->input('pdf_cloud_action') == 'convert'){
                            $purpose = '2';
                            $purpose_type = $request->input('pdf_cloud_Cto');
                        }else if($request->input('pdf_cloud_action') == 'compress'){
                            $purpose = '3';
                            $purpose_type = 'pdf';
                        }

                        if(Auth::check()){

                            $user = Auth::user();
                            $tempfile = UserUploadedFiles::create(['user_id'=> $user->id,'purpose' => $purpose,'purpose_type' => $purpose_type,'file' => $getfileName,'status'=>'1']);
                        }else{

                            $tempfile = TempFiles::create(['file_name'=>$getfileName,'purpose' => $purpose,'purpose_type' => $purpose_type,'status'=>'1']);
                        }
                        $file_id = $tempfile->id;

                        if ($noOfPagesInPDF) {

                            for ($i = 0; $i < $noOfPagesInPDF; $i++) {

                                $image_name = ($i+1).'-'.time().'.png';

                                $url = $output_dir.'['.$i.']';

                                $image = new Imagick($url);
                               // $image->scaleImage(2550,3300);
                                $image->setResolution(300,300);
                                $image->readImage(public_path("uploads\original_file\\".$getfileName."[".$i."]"));
                                $image->scaleImage(866,0);
                                //set new format
                                $image->setImageFormat('png');
                                $image->writeImage(public_path("uploads\convert_file\\".$image_name));

                                if(Auth::check())
                                {
                                    $user = Auth::user();
                                    $create_converted_file = UserConvertedFiles::create(['user_id'=> $user->id,'convert_file' => $file_id ,'convert_file_name' => $image_name,'status'=>'1']);
                                }else{


                                    $create_converted_file = TempConvertFiles::create(['file_id'=>$file_id,'convert_file_name'=>$image_name,'status'=>'1']);
                                }
                                
                            }
                        }else{
                            return response()->json(['status' => FALSE,'message' => 'Oops! Something went wrong. Please try again later.']);
                        }
                        
                    }else
                    {
                        return response()->json(['status' => FALSE,'message' => 'Oops! Something went wrong. Please try again later.']);
                    }

                    //-------------------------
                    $return['file_id'] = $file_id;
                    $return['status'] = TRUE;
                    
                    return $create_converted_file;

    }   

    public static function convert($request,$imgfile)//png, jpg to pdf
    {

        // echo public_path().'/uploads/convert_file/'.$imgfile->converted_file_name;die;
        $img = new Imagick(public_path().'/uploads/convert_file/'.$imgfile->convert_file_name);
        $img->setImageFormat('pdf');
        
        $ext = pathinfo(public_path().'/uploads/convert_file/'.$imgfile->convert_file_name, PATHINFO_EXTENSION);
        $filename = pathinfo(public_path().'/uploads/convert_file/'.$imgfile->convert_file_name, PATHINFO_FILENAME);
        
        $response = $img->writeImage(storage_path('pdf').'/'.$filename.'.pdf');

        //---------------------------------------------------------------------
        if(Auth::check()){

            $user = Auth::user();

            $purpose = UserUploadedFiles::where('id',$imgfile->convert_file)->select('purpose','purpose_type')->first();

            // print_r($purpose);die;

            $save = UserFiles::create(['user_id'=> $user->id,'output_file' => $filename.'.pdf','purpose' => $purpose->purpose,'purpose_type' => $purpose->purpose_type,'downloaded_count'=> '0','status' => '1']);

        }else
        {
    
            // $create_converted_file = TempConvertFiles::create(['file_id'=>$imgfile->id,'convert_file_name'=> $filename.'.pdf']);

            $create_converted_file = TempConvertFiles::where('id',$imgfile->id)->update(['convert_file_name'=> $filename.'.pdf']);
        }
        //---------------------------------------------------------------------

        return true;

    }

    public static function convert_into_html($request)//text to pdf
    {

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $phpWord->setDefaultFontName('courier');
        $content = file_get_contents($request->_uploadFile);//file_get_contents('test.txt');

        $section = $phpWord->addSection();
        $section->addText(nl2br(preg_replace('~(?<= ) ~', '&nbsp;',$content)));
        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'HTML');
        $objWriter->save(base_path().'\resources\views\word_html\doc.blade.php');
        
       
        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(base_path().'\resources\views\word_html\test.docx');

        $pdf = PDF::loadView('word_html.doc');
        $pdf->save(storage_path('pdf').'/invoiceasdf.pdf');

         
        $return['status'] = TRUE;
        return $return;
    }

    public static function doc_convert_into_pdf($request)
    {

        //---------------------------------------------------------------move uploaded file
        $fileNameUnique = time();
        $ext = $request->_uploadFile->getClientOriginalExtension();
        $fileName = $fileNameUnique.'.'.$ext;
        $uploadDir = storage_path('pdf');

        if ($request->_uploadFile->move($uploadDir, $fileName)) {
            $converter = new OfficeConverter(storage_path('pdf/').$fileName);
            $convert = $converter->convertTo($fileNameUnique.'.pdf'); //generates pdf file in same directory as test-file.docx
            if(Auth::check())
            {
                $user = Auth::user();
                $tempfile = UserUploadedFiles::create(['user_id'=> $user->id,'purpose' => '2','purpose_type' => 'word_pdf','file' => $fileName,'status'=>'1']);

                $save = UserFiles::create(['user_id'=> $user->id,'output_file' => $fileName.'.pdf','purpose' => '2','purpose_type' => 'word_pdf','downloaded_count'=> '0','status' => '1']);

                
            }else{

                $tempfile = TempFiles::create(['file_name'=>$fileName,'purpose' => '2','purpose_type' => 'word_pdf','status'=>'1']);

                $create_converted_file = TempConvertFiles::create(['file_id'=>$tempfile->id,'convert_file_name'=> $fileNameUnique.'.pdf','status'=>'1']);
                
            }
            
            $return['status'] = TRUE;

        }else{
            $return['status'] = FALSE;
        }

        return $return;


    }

    public static function txt_convert_into_pdf($request)//word to pdf
    {

        //---------------------------------------------------------------move uploaded file
        $fileNameUnique = time();
        $ext = $request->_uploadFile->getClientOriginalExtension();
        $fileName = $fileNameUnique.'.'.$ext;
        $uploadDir = storage_path('pdf');

        if ($request->_uploadFile->move($uploadDir, $fileName)) {
            $converter = new OfficeConverter(storage_path('pdf/').$fileName);
            $convert = $converter->convertTo($fileNameUnique.'.pdf'); //generates pdf file in same directory as test-file.docx

            $tempfile = TempFiles::create(['file_name'=>$fileName,'purpose' => '2','purpose_type' => $request->input('pdf_cloud_Cto'),'status'=>'1']);    
            $create_converted_file = TempConvertFiles::create(['file_id'=>$tempfile->id,'convert_file_name'=>$fileNameUnique.'.pdf','status'=>'1']);

            $return['status'] = TRUE;

        }else{
            $return['status'] = FALSE;
        }

        return $return;


    }


    public static function pdf_convert_into_doc($request)//word to pdf
    {

        //---------------------------------------------------------------move uploaded file
        // $fileNameUnique = time();
        // $ext = $request->_uploadFile->getClientOriginalExtension();
        // $fileName = $fileNameUnique.'.'.$ext;
        // $uploadDir = storage_path('pdf');

        // if ($request->_uploadFile->move($uploadDir, $fileName)) {
        //     $converter = new OfficeConverter(storage_path('pdf/').$fileName);
        //     $convert = $converter->convertTo($fileNameUnique.'.docx'); //generates pdf file in same directory as test-file.docx

        //     $tempfile = TempFiles::create(['file_name'=>$fileName,'purpose' => '2','purpose_type' => $request->input('pdf_cloud_Cto'),'status'=>'1']);    
        //     $create_converted_file = TempConvertFiles::create(['file_id'=>$tempfile->id,'convert_file_name'=>$fileNameUnique.'.pdf','status'=>'1']);

        //     $return['status'] = TRUE;

        // }else{
        //     $return['status'] = FALSE;
        // }

        // return $return;


    }


}
