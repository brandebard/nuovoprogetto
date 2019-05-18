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
            <th>Titolo</th>
            <th>Anno</th>
            <th>ImdbID</th>
            <th>Tipo</th>
            <th>Image</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($body as $a)
          <tr>
            <td>{{ $a['Title'] }}</td>
            <td>{{ $a['Year'] }}</td>
            <td>{{ $a['imdbID'] }}</td>
            <td>{{ $a['Type'] }}</td>
            <td><img width="50%" src="{{ $a['Poster'] }}" /></td>

          </tr>
        @endforeach
        </tbody>
      </table>
    </div>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>
@endsection
