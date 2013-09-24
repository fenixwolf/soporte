<div class="row">
		<div class="col-md-10 col-md-offset-1">
      <?php //echo '<pre>',print_r($mes),'</pre>';die; ?>
			<script type="text/javascript">			
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
        var data = google.visualization.arrayToDataTable([

          ['Task', 'Hours per Day'],

        <?php 
         foreach ($mes as $indice=>$arraymes) {
         $total=$arraymes['count'];
         $tecnico=$arraymes['nombres_tecnico']." ".$arraymes['apellidos_tecnico'];
         echo '['."'".$tecnico."'".','." ".$total."]".","." ";
         }; ?>
        

        ]);
        var options = {
          title:"ESTADÍSTICAS GENERALES POR TÉCNICO",
          is3D: true,
          backgroundColor: "#DFDFDF"
        }

        // Create and draw the visualization.
        new google.visualization.PieChart(document.getElementById('visualization')).
            draw(data,options);
      }
      

      google.setOnLoadCallback(drawVisualization);
			</script>     
      
	<div class="col-md-8" id="visualization" style="width: 50em; height: 30em;"></div>
	
		</div>
</div>