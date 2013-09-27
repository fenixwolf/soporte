<div class="row">
  
  <?php //  echo '<pre>',print_r($mes),'</pre>';die;?>
  <div class="col-md-10 col-offset-1">
    <script type="text/javascript" src="https://www.google.com/jsapi"></script>
    <script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([
          ['Técnicos', 'Servicios Asignados'],
          <?php 
         foreach ($mes as $indice=>$array_grafico) {
         $total =$array_grafico['numero_incidencias'];
         $tecnico =$array_grafico['nombres_tecnico']." ".$array_grafico['apellidos_tecnico'];

         $fecha_final = $array_grafico['fechas'];

         //echo '<pre>',print_r($fecha_final),'</pre>';die;
         echo '['."'".$tecnico."'".','." ".$total."]".","." ";

         }; ?>
          
         
        ]);

        var options = {
          title: 'RELACIÓN DE SERVICOS ASIGNADOS',
          hAxis: {title: 'TÉCNICOS', titleTextStyle: {color: 'grey'}},
          backgroundColor: "#DFDFDF",
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
    </script>
  
 
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
 
  </div>
    
		
</div>