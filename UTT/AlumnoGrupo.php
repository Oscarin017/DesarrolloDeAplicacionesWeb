<html>
	<head>
		<?php 
     		require 'INC/Head.php';
    	?>
    	<script type="text/javascript">
    		$(document).ready(function()
			{

	    		$("#tbAlumno").on("click", "button", function(event)
	    		{
	    			var GruAlu = 
	    			{
	    				IDGrupo: $("#Grupo").val(), 
	    				IDAlumno: $(this).val()
	    			};
	    			$.ajax(
	    			{
	    				url: 'INC/InsertarGrupoAlumno.php',
	    				type: 'POST',
	    				datatype: 'json',
	    				data: GruAlu,
	    			})
	    			.done(function(r)
	    			{
	    				if(r.Resultado==1)
            			{
              				alert("Alumno asignado a grupo exitosamente.");
              				llenarTabla(GruAlu.IDGrupo);
            			}
            			else
            			{
              				alert("Error =(");
            			}
	    			})
		        	.fail(function()
		        	{
		          		console.log("Error");
		        	})
		        	.always(function()
		        	{
		          		console.log("Completo");
		        	});
	    		});

	    		$.ajax(
		        {
		        	url: 'INC/SeleccionGrupo.php',
		          	type: 'POST',
		          	datatype: 'json',
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, g)
		          	{
		            	$("#Grupo").append("<option value='"+g.iIDGrupo_Gru+"'>"+g.vNombre_Gru+"</option>");
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

		        $.ajax(
		        {
		        	url: 'INC/SeleccionAlumno.php',
		          	type: 'POST',
		          	datatype: 'json',
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, a)
		          	{
		            	$("#tbAlumno tbody").append("<tr>\
		            		<td>"+a.iIDAlumno_Alu+"</td>\
		            		<td>"+a.vApellidoPaterno_Alu+"</td>\
		            		<td>"+a.vApellidoMaterno_Alu+"</td>\
		            		<td>"+a.vNombre_Alu+"</td>\
		            		<td><button class='btn btn-lg btn-success' value='"+a.iIDAlumno_Alu+"'>Agregar</button></td>\
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

		    });
			
			function llenarTabla(Grupo)
			{
				var Gru = 
	    		{
	    			IDGrupo: Grupo
	    		};
				$.ajax(
		        {
		        	url: 'INC/SeleccionGrupoAlumno.php',
		          	type: 'POST',
		          	datatype: 'json',
		          	data: Gru,
		        })
		        .done(function(r)
		        {
		          	$.each(r, function(index, a)
		          	{
		            	$("#tbAlumnoGrupo tbody").append("<tr>\
		            		<td>"+a.iIDAlumno_Alu+"</td>\
		            		<td>"+a.vApellidoPaterno_Alu+" "+a.vApellidoMaterno_Alu+" "+a.vNombre_Alu+"</td>\
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
	
    	</script>
	</head>
	<body>
		<?php 
      		require 'INC/Header.php';
    	?>
    	<div class="container">
      		<h1><span class="label label-primary">Asignacion de alumnos a grupos</span></h1>
      		<br/>
      		<div class="jumbotron">
        		<div class="container">
          			<form action="" role="form" class="form-horizontal" id="frmGrupo">
            			<div class="col-md-6">
              				<div class="form-group">
                				<label for="Grupo">Grupo</label>
                				<select class="form-control" id="Grupo" name="Grupo"></select>
              				</div>
            			</div>
            			<div class="hidden-sm hidden-xs col-md-6">
              				<img class="img-responsive" src="IMG/Grupos.jpg" alt="">
            			</div>
          			</form>
          			<table class="table" id="tbAlumnoGrupo">
          				<thead>
          					<tr>
          						<th>ID Alumno</th>
          						<th>Nombre Completo</th>
          					</tr>
          				</thead>
          				<tbody>
          				</tbody>
          			</table>
          			<table class="table" id="tbAlumno">
          				<thead>
          					<tr>
          						<th>ID Alumno</th>
          						<th>Apellido Paterno</th>
          						<th>Apellido Materno</th>
          						<th>Nombre</th>
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