<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;

class HomeController extends Controller
{
    public function validateVimeo(Request $res)
    {
    	$url = $res->url;
    	$regs = array();
        $video_id = 0;
    
        if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
            $video_id = $regs[3];

            $response = Curl::to('https://api.vimeo.com/videos/'.$video_id)->get();
        	dd($response);
        } else {
        	dd("Not a vimeo video");
        }
    }
}
