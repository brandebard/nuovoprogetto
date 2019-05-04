@extends('layout.header')

@section('content')

<div class="card mb-3">
  <div class="card-header">
    <i class="fas fa-chart-area"></i>
    Area Chart Example</div>
  <div class="card-body">
    <canvas id="AreaChart" width="100%" height="30"></canvas>
  </div>
  <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
</div>

<div class="row">
  <div class="col-lg-8">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-bar"></i>
        Bar Chart Example</div>
      <div class="card-body">
        <canvas id="BarChart" width="100%" height="50"></canvas>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </div>

  <div class="col-lg-4">
    <div class="card mb-3">
      <div class="card-header">
        <i class="fas fa-chart-pie"></i>
        Pie Chart Example</div>
      <div class="card-body">
        <canvas id="myChart" width="100%" height="100"></canvas>
      </div>
      <div class="card-footer small text-muted">Updated yesterday at 11:59 PM</div>
    </div>
  </div>

</div>

<p class="small text-center text-muted my-5">
  <em>More chart examples coming soon...</em>
</p>

</div>
@endsection

@section('footer')
@parent
<script>
Chart.defaults.global.defaultFontFamily = '-apple-system,system-ui,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,sans-serif';
Chart.defaults.global.defaultFontColor = '#292b2c';

// Pie Chart Example
var ctx = document.getElementById("myChart");
var myPieChart = new Chart(ctx, {
  type: 'pie',
  data: {
    labels: [ @foreach ($chart as $ch) "{{ $ch->paese }}", @endforeach] ,

    datasets: [{
      data: [@foreach ($chart as $ch) "{{ $ch->valore }}", @endforeach],
      backgroundColor: [
        @foreach ($chart as $ch)
        <?php
        $rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
        $color = '"'.'#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].'"';
        echo $color.",";
        ?>
        @endforeach
      ],
    }],

  },
});



var ctx = document.getElementById("BarChart");
var myLineChart = new Chart(ctx, {
  type: 'bar',
  data: {
    labels: [@foreach ($chart as $ch) "{{ $ch->paese }}", @endforeach],
    datasets: [{
      label: "Revenue",
      backgroundColor: "rgba(2,117,216,1)",
      borderColor: "rgba(2,117,216,1)",
      data: [@foreach ($chart as $ch) "{{ $ch->valore }}", @endforeach],
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
          maxTicksLimit: 6
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 1000,
          maxTicksLimit: 5
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



var ctx = document.getElementById("AreaChart");
var myLineChart = new Chart(ctx, {
  type: 'line',
  data: {
    labels: [@foreach ($chart as $ch) "{{ $ch->paese }}", @endforeach],
    datasets: [{
      label: "Valore",
      lineTension: 0.3,
      backgroundColor: "rgba(2,117,216,0.2)",
      borderColor: "rgba(2,117,216,1)",
      pointRadius: 5,
      pointBackgroundColor: "rgba(2,117,216,1)",
      pointBorderColor: "rgba(255,255,255,0.8)",
      pointHoverRadius: 5,
      pointHoverBackgroundColor: "rgba(2,117,216,1)",
      pointHitRadius: 50,
      pointBorderWidth: 2,
      data: [@foreach ($chart as $ch) "{{ $ch->valore }}", @endforeach],
    }],
  },
  options: {
    scales: {
      xAxes: [{
        time: {
          unit: 'date'
        },
        gridLines: {
          display: false
        },
        ticks: {
          maxTicksLimit: 7
        }
      }],
      yAxes: [{
        ticks: {
          min: 0,
          max: 1000,
          maxTicksLimit: 5
        },
        gridLines: {
          color: "rgba(0, 0, 0, .125)",
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
