@extends('layout.header')

@section('content')
<h1>Albums</h1>
<ul class="list-group">
    @foreach($albums as $album)
    <li class="list-group-item" >
      {{$album->id}} {{$album->album_name}}
       <!-- <a href="../public/albums/{{$album->id}}/delete" class="btn btn-danger" style="float:right;color:white">Delete</a> -->
       <!-- <a href="../public/albums/{{$album->id}}/edit" class="btn btn-primary" style="float:right;color:white;margin-right:2%">Update</a> -->

      <a onclick="deleteRecord({{$album->id}})" class="btn btn-danger" style="float:right;color:white">Delete</a>
      <a onclick="editRecord({{$album->id}})" class="btn btn-primary" style="float:right;color:white;margin-right:2%">Update</a>

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

function editRecord(id)
{
  swal({
    title: "Modifica Record",
    text: "Vuoi davvero modificare il record con ID "+id,
    icon: "warning",
    buttons: true,
    dangerMode: true,
  })
  .then((willDelete) => {
    if (willDelete) {
      window.location.href = "../public/albums/"+id+"/edit";
    }

  });
}

</script>

@endsection
