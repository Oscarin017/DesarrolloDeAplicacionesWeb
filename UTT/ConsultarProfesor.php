<html>
	<head>
		<?php 
     		require 'INC/Head.php';
    	?>
    	<script type="text/javascript">

    		$(document).ready(function()
			{

		        $("#Buscar").click(function(event)
	    		{
	    			limpiarTabla();
	    			llenarTabla();
	    		}); 

	    		$("#tbAlumno").on("click", "button", function(event)
	    		{
	    			insertarGruAlu($("#Grupo").val(), $(this).val())
	    		});	 

		    });
			
			function llenarTablaAlumno()
			{
				$.ajax(
		        {
		        	url: 'INC/SeleccionProfesor2.php',
		          	type: 'POST',
		          	datatype: 'json',
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, a)
		          	{
		            	$("#tbAlumno tbody").append("<tr>\
		            		<td>"+a.iIDProfesor_Pro+"</td>\
		            		<td>"+a.vApellidoPaterno_Pro+" "+a.vApellidoMaterno_Pro+" "+a.vNombre_Pro+"</td>\
		            		<td><button class='btn btn-sm btn-primary' value='"+a.iIDProfesor_Pro+"'>Agregar</button></td>\
		            		<td><button class='btn btn-sm btn-primary' value='"+a.iIDProfesor_Pro+"'>Agregar</button></td>\
		            		</tr>");
		          	});
		        })
		        .fail(function()
		        {
		          	console.log("Error");
		        })
		        .always(function()
		        {
		          	console.log("Completo");
		        });
			}

			function limpiarTabla()
			{
				$("#tbProfesor tbody").html("");
			}
	
    	</script>
	</head>
	<body>
		<?php 
      		require 'INC/Header.php';
    	?>
    	<div class="container">
      		<h1><span class="label label-primary">Consulta Profesores</span></h1>
      		<br/>
      		<div class="jumbotron">
        		<div class="container">
          			<form action="" role="form" class="form-horizontal" id="frmProfesor">
          				<div class="col-md-4">
	            			<div class="form-group">
				                <label for="IDProfesor">IDProfesor</label>
				                <input type="text" name="IDProfesor" class="form-control" id="IDProfesor" placeholder="ID del Profesor">
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
				           		<label for="Ape_Pat">Ape_Pat</label>
				                <input type="text" name="Ape_Pat" class="form-control" id="Ape_Pat" placeholder="Apellido Paterno">
				          	</div>
			          	</div>
			          	<div class="col-md-12">
              				<button class="btn btn-lg btn-success" id="btnBuscar">Buscar</button>
            				</div>
          			</form>
          			<table class="table" id="tbProfesor">
          				<thead>
          					<tr>
          						<th>ID Profesor</th>
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