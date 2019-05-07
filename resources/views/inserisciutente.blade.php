@extends('layout.header')

@section('content')

<h1>Inserisci Utente</h1>
  <form action="{{ url('/users/insert') }}" method="POST">
    {{csrf_field()}}
      <div class="form-group">
        <label for="">Nome</label>
        <input type="text" name="name" id="name" class="form-control" placeholder="Nome..."  />
      </div>

      <div class="form-group">
        <label for="">Email</label>
        <input type="text" name="email" id="email" class="form-control" placeholder="Email..." />
      </div>

      <div class="form-group">
        <label for="">Password</label>
        <input type="text" name="password" id="password" class="form-control" placeholder="Password..." />
      </div>

      <div class="form-group">
        <label for="">Contratti Creati</label>
        <input type="text" name="oggetti" id="oggetti" class="form-control" placeholder="Contratti Creati..."  />
      </div>

      <button type="submit" class="btn btn-primary">Submit</button>
    </form>
@stop
