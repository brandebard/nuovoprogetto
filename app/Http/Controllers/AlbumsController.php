<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Album;
use DB;

class AlbumsController extends Controller
{

    public function index (Request $request) {

        $queryBuilder = Album::orderBy('id','DESC')->get();

      // $sql = "SELECT * FROM albums";
      // $albums = DB::select($sql);
      return view('albums.albums', ['albums' => $queryBuilder]);
    }



    public function delete($id)
    {
      // METODO CLASSICO
      // $sql = "DELETE from albums WHERE id= :id";
      // DB::delete($sql,['id' => $id] );

      // METODO Eloquent
      $queryBuilder = Album::where('id',$id)->delete();


      return redirect()->back();
    }


    public function edit($id)
    {
      // metodo classico
      // $sql = "select id,album_name,description from albums WHERE id= :id";
      // $albums = DB::select($sql,['id' => $id] );
      //dd($albums);
      $queryBuilder = Album::where('id',$id)->get();

        return view('albums.modifica')->with('albums',$queryBuilder[0]);

    }


    public function store($id, Request $req)
    {
      //MEDOTO CLASSICO

      // $data = request()->only(['name','description']);
      // $data['id'] = $id;
      //
      // $sql = 'update albums set album_name=:name,description=:description';
      // $sql.=' where id=:id';
      //
      // DB::update($sql, $data);

      // METODO Eloquent
      $data = Album::where('id',$id)->update(
          [
            'album_name' => request()->input('name'),
            'description' => request()->input('description'),
          ]

        );

      return redirect('/albums');
    }

}
