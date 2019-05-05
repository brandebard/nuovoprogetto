@extends('layout.header')

@section('content')
<h1>Albums</h1>
<ul class="list-group">
    @foreach($albums as $album)
    <li class="list-group-item" >
      {{$album->id}} {{$album->album_name}}
      <!-- <a href="../public/albums/{{$album->id}}/delete" class="btn-danger">DELETE</a> -->
      <a onclick="deleteRecord({{$album->id}})" class="btn btn-danger" style="float:right;color:white">Delete</a>

    </li>

    @endforeach
</ul>

@endsection

@section('footer')

@parent
<script>
  function deleteRecord(id)
  {
    swal({
      title: "Elimina Record",
      text: "Vuoi davvero eliminare il record con ID "+id,
      icon: "warning",
      buttons: true,
      dangerMode: true,
    })
    .then((willDelete) => {
      if (willDelete) {

        $.ajax({
            url: "../public/albums/"+id+"/delete",
            type: 'GET',
  		            success: function ()
                  {
                    swal("Il record è stato correttamente eliminato",{icon:"success"});

                      setTimeout(function(){ location.reload(); }, 500);
                  }

        });

      }
       else {
        swal("Il tuo file è salvo!");
      }

    });
}
</script>

@endsection
