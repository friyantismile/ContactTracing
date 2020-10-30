<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Revolution\Google\Sheets\Facades\Sheets;

class HomeController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     *
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        $append = [
            "Uniqe Code"=>"code 1s",
            "Firstname"=>"25"
        ];

        Sheets::spreadsheet(config("google.post_spreadsheet_id"))
              ->sheet(config("google.post_sheet_id"))
              ->append([$append]);

         /**
         * Service Account demo. 
         */
        $sheets = Sheets::spreadsheet("1UXuu4J4YNKV8x2cGwOzRPoW4wncvtX7vQEG_j_vCKK8")
                        ->sheet("Sheet1")
                        ->get();
       
        //$header = $sheets->pull(0);
        $header = [
            'name',
            'age',
        ];

        $posts = Sheets::collection($header, $sheets);
        
        $posts = $posts->reverse()->take(10);
        dd($posts);

        return view('welcome')->with(compact('posts'));
    }
}