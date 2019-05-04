<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use DB;

class AlbumsController extends Controller
{
    public function index (Request $request) {

      //return Album::all();

      $sql = "SELECT * FROM albums where 1=1";

      $where =[];

      if ($request -> has('id'))
      {
        $where['id'] = $request->get('id');
        $sql .= " AND id=:id" ;
      }


      if ($request -> has('album_name'))
      {
        $where['album_name'] = $request->get('album_name');
        $sql .= " AND album_name=:album_name" ;

      }
      //dd($sql);
      $albums = DB::select($sql, array_values($where));

      return view('albums', ['albums' => $albums]);
    }

    public function delete($id)
    {
      $sql = "DELETE from albums WHERE id= :id";
      DB::delete($sql,['id' => $id] );
      return redirect()->back();

    }

}
