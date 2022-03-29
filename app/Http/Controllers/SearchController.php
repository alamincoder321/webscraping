<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class SearchController extends Controller
{
    private $url = 'https://api.themoviedb.org/3/movie/';

    public function index()
    {
        return view('index');
    }

    public function search(Request $request)
    {

        $key = $request->search;
        
        // if (trim($key, '\0') == null) {
        //     Session::flash('msg', "Please Enter Movie Id");
        //     return back();
        // }else {
        //     $all = Http::get($this->url . $key . '?api_key=955df506af92364cd94a8289d4165e01')->json();

        //     if (isset($all['success'])) {
        //         Session::flash('msg', "Please Enter Absolute Movie Id");
        //         return back();
        //     }else{
        //         // return view('search', compact('all'));
        //     }
        // }


            $all = Http::get($this->url . $key . '?api_key=955df506af92364cd94a8289d4165e01')->json();

            return response()->json(['data' => $all]);
    }
}
