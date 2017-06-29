@extends('layouts.homepage')
@section('content')
<html>
  <head>
    <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
    <script type="text/javascript">
      google.charts.load('current', {'packages':['bar']});
      google.charts.setOnLoadCallback(drawChart);

      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Year', 'Weight'],
          @foreach($data as $value)
            ['{!!$value->year!!}', {{$value->weight}}],
          @endforeach
        ]);

        var options = {
          chart: {
            title: 'Beehive weight',
            subtitle: '',
          }
        };

        var chart = new google.charts.Bar(document.getElementById('columnchart_material'));

        chart.draw(data, google.charts.Bar.convertOptions(options));
      }
    </script>
  </head>
  <body>
    <div id="columnchart_material" style="width: 800px; height: 500px;"></div>

    <div class="beehive-values">
      @foreach($data as $value)
      <p>Year:{{$value->year}}, Weight: {{$value->weight}} <button><a href="delete/{{$value->year}}">DELETE</a></button></p>
      @endforeach
    </div>

    <div class="insert-values">
      <h2>Insert new values:</h2>
      <form class="insert-form" action="insert" method="post">
        {{csrf_field()}}
        <label for="">Year</label>
        <input type="number" name="year" value="">

        <label for="">Weight</label>
        <input type="text" name="weight" value="">
        <button type="submit" name="submit">Add</button>
      </form>
    </div>
  </body>
</html>
@endsection
