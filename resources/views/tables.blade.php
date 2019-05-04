@extends('layout.header')

@section('content')

<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Data Table Example</div>
  <div class="card-body">
    <div class="table-responsive">
      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>id</th>
            <th>Nome Album</th>
            <th>Descrizione</th>
          </tr>
        </thead>
        <tbody>
          @foreach ($album as $a)
          <tr>
            <td>{{$a->id}}</td>
            <td>{{$a->nome}}</td>
            <td>{{$a->descrizione}}</td>
          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection
