<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class StatisticController extends Controller
{
    public function retriveStatistic ()
    {
      $chart = DB::select('select * from statistics');
      return view('chart',['chart'=>$chart]);

    }

}
