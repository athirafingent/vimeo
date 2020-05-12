<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ixudra\Curl\Facades\Curl;
use Vimeo\Laravel\Facades\Vimeo;


class HomeController extends Controller
{
    public function validateVimeo(Request $res)
    {
    	// dd(Vimeo::connection('main')->request('/me/videos', ['per_page' => 10], 'GET'));

    	$url = $res->url;
    	$regs = array();
        $video_id = 0;
    
        if (preg_match('%^https?:\/\/(?:www\.|player\.)?vimeo.com\/(?:channels\/(?:\w+\/)?|groups\/([^\/]*)\/videos\/|album\/(\d+)\/video\/|video\/|)(\d+)(?:$|\/|\?)(?:[?]?.*)$%im', $url, $regs)) {
            $video_id = $regs[3];

            // $response = Curl::to('https://api.vimeo.com/videos/'.$video_id)->get();
            $response = Vimeo::request('/videos/'.$video_id, [ ], 'GET');
        	dd($response);
        	// https://vimeo.com/417195609
        } else {
        	dd("Not a vimeo video");
        }
    }
}
