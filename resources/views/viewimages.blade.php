@extends('layout.header')

@section('content')
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Elenco Immagini per ALBUM</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome Album</th>
            <th>Immagine</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($images as $image)
          <tr>
            <td>{{$image->id}}</td>
            <td>{{$image->name}}</td>
            <td><img width="20%" src="{{$image->img_path}}" /></td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@stop
