<div class="row">
  
  <?php //echo '<pre>',print_r($mes),'</pre>';die;?>
		<div class="col-md-10 col-md-offset-1">
      <script type="text/javascript">

    google.load('visualization', '1', {packages: ['motionchart']});

    function drawVisualization() {
      var data = new google.visualization.DataTable();
      data.addColumn('string', 'Personal');
      data.addColumn('date', 'Date');
      data.addColumn('number', 'Servicios');
      
      data.addRows([
        <?php 
         foreach ($mes as $indice=>$array_grafico) {
         $total =$array_grafico['numero_incidencias'];
         $tecnico =$array_grafico['nombres_tecnico']." ".$array_grafico['apellidos_tecnico'];

         $fecha_final = date("Y,n,j",strtotime($array_grafico['fechas']));

         //echo '<pre>',print_r($fecha_final),'</pre>';die;
         echo '['."'".$tecnico."'".','." "."new Date(".$fecha_final.")".','." ".$total."]".","." ";

         }; ?>
        
      ]);
    
      var motionchart = new google.visualization.MotionChart(
          document.getElementById('visualization'));
      motionchart.draw(data, {'width': 800, 'height': 400});
    }
    

    google.setOnLoadCallback(drawVisualization);
  </script>

      
	<div id="visualization" style="width: 700px; height: 400px;"></div>		
		</div>
</div>