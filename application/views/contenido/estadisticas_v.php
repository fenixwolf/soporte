
<?php 
			//echo '<pre>',print_r($estadistica_hoy),'</pre>';die;
			foreach ($lista_tecnicos as $indice=>$arraytecnico) {
			$dropdown_tecnico[$arraytecnico['id']] = $arraytecnico['nombres_tecnico']." ".$arraytecnico['apellidos_tecnico'];
			//echo '<pre>',print_r($dropdown_tecnico),'</pre>';die;
			// Creación de una arreglo a partir de los datos traído para el dropdown!!
			};

			foreach ($lista_meses as $indice=>$arraymeses) {
				if ($arraymeses['fechas']=="1") {
					$meses["1"]="Enero";
				};

				if ($arraymeses['fechas']=="2") {
					$meses["2"]="Febrero";
				};
				if ($arraymeses['fechas']=="3") {
					$meses["3"]="Marzo";
				};
				if ($arraymeses['fechas']=="4") {
					$meses["4"]="Abril";
				};
				if ($arraymeses['fechas']=="5") {
					$meses["5"]="Mayo";
				};
				if ($arraymeses['fechas']=="6") {
					$meses["6"]="Junio";
				};
				if ($arraymeses['fechas']=="7") {
					$meses["7"]="Julio";
				};
				if ($arraymeses['fechas']=="8") {
					$meses["8"]="Agosto";
				};
				if ($arraymeses['fechas']=="9") {
					$meses["9"]="Septiembre";
				};
				if ($arraymeses['fechas']=="10") {
					$meses["10"]="Octubre";
				};
				if ($arraymeses['fechas']=="11") {
					$meses["11"]="Noviembre";
				};
				if ($arraymeses['fechas']=="12") {
					$meses["12"]="Diciembre";
				};
			
			//echo '<pre>',print_r($dropdown_tecnico),'</pre>';die;
			// Creación de una arreglo a partir de los datos traído para el dropdown!!
			};
			
			$form = array(
				'class' =>'form-inline' ,
				'role' =>'form' ,
				'id'=>'ver_estadistica_global' 
				);
			$submit = array(
				'class' =>'btn btn-primary' ,
				'value'=>'Generar',
				'id'=>'enviar',
				'name'=>"enviar",

				//'data-loading-text'=>"Generando...",
				
				);
			$form_group='<div class="form-group">';
			$form_group_close='</div>';

			$div_class='<div class="form-group">';
			$div_close='</div>';
			
		?>
		<!Formulario de estadísticas generales!>

		<div class="row" id="formularios_estadisticos">
			
			<div class="col-md-3">
				<?php
			
			echo form_open('estadisticas/globales',$form);
			echo $form_group;
			echo form_label('Estadisticas Globales: ',"estadisticas_globales");
			?>
			<a href='javascript:enviarform1()' class="btn btn-small btn-primary" id='girar'>
				<i class='icon-cog'></i> Generar
			</a>
			<?php
			
			
			echo $form_group_close;
			echo form_close();
		?>
		</div>	

		<!Formulario de estadísticas por_mes!>
		
			<div class="col-md-3">
				<?php
			echo form_open('estadisticas/por_mes',$form);
			echo $form_group;
			echo form_label('Busqueda por mes: ',"filtro_mes");
			echo form_dropdown('filtro_mes', $meses,mdate("%m",now()));
			echo $form_group_close;
			echo $form_group;
			echo form_submit($submit);
			echo $form_group_close;

			echo form_close();
				?>
		</div>	
	
		<!--Formulario de estadísticas por técnico
			<div class="col-md-3">
				<?php
			
			$limpiar = array(
				'name' =>'limpiar' ,
				'value'=>'Limpiar',
				'class'=>'btn btn-warning',

				);
			echo form_open('estadisticas/por_tecnicos',$form);
			echo $form_group;
			echo form_label('Técnico Asignado: ',"tecnico_asignado");
			echo form_dropdown('tecnico_asignado', $dropdown_tecnico);
			echo $form_group_close;
			echo form_submit($submit);
			
			echo form_reset($limpiar);
	
			form_close();	?>
		
			</div>
		-->
		
		</div>
		<div class="row">
			<div class="col-md-8">
				<script type="text/javascript" src="https://www.google.com/jsapi"></script>
    			<script type="text/javascript">
      			google.load("visualization", "1", {packages:["corechart"]});
      			google.setOnLoadCallback(drawChart);
      			function drawChart() {
        		var data = google.visualization.arrayToDataTable([
        <!--Grafica-->			
         ['Técnicos', 'Servicios Asignados'],
          <?php 
         foreach ($estadistica_hoy as $indice=>$array_grafico) {
         $total =$array_grafico['numero_incidencias'];
         $tecnico =$array_grafico['nombres_tecnico']." ".$array_grafico['apellidos_tecnico'];

         $fecha_final = $array_grafico['fechas'];

         //echo '<pre>',print_r($fecha_final),'</pre>';die;
         echo '['."'".$tecnico."'".','." ".$total."]".","." ";

         }; ?>
          
         
        ]);

        var options = {
          title: 'RELACIÓN DE SERVICOS ASIGNADOS HOY',
          hAxis: {title: 'TÉCNICOS', titleTextStyle: {color: 'grey'}},
          backgroundColor: "#DFDFDF",
        };

        var chart = new google.visualization.ColumnChart(document.getElementById('chart_div'));
        chart.draw(data, options);
      }
      function enviarform1(){
      		$("#ver_estadistica_global").submit();
      }
    </script>
  
 
    <div id="chart_div" style="width: 900px; height: 500px;"></div>
			</div>
		</div>		
