@extends('layout.header')

@section('content')

<h1>Edit Album</h1>
  <form action="../{{$albums->id}}" method="POST">
    {{csrf_field()}}
    <input type="hidden" name="_method" value="PATCH">
      <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Album name..." value="{{$albums->album_name}}" />
      </div>

      <div class="form-group">
        <label for="">Description</label>
        <textarea name="description" id="description" class="form-control" placeholder="Description...">
          {{$albums->description}}
        </textarea>
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
