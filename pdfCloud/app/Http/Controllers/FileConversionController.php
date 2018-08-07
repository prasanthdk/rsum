<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;
use Illuminate\Support\Facades\Storage;
use App\TempFiles;
use App\TempConvertFiles;
use PDF;

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



	public static function convert($request,$imgfile)
	{
		$img = new Imagick(public_path().'/uploads/convert_file/'.$imgfile->convert_file_name);
		$img->setImageFormat('pdf');
		
		$ext = pathinfo(public_path().'/uploads/convert_file/'.$imgfile->convert_file_name, PATHINFO_EXTENSION);
		$filename = pathinfo(public_path().'/uploads/convert_file/'.$imgfile->convert_file_name, PATHINFO_FILENAME);
		
		$response = $img->writeImage(storage_path('pdf').'/'.$filename.'.pdf');

		return $response;

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

                        $tempfile = TempFiles::create(['file_name'=>$getfileName,'purpose' => $purpose,'purpose_type' => $purpose_type,'status'=>'1']);
                        $file_id = $tempfile->id;
                        if ($noOfPagesInPDF) {

                            for ($i = 0; $i < $noOfPagesInPDF; $i++) {

                                $image_name = ($i+1).'-'.time().'.png';

                                $url = $output_dir.'['.$i.']';

                                $image = new Imagick($url);
                               // $image->scaleImage(2550,3300);
                                $image->setResolution(300,300);
                                $image->readImage(public_path("uploads\original_file\\".$getfileName."[".$i."]"));
                                $image->scaleImage(1500,1500);
                                //set new format
                                $image->setImageFormat('png');
                                $image->writeImage(public_path("uploads\convert_file\\".$image_name));

                                $create_converted_file = TempConvertFiles::create(['file_id'=>$file_id,'convert_file_name'=>$image_name,'status'=>'1']);
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

    public static function convert_into_html($request)
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



}
