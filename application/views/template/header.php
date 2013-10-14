<header id='<?="header".rand(1,6)?>'>
<div class="row">
	<div class="col-md-1 hidden-xs hidden-sm">
		<img src=<?=base_url()."dist/img/SGI-logo.svg"?> alt="Logo" class="img-responsive" id="logo_sgi">
	</div>
	<!--
	<div class="col sm-1 hidden-xs hidden-md hidden-lg">
		<img src=<?=base_url()."dist/img/SGI-logo.svg"?> alt="Logo" class="img-responsive" id="logo_sgi">
	</div>-->
	<div class="col-md-7">
		<h1> <?php echo $titulo?></h1>

	</div>


</div>

</header>

<div class="row">
	<div class="col-md-10 col-md-offset-1">

	<nav class="navbar default" role="navigation" >

	<div class="navbar-header">
   			<button class="navbar-toggle" data-target=".despliegue_navbar" data-toggle="collapse" type="button" >
      		<i class="icon-long-arrow-down"></i> Desplegar
    		</button>
    <a class="navbar-brand" href=<?=base_url()?>>SGI</a>
  	</div>
	<nav class="collapse navbar-collapse despliegue_navbar" role="navigation" >
	
		<ul class="nav navbar-nav">

		 <li ><a href=<?=base_url()."tecnicos";?>>Técnicos</a></li>
		 <li ><a href=<?=base_url()."departamentos";?>>Departamentos u Oficinas</a></li>
		 <!--<li><a href=<?=base_url()."roles";?>>Roles</a></li>-->
		 <li ><a href=<?=base_url()."reportar";?>>Reportar</a></li>
		 <li ><a href=<?=base_url()."incidencias";?>>Incidencias</a></li>
		 <li ><a href=<?=base_url()."estadisticas";?>>Estadisticas</a></li>
		</ul>

		<!-- Para Usuarios Logeados-->
		<ul class="nav navbar-nav navbar-right">
		<?if ($this->session->userdata('correo') !=NULL):?>
		<div class="btn-group  btn-sm">
  		<a class="btn btn-default btn-sm dropdown-toggle" href="#"><i class="icon-user"></i> <?=$this->session->userdata('correo')  ?></a>
  		<a class="btn btn-default btn-sm dropdown-toggle" data-toggle="dropdown" href="">
    	<span class="icon-caret-down"></span></a>
  		<ul class="dropdown-menu">
  		<li><a href="#"><i class="icon-fixed-width icon-trash"></i> Otra Acción</a></li>
    	<li class="divider"></li>
    	<li><a href="<?=base_url()?>seguridad/fin_sesion"><i class="icon-fixed-width icon-trash"></i> Salir</a></li>
  		</ul>
		</div>
		
		<? endif;?>
      	<!---->
		


      <li class="dropdown">
        <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class='icon-lock'></i> Seguridad<b class="caret"></b></a>
        <ul class="dropdown-menu">
        	<li><a href="<?=base_url()?>seguridad/login"><i class='icon-unlock-alt'></i> Ingreso al Sistema</a></li>
          <li><a href="<?=base_url()?>seguridad"> Permisos Asignados</a></li>
          <li><a href="<?=base_url()?>seguridad/seguridad_menu"> Permisos a Menú</a></li>
          
        </ul>
      </li>	
    </ul>
		
	</nav>	
		
	</nav>


	</div>
	
</div>