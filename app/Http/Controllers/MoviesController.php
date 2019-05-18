<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Unirest;

class MoviesController extends Controller
{
    public function findMovie(Request $key) {

      $key = request()->input('name');
      $response = Unirest\Request::get("https://movie-database-imdb-alternative.p.rapidapi.com/?page=1&r=json&s=$key",
        array(
          "X-RapidAPI-Host" => "movie-database-imdb-alternative.p.rapidapi.com",
          "X-RapidAPI-Key" => "7e992b921emshb93bc1094594b35p161dc3jsn6018fb941d49"
        )
      );

      $get_result_arr = json_encode($response);
      $array = json_decode($get_result_arr, true);
      $body=$array["body"]["Search"];

      return view('movie',['body'=>$body]);

    }
}
