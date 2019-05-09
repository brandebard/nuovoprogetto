<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UtentiController extends Controller
{
    public function show()
    {
    //  $sql='select * from users';
      $queryBuilder = DB::table('users')->orderBy('id','desc')->where('id','>',5)->get();
      return view('users', ['users' => $queryBuilder]);
    }

    public function delete($id)
    {
      $sql = DB::table('users')->where('id',$id)->delete();
      return redirect()->back();
    }

    public function edit($id)
    {
      $sql = "select id,name,email,oggetti_posseduti from users WHERE id= :id";
      $users = DB::select($sql,['id' => $id] );
      //dd($albums);
        return view('utentimodifica')->with('users',$users[0]);
    }

    public function store($id, Request $req)
    {
      $data = request()->only(['name','email','oggetti']);
      $data['id'] = $id;

      $sql = 'update users set name=:name,email=:email,oggetti_posseduti=:oggetti';
      $sql.=' where id=:id';
      DB::update($sql, $data);
      $messaggio = $sql ? 'Album con id = '.$id.' aggiornato': 'Album non aggiornato';
      session()->flash('message',$messaggio);
      return redirect('/users');
    }


    public function insert(Request $req)
    {
      $data = request()->only(['name','email','oggetti','password']);
      $data['created_at'] = now();

      $sql = 'insert into users (name,email,oggetti_posseduti,password,created_at)
              values (:name,:email,:oggetti,:password,:created_at)';

      DB::insert($sql, $data);
      return redirect('/users');
    }



}
