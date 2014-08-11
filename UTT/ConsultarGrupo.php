<html>
	<head>
		<?php 
     		require 'INC/Head.php';
    	?>
    	<script type="text/javascript">

    		$(document).ready(function()
			{

		        $("#btnBuscar").click(function(event)
	    		{
	    			event.preventDefault();
	    			limpiarTabla();
	    			llenarTabla();
	    		}); 

	    		$("#tbGrupo").on("click", "button", function(event)
	    		{
	    			if($(this).html() == "Modificar")
	    			{}
	    			else if($(this).html() == "Eliminar")
	    			{
	    				if(confirm("Estas seguro que deseas eliminar este Profesor"))
	    				{
	    					eliminarGrupo($(this).val());
	    					limpiarTabla();
	    					llenarTabla();
	    				}
	    			}
	    		});	 

		    });
			
			function llenarTabla()
			{
				$.ajax(
		        {
		        	url: 'INC/SeleccionGrupo2.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: $("#frmGrupo").serialize(),
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, g)
		          	{
		          		$("#tbGrupo tbody").append("<tr>\
		            		<td>"+g.iIDGrupo_Gru+"</td>\
		            		<td>"+g.vNombre_Gru+"</td>\
		            		<td>"+g.vApellidoPaterno_Pro+" "+g.vApellidoMaterno_Pro+" "+g.vNombre_Pro+"</td>\
		            		<td><button class='btn btn-sm btn-primary' value='"+g.iIDGrupo_Gru+"'>Modificar</button></td>\
		            		<td><button class='btn btn-sm btn-primary' value='"+g.iIDGrupo_Gru+"'>Eliminar</button></td>\
		            		</tr>");
		          	});
		        });

			}

			function eliminarGrupo(IDGru)
			{
				
			}

			function limpiarTabla()
			{
				$("#tbGrupo tbody").html("");
			}
	
    	</script>
	</head>
	<body>
		<?php 
      		require 'INC/Header.php';
    	?>
    	<div class="container">
      		<h1><span class="label label-primary">Consulta Grupos</span></h1>
      		<br/>
      		<div class="jumbotron">
        		<div class="container">
          			<form action="" role="form" class="form-horizontal" id="frmGrupo">
          				<div class="col-md-4">
	            			<div class="form-group">
				           		<label for="Nombre">Nombre Grupo</label>
				                <input type="text" name="Nombre" class="form-control" id="Nombre" placeholder="Nombre">
				          	</div>
				      	</div>
          				<div class="col-md-4">
	            			<div class="form-group">
				                <label for="IDProfesor">ID Profesor</label>
				                <input type="text" name="IDProfesor" class="form-control" id="IDProfesor" placeholder="ID del Profesor">
				           	</div>
				       	</div>
				       	<div class="col-md-4">
	            			<div class="form-group">
				           		<label for="NombreP">Nombre Profesor</label>
				                <input type="text" name="NombreP" class="form-control" id="NombreP" placeholder="Nombre">
				          	</div>
				      	</div>
			          	<div class="col-md-12">
              				<button class="btn btn-lg btn-success" id="btnBuscar">Buscar</button>
            			</div>
          			</form>
          			<table class="table" id="tbGrupo">
          				<thead>
          					<tr>
          						<th>ID Grupo</th>
          						<th>Grupo</th>
          						<th>Profesor</th>
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