@extends('layout.header')

@section('content')

<h1>Aggiorna Utente</h1>
  <form action="../{{$users->id}}" method="POST" enctype="multipart/form-data">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PATCH">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Album name..." value="{{$users->name}}" />
      </div>

      <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Album name..." value="{{$users->email}}" />
      </div>

      <div class="form-group">
        <label for="">Contratti Creati</label>
        <input type="text" name="oggetti" id="oggetti" class="form-control" placeholder="Album name..." value="{{$users->oggetti_posseduti}}" />
      </div>

      <div class="form-group">
        <label for="">Cambia Immagine</label>
        <img src="{{$users->album_thumb}}" />
        <input type="file" name="album_thumb" id="album_thumb" class="form-control" />
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
