<html>
	<head>
		<?php 
     		require 'INC/Head.php';
    	?>
    	<script type="text/javascript">

    		$(document).ready(function()
			{

		       

		    });
			
			
	
    	</script>
	</head>
	<body>
		<?php 
      		require 'INC/Header.php';
    	?>
    	<div class="container">
      		<h1><span class="label label-primary">Toma de asistencia</span></h1>
      		<br/>
      		<div class="jumbotron">
        		<div class="container">
          			<form action="" role="form" class="form-horizontal" id="frmAlumno">
          				<div class="col-md-4">
	            			<div class="form-group">
				                <label for="IDAlumno">ID Alumno</label>
				                <input type="text" name="IDAlumno" class="form-control" id="IDAlumno" placeholder="ID del Alumno">
				           	</div>
				       	</div>
				       	<div class="col-md-4">
	            			<div class="form-group">
				           		<label for="Nombre">Nombre</label>
				                <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre">
				          	</div>
				      	</div>
			          	<div class="col-md-4">
				            <div class="form-group">
				           		<label for="Ape_Pat">Apellido Paterno</label>
				                <input type="text" name="Ape_Pat" class="form-control" id="Ape_Pat" placeholder="Apellido Paterno">
				          	</div>
			          	</div>
			          	<div class="col-md-12">
              				<button class="btn btn-lg btn-success" id="btnBuscar">Buscar</button>
            			</div>
          			</form>
          			<table class="table" id="tbAlumno">
          				<thead>
          					<tr>
          						<th>ID Alumno</th>
          						<th>Nombre Completo</th>
          						<th></th>
          						<th></th>
          					</tr>
          				</thead>
          				<tbody>
          				</tbody>
          			</table>
        		</div>
      		</div>
    	</div>
	</body>
</html>