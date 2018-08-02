<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Imagick;
use Illuminate\Support\Facades\Storage;

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
		
		$success = $img->writeImage(storage_path('pdf').'/'.$filename.'.pdf');

		return $success;

	}


}