@extends('layout.header')

@section('content')

<form action="{{ url('/movies') }}" method="GET">
  {{csrf_field()}}
    <div class="form-group">
      <label for="">Nome</label>
      <input type="text" name="name" id="name" class="form-control" placeholder="Nome..."  />
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
  </form>

@stop
