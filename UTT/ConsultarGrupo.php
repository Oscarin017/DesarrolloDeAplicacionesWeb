<html>
	<head>
		<?php 
     		require 'INC/Head.php';
    	?>
    	<script type="text/javascript">

    		$(document).ready(function()
			{
				cargarProfesores();

		        $("#btnBuscar").click(function(event)
	    		{
	    			event.preventDefault();
	    			limpiarTabla();
	    			llenarTabla();
	    		}); 

	    		$("#tbGrupo").on("click", "button", function(event)
	    		{
	    			if($(this).html() == "Modificar")
	    			{
	    				$("#mGrupo").modal("show");
		       			cargarModal($(this).val());
	    			}
	    			else if($(this).html() == "Eliminar")
	    			{
	    				if(confirm("Estas seguro que deseas eliminar este Grupo"))
	    				{
	    					eliminarGrupo($(this).val());
	    					limpiarTabla();
	    					llenarTabla();
	    				}
	    			}
	    		});	 

	    		$("#btnGuardar").click(function(event)
	    		{
	    			modificarGrupo($(this).val());
	    			$("#mGrupo").modal("hide");
	    			limpiarTabla();
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

			
			function cargarModal(id){
				cargarProfesores();

			}

			function cargarProfesores()
      		{
      			$.ajax(
        		{	
          			url: 'INC/SeleccionProfesor.php',
          			type: 'POST',
          			datatype: 'json',
        		})
        		.done(function(r)
        		{
          			$.each(r, function(index, p)
          			{
            			if(p.iIDProfesor_Pro != 1)
            			{
              				$("#mProfesor").append("<option value='"+p.iIDProfesor_Pro+"'>"+p.vNombre_Pro+" "+p.vApellidoPaterno_Pro+"</option>");
            			}
          			});
        		});
      		}

      		function cargarGrupo(IDGru)
      		{
      			var jGrupo={IDGrupo: IDGru,};
      			$.ajax(
		        {
		        	url: 'INC/SeleccionGrupo3.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: jGrupo,
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, g)
		          	{
		          		$("#mNombre").val(g.vNombre_Gru);
		          		$("#mProfesor").val(g.iIDProfesor_Gru);
		          		$("#btnGuardar").val(g.iIDGrupo_Gru);
		          	});
		        });
      		}

      		function modificarGrupo(IDGru)
			{
				var jGrupo=
					{
						IDGrupo: IDGru,
						Nombre: $("#mNombre").val(),
						Profesor: $("#mProfesor").val(),
					};
				$.ajax(
		        {
		        	url: 'INC/ModificarGrupo.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: jGrupo,
		        })
		        .done(function(r)
		        {
		          	if(r.Resultado==1)
          			{
            			alert("El grupo se modifico correctamente.");
          			}
          			else
          			{
            			alert("Error =(");
          			}
		        });
			}

      		function eliminarGrupo(IDGru)
			{
				var jGrupo={IDGrupo: IDGru,};
				$.ajax(
		        {
		        	url: 'INC/EliminarGrupo.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: jGrupo,
		        })
		        .done(function(r)
		        {
		          	if(r.Resultado==1)
          			{
            			alert("El grupo se elimino correctamente.");
          			}
          			else
          			{
            			alert("Error =(");
          			}
		        });
			}

			function limpiarTabla()
			{
				$("#tbGrupo tbody").html("");
			}
	
    	</script>
	</head>
	<body>
		<?php 
      		require 'GrupoModal.php';
    	?>
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