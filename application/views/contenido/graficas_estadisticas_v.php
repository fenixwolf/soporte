<div class="row">
		<div class="col-md-10 col-md-offset-1">
			<script type="text/javascript">			
      function drawVisualization() {

        // Create and populate the data table.
        var data = google.visualization.arrayToDataTable([
		['Task', 'Hours per Day'],
        ['Work', 11],
        ['Eat', 2],
        ['Commute', 2],
        ['Watch TV', 2],
        ['Sleep', 7]      
		
       		
        ]);
      
        // Create and draw the visualization.
        new google.visualization.PieChart(document.getElementById('visualization')).
            draw(data, {title:"So, how was your day?"});
      }
      

      google.setOnLoadCallback(drawVisualization);
			</script>
	<div id="visualization" style="width: 600px; height: 400px;"></div>		
		</div>
</div>