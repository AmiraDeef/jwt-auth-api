<?php

namespace App\Http\Controllers;

use App\Http\Requests\ImageRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class ImageController extends Controller
{
    public function uploadImage(ImageRequest $request){
        $img=fopen($request->file('file'),'rb');
        //if i wanna to send any file to any api ,i should use HTTP class {attach} to send
        $response=HTTP::attach('file',$img)->post("http://127.0.0.1:5000/classify");
        fclose($img);
        return $response;



    }
}
