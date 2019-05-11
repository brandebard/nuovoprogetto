@extends('layout.header')

@section('content')
<div>
  @if (session()->has('message'))
    <div class="alert alert-info">{{ session()->get('message') }}</div>
  @endif
<a style="float:left;" href="{{url('/inserisciutente')}}" class="btn btn-primary" style="float:right;color:white;margin-right:2%">Inserisci Utente</a>
</div>
<br><br>
<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-table"></i>
    Elenco Utenti</div>
  <div class="card-body">

    <div class="table-responsive">

      <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
          <tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Email</th>
            <th>Data Creazione</th>
            <th>Contratti Creati</th>
            <th>Modifica</th>
            <th>Elmina</th>

          </tr>
        </thead>
        <tbody>
          @foreach ($users as $user)
          <tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->email}}</td>
            <td>{{$user->created_at}}</td>
            <td>{{$user->oggetti_posseduti}}</td>
            @if ($user->album_thumb)
            <td style="text-align:center"><img width="15%" src="http://localhost/test/nuovoprogetto/storage/app/{{$user->album_thumb}}" alt=""/></td>
            @endif
            <td><a onclick="editRecord({{$user->id}})" class="btn btn-primary" style="float:right;color:white;margin-right:2%">Update</a>
            </td>
            <td><a onclick="deleteRecord({{$user->id}})" class="btn btn-danger" style="float:right;color:white">Delete</a></td>

          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
</div>

    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-bar"></i>
        Bar Chart Example</div>
      <div class="card-body">
        <canvas id="BarChart" width="100%" height="50"></canvas>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
@endsection

@section('footer')
<script>
$('document').ready(function()
{
$('div.alert').fadeOut(3000);
})


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
            url: "../public/users/"+id+"/delete",
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
      window.location.href = "../public/users/"+id+"/edit";
    }

  });
}


var ctx = document.getElementById("BarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [@foreach ($users as $user) "{{ $user->name }}", @endforeach],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [@foreach ($users as $user) "{{ $user->oggetti_posseduti }}", @endforeach],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'month'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 10
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 300,
          maxTicksLimit: 10
        },
        gridLines: {
          display: true
        }
      }],
    },
    legend: {
      display: false
    }
  }
});

</script>



@endsection
